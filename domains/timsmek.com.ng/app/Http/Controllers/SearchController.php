<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Author;
use App\Publish;
use App\Blog;

class SearchController extends Controller
{
   

    
    public function search(Request $request) { 
        $text = $request->search;

        $book = DB::table('publishes') ->where('title', 'like', '%'.$text.'%')->orWhere('description','like','%'.$text.'%')->get();
        $authors = DB::table('authors') ->where('name', 'like','%'.$text.'%')->orWhere('biography','like','%'.$text.'%')->get();
        $category = DB::table('categories')->where('name', 'like', '%'.$text.'%')->orWhere('description','like','%'.$text.'%')->get();
        $blog =DB::table('blogs')->where('caption', 'like', '%'.$text.'%')->orWhere('body','like','%'.$text.'%')->orWhere('writter','like','%'.$text.'%')->get();

       
        $query = $book->union($authors)->union($category)->union($blog);
        if(count($query) > 0){
            return view('partials/search',['text'=>$text])->withDetails($query);

        }
        elseif(count($query) == 0) {
            return view('partials/search',['text'=>$text])->withMessage('warning','No Details found. Check Spelling!')->withDetails($query);

        }
        
       
    }

    
    public function search_blog(Request $request) { 
        $text = $request->search;
        $blog =DB::table('blogs')->where('caption', 'like', '%'.$text.'%')->orWhere('body','like','%'.$text.'%')->orWhere('writter','like','%'.$text.'%')->get();
        $query = $blog;
        if(count($query) > 0){
            return view('partials/search',['text'=>$text])->withDetails($query);

        }
        elseif(count($query) == 0) {
            return view('partials/search',['text'=>$text])->withMessage('warning','No Details found. Check Spelling!')->withDetails($query);
        }
        
    }    
}