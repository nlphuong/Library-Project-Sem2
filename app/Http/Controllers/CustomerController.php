<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;


class CustomerController extends Controller
{

    public function index()
    {
        return view('customer.index');
    }
    public function profile($id)
    {
        $account = account::where('id', $id)->first();
        return view('customer.profile', compact('account'));
    }
    public function editProfile(Request $request, $id)
    {
        //validate
        $request->validate([
            'fullname' => 'required|max:50',
            'email' => [
                'required',
                'email',
                ValidationRule::unique('accounts')->ignore($id, 'id')
            ],
            'address' => 'required|max:100',
            'birthday' => 'required',
            'phone' => 'required',

        ]);
        $account = account::where('id', $id)->update(request()->only('fullname', 'email', 'gender', 'address', 'birthday', 'phone'));
        if ($account) {
            return redirect()->back()->with('success', 'Update profile success!');
        } else return redirect()->back()->with('fail', 'updateFail');
    }
    public function changePass($id)
    {
        $account = account::where('id', $id)->first();
        return view('customer.changepassword', compact('account'));
    }
    public function postChangePass(Request $request, $id)
    {
        //validate
        $request->validate([
            'currentPass' => 'required',
            'password' => 'required|different:currentPass',
            'confirmPass' => 'required|same:password',
        ]);

        $account = account::where('id', $id)->first();
        if (Hash::check($request->currentPass, $account->password)) {
            // dd(Hash::make($request->password));
            $update = account::where('id', $id)->update(['password' => Hash::make($request->password)]);
            if ($update) {
                return redirect()->action('CustomerController@profile', ['id' => $id])->with('success', 'Change password success');
            } else return redirect()->back()->with('fail', 'updateFail');
        } else return redirect()->back()->with('incorrect', "Current Password not match!");
    }
    public function memberPack($id)
    {
        $account = account::where('id', $id)->first();
        return view('customer.membership', compact('account'));
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
    public function bookmanager($id)
    {
        $account = account::where('id', $id)->first();
        return view('customer.bookmanager', compact('account'));
    }
}
