<?php

namespace App\Http\Controllers;

use App\Publish;
use App\Category;
use App\Author;
use App\Cart;
use Session;
use DB;
use Auth;
use Paystack;
use App\Purchase;
use App\Order;
use App\User;

use App\Mail\Mailtrap;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Notifications\NewOrder;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function __constructor(){
        $this->middleware('auth')->except(['index','show','downloadPDF','readBook']);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index','show']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //
        
        $cat = Category::with('publish')->get();
        $book = Publish::with('author')->get();
        //dd($book);
        // $book_cat = Publish::with('category')->get();
        return view('store/index',['book'=>$book,'cat'=>$cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = Category::all();
        $author = Author::all();
        return view('admin/pub_book',['author'=>$author,'cat'=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=> 'required',
            'price' => 'required',
            'year_pub' =>'required',
            'description'=> 'required',
        ]);

        if($request->hasFile('content')){
            //get file name with extension
            $fileNameWithExt = $request->file('content')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('content')->getClientOriginalExtension();
            //file name to store
            $fileNameToSave = $filename.'_'.time().'.'.$extension;
            //upload image
            $path =  $request->file('content')->storeAs('public/publish/', $fileNameToSave);
        }else{
            $fileNameToSave= 'nofile.mime';
        }
        if($request->hasFile('cover_page')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_page')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_page')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_page')->storeAs('public/cover_page/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        $book = new Publish();
        $book->title = $request->title;
        $book->price = ($request->price * 100);
        $book->available = $request->available;
        $book->year_pub = $request->year_pub;
        $book->isbn = $request->isbn;
        
        $book->category_id = $request->category_id;
        $book->description = $request->description;
        if($book->price == 0){
            $book->status = 0;
        }elseif ($book->price !== 0) {
            # code...
            $book->status = 1;
        }
         

        $book->author_id = $request->author_id;
        
        $book->content = $fileNameToSave;
        $book->cover_page = $fileNameToStore;
        if($book->save()){
         return redirect(route('publish.create'))->with('success','Book Published');
        }
    }

    // public function setAuthor(Publish $author) 
    // {
    //      $this->author_id = $player->id;
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function show($publish)
    {
        //
        $sbook = Publish::find($publish);
        return view('store/show',['book'=>$sbook]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function edit($publish)
    {
        $cat = Category::all();
        $author = Author::all();
        $book = Publish::find($publish);
        return view('admin/editbook',['book'=>$book,'cat'=>$cat,'author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $publish)
    {
        //
        Publish::whereId($publish)->update($request->except(['_method','_token']));
        return redirect(route('boooks'))->with('success','Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function destroy( $publish)
    {
        //
        $book = Publish::find($publish);
        $book->delete();
        return redirect(route('books'))->with('success','Book Updated');
    }

    public function downloadPDF($id){
        $article= Publish::find($id);
        //dd($article);
        $file_path = public_path('storage/publish/'.$article->content);
        return response()->download($file_path);
    }

    public function art_cat($id){
        $book = Publish::find($id);
        return view('store/index',['book'=> $book]);
    }
    public function addToCart(Request $request){
        //dd($request->all());
        
        $book_id = $request->id;
        if($request->id){
            $cart_id = $request->id;
        }else{
            $cart_id = $book_id;
        }
        
        $product = Publish::findOrFail($book_id);
        
        $qty = $request->qty ? $request->qty : 1;
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        
        $cart->add($product, $cart_id,  $qty);

        $request->session()->put('cart', $cart);
        return back()->with('success', 'Book added to Cart');
    }
    public function getCart(Request $request){
        //dd(request()->session()->get('cart'));
        $currency = '₦';
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $products = $cart->items;
        //dd($products);
        // foreach($products as $pro){
        //     dd($pro['item']['title']);
        // }
            

        $totalPrice = $cart->totalPrice;
        
        $totalQty = $cart->totalQty;
        //dd($totalPrice,$totalQty);
        $relatedProducts = Publish::all()->take(4);
        return  view('pages.carts', compact(['products','totalPrice','totalQty','relatedProducts','currency']));
    }

    public function reduceItemByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return back();
        
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return back()->with('Danger', 'Book removed from Cart');
    }

    public function emptyCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        Session::forget('cart');
        $cart = null;

      return redirect(route('publish.index'));
   }

   public function checkout(){
    if(Auth::user()){
       $user = Auth::user();
       $currency = '₦';
    //    $countries = Country::all();
    // $categories = Category::all();
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $products = $cart->items;
    $totalPrice = $cart->totalPrice;
    $totalPriceCheckout = $cart->totalPrice*100;
    $totalQty = $cart->totalQty;
    return  view('pages.checkout', compact(['products','totalPrice','totalQty','totalPriceCheckout','user','currency']));
    }
   }
   
   public function redirectToGateway()
   {
       if(Auth::user()){
       request()->metadata = json_encode(request()->all());
       return Paystack::getAuthorizationUrl()->redirectNow();
       }
   }
   

   /**
    * Obtain Paystack payment information
    * @return void
    */
   public function handleGatewayCallback()
   {
       if(Auth::user()){
       $paymentDetails = Paystack::getPaymentData();

      //dd($paymentDetails);
       $paymentDetails = Paystack::getPaymentData();
       $cart = Session::get('cart');
      // $cart = new Cart($oldCart);
       if($paymentDetails){
           $order = new Order();
           $order->order_id = $paymentDetails['data']['reference'];
           $order->amount = $paymentDetails['data']['amount'];
           $order->state = $paymentDetails['data']['metadata']['state'];
           $order->address = $paymentDetails['data']['metadata']['address'];
           $order->full_name = $paymentDetails['data']['metadata']['first_name']. " " .$paymentDetails['data']['metadata']['last_name'];
        //    $order->country = $paymentDetails['data']['metadata']['country'];
           $order->city = $paymentDetails['data']['metadata']['city'];
           $order->quantity = $paymentDetails['data']['metadata']['quantity'];
           $order->phone = $paymentDetails['data']['metadata']['phone'];
           $order->email = $paymentDetails['data']['metadata']['email'];
           $order->paid_at = $paymentDetails['data']['paidAt'];
           $order->currency = $paymentDetails['data']['currency'];
           $order->cart =  base64_encode(serialize($cart));
           $order->status = "Pending";
           if(Auth::user()){
               $order->user_id = Auth::user()->id;
           }
           $order->save();
           $user = User::findOrFail($order->user_id);
           $user->notify(new NewOrder($order->order_id));

       }
       $this->emptyCart();
       return redirect(route('profile'));
   }

 }
    

 public function profile(){
    if(Auth::user()){
    //  $countries = Country::all(); 
        //dd($user->orders);
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize(base64_decode($order->cart));

            return $order;
        });
        $currency = '₦';
        //$categories = Category::all();
        $relatedProducts = Publish::latest()->take(8)->get();
     return view('pages.profile',compact(['categories','orders','relatedProducts','currency']));
    }
 }

    public function editProfile($id){
        if(Auth::user()){
        $user = User::findOrFail($id);
        // $categories = Category::all();
        // $countries = Country::all();
        return view('pages.edit_profile',compact(['user',]));
        }

    }

    public function orderDetails($id){
        if(Auth::user()){
        $currency = '₦';
        $order = Order::findOrfail($id);
        $cart = unserialize(base64_decode($order->cart));
        $categories = Category::all();
        return view('pages.order_details', compact(['order', 'cart','categories', 'currency']));
        }
    }

    public function postContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'phone' => 'required',
            'body' => 'string',
            'name' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'bodyMessage' => $request->body,
            'name' => $request->name
        ];

        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('solomoreal@yahoo.com');
            $message->subject($data['subject']);
        });

        Notification::route('mail', $request->email)
            ->notify(new MailSent());
            return redirect(route('about'));
    }
    
    public function postComplain(Request $request){
        if(Auth::user()->role = 'Customer'){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'phone' => 'required',
            'body' => 'string',
            'order_id' => 'nullable'

        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'bodyMessage' => $request->body,
            'name' => $request->name,
            'order_id' => $request->order_id
        ];

        Mail::send('email.complain', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('solomoreal@yahoo.com');
            $message->subject($data['subject']);
        });

        Notification::route('mail', $request->email)
            ->notify(new MailSent());
            return back()->with('success', 'Message Sent');
    }
    }

    public function customerInvoice($id){
        if(Auth::user()->role = 'Customer'){
        $user = Auth::user();
        $currency = '₦';
        $order = Order::findOrfail($id);
        $cart = unserialize(base64_decode($order->cart));
        return view('pages.customer_invoice', compact(['user','currency','order','cart']));
        }

    }

}
