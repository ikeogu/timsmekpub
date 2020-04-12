@extends('layouts.app')
@section('content')

  <section id="reportsPage">
    <br> <br> <br> <br> <br>
    <div class="" id="home">
      
      <div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto row" >
               <div class="col-6">
                   <h3 class="tm-block-title text-left"> Welcome!,{{Auth::user()->name}}</h3>
              
                  <p class="profile-description">We are happy to have you as one of us in Chizzy Savings. Sincerely we don't want you to lack mony anymore!</p>
                  <div class="jumbotron">
               

                  <p><a href=" {{ Auth::user()->referral_link }}">Referral link: {{ Auth::user()->referral_link }}</a></p>
                  <p>Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</p>
                  <p>Refferal count: {{ count(Auth::user()->referrals)  ?? '0' }}</p>
                
              </div>
               </div>
              
              
              <div class="col-6">
                    <div class="row tm-content-row">
                    <div class="tm-block-col tm-col-avatar">
                        <div class="tm-bg-primary-dark tm-block tm-block-avatar p-3">
                          <h2 class="tm-block-title">Change Avatar</h2>
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
                          @if(Auth::user()->avatar == null)
                          <div class="tm-avatar-container">
                                <img
                                  src="/img/avatar.png"
                                  alt="Avatar"
                                  class="tm-avatar img-fluid mb-4"
                                  width="50%"
                                />
                            </div>
                          @else
                          <div class="tm-avatar-container">
                                <img
                                  src="/storage/avatars/{{Auth::user()->avatar}}"
                                  alt="Avatar"
                                  class="tm-avatar img-fluid mb-4"
                                  width="50%"
                                />
                            </div>
                        @endif
                            <form action="{{route('avatar')}}" enctype="multipart/form-data "method="post">
                              @csrf
                              
                                <input type="file" name="avatar" class="form-control" required>
                               
                              </div>
                              <button class="btn btn-primary md-block text-uppercase" >
                                Upload New Photo
                              </button>
                            </form>  
                        </div>
                    </div>
                    </div>
              </div>
              <!-- acct details -->
              <div class="tm-block-col tm-col-avatar " >
                <div class="tm-bg-primary-dark tm-block tm-block-avatar p-3" >
                  <h2 class="tm-block-title" >Account Details</h2>
                  <div class="tm-avatar-container jumbotron" >
                  <span 
                  class="btn btn-primary btn-block text-uppercase">Account Bal :₦ {{Auth::user()->acct_bal}} </span> 
                  
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
    </div>
        <!-- row -->
    <div class="container mt-5">
        <div class="row tm-content-row"> 
          <div class="tm-block-col ">
            <div class="tm-bg-primary-dark tm-block tm-block-settings p-3">
              <h2 class="tm-block-title" >Payment Details</h2>
              <div class="container">
                    <div class="table-responsive text-nowrap">
              
                        <table class="table table-striped ">
                  <thead>
                    <tr>
                      
                      <th>Day</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Signature</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($acct_det as $item)
                      <tr>
                          <td>{{$item->day}}</td>
                          <td>{{$item->amount}}</td>
                          @if($item->status == 1)
                          <td>Credited</td>
                          @else
                          <td>Debited</td>
                          @endif
                          <td>{{$item->signature}}</td>
                          <td >{{$item->created_at->format('d/m/Y')}}</td>
                          
                      </tr>
                      
                      @endforeach
                    
                  </tbody>
                </table>
                    </div>  
                </div>
              
            </div> 
          </div>   
        </div>
              
        <div class="row tm-content-row">
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings p-3">
              <h2 class="tm-block-title">Credit Account</h2>
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
              <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="tm-signup-form row">
                
                  <div class="form-group col-md-6">
                      <label>Your Name</label>
                      <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                  </div>
                  <div class="form-group col-md-6">
                      <label>Email address</label>
                      <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                  </div>            
                  <div class="form-group col-md-6">
                    
                      <label>Phone</label>
                      <input type="number" class="form-control" value="{{Auth::user()->phone}}" name="phone">
                  
                  </div>
                  <div class="form-group col-md-6">
                    
                      <label>Amount</label>
                      
                      <input type="number" class="form-control" value="" name="amount">
                    
                  </div>
                
                
                  <div class="form-group col-md-12">
                    
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                        <input type="hidden" name="mode" value="{{ Auth::user()->mode}}" >
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                        <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                  </div>
                
                <button type="submit" class="btn btn-primary md-block text-uppercase" >Credit Acct</button>
              </form>
            </div>
          </div>        
        </div>

            <!-- row -->
        
        <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings p-3">
             <h2 class="tm-block-title">Inform us</h2>
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
              <form method="POST" action="{{ route('message.store') }}" accept-charset="UTF-8" class="tm-signup-form row">
                @csrf
                
                  
                  <div class=" form-group col-md-6">
                    
                      <label>Email address</label>
                      <input type="email" class="form-control validate" value="{{Auth::user()->email}}" name="email">
                    
                  </div>
                  <div class=" form-group col-md-6">
                    
                      <label>Subject</label>
                      <input type="text" class="form-control validate"  name="subject">
                    
                  </div>
                
                  <div class="form-group col-md-9">
                    
                      <label>Message </label>
                      <textarea type="text" class="form-control validate"  name="body" row='7' col="5"></textarea>
                    
                  
                  </div>
                
                
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Send</button>
              </form>
            </div>
          </div>
    </div>   
        
        
  </section>
@endsection

  