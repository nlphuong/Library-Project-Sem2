<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        return view('customer.index');
    }
    public function profile($id){
        $account=account::where('id',$id)->first();
        return view('customer.profile',compact('account'));

    }
    public function editProfile(Request $request,$id){
        //validate
        $request->validate([
            'fullname'=>'required|max:50',
            'email'=>'required|max:100|unique:accounts',
            'address'=>'required|max:100',
            'birthday'=>'required',
            'phone'=>'required',

        ]);
        $account=account::where('id',$id)->update(request()->only('fullname','email','gender','address','birthday','phone'));
        if($account){
            return redirect()->back()->with('success','updateSuccess');
        }
        else return redirect()->back()->with('fail','updateFail');

    }
    public function changePass($id){
        $account=account::where('id',$id)->first();
        return view('customer.changepassword',compact('account'));

    }
    public function postChangePass(Request $request,$id){
        //validate
        $request->validate([
            'currentPass'=>'required',
            'password'=>'required|different:currentPass',
            'confirmPass'=>'required|same:password',
        ]);

        $account=account::where('id',$id)->first();
        if(Hash::check($request->currentPass, $account->password)){
            // dd(Hash::make($request->password));
            $update=account::where('id',$id)->update(['password'=>Hash::make($request->password)]);
            if($update){
                return redirect()->back()->with('success','updateSuccess');
            }
            else return redirect()->back()->with('fail','updateFail');
        }
        else return redirect()->back()->with('incorrect',"Current Password not match!");
    }
    public function memberPack($id){
        $account=account::where('id',$id)->first();
        return view('customer.membership',compact('account'));

    }

}
