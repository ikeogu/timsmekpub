<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Author;
use App\Editor;
use App\Publish;
use App\Blog;
use App\user;
use App\Order;
use DB;
use Illuminate\Support\Carbon;
use function Opis\Closure\unserialize;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonPeriod;

class Admin extends Controller
{
    //
    
    public function index(){
        $cat = Category::paginate(10);
        return view('admin/index',['cat'=>$cat]);
    }

    public function cat(){
       
        return view('admin/index');
    }
    public function authors(){
        $authors = Author::paginate(9);
        return view('admin/allauthors',['authors'=>$authors]);
    }
    public function editors(){
        $editor = Editor::paginate(9);
        return view('admin/alleditors',['editor'=>$editor]);
    }
    public function booksPub()
    {
        //
        
        $book = Publish::with('author')->get();
        return view('admin/books',['book'=>$book]);
    }
    public function blog()
    {
        $blog = Blog::paginate(10);
        return view('blog/allblog',['blog'=>$blog]);
    }

    public function users(){
        $user = User::paginate(10);
        return view('admin/users',['user'=>$user]);
    }

    public function isAdmin($id){
        $admin = User::find($id);
        $admin->isAdmin = 2;
        if($admin->save()){
            return redirect(route('users'))->with('success','User made An Admin');
        }
        
    }
    public function RisAdmin($id){
        $admin = User::find($id);
        $admin->isAdmin = 3;
        if($admin->save()){
            return redirect(route('users'))->with('success','User Not an Admin');
        }
        
    }
    // Orders
    public function allOrders(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::latest()->paginate(10);
        $orders->transform(function($order, $key){
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        //dd($orders);
        return view('admin/orders',['orders' => $orders]);
    }
    }
    public function completedOrder(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::where('status','delivered')->latest()->paginate(10);
        
        //dd($orders);
        return view('admin/completed_orders',['orders' => $orders]);
    }
    }
    public function rejectedOrder(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::where('status','rejected')->latest()->paginate(10);
        
        //dd($orders);
        return view('admin/rejected_orders',['orders' => $orders]);
    }
    }
    public function cancelledOrder(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::where('status','cancelled')->latest()->paginate(10);
        
        //dd($orders);
        return view('admin/cancelled_orders',['orders' => $orders]);
    }
    }
    public function pendingOrder(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::where('status','pending')->latest()->paginate(10);
        
        //dd($orders);
        return view('admin/pending_orders',['orders' => $orders]);
    }
    }

    public function inprogressOrder(){
        if(Auth::user()->isAdmin === 1){
        $orders = Order::where('status','in Progress')->latest()->paginate(10);
        
        //dd($orders);
        return view('admin/in_progress',['orders' => $orders]);
    }
    }

    

    public function orderItem($id){
        if(Auth::user()->isAdmin === 1){
        $currency = '₦';
        $order = Order::findOrfail($id);
        $cart = unserialize(base64_decode($order->cart));
        return view('admin/order_item', compact(['order', 'cart','currency']));
        }
    }

    public function viewCustomer($id){
        if(Auth::user()->role = 'Admin'){
        $customer = User::findOrfail($id);
        return view('admin.view_customer', compact(['customer']));
        }
    }
    public function generalOrdersQuery($status){
        if(Auth::user()->role = 'Admin'){
        $orders = Order::where('status', $status)->latest()->paginate(10);
        $orders->transform(function($order, $key){
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });

        return $orders;
    }
        //dd($orders);
    }

    public function pendingOrders($status){
        if(Auth::user()->role = 'Admin'){
        $orders = $this->generalOrdersQuery($status);
       //dd($orders);
        return view('admin.pending_orders', compact('orders'));
        }
    }

    public function completedOrders($status){
        if(Auth::user()->role = 'Admin'){
        $orders = $this->generalOrdersQuery($status);
        //dd($orders);
        return view('admin.completed_orders', compact('orders'));
        }
    }

    public function cancelledOrders($status){
        if(Auth::user()->role = 'Admin'){
        $orders = $this->generalOrdersQuery($status);
        //dd($orders);
        return view('admin.cancelled_orders', compact('orders'));
        }
    }

    public function rejectedOrders($status){
        if(Auth::user()->role = 'Admin'){
        $orders = $this->generalOrdersQuery($status);
        //dd($orders);
        return view('admin.rejected_orders', compact('orders'));
        }
    }

    public function inProgress($status){
        if(Auth::user()->role = 'Admin'){
        $orders = $this->generalOrdersQuery($status);
        //dd($orders);
        return view('admin.in_progress', compact('orders'));
        }
    }

    public function newOrders(){
        if(Auth::user()->role = 'Admin'){
            $todaySales = DB::table('orders')->where('created_at', '>=', Carbon::today())->sum('amount');
            $currency = '₦';
            $users = count(User::where('role','Customer')->get());
        $orders = Order::latest()->paginate(5);
        return view('admin.index', compact(['orders','users','todaySales','currency']));
        }
    }

    public function changeStatus($id, $status){
        if(Auth::user()->role = 'Admin'){
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->update();
        return back();
        }
    }

    public function changeUserStatus($id){
        if(Auth::user()->role = 'Admin'){
        $user = User::findOrFail($id);
        $user->status == 1 ? $user->status = 0 : $user->status = 1;
        $user->update();
        return back();
        }
    }

    public function viewCustomers(){
        if(Auth::user()->role = 'Admin'){
        $customers = User::where('role','customer')->latest()->paginate(10);
        return view('admin.view_customers',compact(['customers']));
        }
    }

    public function viewProduct($id){
        if(Auth::user()->role = 'Admin'){
        $product = Product::findOrFail($id);
        return view('admin.view_product',compact('product'));
        }
    }

    public function editProduct($id){
        if(Auth::user()->role = 'Admin'){
        $product = Product::findOrfail($id);
        $categories = Category::all();
        $colours = Colour::all();

        return view('admin.edit_product',compact(['product','categories','colours']));
        }
    }

    public function promoteProduct($id){
        if(Auth::user()->role = 'Admin'){
        $product = Product::findOrFail($id);
        $product->promote == 1 ? $product->promote = 0 : $product->promote = 1;
        
        $product->update();
        return back();
        }
     }
}
