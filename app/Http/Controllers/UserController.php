<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Controller  khong can dang nhap
*/

class UserController extends Controller
{

    public function index(){
        return view('user.index');
    }
    public function indexAdmin(){
        return view('admin.index');
    }
    public function home(){
        return view('user.home');
    }
    public function about(){
        return view('user.about');
    }
    public function books(){
        return view('user.books');
    }
    public function contact(){
        return view('user.contact');
    }
    public function library(){
        return view('user.library');
    }
    public function register(){
        return view('user.register');
    }
}
