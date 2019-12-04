<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Publish;
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
        $this->middleware('auth')->except(['first']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin(){
        
    }
    public function index()
    {
        if(Auth::user()->isAdmin== 1||Auth::user()->isAdmin== 2){
            return redirect(route('admindashboard'));
        }   
        $blog = Blog::paginate(3);
        $book = Publish::paginate(10);
        $recent = Publish::latest()->take(8)->get();
        return view('pages/index',['recent'=>$recent,'blog'=>$blog, 'book'=>$book,]); 
    }
    public function first(){
        $blog = Blog::paginate(3);
        $book = Publish::paginate(10);
        $recent = Publish::latest()->take(8)->get();
        // dd($recent);
        return view('pages/index',['blog'=>$blog, 'book'=>$book,'recent'=>$recent]);

    }

    public function sec(){
        return view('pages/carts');
    }
    public function thrd(){
        return view('pages/checkout');
    }
    // public function recent(){
    //     $recent = Publish::latest()->take(8)->get();;
    //     return view('partials/sidebar',['recent'=>$recent]);
   
    // }
}
