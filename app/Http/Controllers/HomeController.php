<?php

namespace App\Http\Controllers;

use DB;

use Session;
use App\Product;
use Request;
// use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

session_start();
class HomeController extends Controller
{

    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();

        // $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        //                                         ->join('tbl_brand_product','tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        //                                         ->orderBy('tbl_product.product_id','desc')->get();

        //Sắp xếp sản phẩm
        if (Request::get('sort') == 'price_asc') {
            $data = Product::orderBy('product_price', 'asc')->paginate(16);
        } else if (Request::get('sort') == 'price_desc') {
            $data = Product::orderBy('product_price', 'desc')->paginate(16);
        } else if (Request::get('sort') == 'name_asc') {
            $data = Product::orderBy('product_name', 'asc')->paginate(16);
        } else if (Request::get('sort') == 'name_desc') {
            $data = Product::orderBy('product_name', 'desc')->paginate(16);
        } else if (Request::get('sort') == 'oldest') {
            $data = Product::orderBy('product_id', 'asc')->paginate(16);
        } else if (Request::get('sort') == 'newest') {
            $data = Product::orderBy('product_id', 'desc')->paginate(16);
        
        }  //Lọc giá sản phẩm
        elseif (Request::get('price') == 'lower_1mil') { 
            $data = Product::where('product_price', '<', '1000000')->orderBy('product_price', 'asc')->paginate(16);
        } else if (Request::get('price') == 'between_1mil_to_2mil') {
            $data = Product::whereBetween('product_price', [1000000, 2000000])->orderBy('product_price', 'asc')->paginate(16);
        } else if (Request::get('price') == 'between_2mil_to_3mil') {
            $data = Product::whereBetween('product_price', [2000000, 3000000])->orderBy('product_price', 'asc')->paginate(16);
        } else if (Request::get('price') == 'between_3mil_to_4mil') {
            $data = Product::whereBetween('product_price', [3000000, 4000000])->orderBy('product_price', 'asc')->paginate(16);
        } else if (Request::get('price') == 'over_4mil') {
            $data = Product::where('product_price', '>', '4000000')->orderBy('product_price', 'asc')->paginate(16);
        
        //Lọc giá sản phẩm
        }else if (Request::get('scale') == '1_12') {
            $data = Product::where('product_size', '=', '1/12')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_10') {
            $data = Product::where('product_size', '=', '1/10')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_7') {
            $data = Product::where('product_size', '=', '1/7')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_6') {
            $data = Product::where('product_size', '=', '1/6')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_5') {
            $data = Product::where('product_size', '=', '1/5')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_4') {
            $data = Product::where('product_size', '=', '1/4')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == '1_3') {
            $data = Product::where('product_size', '=', '1/3')->orderBy('product_price', 'asc')->paginate(16);
        }else if (Request::get('scale') == 'non_scale') {
            $data = Product::where('product_size', '=', 'NON Scale')->orderBy('product_price', 'asc')->paginate(16);
        }else {
            $data = Product::where('product_status', 0)->orderBy('product_id', 'desc')->paginate(16);
        }

        
        return view('pages.index')->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('data', $data);
    }

    public function home()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', 0)
            ->orderBy('category_id', 'desc')->get();

        $brand_product = DB::table('tbl_brand_product')->where('brand_status', 0)
            ->orderBy('brand_id', 'desc')->get();

        $pre_order_product = DB::table('tbl_product')->where('product_status', 0)
            ->where('category_id', 3)
            ->orderBy('product_id', 'desc')->limit(12)->get();
        $avail_order_product = DB::table('tbl_product')->where('product_status', 0)
            ->where('category_id', 2)
            ->orderBy('product_id', 'desc')->limit(12)->get();
        return view('pages.home')->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('pre_order_product', $pre_order_product)
            ->with('avail_order_product', $avail_order_product);
    }
}
