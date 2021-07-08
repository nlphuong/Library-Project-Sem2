<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function about(){
        return view('user.about');
    }

    public function library(){
         return view('user.library');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
        ]);

        $query = DB::table('contact')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ]);
        if ($query) {
            return redirect()->back()->with('success', 'Thanks For Your Information');
        } else {
            return redirect()->back()->with('fail', 'Your information update failed');
        }
    }
}
