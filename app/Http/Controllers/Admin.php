<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Author;
use App\Editor;
use App\Publish;
use App\Blog;
use App\user;

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
}
