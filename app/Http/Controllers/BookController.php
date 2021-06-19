<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function showAllBook(){
        $books = DB::table('books')->paginate(3);
        return view('user.books')->with(['books'=>$books]);
    }

    public function getCategoryBooks($id){
        $books = DB::table('books')->where('category_Id', intval($id))->paginate(2);
        return view('user.books')->with(['books'=>$books]);
    }
}
