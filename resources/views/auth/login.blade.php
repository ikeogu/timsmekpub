@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">

        <div class="container p-5">
            <marquee behavior="" direction="left"><a href="#"><h6 class="article">Join our authors, submit your works to Timsmek Global Publishers.</h6></a></marquee>
          <div class="row">
            <div class="col-md-6 m-auto">
              <div class="form-card mt-5">
                <h4 class="text-center">Login</h4>
                <form method="POST" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-4 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="icon icon ion-md-mail"></i>
                        </div>
                      </div>
                      <input  type="email" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      
                    </div>
                    <div class="input-group mb-4 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="icon icon ion-md-key"></i>
                        </div>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
        
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                   
        
                    <p>Not yet a member? <a href="/register">Sign Up</a></p>
                    <button type="submit" class="butn mb-2 btn-fill">Sign in</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                  </form>
              </div>
            </div>
          </div>
        </div>

  </div>
@endsection
