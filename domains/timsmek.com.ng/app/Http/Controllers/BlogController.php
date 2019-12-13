<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Cloudder;
use Cloudinary;

class BlogController extends Controller
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
        $blog = Blog::paginate(3);
        return view('blog/index',['blog'=>$blog]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('blog/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'caption'=> 'required',
            'body'=> 'required',
            'writter'=> 'required',
            
        ]);
        if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public_html/blog_post/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        // if($request->hasFile('image')){
        //     $image = $request->file('image')->getRealPath();

        //     Cloudder::upload($image, null);

        //     $image_url = Cloudder::show(Cloudder::getPublicId());
        // }

        $blog = new Blog();
        $blog->image = $fileNameToStore;
        $blog->caption = $request->caption;
        $blog->body = $request->body;
        $blog->writter = $request->writter;
        if($blog->save()){
            return redirect(route('blogs'))->with('success','Blog Posted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($blog)
    {
        $recent = Blog::latest()->take(4)->get();
        $blog = Blog::find($blog);
        return view('blog/show',['blog'=>$blog,'recent'=>$recent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($blog)
    {
        //
        $blog = Blog::find($blog);
        return view('blog/edit',['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$blog)
    {
        //
        if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public_html/blog_post/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
         $b = Blog::find($blog);
         $b->image = $fileNameToStore;
         $b->save();
        Blog::whereId($blog)->update($request->except(['_method','_token','image']));
        return redirect(route('blogs'))->with('success','Updated');
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
        $blog = Blog::find($blog);
        $blog->delete();
        return redirect(route('blogs'))->with('Danger','Post Deleted');
    }
}