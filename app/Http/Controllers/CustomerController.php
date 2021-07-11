<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\borrow;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;


class CustomerController extends Controller
{

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
        $membership=Membership::where('customer_id',$id)->first();
        $account = account::where('id', $id)->first();
        return view('customer.membership', compact('account','membership'));
    }

    public function bookmanager($id)
    {
        $borrow = borrow::where('customer_id',$id)->where('status',"1")->orderBy('borrowed_From')->paginate(3);
        $status = borrow::where('customer_id',$id)->where('status',"1")->first()->{'status'};
        $membership=Membership::where('customer_id',$id)->first();
        $account = account::where('id', $id)->first();
        // dd($status);
        return view('customer.bookmanager')->with(['account'=>$account,
                                                    'membership'=>$membership,
                                                    'borrow'=>$borrow,
                                                    'status'=>$status]);
    }
    public function bookByStatus($id, $status)
    {
        $borrow = borrow::where('customer_id',$id)->where('status',$status)->orderBy('borrowed_From')->paginate(3);
        $status = borrow::where('customer_id',$id)->where('status',$status)->first()->{'status'};
        $membership=Membership::where('customer_id',$id)->first();
        $account = account::where('id', $id)->first();
        // dd($status);
        return view('customer.bookmanager')->with(['account'=>$account,
                                                    'membership'=>$membership,
                                                    'borrow'=>$borrow,
                                                    'status'=>$status]);
    }
    public function RegisPack($id,Request $request)
    {  if(Membership::where('customer_id',$id)->count()!=0){
            switch ($request->pack) {
                case 1:
                    $update=Membership::where('customer_id',$id)->update([
                        'start_date'=>null,
                        'expiration_Date'=>null,
                        'price'=>9,
                        'status'=>1
                    ]);
                    break;
                case 2:
                    $update=Membership::where('customer_id',$id)->update([
                        'start_date'=>null,
                        'expiration_Date'=>null,
                        'price'=>25,
                        'status'=>1
                    ]);
                    break;
                case 3:
                    $update=Membership::where('customer_id',$id)->update([
                        'start_date'=>null,
                        'expiration_Date'=>null,
                        'price'=>89,
                        'status'=>1
                    ]);
                    break;
            }
            if($update) return redirect()->back()->with('success','Membership request has been sent. Please go to the library to pay!');
        }
        else{
            if($request->pack==1){
                $update =Membership::create([
                    'customer_id'=>$id,
                    'price'=>9,
                    'status'=>1
                ]);
              } else if($request->pack==2){
               $update =Membership::create([
                   'customer_id'=>$id,
                   'price'=>25,
                   'status'=>1
               ]);
              } else if($request->pack==3){
               $update =Membership::create([
                   'customer_id'=>$id,
                   'price'=>89,
                   'status'=>1
               ]);
              }
              else return redirect()->back()->with('fail', 'Your information update failed');
              if($update){
                  return redirect()->back()->with('success','Membership request has been sent. Please go to the library to pay!');
              }
        }

    }
    public function postChangeAvatar($id,Request $request){
        if($request->has('upload')){
            $account =account::where('id',$id)->first();
            $file=$request->upload;
            $filename=uniqid().$file->getClientoriginalName();
            $file->move(public_path('uploads'),$filename);
            $request->merge(['image'=>$filename]);
            $update = account::where('id',$id)->update([
                'image'=>$request->image
              ]);
              if($update) {
                  request()->session()->invalidate();
                  request()->session()->push('accountSession',$account);
                  return redirect()->back();
              }
          }
    }
}
