@extends('layouts.app')

@section('content')


<div class="page-header">
    <div class="page-header-image"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                <div class="col-lg-8 col-md-6 offset-lg-0 offset-md-4">
                    <div id="square7" class="square square-7"></div>
                    <div id="square8" class="square square-8"></div>
                    <div class="card card-register">
                      
                    <div class="card-header">
                        <img class="card-img" src="{{asset('img/square1.png')}}" alt="Card image">
                        <h4 class="card-title">Register</h4>
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
                        <form class="form"method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                            </div>
                            <input type="text" class="form-control" placeholder="A Unique Name" name="username" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                            </div>
                            <input type="text" placeholder="Email" class="form-control" name="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-phone"></i>
                            </div>
                            </div>
                            <input type="number" placeholder="Phone Number" class="form-control" name="phone" required >
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        
                            
                                
                        <div class="form-group ">
                            <label for="inputState">Choose Plan</label>
                            <select id="inputState" class="form-control" name="mode">
                                <option selected>Choose...</option>
                                <option value="daily" class="text-dark"> Daily</option>
                                <option value="weekly" class="text-dark"> Weekly</option>
                                <option value="monthly" class="text-dark"> Monthly</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="inputState">Amount to Save</label>
                            <select id="inputState" class="form-control" name="amount">
                                <option selected>Choose...</option>
                                <option value="100" class="text-dark">₦100</option>
                                <option value="200" class="text-dark">₦200</option>
                                <option value="300" class="text-dark">₦300</option>
                                <option value="500" class="text-dark">₦500</option>
                                <option value="1000" class="text-dark">₦1000</option>
                                <option value="1500" class="text-dark">₦1500</option>
                                <option value="2000" class="text-dark">₦2000</option>
                                <option value="2500" class="text-dark">₦2500</option>
                                <option value="3000" class="text-dark">₦3000</option>
                                <option value="5000" class="text-dark">₦5000</option>
                                <option value="10000" class="text-dark">₦10000</option>
                                <option value="15000" class="text-dark">₦15000</option>
                                <option value="20000" class="text-dark">₦20000</option>
                                <option value="25000" class="text-dark">₦25000</option>
                            </select>
                        </div>
                        
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="password-confirm">
                            </div>
                        </div>

                        <div class="input-group">
                            
                            
                            <input type="text" class="form-control" placeholder="Referral Link" name="refeeral_id">
                        
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-sign"></span>
                            I agree to the
                            <a href="javascript:void(0)">terms and conditions</a>.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>
                <div class="register-bg"></div>
                <div id="square1" class="square square-1"></div>
                <div id="square2" class="square square-2"></div>
                <div id="square3" class="square square-3"></div>
                <div id="square4" class="square square-4"></div>
                <div id="square5" class="square square-5"></div>
                <div id="square6" class="square square-6"></div>
            </div>
        </div>
    </div>
</div>    
<br><br><br><br>
@endsection
   