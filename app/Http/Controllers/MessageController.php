<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mess = Message::with('user')->get();
        return view('Admin/message',['mess'=>$mess]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'subject'=> ['required','string'],
            'body'=> ['required','string'],
        ]);

        $mess = new Message();
        $mess->user_id = Auth::user()->id;
        $mess->subject = $request->subject;
        $mess->body = $request->body;
        if($mess->save()){
            return redirect(route('homes'))->with('success','Message sent.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($message)
    {
        //
        $mess = Message::find($message);
        $mess->delete();
        return redirect(route('message.index'))->with('success','Message Deleted.');
    }
}
