<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookFormRequest;
use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
           $data=book::orderByDesc('created_at')->get();
        //    dd($data);
        return view('adminView.book.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminView.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {   $request->validate([
        'isbn' => 'required|unique:books|max:50',
        ]);
        $request->merge(['no_Copies_Current'=>$request->no_Copies_Actual]);

        $create = book::create($request->all());
        if($create) {
            return redirect()->back()->with('createSuccess','Create book success!');
        }
        return redirect()->back()->with('createFail','Create book fail!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $book=book::where('ISBN',$isbn)->first();
        return view('adminView.book.edit',compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookFormRequest $request, $isbn)
    {

        // dd($request->all());
        $update = book::where('isbn',$isbn)->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'no_Pages'=>$request->no_Pages,
            'publication_Year'=>$request->publication_Year,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'no_Copies_Actual'=>$request->no_Copies_Actual,
            'no_Copies_Current'=>$request->no_Copies_Current,
            'position'=>$request->position,
            'image'=>$request->image,
            'content'=>$request->content,

        ]);
        if($update) {
            return redirect()->route('book.index')->with('Success','Update book ISBN: '.$isbn.' success!');
        }
        return redirect()->back()->with('Fail','Update book fail!');

    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($isbn)

    {

        $delete= book::where('isbn',$isbn)->delete();
        if($delete) {
            return redirect()->route('book.index')->with('Success','Delete book ISBN: '.$isbn.' success!');
        }
        return redirect()->back()->with('Fail','Delete book fail!');
    }
}
