<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Test

// use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// Route::post('/test', 'HomeController@test');

Route::get('test-email','HomeController@testmail');

//Frontend
Route::get('/', 'HomeController@home');
Route::get('/trang-chu', 'HomeController@home');
Route::get('/san-pham','HomeController@index');
Route::post('/tim-kiem','UserController@search');
Route::get('/lien-lac','UserController@contact');
Route::get('/contact','UserController@contacting');


// Show-product-Frontend
Route::get('/thuong-hieu/{brand_id}','BrandProduct@show_brand_index');
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_index');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


//User-acount-Frontend
Route::get('/thong-tin','UserController@info'); 

Route::get('/login', 'UserController@index');
Route::get('/dashboard', 'UserController@show_dashboard');
Route::get('/log_out_user', 'UserController@log_out');
Route::post('/user_dashboard', 'UserController@dashboard');
Route::get('/user_register', 'UserController@register');
Route::get('/verify', 'UserController@verify');
Route::get('/forgot', 'UserController@forgot');
Route::get('/change_password', 'UserController@change_password');
Route::get('/change', 'UserController@change');

Route::get('/detail_change', 'UserController@detail_change');
// Route::post('/update-user/{user_id}', 'UserController@update_user');




//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/log_out', 'AdminController@log_out');
Route::post('/admin_dashboard', 'AdminController@dashboard');


//Category-Product-Backend
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');


//Brand-Product-Backend
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

//Product-Backend
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');


//Cart
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_cart');
Route::post('/update-to-cart', 'CartController@update_cart');

//Payment
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::get('/thanh-toan','CheckoutController@checkout');
Route::post('/save-payment-customer', 'CheckoutController@save_payment_customer'); 
Route::post('/keep-bying', 'CheckoutController@keep_buying');


//Order
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{order_id}', 'CheckoutController@view_order');
Route::get('/delete-order/{order_id}', 'CheckoutController@delete_order');

