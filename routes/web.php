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
// Frontend
Route::get('/', 'FrontendController@index')->name('index');
Route::get('promotion','FrontendController@promotion')->name('promotion'); 
Route::get('brand/{id}', 'FrontendController@brand')->name('brand');

Route::get('subcategory/{id}', 'FrontendController@subcategory')->name('subcategory');

Route::get('detail/{id}', 'FrontendController@detail')->name('detail');
Route::get('cart', 'FrontendController@cart')->name('cart');

Route::post('order', 'FrontendController@order')->name('order');
Route::get('ordersuccess', 'FrontendController@ordersuccess')->name('ordersuccess');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Basic Routing

	// GET Method
	Route::get('hello','TestOneController@index');

	// POST Method
	Route::post('hello','TestOneController@index');

	// For ALL Method (
// get, post, put, patch, delete, options)
	Route::resource('test','TestTwoController');


	// Route Parameters

	// GET Method
	Route::get('user/{id}', 'TestThreeController@show');

	// Multiple Route Parameters
	Route::get('hellouser/{name}/{position}/{city}','TestOneController@user');


	// localhost:8000/hellouser/Ya Thaw/Web Developer/Yangon

// Backend

Route::group(['middleware' => 'role:admin', 'prefix' => 'backside', 'as' => 'backside.'], function(){

	Route::resource('/category','CategoryController');
	Route::resource('/subcategory','SubcategoryController');
	Route::resource('/brand','BrandController');
	Route::resource('/item','ItemController');

	Route::get('/order','BackendController@order')->name('order');


	Route::get('/customer','BackendController@customer')->name('customer');
	Route::get('customer/delete/{id}', 'BackendController@customerdelete')->name('customer/delete');

});




























