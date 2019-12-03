<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __constructor(){
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        //
        $service = Service::all();
        return view('pages/service',['service'=>$service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::paginate(4);
       return view('admin/addservice',['service'=>$service]);
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
            'name'=> 'required',
            'description' => 'required'
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
            $path = $request->file('image')->storeAs('public/services/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = $fileNameToStore;

        if($service->save()){
            return redirect(route('service.create'))->with('success','Service Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servie = Service::find($id);
        return view('pages/editservice',['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       Service::whereId($id)->update($request->except(['_method','token']));
       return redirect(route('service.create'))->with('success','Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect(route('service.create'))->with('success','Service Removed.');
    }
}
