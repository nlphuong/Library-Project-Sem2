<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminView.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('adminView.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $request->validate([
            'name'=> 'required|unique:categories|max:50',
            'upload' => 'required'
        ]);

        //store
        if($request->has('upload')){
          $file=$request->upload;
           $filename=uniqid().$file->getClientoriginalName();
            $file->move(public_path('uploads'),$filename);
            $request->merge(['image'=>$filename]);
        }

        $create = Category::create($request->all());
        if($create) {
            return redirect()->route('category.index')->with('createSuccess','Create category name: '.$request->name.' success');
        }
        return redirect()->back()->with('createFail','Create category name: '.$request->name.' fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd(request()->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // $request->validate([
        //     'name'=> 'required|unique:categories|max:50',
        //     'upload' => 'required'
        // ]);

        if($request->has('upload')){
            $file=$request->upload;
            $filename=uniqid().$file->getClientoriginalName();
            $file->move(public_path('uploads'),$filename);
            $request->merge(['image'=>$filename]);
            if(File::exists(public_path('uploads/'.$category->image))){
                File::delete(public_path('uploads/'.$category->image));
                }
          }
          else{
            $request->image = $category ->image;
          }

          $update = Category::where('id',$category->id)->update(['name'=>$request->name,'image'=>$request->image]);
          if($update) {

              return redirect()->route('category.index')->with('updateSuccess','Update category name: '.$request->name.' success');
          }
          return redirect()->back()->with('updateFail','Update category name: '.$request->name.' fail');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        dd($category->id);
    }
    public function delete(Category $category)
    {
        $delete= Category::find($category->id)->delete();
        if($delete) {
            return redirect()->route('category.index')->with('deleteSuccess','Delete category name: '.$category->name.' success');
        }
        return redirect()->back()->with('deleteFail','Delete category name: '.$category->name.' fail');
    }
}
