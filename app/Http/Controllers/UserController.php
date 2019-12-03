<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller


{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
       $this->middleware('auth');
     }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string','max:11'],
            'agree' =>['required','boolean'],
            'newslater' => ['nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' =>$data['phone'],
            'agree' => 1,
            'isAdmin' => 3,
            'newslater' => $data['newslater']
        ]);
    }
    public function update(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'email' => 'required|email|string|',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            // 'country_id' => 'nullable',
            'state' => 'nullable',
            'zip' => 'nullable',
        ]);
        
      return Auth::user()->update($request->except(['_method','_token'])) ? redirect(route('profile')) : back()->with('success','Profile Updated!');
    }
}
