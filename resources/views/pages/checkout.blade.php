@extends('layouts.app')
@section('content')
    
<div class="container mt-5 p-5">
    
        <div class="container checkout-table">
            <!--Breadcrumbs-->
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
            <ul class="breadcrumb">
            <li><a href="{{route('getCart')}}">view products</a></li>
            </ul>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::has('cart'))
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product['item']['title']}}</td>
                            <td>{{$product['qty']}}</td>
                            <td>{{$currency.''.number_format(($product['item']['price']/100),2)}}</td>
                            <td>{{$currency.''.number_format($product['price'],2)}}</td>
                        
                        </tr>
                        @endforeach
                        @endif
                        
                        <tr>
                          <td></td>
                          <td></td>
                          <td><b>Shiping fee</b></td>
                          <td><b>{{$currency.''.number_format($shipfee,2)}}</b></td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td></td>
                            
                            <td><b>TOTAL</b></td>
                        <td><b>{{$currency.''.number_format($totalPrice,2)}}</b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    <div class="form-card mt-5">
      <h4>Shipping Address</h4>
      <div class="">
        <form action="{{route('payH')}}" method="POST" accept-charset="UTF-8">
            {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">First name</label>
              <input type="text" class="form-control" value="{{$user->first_name}}"placeholder="First name" name="first_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Last name</label>
              <input type="text" class="form-control" value="{{$user->last_name}}"placeholder="last name" name="last_name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Email Address</label>
          <input type="text" class="form-control" value="{{$user->email}}" placeholder="Johndoe@gmail.com" name="email" required>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Address </label>
            <input type="text" class="form-control" name="address" placeholder=" Room 12 Apartment, street, or floor" value="{{$user->address}}" required>
          </div>
          
          <div class="form-row">
            {{-- <div class="form-group col-md-4">
              <label for="inputCity">Country</label>
              <input type="text" class="form-control" id="Country" placeholder=" enter country">
            </div> --}}
            <div class="form-group col-md-4">
              <label for="inputState">State/Province</label>
              <input class="form-control" id="inputCity" placeholder=" Enter State" name="state"
                value="{{$user->state}}">{{$user->state}}>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity" placeholder=" Enter City" name="city" value="{{$user->city}}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip" name="zip" value="{{$user->zip}}" required>
            </div>
            <div class="form-group col-md-4">
              <label for="phone">Phone</label>
            <input type="number" class="form-control" id="inputZip" value="{{$user->phone}}" name="phone" required>
            </div>
          </div>
          <div class="form-group">
            {{-- <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div> --}}
          </div>
          <input type="hidden" name="amount" value="{{$totalPriceCheckout}}"> {{-- required in kobo --}}
          <input type="hidden" name="quantity" value="{{$totalQty}}">
          <input type="hidden" name="" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
          <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
          <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> 
              <div class="form-group">
              
              <button type="submit" class="butn mb-2 btn-fill">Place Order</button>
              </div>
        </form>
      </div>
    </div>
</div>
@endsection

  