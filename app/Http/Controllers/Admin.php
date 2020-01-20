<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
class Admin extends Controller
{
    //

    public function index(){
        return view('Admin/index');
    }

    public function users(){
        $user = User::all();
        return view('Admin/user',['user'=>$user]);
    }
    public function payments(){
        $payment = Payment::with('user')->get();
       // dd($payment);
        return view('Admin/payment',['payment'=>$payment]);
    }
}
