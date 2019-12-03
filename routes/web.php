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



Route::get('/', 'HomeController@first');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'EditorController@index2');
// Route::get('carts','HomeController@sec')->name('carts');
// Route::get('checkout','HomeController@thrd')->name('checkout');

//subdomain for
Route::resource('article', 'ArticleController');
Route::resource('authors','AuthorController');
Route::resource('blog', 'BlogController');
Route::resource('contact','ContactController');
Route::resource('publish', 'PublishController');
Route::resource('editors', 'EditorController');
Route::resource('service', 'ServiceController');
Route::any('search','SearchController@search')->name('search');
Route::resource('category', 'CategoryController');

//download article
Route::get('/downloadPDF/{id}','PublishController@downloadPDF')->name('download');
// search function
Route::post('/search','SearchController@search')->name('search');
//seletec by category
Route::get('/article_category/{key}', 'PublishController@art_cat')->name('art_cat');

//all admin routes
// Route::group(['middleware' => ['auth','admin']], function () {
    //All the admin routes will be defined here...
    Route::get('/adminI','Admin@index')->name('admindashboard');
    Route::get('/allcat','Admin@cat')->name('cat');
    Route::get('/allauthor','Admin@authors')->name('allauth');
    Route::get('/alleditor','Admin@editors')->name('alledit');
    Route::get('/allbooks','Admin@booksPub')->name('books');
    Route::get('/allposts','Admin@blog')->name('blogs');
    Route::get('/allusers','Admin@users')->name('users');
    Route::get('/makeUserAdmin/{key}','Admin@isAdmin')->name('isAdmin');
    Route::get('/RemoveUserAdmin/{key}','Admin@RisAdmin')->name('RisAdmin');

// });
    
 
   

//files download for Articles 
Route::get('/downloadPDF/{id}','ArticleController@downloadPDF')->name('download');
Route::get('/readfile/{id}','ArticleController@readBook')->name('preview');

// for Published article

Route::get('/download/{id}','PublishController@downloadPDF')->name('down')->middleware('signed');
Route::get('/read/{id}','PublishController@readBook')->name('prev');

// for payment
Route::post('/pay', 'Payment@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'Payment@handleGatewayCallback');
//
Route::post('/pay_hardcopy', 'PublishController@redirectToGateway')->name('payH');
Route::get('/payment/callback', 'PublishController@handleGatewayCallback')->name('payR');
// email
Route::post('/send', 'EmailController@send');


 //Cart
 Route::post('addToCart', 'PublishController@addToCart')->name('addToCart');
 Route::get('getCart', 'PublishController@getCart')->name('getCart');
 Route::get('reduceByOne/{id}', 'PublishController@reduceItemByOne')->name('reduceByOne');
 Route::get('removeItem/{id}', 'PublishController@removeItem')->name('removeItem');
 Route::get('emptyCart', 'PublishController@emptyCart')->name('emptyCart');
 Route::get('checkout', 'PublishController@checkout')->middleware('auth')->name('checkout');
 //user profile
 Route::get('profile', 'PublishController@profile')->middleware('auth')->name('profile');
 Route::get('editProfile/{id}','PublishController@editProfile')->middleware('auth')->name('editProfile');
 Route::put('updateProfile', 'UserController@update')->middleware('auth')->name('updateProfile');

 Route::get('orderDetails/{id}', 'PublishController@orderDetails')->middleware('auth')->name('orderDetails');
    Route::get('customerInvoice/{id}', 'PublishController@customerInvoice')->middleware('auth')->name('customerInvoice');
   // Route::get('getContactForm', 'PagesController@getContactForm')->name('getContactForm');
    Route::post('postContact', 'PublishController@postContact')->name('postContact'); 
    Route::post('postComplain','PublishController@postComplain')->middleware('auth')->name('postComplain');  
    

