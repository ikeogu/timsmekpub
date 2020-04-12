<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = Blog::paginate(10);
        return view('Blog/index',['blog',$blog]);
    }
    public function index2()
    {
        //
        $blogs = Blog::paginate(10);
        return view('Blog/index2',['blogs',$blogs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate(request(),[
            'title'=> 'required',
            'photo' => 'required',
            'bio' => 'required'
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
         $path = $request->file('photo')->storeAs('public_html/blop_post/', $fileNameToStore);
     }else{
         $fileNameToStore = 'noimage.jpg';
     }
        $game = new Blog();
        $game->title = $request->title;
        $str = strtolower($request->title);
        $game->slug = preg_replace('/\s+/', '-', $str);
        $game->body = $request->body;
        $game->image = $fileNameToStore;
        
        if($game->save()){
            return redirect(route('blogs.create'))->with('success','Blog Post was successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $blog = Blog::where('slug', $slug)->first();
        return view('Blog/show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $blog = Blog::find($slug);
        return view('Blog/edit',['blog',$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog)
    {
        //
        $b = Blog::find($blog);
        $b->delete();
        return redirect(route('blog.index'))->with('success','Post Deleted! ');
    }
}
