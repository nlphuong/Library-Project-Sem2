<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\SendMail;
use App\Models\account;
use App\Models\Book;
use App\Models\borrow;
use App\Models\Membership;
use App\Models\membership_fee;
use App\Models\Penalty_fee;
use App\Models\ratingBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index(){
        $fee1=membership_fee::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(price) as sums'))->whereDate('created_at', '=', Carbon::today()->toDateString())->groupBy('date')->first();
        $fee2=Penalty_fee::select(DB::raw('DATE(created_at) as date'), DB::raw('sum(amount) as sums'))->whereDate('created_at', '=', Carbon::today()->toDateString())->groupBy('date')->first();
       //tong doanh thu 7 ngay tro lai
        $countBorrow=[];
        for ($i=0; $i < 7; $i++) {
            $countBorrow[$i]=borrow::whereDate('created_at', '=', Carbon::today()->subDay($i)->toDateString())->count();
        }

        $data1=[
            'countBorrow'=>borrow::whereDate('created_at', '=', Carbon::today()->toDateString())->count(),
            'countBorrowMonth'=>borrow::whereMonth('created_at', '=', Carbon::now()->format('m'))->count(),
            'sumMemberFee'=>($fee1)==null?0:$fee1->sums,
            'sumPenaFee'=>($fee2)==null?0:$fee2->sums,
            'sum1'=>membership_fee::whereMonth('created_at', '=', Carbon::now()->format('m'))->whereYear('created_at', '=', Carbon::now()->format('Y'))->sum('price'),
            'sum2'=>Penalty_fee::whereMonth('created_at', '=',Carbon::now()->format('m'))->whereYear('created_at', '=', Carbon::now()->format('Y'))->sum('amount'),
            'sumCustomer'=>account::where('role',1)->count(),
            'countExpired'=>borrow::where('status',4)->count(),
            'date'=>[
                Carbon::now()->subDay(6)->format('d-m-Y')=>$countBorrow[6],
                Carbon::now()->subDay(5)->format('d-m-Y')=>$countBorrow[5],
                Carbon::now()->subDay(4)->format('d-m-Y')=>$countBorrow[4],
                Carbon::now()->subDay(3)->format('d-m-Y')=>$countBorrow[3],
                Carbon::now()->subDay(2)->format('d-m-Y')=>$countBorrow[2],
                Carbon::now()->subDay(1)->format('d-m-Y')=>$countBorrow[1],
                Carbon::now()->format('d-m-Y')=>$countBorrow[0]
            ],
            'mostBorrowBook'=>borrow::select('book_isbn',DB::raw('count(*) as count'))->groupBy('book_isbn')->orderByDesc('count')->skip(0)->take(5)->get(),
            'lastBorrow'=>borrow::orderByDesc('created_at')->skip(0)->take(6)->get(),
            'minNoBook'=>Book::orderBy('no_Copies_Current')->skip(0)->take(4)->get(),
            'mostMember'=>borrow::select('customer_id',DB::raw('count(*) as count'))->whereMonth('created_at', '=', Carbon::now()->format('m'))->groupBy('customer_id')->orderByDesc('count')->skip(0)->take(8)->get(),
        ];
        // dd($data1['mostMember']);
        return view('adminView.index',compact('data1'));
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

        $update=account::where('id',$id)->update(request()->only('fullname','email','gender','address','birthday','phone'));
        $account=account::where('id',$id)->first();
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

    public function contactManage(){
        $data=DB::table('contact')->orderBy('create_at')->get();
        return view('adminView.contact',compact('data'));
    }
    public function createAccount(){
        return view('adminView.account.create');
    }
    public function postCreateAccount(LoginRequest $loginRequest){
        dd($loginRequest->all());
        $account = new account();
        $account->fullname=request()->fullname;
        $account->email=$loginRequest->email;
        $account->password= Hash::make($loginRequest->password);
        $account->gender=$loginRequest->gender;
        $account->address=$loginRequest->address;
        $account->birthday=$loginRequest->birthday;
        $account->phone=$loginRequest->phone;
        $account->role=$loginRequest->role;
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
            return redirect()->back()->with('Success','Lock success');
        }
        else return redirect()->back()->with('fail','Lock fail');

    }
    public function unlock($id){

        $data= account::where('id',$id)->update(['active'=>1]);
        if($data){
            return redirect()->back()->with('Success','UnLock success');
        }
        else return redirect()->back()->with('fail','Lock fail');

    }
    public function delete($id){

        $data= account::where('id',$id)->delete();
        if($data){
            return redirect()->back()->with('success','Delete Account success!');
        }
        else return redirect()->back()->with('fail','Lock fail');

    }
    public function admin(){
        $data= account::where('role',2)->get();
        return view('adminView.account.admin',compact('data'));
    }
    public function resetPass(Request $request){
        $request->validate([
            'email'=>'required|exists:accounts'
        ],[
            'email.exists'=>'Your email does not exist!'
        ]);
        $account = account::where('email',$request->email)->first();
        $newPass=Str::random(8);
        $update=account::where('email',$request->email)->update(['password'=>Hash::make($newPass)]);
        if($update) {
            request()->session()->invalidate();
            $data =array('email'=>$request->email,'password'=>$newPass,'name'=>$account->fullname);
            $result=Mail::to($request->email)->send(new SendMail($data));
            return redirect()->action('UserController@index')->with('login','Login start');

        }
        else return redirect()->back()->with('Success','Erro!');
    }
    public function rating(Request $request){
        if($request->has('select')){
            if($request->select==1) {
                $data= ratingBook::where('active','0')->orderByDesc('create_at')->get();
                return view('adminView.rating')->with('data',$data)->with('status','pending');
            } else if($request->select==2){
                $data= ratingBook::where('active','1')->orderByDesc('create_at')->get();
                return view('adminView.rating')->with('data',$data)->with('status','approved');
            }
            else {
                $data= ratingBook::orderByDesc('create_at')->get();
                return view('adminView.rating')->with('data',$data)->with('status','all');
            }
        }
        $data= ratingBook::where('active','0')->orderByDesc('create_at')->get();
        return view('adminView.rating')->with('data',$data)->with('status','pending');


    }
    public function approveRating(Request $request,$id){
        if($request->q=="approve"){
            $update=ratingBook::where('id',$id)->update(['active'=>1]);
            if($update) return redirect()->back()->with('Success','Update status success!');
        }
        else if($request->q=="deny"){
            $update=ratingBook::where('id',$id)->update(['active'=>2]);
            if($update) return redirect()->back()->with('Success','Update status success!');
        }
        else if($request->q=="delete"){
            $delete =ratingBook::where('id',$id)->delete();
            if($delete) return redirect()->back()->with('Success','Delete status success!');
        }
    }
    public function membership(Request $request){
        Membership::where('expiration_Date','<',now())->update(['status'=>3]);
        if($request->has('select')){
            if($request->select==1) {
                $data= Membership::where('status','1')->orderByDesc('created_at')->get();
                return view('adminView.membership')->with('data',$data)->with('status','unpaid');
            } else if($request->select==2){
                $data= Membership::where('status','2')->orderByDesc('created_at')->get();
                return view('adminView.membership')->with('data',$data)->with('status','paid');
            }
            else {
                $data= Membership::orderByDesc('created_at')->get();
                return view('adminView.membership')->with('data',$data)->with('status','all');
            }
        }
        $data= Membership::where('status','1')->orderByDesc('created_at')->get();
        return view('adminView.membership')->with('data',$data)->with('status','unpaid');
    }

    // duyệt gói thành viên
    public function approvedMember($id){
        // $exp=Membership::where('id',$id)->first()->expiration_Date;
        // dd(Carbon::parse($exp)->diffInSeconds(Carbon::parse(now())));
        $member=Membership::where([
            ['id','=',$id],
            ['status','=',1]
            ])->first();
        if($member->price==9){
            $update= Membership::where('id',$id)->update([
                'start_date'=> now(),
                'expiration_Date'=> Carbon::now()->addMonth(1),
                'status'=>2
            ]);
        }
        else if($member->price==25){
            $update= Membership::where('id',$id)->update([
                'start_date'=> now(),
                'expiration_Date'=> Carbon::now()->addMonth(3),
                'status'=>2
            ]);
        }
        else if($member->price==89){
            $update= Membership::where('id',$id)->update([
                'start_date'=> now(),
                'expiration_Date'=> Carbon::now()->addYear(1),
                'status'=>2
            ]);
        }

        if($update){
            $mem=Membership::where('id',$id)->first();
            membership_fee::create([
                'membership_id'=>$mem->id,
                'price'=>$mem->price
            ]);
            return redirect()->back()->with('s','success');
        }
    }
    public function borrow(){
        //delete request khach hang ko den lay va +1 so luong sach

        $getExpired = borrow::where([
             ['status', '=', '1'],
             ['borrowed_From', '<', Carbon::now()->format('Ymd')],
        ])->get();
        foreach ($getExpired as $b) {
            $delete=borrow::where('id',$b->id)->delete();
            if($delete){
                $increaceBook=Book::where('isbn',$b->book_isbn)->update(['no_Copies_Current'=>DB::raw('no_Copies_Current +1')]);
                if(!$increaceBook) return view('user.erro');
            }
            else return view('user.erro');
        }
        //khoa tai khoan khach khong tra sach
        borrow::where([
            ['status','=',2],
            ['expiration_Date','<',Carbon::now()->format('Ymd')]
        ])->update(['status'=>4]);
        $borrowExpired=borrow::select('customer_id',DB::raw('count(*) as total'))->where('status',4)->groupBy('customer_id')->orderByDesc('created_at')->get();
        foreach ($borrowExpired as $be) {
            account::where('id',$be->customer_id)->update(['active'=>2]);
        }

        //show
        $aboutExprireDate=Carbon::now()->addDay(2)->format('Ymd');
        $aboutExpire = borrow::where('status',2)->where('expiration_Date','<',$aboutExprireDate)->get();
        $pending=borrow::select('customer_id','borrowed_From',DB::raw('count(*) as total'))->where('status',1)->groupBy('customer_id','borrowed_From')->orderByDesc('created_at')->get();
        return view('adminView.borrow',compact(['pending','aboutExpire','borrowExpired']));
    }
    public function borrowDetail($cusId,$date){

        $data = borrow::where('customer_id',$cusId)->where('borrowed_From',$date)->where('status',1)->get();

       return view('adminView.borrowDetail',compact('data'));
    }
    public function postBorrowDetail($cusId,$date){
        request()->validate([
            'borrow'=>'required',
        ]);
        $approved=borrow::where('customer_id',$cusId)->where('status',1)->where('borrowed_From',$date)->whereIn('book_isbn',request()->borrow)->update([
            'status'=>2,
            'issued_by'=>request()->issued_by,
            'borrowed_From'=>now(),
            'expiration_Date'=>Carbon::now()->addDays(7),
        ]);
        if($approved) {
            $customer=account::where('id',$cusId)->first();
            $book=Book::whereIn('isbn',request()->borrow)->get();
            $data=[$customer,$book,now()->format('d-m-Y H:i'),Carbon::now()->addDays(7)->format('d-m-Y H:i')];
            Mail::send('mail.approvedBorrow',[
                'customer'=>$data[0],
                'book'=>$data[1],
                'start'=>$data[2],
                'end'=>$data[3],
            ], function ($message) use($data) {
                    $message->from('memoriallibrary123@gmail.com');
                    $message->to($data[0]->email);
                    $message->subject('Notice about borrowing books!');

                });
            return redirect() ->action('Admin\AdminController@borrow');
        }
    }
    public function returnBook($id,$isbn){
        $return = borrow::where('id',$id)->update([
            'status'=>3,
            'return_Date'=>now()
        ]);
        if($return){
            Book::where('isbn',$isbn)->update(['no_Copies_Current'=>DB::raw('no_Copies_Current +1')]);
            return redirect()->back();
        }
    }
    public function expiredDetail($cusId){
        $data = borrow::where('customer_id',$cusId)->where('status',4)->get();
        return view('adminView.expiredDetail',compact('data'));
    }
    public function postExpiredDetail($cusId){

        //sau khi tra => chuyeen trang thai da tra sach va mo khoa account
        $update1=borrow::where('customer_id',$cusId)->where('status',4)->update([
            'status'=>3,
            'return_Date'=>now()
        ]);
        $update2=account::where('id',$cusId)->update(['active'=>1]);
        //cong 1 vao sach da tra:
        Book::whereIn('isbn',request()->isbn)->update(['no_Copies_Current'=>DB::raw('no_Copies_Current +1')]);
        //them du lieu vao bang phi phat
        $update3=Penalty_fee::insert([
            'customer_id'=>$cusId,
            'amount'=>request()->fee
        ]);
        if($update1&&$update2&&$update3){
            return redirect() ->action('Admin\AdminController@borrow');
        }
    }
    public function sendMail($id,$total){

        $data = borrow::where('customer_id',$id)->where('status',4)->get();
        // dd($data[0]->account->fullname);
        Mail::send('mail.expired',[
            'data'=>$data,
            'total'=>$total,
        ], function ($message) use($data) {
                $message->from('memoriallibrary123@gmail.com');
                $message->to($data[0]->account->email);
                $message->subject('Notice about expiration!');

            });
        return redirect() ->action('Admin\AdminController@borrow');
    }
}
