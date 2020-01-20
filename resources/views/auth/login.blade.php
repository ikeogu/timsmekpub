@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="page-header">
    <div class="page-header-image"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
                    <div id="square7" class="square square-7"></div>
                    <div id="square8" class="square square-8"></div>
                    <div class="card card-register">
                    <div class="card-header">
                        <img class="card-img" src="{{asset('img/square1.png')}}" alt="Card image">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                        
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="form-check-sign"></span>
                            
                            {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-info btn-round btn-lg">
                            {{ __('Login') }}
                        </button>
                        </form>
                    </div>
                    <div class="card-footer">
                        
                        
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
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
@endsection
