<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Auth;
use App\User;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware(['verified'])->except(['first']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->isAdmin == 1){
            return redirect(route('dashboard'));
        }
        $user = Auth::user()->id;
        $acct_det = Account::where('user_id',$user)->get();
        return view('home',['acct_det'=>$acct_det]);
    }

    public function first()
    {
        return view('index2');
    }

    public function update_avatar(Request $request){
        // $request->validate([
        //         'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
           
        
        try{
            if($request->hasFile('avatar'))
        {
            $user = Auth::user();
            
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
    
            $request->avatar->storeAs('avatars',$avatarName);
    
            $user->avatar = $avatarName;
            $user->save();
    
            return back()
                ->with('success','You have successfully upload image.');
        }
            
        } catch (\Exception $e) {

            return back()->with('success','Oops! '.$e->getMessage());
        
        }
       
       
       
    }
}
