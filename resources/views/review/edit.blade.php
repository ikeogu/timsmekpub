@extends('layouts.admin')
@section('adminMain')        
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
        </div>
    </div>
@endsection