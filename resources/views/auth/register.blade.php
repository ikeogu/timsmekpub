@extends('layouts.app')
@section('css')
    
    
    <link href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
@endsection
@section('content')
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            
                <div class="col-sm-9 col-md-7 ">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign Up</h5>
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
                        <form class="form-signin p-5" method="POST" action="{{ route('register') }}" name="registration">
                            @csrf 
                            <div class="form-group">
                                
                                <input type="text"  name="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Full name">
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                
                                <input type="text"  name="username" class="form-control"  aria-describedby="emailHelp" placeholder="Enter username">
                                
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                
                                <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                
                                <input type="number" placeholder="Phone Number" class="form-control" name="phone" required >
                                
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                
                                <select id="inputState" class="form-control" name="mode">
                                    <option selected>Choose plan</option>
                                    <option value="daily" class="text-dark"> Daily</option>
                                    <option value="weekly" class="text-dark"> Weekly</option>
                                    <option value="monthly" class="text-dark"> Monthly</option>
                                </select>
                                
                            </div>

                            <div class="form-group ">
                                
                                <select id="inputState" class="form-control" name="amount">
                                    <option selected>Amount to save...</option>
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
                            
                            <div class="form-group">
                                
                                <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password ">
                                <small style="color:red">Password Must be greater than or equals 8</small>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="password-confirm">
                                    
                            </div>
                            <div class="form-group">
                        
                                <input type="text" class="form-control" placeholder="Referral Link" name="refeeral_id">
                                
                            
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <button type="submit" class=" btn btn-lg btn-primary btn-block text-uppercase">Signup</button>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                <p class="text-center"><a href="/login" id="signin">Already have an account?</a></p>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>    
                </div>
            
        </div>
    </div> 
</section>
 @endsection



                       
                            
                                
        


