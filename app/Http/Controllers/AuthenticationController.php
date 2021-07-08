<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CommonController;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function register(){
        return view('user.register');
    }
    public function postRegister(LoginRequest $loginRequest){


        $account = new account();
        $account->fullname=request()->fullname;
        $account->email=$loginRequest->email;
        $account->password= Hash::make($loginRequest->password);
        $account->gender=$loginRequest->gender;
        $account->address=$loginRequest->address;
        $account->birthday=$loginRequest->birthday;
        $account->phone=$loginRequest->phone;
        $result = $account->save();
        if($result){
           return  redirect()->action('CommonController@index')->with('registerSuccess','Your account has been successfully registered');
        }
        else return redirect() -> back()->with('erro','fail');
    }
    public function postLogin(Request $request){
        //validate

        //check
        $email = $request ->email;
        $pass=$request ->password;
        $account =account::where('email',$email)->first();
        if($account!=null && Hash::check($pass, $account->password)) {
            if($account->role ==1){
                request()->session()->invalidate();
                request()->session()->push('accountSession',$account);
                return redirect()->action('CommonController@index');
            }
            else if($account->role ==2||$account->role ==3){
                request()->session()->invalidate();
                request()->session()->push('adminSession',$account);
                return redirect()->action('Admin\AdminController@index');
            }
        }
        else return back()->with('loginfail','Email or password incorrect!')->with('login','login fail!');

    }
    public function logout(){

        request()->session()->invalidate();
        return redirect()->action('CommonController@index');
    }
    public function resetPass(){
        return view('user.resetPass');
    }
    public function postResetPass(Request $request){
        // Mail::send('mail.resetPass',['email'=>$request->email], function ($message) {
        //     $message->from('sangtrancong171196@gmail.com', 'John Doe');

        //     $message->to('trancongsang.a1.vd.2014@gmail.com');

        //     $message->subject('Reset Password');

        // });
        // return redirect()->action('AuthenticationController@index');
        //validate
        $request->validate([
            'email'=>'required|exists:accounts'
        ],[
            'email.exists'=>'Your email does not exist!'
        ]);
        $account = account::where('email',$request->email)->first();
        $newPass=Str::random(8);
        $update=account::where('email',$request->email)->update(['password'=>Hash::make($newPass)]);
        if($update) {
            $data =array('email'=>$request->email,'password'=>$newPass,'name'=>$account->fullname);
            $result=Mail::to($request->email)->send(new SendMail($data));
            return redirect()->back()->with('Success','Your Password have been send to your email! Please check email!');

        }
        else return redirect()->back()->with('Success','Erro!');


    }
}
