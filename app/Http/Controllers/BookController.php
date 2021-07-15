<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\Book;
use App\Models\borrow;
use App\Models\Membership;
use App\Models\ratingBook;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            }else if($_GET['sort']== "4"){
                $books->orderBy('price');
            }else if($_GET['sort']== "5"){
                $books->orderByDesc('price');
            }
        }
        $books = $books->paginate(4);
        $arr = [];
        $recmd = DB::table('books')->get()->all();
        for ($i=0; $i < count($recmd); $i++) {
            $avg = 0;
            if($recmd[$i]->totalreview != 0){
                $avg = (integer) floor($recmd[$i]->totalstar/$recmd[$i]->totalreview);
                if($avg > 3){
                    array_push($arr, $recmd[$i]);
                }
            }
        }
        shuffle($arr);
        return view('user.books')->with(['books'=>$books,'arr'=>$arr]);
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
            }else if($_GET['sort']== "4"){
                $books->orderBy('price');
            }else if($_GET['sort']== "5"){
                $books->orderByDesc('price');
            }
        }
        $books = $books->paginate(4);
        $arr = [];
        $recmd = DB::table('books')->get()->all();
        for ($i=0; $i < count($recmd); $i++) {
            $avg = 0;
            if($recmd[$i]->totalreview != 0){
                $avg = (integer) floor($recmd[$i]->totalstar/$recmd[$i]->totalreview);
                if($avg > 3){
                    array_push($arr, $recmd[$i]);
                }
            }
        }
        shuffle($arr);
        return view('user.books')->with(['books'=>$books,'arr'=>$arr]);
    }

    public function search(Request $request){

        $books = DB::table('books');

        if(isset($_GET['txtsearch']) && !empty($_GET['txtsearch'])){
            $search = $_GET['txtsearch'];
            $books->where('title','Like', '%'.$search.'%');
        }
        if(isset($_GET['categories']) && !empty($_GET['categories'])){
            $cateId = $_GET['categories'];
            $books->where('category_Id', $cateId);
        }
        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort']== "1"){
                $books->orderByDesc('created_at');
            }else if($_GET['sort']== "2"){
                $books->orderBy('publication_Year');
            }else if($_GET['sort']== "3"){
                $books->orderByDesc('publication_Year');
            }else if($_GET['sort']== "4"){
                $books->orderBy('price');
            }else if($_GET['sort']== "5"){
                $books->orderByDesc('price');
            }

        }
        $books = $books->paginate(3);
        $arr = [];
        $recmd = DB::table('books')->get()->all();
        for ($i=0; $i < count($recmd); $i++) {
            $avg = 0;
            if($recmd[$i]->totalreview != 0){
                $avg = (integer) floor($recmd[$i]->totalstar/$recmd[$i]->totalreview);
                if($avg > 3){
                    array_push($arr, $recmd[$i]);
                }
            }
        }
        shuffle($arr);

        return view('user.books')->with(['books'=>$books,'arr'=>$arr]);
    }

    public function detailBooks($isbn){
        $star = 0;

        $books = DB::table('books')->where('isbn', intval($isbn))->first();

        $relateBooks = DB::table('books')->where('isbn','!=',intval($isbn))
                                        ->where(['category_Id'=>$books->category_Id])
                                        ->inRandomOrder()->limit(4)->get();

        $rate = DB::table('ratingBooks')->join('accounts', 'ratingBooks.customer_Id', '=', 'accounts.id')
                                        ->where('ratingBooks.isbn', $isbn)->where('ratingBooks.active',1)
                                        ->orderByDesc('create_at')
                                        ->paginate(4);
        $total_no_star = DB::table('ratingBooks')->where('isbn', $isbn)->where('ratingBooks.active',1)->sum('rating');

        $total_review = DB::table('ratingBooks')->where('isbn', $isbn)->where('ratingBooks.active',1)->count();

        if($total_review !== 0){
            $star = floor($total_no_star / $total_review);
        }

        $borrow = borrow::where('book_isbn', $isbn)->where('status','!=','3')->get()->all();
        $membership=Membership::where('status','2')->get();
        //dd($borrow);

        return view('user.details')->with(['books'=>$books,
                                            'relateBooks'=>$relateBooks,
                                            'star'=>$star,
                                            'rate'=>$rate,
                                            'no_star'=>$total_no_star,
                                            'review'=>$total_review,
                                            'cusBorrow'=>$borrow,
                                            'membership'=>$membership]);
    }

    public function rating(Request $request){

        $request->validate([
            'rating_data' => 'required',
            'user_review' => 'required',
        ]);

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
    public function borrow(Request $request){

        $request->validate([
            'selectDate'      => 'required|date|after:today',
        ]);

        $isbn = $request->input('txtIsbn');
        $cusId = $request->input('txtIdCus');
        $date = $request->input('selectDate');
        $date = date('d/m/Y', strtotime($date));
        $dateTime = DateTime::createFromFormat('d/m/Y H:i:s', "$date 00:00:00");
        $borrow = false;


        $num = DB::table('books')->where('isbn', $isbn)->first()->{'no_Copies_Current'};
        if($num > 0){
            $num = $num -1;
            DB::table('books')->where('isbn', $isbn)->update(array('no_Copies_Current' => $num));
            $borrow = borrow::insert([
                'customer_id'=>intval($cusId),
                'book_isbn'=>$isbn,
                'borrowed_From'=>$dateTime,
            ]);
            $customer=account::where('id',$cusId)->first();
            $book=DB::table('books')->where('isbn', $isbn)->get();
            $data=[$customer,$book,$dateTime->format('d-m-Y H:i')];
            Mail::send('mail.registerBorrow',[
                'customer'=>$data[0],
                'book'=>$data[1],
                'start'=>$data[2]
            ], function ($message) use($data) {
                    $message->from('memoriallibrary123@gmail.com');
                    $message->to($data[0]->email);
                    $message->subject('Notice about borrowing books!');

                });
        }

        //dd($request);
        if ($borrow) {
            return redirect()->back()->with('success', 'Thanks For Your Confirm');
        } else {
            return redirect()->back()->with('fail', 'Your Confirm send to admin failed');
        }
    }
}
