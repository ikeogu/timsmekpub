@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <marquee behavior="" direction="left"><h6 class="article">Join our authors, submit your works to Timsmek Global Publishers.</h6></marquee>
    <div class="row">
      <div class="col-md-6 m-auto">
        <h5>Join our community of authors and readers. Sign up below.<br> It is easy and free.</h5>
        <div class="form-card mt-5">
          <h4 class="text-center">Sign Up</h4>
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
          <form method="POST" action="{{ route('register') }}">
						@csrf
            <div class="input-group mb-4 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon icon ion-md-person"></i>
                </div>
							</div>
							<input id="name" type="text" class="form-control py-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Full name">

							@error('name')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror
              
            </div>
            <div class="input-group mb-4 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon icon ion-md-mail"></i>
                </div>
							</div>
							<input id="email" type="email" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

							@error('email')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror
             
						</div>
						
						<div class="input-group mb-4 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon icon ion-md-call"></i>
                </div>
							</div>
							<input  type="number" class="form-control py-4 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter Phone">

							@error('phone')
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
							<input id="password" type="password" class="form-control py-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

							@error('password')
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
              <input id="password-confirm" type="password" class="form-control py-4" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" value="1" name="agree" class="form-check-input"><small> By clicking sidn up button below, you agree to our Terms and conditions and Privacy Policy.</small>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" value="yes" name="newslater" class="form-check-input"><small> Subscribe me to Timsmek Newsletter.</small>
            </div>
            
            <p class="text-center">Already a member?<a href="{{url('/login')}}"> Login here.</a></p>
            <button type="submit" class="butn mb-2 btn-fill ">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
