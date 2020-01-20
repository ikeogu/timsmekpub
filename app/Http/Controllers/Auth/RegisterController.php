<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\ReferrerBonus;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

     /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        return view('auth.register');
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
            'username' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mode' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'max:500000000'],
            'phone' => ['required','max:11' ],
            
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
        $referrer = User::whereUsername(session()->pull('referrer'))->first();
            
        return User::create([
            'name' => $data['name'],
            
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'mode' => $data['mode'],
            'amount' => $data['amount'],
            'status' => 0,
            'agree' => 1,
            'isAdmin' => 3,
            'username' => $data['username'],
            'acct_bal' => 0,
            'referrer_id' => $referrer ? $referrer->id : null,
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if ($user->referrer !== null) {
            Notification::send($user->referrer, new ReferrerBonus($user));
        }

        return redirect($this->redirectPath());
    }
}