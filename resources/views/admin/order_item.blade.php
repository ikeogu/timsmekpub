@extends('layouts.admin')
@section('adminMain')
    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">Odered Item Details</h6>
        </div>
        <div class="card-body">
            @if($order)
            <div class="mt-5">
                Order Id: {{$order->order_id}} <br>
                Customer name: {{$order->full_name}} <br>
                Amount: {{$currency." ".number_format(($order->amount/100))}} <br>
                Quantity: {{$order->quantity}} <br>
                Paid At : {{date('d/M/Y h:i:s',strtotime($order->paid_at))
                }} <br>
                Country: {{$order->country}} <br>
                State: {{$order->state}} <br>
                City: {{$order->city}} <br>
                Delivery Address: {{$order->address}} <br>
                Current Status : <strong>{{$order->status}} </strong> <br>

            </div>
            @foreach($cart->items as $item)
            <div class="container">
                <div class="row mt-3">
                    <div class="col-sm-5">
                      <div class="card">
                        <div class="card-body">
                        <img src="{{$item['item']['cover_page']}}" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Cart ID: {{$item['item']['id']}} <br>
                                Item: {{$item['item']['title']}} <br>
                                
                                Quantity: {{$item['qty']}} <br>
                                Price : {{$currency." ".number_format($item['price'])}} <br>            
                            
                            </h4>
                            <hr>
                            </div>
                        </div>
                    </div>
                  @endforeach
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Change Status
                        </button>
                        <div class="dropdown-menu" aria-labelledby="FilterOrder">
                        <a class="dropdown-item" href="{{route('changeStatus',['id' =>$order->id, 'status' => 'Pending'])}}">Pending</a>
                          <a class="dropdown-item" href="{{route('changeStatus',['id' =>$order->id, 'status' => 'Delivered'])}}">Delivered</a>
                          <a class="dropdown-item" href="{{route('changeStatus',['id' =>$order->id, 'status' => 'Cancelled'])}}">Cancelled</a>
                          <a class="dropdown-item" href="{{route('changeStatus',['id' =>$order->id, 'status' => 'Rejected'])}}">Rejected</a>
                          <a class="dropdown-item" href="{{route('changeStatus',['id' =>$order->id, 'status' => 'In Progress'])}}">In Progress</a>
                        </div>
                    </div>
                  @endif
                
                </div>
            </div>
        </div>
    </div>
@endsection