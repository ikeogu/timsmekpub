<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShipFee;

class ShipFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fee = ShipFee::paginate(8);
        return view('fee/index',['fee'=>$fee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fee = ShipFee::paginate(8);
        return view('fee/index',['fee'=>$fee]);
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
            'city'=> 'required|string',
            'fee'=> 'required'
        ]);

        $fee = new ShipFee();
        $fee->city = $request->city;
        $fee->fee = $request->fee;
        if($fee->save()){
            return back()->with('success','Fee added');
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
        //
        $fee = ShipFee::findOrFail($id);
        return view('fee/edit',['fee'=>$fee]);
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
        ShipFee::whereId($id)->update($request->except(['_method','_token']));
        return back()->with('success','Shipping Fee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fee = ShipFee::find($id);
        $fee->delete();
        return back()->with('success','shipping Fee Deleted!');
    }

    public function displayShipFee(){
       
    }
}
