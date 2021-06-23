<?php

use App\Http\Controllers\UserController;
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



// Route không áp dụng middleware
Route::get('/','UserController@index');
Route::get('/books','BookController@showAllBook');
Route::get('/books/categories/{id}','BookController@getCategoryBooks');
Route::get('/books/detail/{id}','BookController@detailBooks');
Route::get('/register','UserController@register');
Route::post('/register','UserController@postRegister');
Route::post('/postLogin','UserController@postLogin');
Route::get('/logout','UserController@logout');


//Route chỉ admin mới vào được(middleware -> admin)
Route::prefix('admin')->group(function () {

    Route::get('/index','Admin\AdminController@index');
    Route::resource('category', 'Admin\CategoryController');
    Route::get('category/delete/{category}','Admin\CategoryController@delete');
    Route::resource('book', 'Admin\BookController');




});

//Route chỉ Customer mới vào được (middleware->cus)
Route::prefix('customer')->group(function () {
     Route::get('/index','CustomerController@index');
     Route::get('/profile/{id}','CustomerController@profile');
     Route::post('/editProfile/{id}','CustomerController@editProfile');
     Route::get('/changePass/{id}','CustomerController@changePass');
     Route::post('/changePass/{id}','CustomerController@postChangePass');
     Route::get('/memberPack/{id}','CustomerController@memberPack');





});

