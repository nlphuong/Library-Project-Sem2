<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function feedback(){
        $data=DB::table('contact')->orderBy('created_at')->get();
        return view('adminView.feedback',compact('data'));
    }
    public function createAccount(){
        return view('adminView.account.create');
    }
    public function postCreateAccount(LoginRequest $loginRequest){
        $account = new account();
        $account->fullname=request()->fullname;
        $account->email=$loginRequest->email;
        $account->password= Hash::make($loginRequest->password);
        $account->gender=$loginRequest->gender;
        $account->address=$loginRequest->address;
        $account->birthday=$loginRequest->birthday;
        $account->phone=$loginRequest->phone;
        $account->phone=$loginRequest->role;
        $result = $account->save();
        if($result){
           return  redirect()->back()->with('Success','Account has been successfully registered');
        }
        else return redirect() -> back()->with('erro','fail');
    }
    public function customer(){
        $data= account::where('role',1)->get();
        return view('adminView.account.customer',compact('data'));
    }
    public function lock($id){

        $data= account::where('id',$id)->update(['active'=>2]);
        if($data){
            return redirect()->back()->with('success','Lock success');
        }
        else return redirect()->back()->with('fail','Lock fail');

    }
    public function unlock($id){

        $data= account::where('id',$id)->update(['active'=>1]);
        if($data){
            return redirect()->back()->with('success','Lock success');
        }
        else return redirect()->back()->with('fail','Lock fail');

    }
    public function admin(){
        $data= account::where('role',2)->get();
        return view('adminView.account.admin',compact('data'));
    }
}
