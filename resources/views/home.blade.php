@extends('layouts.app')

@section('content')
<div class="wrapper">
    <br><br><br>
    <div class='section'>
        <img src="{{asset('img/dots.png')}}" class="dots">
        <img src="{{asset('img/path4.png')}}" class="path">
        <div class="container align-items-center">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                <h1 class="profile-title text-left">{{Auth::user()->name}}</h1>
                <h5 class="text-on-back">01</h5>
                <p class="profile-description">We are happy to have you as one of us in Chizzy Savings. Sincerely we don't want you to lack mony anymore!</p>
                <p>Your Refeeral link is {{Auth::user()->getReferralLinkAttribute()}}</p>
                </div>
                <div class="col-lg-7 col-md-6 ml-auto mr-auto">
                <div class="card card-coin card-plain">
                    <div class="card-header">
                    <img src="{{asset('img/mike.jpg')}}" class="img-center img-fluid rounded-circle">
                    <h4 class="title">Transactions</h4>
                    </div>
                    <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#linka">
                            Account Balance
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link jumbotron" data-toggle="tab">
                            {{Auth::user()->acct_bal}}
                        </a>
                        </li>
                        
                    </ul>
                    <div class="tab-content tab-subcategories">
                        <div class="tab-pane active" id="linka">
                        <div class="table-responsive">
                            <table class="table tablesorter " id="plain-table">
                            <thead class=" text-primary">
                                <tr>
                                <th class="">
                                    Plan
                                </th>
                                <th class="">
                                    AMOUNT
                                </th>
                                <th class="">
                                    VALUE
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                   {{Auth::user()->mode}}
                                </td>
                                <td>
                                  {{Auth::user()->amount}}
                                </td>
                                <td>
                                  {{Auth::user()->acct_bal}}
                                </td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                        </div>
                        
                      </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-plain">
            <div class="card-header">
              <h1 class="profile-title text-left">Credit Account</h1>
              <h5 class="text-on-back">02</h5>
            </div>
            <div class="card-body">
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
              <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" >
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Your Name</label>
                      <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control" value="{{Auth::user()->phone}}" name="phone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Amount</label>
                      <input  class="form-control" value="{{Auth::user()->amount}}" readonly>
                      <input type="hidden" class="form-control" value="{{Auth::user()->amount * 100}}" name="amount">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                        <input type="hidden" name="mode" value="{{ Auth::user()->mode}}" >
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                        <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Make Secure Payment with Paystack" data-placement="right">Credit</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 ml-auto">
          <div class="card card-plain">
            <div class="card-header">
              <h1 class="profile-title text-left">Account Details</h1>
              <h5 class="text-on-back">03</h5>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                    <tr>
                        
                        <th>Month</th>
                        <th>Day</th>
                        <th>Amount</th>
                        <th>Signature</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($acct_det as $item)
                    <tr>
                        <td>{{$item->mnth}}</td>
                        <td>{{$item->day}}</td>
                        <td>{{$item->amount}}</td>
                        <td class="text-right">{{$item->signature}}</td>
                        <td class="text-right">{{$item->created_at->diffForHumans()}}</td>
                        
                    </tr>
                    
                    @endforeach
                </tbody>
              </table>
            </div>  
          </div>  
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      
          <div class="card card-plain">
            <div class="card-header">
              <h1 class="profile-title text-left">Inform Us</h1>
              <h5 class="text-on-back">04</h5>
            </div>
            <div class="card-body">
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
              <form method="POST" action="{{ route('message.store') }}" accept-charset="UTF-8" >
                @csrf
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Subject</label>
                      <input type="text" class="form-control"  name="subject">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Message </label>
                      <textarea type="text" class="form-control"  name="body" row='7'></textarea>
                    </div>
                  
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary form-control">Send</button>
              </form>
            </div>
         
      </div>
    </div>
  </section>
</div>

@endsection
