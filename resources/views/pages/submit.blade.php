@extends('layouts.app')
@section('content')
    
    <div class="justify-content-center"> 
        <div class="container p-5">
            <marquee behavior="" direction="left"><h4 class="text-success">Thanks for your Patronage!</h4></marquee>
          <div class="form-card mt-5">
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
            <small class="text-warning">  <em class="text-info"><a href="{{route('article.create')}}">Submit another artilce</a></em></small></p>
          </div>
        </div>
    </div>      
@endsection