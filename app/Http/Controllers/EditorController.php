<?php

namespace App\Http\Controllers;

use App\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __constructor(){
        $this->middleware('auth')->except(['index2']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $editor = Editor::paginate(9);
       return view('editor/index',['editor'=>$editor]);
    }
    public function index2()
    {
       $editor = Editor::paginate(6);
       return view('pages/about',['editor'=>$editor]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate(request(),[
           'name'=> 'required',
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
        $path = $request->file('photo')->storeAs('public/editors/', $fileNameToStore);
    }else{
        $fileNameToStore = 'noimage.jpg';
    }

       $editor = new Editor();
       $editor->name = $request->name;
       $editor->email = $request->email;
       $editor->bio = $request->bio;
       $editor->photo  = $fileNameToStore;
       if($editor->save()){
        return redirect(route('editors.index'))->with('success','Editor added');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit($editor)
    {
        //
        $editor = Editor::find($editor);
        return view('editor/edit',['editor'=>$editor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $editor)
    {
        //
        Editor::whereId($editor)->update($request->except(['_method','_token']));
        return redirect(route('editors.index'))->with('success','Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy($editor)
    {
        //
        $editor = Editor::find($editor);
        $editor->delete();
        return redirect(route('editors.index'))->with('success','Updated');

    }
}
