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
Route::get('/home','UserController@home');
Route::get('/about','UserController@about');
Route::get('/books','UserController@books');
Route::get('/contact','UserController@contact');
Route::get('/library','UserController@library');
Route::get('/register','UserController@register');
Route::get('/index','UserController@indexAdmin');


//Route chỉ admin mới vào được(middleware -> admin)
Route::prefix('admin')->middleware('admin')->group(function () {

    // Route::get('/index','AdminController@index');




});

//Route chỉ Customer mới vào được (middleware->cus)
Route::prefix('customer')->middleware('cus')->group(function () {
    //  Route::get('/index','CustomerController@index');




});

