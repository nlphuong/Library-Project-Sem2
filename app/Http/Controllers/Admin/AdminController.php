<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;


class AdminController extends Controller
{
    public function index(){
        return view('adminView.index');
    }
    public function profile(){
        return view('adminView.profile');
    }
    public function editProfile(Request $request,$id){
        //validate
        // dd(request()->all());
        $request->validate([
            'fullname'=>'required|max:50',
            'email' => [
                'required',
                'email',
                ValidationRule::unique('accounts')->ignore($id, 'id')
            ],
            'address'=>'required|max:100',
            'birthday'=>'required',
            'phone'=>'required',

        ]);
        $account=account::where('id',$id)->first();
        $update=account::where('id',$id)->update(request()->only('fullname','email','gender','address','birthday','phone'));
        if($update){
            request()->session()->invalidate();
            request()->session()->push('adminSession',$account);
            return redirect()->back()->with('success','Update profile success!');
        }
        else return redirect()->back()->with('fail','updateFail');
    }
    public function postChangePass(Request $request,$id){
        //validate
        $request->validate([
            'currentPass'=>'required',
            'password'=>'required|different:currentPass',
            'confirmPass'=>'required|same:password',
        ]);

        $account=account::where('id',$id)->first();
        // dd($request->currentPass);
        if(Hash::check($request->currentPass, $account->password)){
            // dd(Hash::make($request->password));
            $update=account::where('id',$id)->update(['password'=>Hash::make($request->password)]);
            if($update){
                return redirect()->action('Admin\AdminController@profile')->with('success','Change password success');
            }
            else return redirect()->back()->with('fail','updateFail');
        }
        else return redirect()->back()->with('incorrect',"Current Password not match!");
    }

}
