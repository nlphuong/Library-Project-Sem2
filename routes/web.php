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
Route::get('/', 'CommonController@index');
Route::get('/about', 'CommonController@about');
Route::get('/library', 'CommonController@library');

//contact
Route::get('/contact', 'CommonController@contact');
Route::post('/contact', 'CommonController@send');

//Authentication
Route::get('/register', 'AuthenticationController@register');
Route::post('/register', 'AuthenticationController@postRegister');
Route::post('/postLogin', 'AuthenticationController@postLogin');
Route::get('/logout', 'AuthenticationController@logout');
Route::get('/resetPass', 'AuthenticationController@resetPass');
Route::post('/resetPass', 'AuthenticationController@postResetPass');

//our book and detail book
Route::get('/books', 'BookController@showAllBook');
Route::prefix('books')->group(function () {
    Route::get('/categories/{id}', 'BookController@getCategoryBooks');
    Route::get('/search', 'BookController@search');
    Route::get('/detail/{id}', 'BookController@detailBooks');
    Route::post('/details/borrow', 'BookController@borrow');
});




//Route chỉ admin mới vào được(middleware -> admin)
Route::prefix('admin')->group(function () {

    Route::get('/index', 'Admin\AdminController@index');
    Route::resource('category', 'Admin\CategoryController');
    Route::get('category/delete/{category}', 'Admin\CategoryController@delete');
    Route::resource('book', 'Admin\BookController');
    Route::get('/profile', 'Admin\AdminController@profile');
    Route::post('/editProfile/{id}', 'Admin\AdminController@editProfile');
    Route::post('/changePass/{id}', 'Admin\AdminController@postChangePass');
    Route::post('/resetPass', 'Admin\AdminController@resetPass');
    Route::get('/contactManage', 'Admin\AdminController@contactManage');
    Route::get('/rating', 'Admin\AdminController@rating');
    Route::get('/approveRating/{id}', 'Admin\AdminController@approveRating');
    Route::prefix('account')->group(function () {
        Route::get('/createAccount', 'Admin\AdminController@createAccount');
        Route::post('/createAccount', 'Admin\AdminController@postCreateAccount');
        Route::get('/customer', 'Admin\AdminController@customer');
        Route::get('/admin', 'Admin\AdminController@admin');
        Route::get('/lock/{id}', 'Admin\AdminController@lock');
        Route::get('/unlock/{id}', 'Admin\AdminController@unlock');
        Route::get('/delete/{id}', 'Admin\AdminController@delete');
    });
    Route::get('/membership', 'Admin\AdminController@membership');
    Route::get('/approvedMember/{id}', 'Admin\AdminController@approvedMember');
    Route::get('/borrow', 'Admin\AdminController@borrow');
    Route::get('/borrowdetail/{cusId}/{date}','Admin\AdminController@borrowDetail');
    Route::post('/borrowdetail/{cusId}/{date}','Admin\AdminController@postBorrowDetail');
    Route::get('/returnBook/{id}/{isbn}', 'Admin\AdminController@returnBook');
    Route::get('/expiredDetail/{cusId}','Admin\AdminController@expiredDetail');
    Route::post('/expiredDetail/{cusId}','Admin\AdminController@postExpiredDetail');
    Route::get('/sendMail/{id}/{total}', 'Admin\AdminController@sendMail');


});

//Route chỉ Customer mới vào được (middleware->cus)
Route::prefix('customer')->group(function () {
    // Route::get('/index', 'CustomerController@index');
    Route::get('/profile/{id}', 'CustomerController@profile');
    Route::post('/editProfile/{id}', 'CustomerController@editProfile');
    Route::get('/changePass/{id}', 'CustomerController@changePass');
    Route::post('/changePass/{id}', 'CustomerController@postChangePass');
    Route::get('/memberPack/{id}', 'CustomerController@memberPack');
    Route::get('/RegisPack/{id}', 'CustomerController@RegisPack');
    Route::get('/bookmanager/{id}', 'CustomerController@bookmanager');
});
