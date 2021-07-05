<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function showAllBook(Request $request){
        $books = DB::table('books');

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort']== "1"){
                $books->orderByDesc('created_at');
            }else if($_GET['sort']== "2"){
                $books->orderBy('publication_Year');
            }else if($_GET['sort']== "3"){
                $books->orderByDesc('publication_Year');
            }
        }
        $books = $books->paginate(3);
        return view('user.books')->with(['books'=>$books]);
    }

    public function getCategoryBooks($url){
        $books = DB::table('books')->where('category_Id', intval($url));
        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort']== "1"){
                $books->orderByDesc('created_at');
            }else if($_GET['sort']== "2"){
                $books->orderBy('publication_Year');
            }else if($_GET['sort']== "3"){
                $books->orderByDesc('publication_Year');
            }
        }
        $books = $books->paginate(2);
        return view('user.books')->with(['books'=>$books]);
    }

    public function search(Request $request){

        $books = DB::table('books');

        if(isset($_GET['txtsearch']) && !empty($_GET['txtsearch'])){
            $search = $_GET['txtsearch'];
            $cateId = $_GET['categories'];
            $books->where('title','Like', '%'.$search.'%');
        }
        if(isset($_GET['categories']) && !empty($_GET['categories'])){
            $books->where('category_Id', $cateId);
        }
        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort']== "1"){
                $books->orderByDesc('created_at');
            }else if($_GET['sort']== "2"){
                $books->orderBy('publication_Year');
            }else if($_GET['sort']== "3"){
                $books->orderByDesc('publication_Year');
            }
        }
        $books = $books->paginate(3);

        return view('user.books')->with(['books'=>$books]);


    }

    public function detailBooks($isbn){
        $star = 0;

        $books = DB::table('books')->where('isbn', intval($isbn))->first();

        $relateBooks = DB::table('books')->where('isbn','!=',intval($isbn))
                                        ->where(['category_Id'=>$books->category_Id])
                                        ->inRandomOrder()->limit(2)->get();

        $rate = DB::table('ratingBooks')->join('accounts', 'ratingBooks.customer_Id', '=', 'accounts.id')
                                        ->where('ratingBooks.isbn', $isbn)->where('ratingBooks.active',0)
                                        ->orderByDesc('create_at')
                                        ->paginate(4);
        $total_no_star = DB::table('ratingBooks')->where('isbn', $isbn)->sum('rating');

        $total_review = DB::table('ratingBooks')->where('isbn', $isbn)->count();

        if($total_review !== 0){
            $star = floor($total_no_star / $total_review);
        }

        return view('user.details')->with(['books'=>$books,
                                            'relateBooks'=>$relateBooks,
                                            'star'=>$star,
                                            'rate'=>$rate,
                                            'no_star'=>$total_no_star,
                                            'review'=>$total_review,]);
    }

    public function rating(Request $request){
        $data = $request->all();
        $customer_Id = $data['user_id'];
        $isbn = $data['isbn'];
        $rating = $data['rating_data'];
        $comment = $data['user_review'];

        return DB::table('ratingBooks')->insert([
            'customer_Id' => $customer_Id,
            'isbn' => $isbn,
            'rating'=> $rating,
            'comment'=>$comment,
        ]);;

    }
}
