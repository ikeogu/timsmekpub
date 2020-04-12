<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acct = Account::where('status',1)->get();
        return view('Admin/credited',['acct'=>$acct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/add_acct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(),[
            'user_id'=>['required','integer'],
            'amount'=> ['required','integer'],

        ]);

        $acct = new Account();
        $acct->user_id = $request->user_id;
        $acct->amount = $request->amount;
        $acct->status = 1;
        $acct->day = $request->day;
        $acct->mnth = $request->mnth;
        
        $acct->signature = 'Signed';
        $user = User::find($acct->user_id);
        if($user->status != 4){
            $user->acct_bal += $acct->amount;
            $acct->acct_bal = $user->acct_bal;
            if($user->save()){
                $acct->save();
                return redirect(route('record',[$user->id]))->with('success',$user->name.'\'s Account has been Credited' );
            }
        }
        $acct->acct_bal = $user->acct_bal;
        if($acct->save()){
            
            return redirect(route('users'))->with('success',$user->name.'\'s Account has been Credited' );
        }
       
    }
    
    public function debit(Request $request)
    {
        // $user = User::find($request->user_id);
        // $user->acct_bal = $user->acct_bal - $request->amount;
        // $acct_user = Account::where('user_id',$user->id)->first();
        
        // $acct = Account::find($acct_user->id);
       
        // $acct->signature = 'Debited';
        // $acct->status = $request->amount;
        // $acct->save();
        
        // if($user->save()){
        //     return redirect(route('record',[$user->id]))->with('success',$user->name.'\'s Account has been Debited' );
        // }
        $acct = new Account();
        $acct->user_id = $request->user_id;
        $acct->amount = $request->amount;
        $acct->status = $request->amount;
        $acct->day = $request->day;
        $acct->mnth = $request->mnth;
        
        $acct->signature = 'Debited';
        $user = User::find($acct->user_id);
        if($user->status != 4){
            $user->acct_bal -= $acct->amount;
            $acct->acct_bal = $user->acct_bal;
            if($user->save()){
                $acct->save();
                return redirect(route('record',[$user->id]))->with('success',$user->name.'\'s Account has been Debited' );
            }
        }
        $acct->acct_bal = $user->acct_bal;
        if($acct->save()){
            
            return redirect(route('users'))->with('success',$user->name.'\'s Account has been Credited' );
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $acct = Account::with('users')->findOrFail($id);
        return view('account/show',['acct'=>$acct]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $acct = Account::with('users')->findOrFail($id);
        return view('account/edit',['acct'=>$acct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Account::whereId($id)->update($request->except(['_method','_token']));
        return redirect(route())->with('success','Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $acct = User::find($id);
        $acct->delete();
        return redirect(route('users'))->with('success','Account delected');
    }
}
