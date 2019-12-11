@extends('layouts.app')

{{-- <div class="mt-8">
    @include('inc.messages')
</div>     --}}

@section('content')
    <div class="wrapper">
            <div >
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div><br />
            @endif
            @if (\Session::has('success'))
            <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
        </div> 
        <div class="content-area">
            <div class="user-profile container">
                <div class="row">
                    <div class="col-md-3 col-sm-10 text-center mb-md-3 mx-auto">
                        <div class="user-nav">
                            <ul>
                            <li><a href="{{route('profile')}}" class="active">My Orders</a></li>
                                <div class="dropdown-divider"></div>
                            <li><a href="{{route('editProfile',['id'=> Auth::user()->id
                                ])}}">Edit Account</a></li>
                                <div class="dropdown-divider"></div>
                                {{-- <li><a href="reset_password.html">Reset password</a></li> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </ul>
                        </div>
                    </div>            
                    <div class="col-md-9">
                        <div class="form-card mt-5">
                            <div class="profile-header">
                                <h4>My Order Detail</h4>
                            </div>
                            @if($order)
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="">Order ID</th>
                                            <td>{{$order->order_id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Quantity</th>
                                            <td>{{$order->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Payment date</th>
                                            <td>{{date('d/M/Y h:i:s',strtotime($order->paid_at))
                                                }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Total</th>
                                            <td><b>{{$currency .' '.number_format(($order->amount/100),2)}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br><br>
                        @endif
                        @if($cart)
                        @foreach($cart->items as $item)
                        <div id="form-card mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{$item['item']['cover_page']}}"  alt="" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <table class="table ">
                                        <tbody>
                                            <tr>
                                                <th scope="">Products name</th>
                                                
                                                <td>{{$item['item']['title']}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Quantity</th>
                                                <td>{{$item['qty']}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Amount</th>
                                                <td>{{$currency .' '.number_format($item['price'],2)}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <hr>
                     <a href="{{route('customerInvoice',['id' => $order->id])}}" class="btn btn-fill btn-info">See Invoice</a>
                     <hr>
                        <div class="complain-form mt-5">
                            <div class="container">
                                <h1>Contact Support </h1>
                                <hr>
                            <form action="{{route('postComplain')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputname">NAME</label>
                                        <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control" id="inputname" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputemail">ORDER ID</label>
                                            <input type="text" class="form-control" id="inputorderid"
                                        placeholder="Order ID" name="order_id" readonly value="{{$order->order_id}}">
                                        </div>
                                    <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                                        <div class="form-group col-md-12">
                                            <label for="inputemail">EMAIL</label>
                                        <input value="{{Auth::user()->email}}" type="email" class="form-control" id="inputemail"
                                               name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                                <label for="inputemail">Subject</label>
                                            <input  type='text' class="form-control" id="inputemail"
                                                   name="subject" placeholder="Subject">
                                            </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Write to us</label>
                                            <textarea name="body" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3" placeholder="Type here..!!"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-danger">Send</button>
                                </form>
                            </div>
                        </div>
                       <hr>
                      
                        <div class="complain-form mt-5">
                            <div class="container">
                                <h1>Review Book</h1>
                                <hr>
                            <form action="{{route('review.store')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                           
                                            @foreach($cart->items as $item)
                                        <div class="form-group col-md-6">
                                            
                                          <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="inputname" placeholder="Name">
                                           <label for="inputemail">Book ID</label>
                                           
                                            <input type="text" class="form-control" id="inputorderid"
                                          name="book_id" readonly value="{{$item['item']['id']}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputemail">Book title</label>
                                           
                                            <input type="text" class="form-control" id="inputorderid"
                                           readonly value="{{$item['item']['title']}}">
                                        </div>
                                        @endforeach
                                       
                                    <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                                        <div class="form-group col-md-12">
                                            <label for="inputemail">Email</label>
                                        <input value="{{Auth::user()->email}}" type="email" class="form-control" id="inputemail"
                                            name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                                <label for="inputemail">Subject</label>
                                            <input  type='text' class="form-control" id="inputemail"
                                                name="subject" placeholder="Subject">
                                            </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputemail">Star Rating</label>
                                            <input  type='number' class="form-control" id="inputemail"
                                                name="ratings" min="1" max="5" placeholder="Rate book on a scale of 1 to 5 where 1 is lowest and 5 is highest.">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Write to us</label>
                                            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3" placeholder="Type here..!!"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-danger">Send</button>
                                </form>
                            </div>
                        </div>
                              
                    </div>
                </div>

            </div>
        </div>
@endsection

       