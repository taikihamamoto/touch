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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// トップページrouting
Route::get('/', 'MainController@index')->name('top_page');

// QRコードページroting
Route::get('tableCount_page', 'QRcodeController@tableCount')->name('tableCount_page');

Route::get('tableCountUp', 'QRcodeController@tableCountUp')->name('tableCountUp');

Route::post('QRcode_page', 'QRcodeController@store')->name('QRcode_page');

Route::post('QRcode', 'QRcodeController@store')->name('QRcode_page');
Route::post('QRcode/save', 'QRcodeContrroller@save')->name('QRcode_save');

// 種類登録ページrouting
Route::get('kind_page', 'kindController@index')->name('kind_page');

Route::post('kind_store', 'KindController@store')->name('kind_store');
Route::post('Ajax/Kind_delete', 'Ajax\KindController@delete')->name('Ajax/Kind_delete');

// 商品登録ページrouting
Route::get('register_page', 'RegisterController@index')->name('register_page');

Route::post('product_store', 'RegisterController@store')->name('product_store');

// 注文ページrouting
Route::get('/order_page/user_id={user_id}&table={id}', 'OrderController@index')->name('order_page');
// 確認ページroting
Route::post('confirm_page', 'OrderController@confirm')->name('confirm_page');
// 注文登録
Route::post('order_register', 'OrderController@register')->name('order_register');

// 管理ページrouting
Route::get('management_page', 'ManagementController@index')->name('management_page');
// 管理ページAjaxRouting
Route::get('Ajax/Order', 'Ajax\OrderController@index')->name('Ajax/Order');
Route::get('Ajax/Product', 'Ajax\ProductController@index')->name('Ajax/Product');
Route::post('Ajax/Change_made', 'Ajax\ChangeController@made')->name('Ajax/Change_made');
Route::post('Ajax/Change_send', 'Ajax\ChangeController@send')->name('Ajax/Change_send');

// totalページroting
Route::post('total_page', 'TotalController@index')->name('total_page');
Route::post('change_finish', 'TotalController@change_finish')->name('change_finish');
