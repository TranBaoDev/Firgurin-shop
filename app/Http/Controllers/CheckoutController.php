<?php

namespace App\Http\Controllers;

use DB;

use SebastianBergmann\Diff\Utils\FileUtils;
use Cart;
use Session;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;

session_start();

class CheckoutController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function login()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();
        return view('users.user_login')->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
                                                    ->orderBy('brand_id', 'desc')->get();
        return view('pages.cart.payment')->with('category', $cate_product)
                                        ->with('brand', $brand_product);
    }
    public function save_payment_customer(Request $request)
    {
        //insert shipping_data
        $shipping_data = array();
        $shipping_data['shipping_name'] = $request->shipping_name;
        $shipping_data['shipping_phone'] = $request->shipping_phone;
        $shipping_data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($shipping_data);
        Session::put('shipping_id', $shipping_id);

        //insert payment_method
        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_option;
        $payment_data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($payment_data);

        //insert order_data
        $order_data = array();
        $order_data['user_id'] = Session::get('user_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_d_data
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insertGetId($order_d_data);
        }
        $content_method = DB::table('tbl_payment')->where('payment_status', 'Đang chờ xử lý')->orderBy('payment_id', 'desc')->limit(1)->get();
        foreach ($content_method as $v_method) {
            Session::put('payment_method', $v_method->payment_method);;
        }
        return view('pages.cart.payment_success')->with('shipping_id', $shipping_id)
                                                ->with('payment_id', $payment_id)
                                                ->with('content_method', $content_method);
    }
    public function keep_buying()
    {   $name = Session::get('user_name');
        Mail::send('emails.receipt', compact('name'), function($email) {
            $email->subject('Đơn hàng của khách hàng');
            $email->to('figurinemailnotify@gmail.com');
        });
        Cart::destroy();
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
                                                         ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
                                                        ->orderBy('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', 0)
                                                ->orderBy('product_id', 'desc')->limit(36)->get();
        return Redirect::to('/san-pham')->with('category', $cate_product)
                                ->with('brand', $brand_product)
                                ->with('all_product', $all_product);
    }
    public function manage_order()
    {
        $this->Authlogin();
        $all_order = DB::table('tbl_order')->join('tbl_user','tbl_order.user_id', '=', 'tbl_user.user_id')
                                                ->select('tbl_order.*','tbl_user.user_name')
                                                ->orderBy('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.order.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.order.manage_order', $manager_order);
    }
    public function view_order()
    {
        $this->Authlogin();
        $order_by_id = DB::table('tbl_order')->join('tbl_user', 'tbl_order.user_id', '=', 'tbl_user.user_id')
                                            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
                                            ->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')
                                            ->select('tbl_order.*', 'tbl_user.*', 'tbl_shipping.*', 'tbl_order_detail.*')->first();
        
        $manager_order_by_id = view('admin.order.view_order')->with('order_by_id', $order_by_id);

        return view('admin_layout')->with('admin.order.view_order', $manager_order_by_id);
    }
    public function delete_order($order_id){
        $this->Authlogin();
        DB::table('tbl_order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Xoá danh mục sản phẩm thành công');
        return  redirect::to('/manage-order');
    }
}
