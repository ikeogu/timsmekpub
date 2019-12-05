@extends('layouts.admin')
@section('adminMain')

            <div class="header bg-gradient-primary pt-md-7">
            </div>
            <div class="container">
                <div class="row align-items-center mt-3">
                    <div class="col">
                        <h3 class="mb-0 h2">Completed</h3>
                    </div>
                    
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    {{-- <th scope="col">paid At</th> --}}
                                    <th scope="col">Quantity</th>
                                    {{-- <th scope="col">Price Per Item</th> --}}
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders)
                                @foreach($orders as $order)
                                
                                <tr>
                                    <th scope="row">
                                        {{$order->order_id}}
                                    </th>
                                    
                                        {{-- {{$order->paid_at}}  --}}
                                    
                                    <td>
                                            {{$order->quantity}} 
                                    </td>
                                    {{-- <td> --}}
                                        {{-- {{$cart['item']['price']/100}} --}}
                                    {{-- </td> --}}
                                    <td>
                                            {{$order->amount/100}}
                                    </td>
                                    <td>
                                            {{$order->status}}
                                    </td>
                                    <td>
                                    <a href="{{route('orderItem', ['id' => $order->id])}}" class="btn btn-sm btn-primary">View Order</a>
                                    
                                </tr>
                                @endforeach
                                @endif
                               
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
           
           @endsection