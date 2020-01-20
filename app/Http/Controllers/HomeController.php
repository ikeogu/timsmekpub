<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware(['auth','verified'])->except(['first']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->isAdmin == 1){
            return view(route('dashboard'));
        }
        $user = Auth::user()->id;
        $acct_det = Account::where('user_id',$user)->get();
        return view('home',['acct_det'=>$acct_det]);
    }

    public function first()
    {
        return view('index');
    }
}
