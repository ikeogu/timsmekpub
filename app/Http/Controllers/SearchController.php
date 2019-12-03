<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Author;
use App\Publish;

class SearchController extends Controller
{
   

    
    public function search(Request $request) {
        $text = $request->search;

        $book = DB::table('publishes') ->where('title', 'like', '%'.$text.'%')->orWhere('description','like','%'.$text.'%')->get();
        $authors = DB::table('authors') ->where('name', 'like','%'.$text.'%')->orWhere('biography','like','%'.$text.'%')->get();
        $category = DB::table('categories')->where('name', 'like', '%'.$text.'%')->orWhere('description','like','%'.$text.'%')->get();
       
        $query = $book->union($authors)->union($category);
        if(count($query) > 0){
            return view('partials/search',['text'=>$text])->withDetails($query);

        }
        elseif(count($query) == 0) {
            return view('partials/search',['text'=>$text])->withMessage('warning','No Details found. Check Spelling!')->withDetails($query);

        }
        
       
    }
}
