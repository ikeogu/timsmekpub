@extends('layouts.admin')
@section('adminMain')
    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">View Customer</h6>
        </div>
        <div class="container">
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                Full Name: <span class="float-right"> @if($customer->first_name)
                                    {{$customer->first_name. " " .$customer->last_name}} 
                                    @else
                                    {{$customer->name}}
                                    @endif</span><hr>
                            Phone Number: <span class="float-right">{{$customer->phone}}</span> <hr>
                                E-mail: <span class="float-right">
                                    {{$customer->email}}
                                </span><hr>
                                State: <span class="float-right">  {{$customer->state ? $customer->state : " "}} </span><hr>
                            Country: <span class="float-right">{{$customer->country ? $customer->country : " "}}</span>  <hr>
                            Local Government:  <span class="float-right">{{$customer->lga}}</span><hr>
                            Address: <span class="float-right">{{$customer->address}}</span><hr>
                            Status: <span class="float-right"> @if($customer->status == 1)
                                    Active
                                @else
                                    Disabled
                                @endif
                               </span>  
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    @if($customer->status == 1)
                                    <a class="btn btn-warning" href="{{route('changeUserStatus',['id' =>$customer->id])}}">Disable This Customer</a>
                                    
                                    @else
                                <a href="{{route('changeUserStatus',['id' => $customer->id])}}" class="btn btn-primary" >
                                            Reactivate this Customer
                                    </a>
                                    @endif
                                                               <hr>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection        