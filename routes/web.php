<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=>'home',
	'uses'=>'MyController@getIndex'
]);
Route::get('loai-san-pham/{id_type}',[
	'as'=>'loaisanpham',
	'uses'=>'MyController@getProductType'
]);
Route::get('san-pham/{id_sanpham}',[
	'as'=>'sanpham',
	'uses'=>'MyController@getProduct'
]);
Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'MyController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'MyController@postLogin'
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'MyController@getLogout'
]);
Route::get('dang-ky',[
	'as'=>'signup',
	'uses'=>'MyController@getSignup'
]);
Route::post('dang-ky',[
	'as'=>'signup',
	'uses'=>'MyController@postSignup'
]);
Route::get('thanh-toan',[
	'as'=>'checkout',
	'uses'=>'MyController@getCheckout'
]);
Route::get('gio-hang',[
	'as'=>'giohang',
	'uses'=>'MyController@getCart'
]);
Route::get('add-cart/{id_sanpham}',[
	'as'=>'addcart',
	'uses'=>'MyController@getAddCart'
]);
Route::get('delete-cart/{id_sanpham}',[
	'as'=>'deletecart',
	'uses'=>'MyController@deleteCart'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'MyController@postCheckout'
]);
Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'MyController@getSearch'
]);

