<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Publish;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $re = Review::with('publish','user')->get();
        //dd($re);
        return view('admin/review',['re'=>$re]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $book_id = Publish::findOrFail($id);

        return view('review/create',['book_id'=>$book_id->id]);
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
            'comment'=> 'required',
            'ratings'=>'required',
            'email'=>'required'
        ]);
        $re = new Review();
        $re->comment = $request->comment;
        $re->ratings = $request->ratings;
        $re->publish_id = $request->book_id;
        $re->user_id = auth()->user()->id;
        $re->subject = $request->subject;
        $re->email = $request->email;
        // 
        if($re->save()){
            return back()->with('success','Thanks for your Review!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($review)
    {
        //
        $re = Review::find($review);
        return view('review/show',['re'=>$re]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($review)
    {
        //
        $re = Review::findOrFail($review);
        return view('review/edit',['re'=>$re]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $review)
    {
        //
        Review::whereId($review)->update($request->except(['_method','_token']));
        return back()->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($review)
    {
        //
        $re = Review::findOrFail($review);
        $re->delete();
        return back()->with('danger','Review Deleted!');

    }
}
