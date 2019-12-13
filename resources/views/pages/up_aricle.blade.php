@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
      @include('partials/sidebar')

      <div class="col-md-6 ">
        <div class="container p-5">
          <div class="form-card mt-5">

            <h4 class="text-center">Submit Article for publication</h4>
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
          
            <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group mb-4 mr-sm-2">
              <input type="text" class="form-control py-4"  name="name" value="{{Auth::user()->name}}">
              </div>
              <div class="form-group mb-4 mr-sm-2">
                <input type="email" class="form-control py-4"  name="email" value="{{Auth::user()->email}}">
              </div>
              <div class="form-group mb-4 mr-sm-2">
                <input type="text" class="form-control py-4" placeholder="enter article title" name="title" >
              </div>
              <div class="form-group mb-4 mr-sm-2">
                <select id="inputState" class="form-control" name="cat_id">
                  <option >Select categories</option>
                    @foreach($cat as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group mb-4 mr-sm-2">
                  <div class="custom-file">
                      <input type="file" class="form-control py-4"  name="content" >
                      
                    </div>
                </div>
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} input-group mb-4 mr-sm-2">
                  <label class="col-md-4 control-label">Captcha</label>
                  <div class="col-md-6">
                      {!! app('captcha')->display() !!}
                      @if ($errors->has('g-recaptcha-response'))
                          <span class="help-block">
                              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                          </span>
                      @endif
                  </div>  
                </div>
              <button type="submit" class="butn mb-2 d-block">Submit</button>
            </form>
          </div>
        </div>
      </div>

        @include('partials\sidebar2')
      </div>
    </div>
  </div>
@endsection