<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Account;
class Admin extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $acct = User::all();
        $total = collect($acct)->sum('acct_bal');
       
        
        $ref_user = User::where('referrer_id','!=',null)->get();
        return view('Admin/index',['total'=>$total,'ref_user'=>$ref_user]);
    }

    public function users(){
        $acct = User::all();
        $total = collect($acct)->sum('acct_bal');
       
        $user = User::where('isAdmin',3)->latest()->get();
        return view('Admin/user',['user'=>$user,'total'=>$total]);
    }
    public function users_email(){
        
        
        $user = User::where('isAdmin',3)->latest()->get();
        return view('Admin/user_email',['email'=>$email]);
    }
    
    public function payments(){
        $payment = Payment::with('user')->get();
        return view('Admin/payment',['payment'=>$payment]);
    }
    public function record($id){
        $user = User::find($id);
        $acct_det = Account::where('user_id',$user->id)->get();
        return view('Admin/user_details',['acct_det'=>$acct_det, 'user'=>$user]);
    }
}
