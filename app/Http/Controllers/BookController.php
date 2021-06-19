<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function showAllBook(){
        $books = DB::table('books')->get();
        return view('user.books')->with(['books'=>$books]);
    }
}
