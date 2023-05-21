<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    public function index()
    {
        return view('users.user_login');
    }
    public function show_dashboard()
    {
        return view('pages.home');
    }
    public function dashboard(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = $request->user_password;
         //đổi mk lại 123 nên md5 không nhận, ông thích thì mã hóa lại, tôi không biết làm

        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();
        if ($result) {
            $verified = $result->verified;
            if ($verified == 1) {
                Session::put('user_name', $result->user_name);
                Session::put('user_phone', $result->user_phone);
                Session::put('user_gmail', $result->user_email);
                Session::put('user_address', $result->user_address);
                Session::put('user_id', $result->user_id);
                return Redirect::to('/trang-chu');
            } if ($verified == 0) { 
                Session::put('message', 'Tài khoản chưa kích hoạt. Kiểm tra Gmail');
                return Redirect::to('/login');
            }
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Vui lòng thử lại');
            return Redirect::to('/login');
        }
    }
    public function register(Request $request){
        $user_email = $request->regis_gmail;
        $user_password = $request->regis_pass;

        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();

        if($result) {
            Session::put('message', 'Tài khoản với gmail này đã có sẵn. Xin hãy đăng nhập');
            return Redirect::to('/login');
        } else {
            $data = array();
            $data['user_name'] = $request->regis_name;
            $data['user_email'] = $request->regis_gmail; 
            $data['user_password'] = $request->regis_pass;
            $data['user_phone'] = $request->regis_phone;

            $name = $request->regis_name;
            $gmail = $request->regis_gmail;
            Session::put('regis_gmail', $gmail);
            Mail::send('emails.verify', compact('name', 'gmail'), function($email) use($gmail){
                $email->subject('Xác nhận gmail của bạn');
                $email->to($gmail);
            });
            DB::table('tbl_user')->insert($data);
            Session::put('message', 'Vui lòng kiểm tra Gmail để kích hoạt tài khoản');
            return Redirect::to('/login');
        }
    }
    public function verify(Request $request){
        $gmail = Session::get('regis_gmail');
        $result = DB::table('tbl_user')->where('user_email', $gmail)->first();
        if ($result) {
            DB::table('tbl_user')->where('user_email', $gmail)->update(['verified'=>1]);
            Session::put('message', 'Kích hoạt tài khoản thành công. Xin hãy đăng nhập');
            return Redirect::to('/login');
        } else {
            Session::put('message', 'Tài khoản này chưa được đăng kí');
            return Redirect::to('/login');
        }
    }
    public function forgot(Request $request){
        $gmail = $request->forgo_gmail;
        Session::put('fogo_gmail', $gmail);
        $result = DB::table('tbl_user')->where('user_email', $gmail)->first();
        $name = $request->regis_name;
        Mail::send('emails.change', compact('name','gmail'), function($email) use($gmail){
            $email->subject('Thay đổi mật khẩu của bạn');
            $email->to($gmail);
        });
        Session::put('message', 'Vui lòng kiểm tra Gmail để đổi mật khẩu');
        return Redirect::to('/login');
    }
    public function change_password(){
        return view('users.change_pass');
    }
    public function change(Request $request) {
        $gmail = Session::get('fogo_gmail');
        $pass = $request->new_pass;
        DB::table('tbl_user')->where('user_email', $gmail)->update(['user_password'=>$pass]);
        Session::put('message', 'Thay đổi mật khẩu thành công. Xin hãy đăng nhập');
        return Redirect::to('/login');
    }
    public function log_out()
    {
        Session::put('user_name', null);
        Session::put('user_id', null);
        return Redirect::to('/trang-chu');
    }
    public function info(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
                                                        ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
                                                        ->orderBy('brand_id', 'desc')->get();
        return view('users.user_info')->with('category', $cate_product)
                                        ->with('brand', $brand_product);
    }
    public function edit_user($user_id)
    {
        $edit_user = DB::table('tbl_user')->where('user_id', $user_id)->get();
        $shipping_info = DB::table('tbl_shipping')->where('user_id', $user_id)->get();
        $manager_product = view('users.user_info')->with('edit_user', $edit_user)
                                                        ->with('shipping_info', $shipping_info);
        return view('pages.layout')->with('users.user_info', $manager_product);
    }
    public function detail_change(Request $request) {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $gmail = Session::get('user_gmail');

        DB::table('tbl_user')->where('user_email', $gmail)->update(['user_name'=>$name]);
        DB::table('tbl_user')->where('user_email', $gmail)->update(['user_phone'=>$phone]);
        DB::table('tbl_user')->where('user_email', $gmail)->update(['user_address'=>$address]);

        Session::put('user_name', $name);
        Session::put('user_phone', $phone);
        Session::put('user_address', $address);
        return Redirect::to('/thong-tin');
    }
    public function contact()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();

        return view('pages.contact')->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function contacting(Request $request)
    {
        $name = $request->name;
        $gmail = $request->gmail;
        $phone = $request->phone;
        $detail = $request->detail;
        Mail::send('emails.contact_mail', compact('name', 'gmail', 'phone', 'detail'), function ($email) {
            $email->subject('Thắc mắc của khách');
            $email->to('figurinemailnotify@gmail.com');
        });

        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();

        return view('pages.contact')->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();
        return view('pages.show.searching')->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('search_product', $search_product);
    }
}
