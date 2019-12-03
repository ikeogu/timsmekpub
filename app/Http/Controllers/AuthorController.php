<?php

namespace App\Http\Controllers;

use App\Author;
use App\Publish;
use Illuminate\Http\Request;

class AuthorController extends Controller

{
    
    public function __constructor(){
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::paginate(10);
        return view('authors/index',['author'=>$author]);
        
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors/create');
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
            'name'=> 'required|max:50',
            'sex'=> 'required',
            'book_authored'=> 'required',
            'photo'=> 'required',
            

        ]);

        if($request->hasFile('photo')){
            //get file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/authors/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $author = new Author();
        $author->name = $request->name;
        $author->dob = $request->dob;
        $author->pob = $request->pob;
        $author->sex = $request->sex;
        $author->email = $request->email;
        $author->photo = $fileNameToStore;
        $author->book_authored = $request->book_authored;
        $author->biography = $request->biography;
        $author->education = $request->education;
        $author->twitter = $request->twitter;
        $author->linkin = $request->linkin;
        $author->instagram = $request->instagram;
        if($author->save()){
            return redirect(route('authors.create'))->with('success', 'Author Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
        //
        $authors= Author::find($author);
        $book= Publish::where('author_id',$author)->get();
        
        return view('authors/show',['author'=>$authors,'book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($author)
    {
        //
        $list = Author::find($author);
        return view('authors/edit',['author'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
       Author::whereId($author)->update($request->except(['_method','_token']));
       return redirect(route('allauth'))->with('success', 'Author Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
       $auth = Author::find($author);
       $auth->delete();
       return redirect(route('allauth'))->with('success', 'Author Deleted');
    }
}
