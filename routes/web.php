<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\IsAdmin;
use App\Mail\Mailtrap;
use Illuminate\Support\Facades\Mail;



Route::get('/', 'HomeController@first')->name('home');
Route::post('update_user', 'HomeController@update_avatar')->name('avatar');


Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('homes');
Route::resource('account', 'AccountController');
Route::resource('message', 'MessageController');
Route::post('/debit', 'AccountController@debit')->name('account.debit');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::get('/dashboard', 'Admin@index')->name('dashboard');
Route::get('/users','Admin@users')->name('users');
Route::get('/users_Email','Admin@users_email')->name('ue');
Route::get('/record/{id}','Admin@record')->name('record');
Route::get('/payments_made', 'Admin@payments')->name('payments');
Route::resource('blog', 'BlogController');
Route::get('/chizzy_post/{slug}', 'BlogController@show')->name('show_post');
Route::get('/chizzy_blogs', 'BlogController@index2')->name('allblog');