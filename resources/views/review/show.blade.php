@extends('layouts.app')
@section('content')
<div class="container mt-5">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-read mt-5">
            <div class="blog-title">
              <h2>User {{$re->user_id}}</h2>
            </div>
            <div class="blog-body">
                <h3 class="heading mb-3"> Rated :
                            @if($re->ratings === 5 )
                          <i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i>
                        @elseif($re->ratings ===4)
                        <i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i>
                        @elseif($re->ratings === 3)
                        <i class="icon ion-md-star"></i><i class="icon ion-md-star"></i><i class="icon ion-md-star"></i>
                        @elseif($re->ratings === 2)
                        <i class="icon ion-md-star"></i><i class="icon ion-md-star"></i>
                        @elseif($re->ratings=== 1)
                        <i class="icon ion-md-star"></i>
                        @endif
                    </h3>
              {{-- <img src="{{$blog->image}}" alt="{{$blog->caption}}"  height="370" width="auto"> --}}
              <h2>Comment</h2>
              <p class="blog-content mt-5">{!!nl2br($re->comment)!!}</p>

              
            </div>
            {{-- <div class="about-author my-5 d-flex bg-light p-5">
              <div class="author-img mr-5">
                <img src="{{$blog->image}}" alt="" class="img-fluid" width="200">
              </div>
              <div class="decs">
                <h4>{{$blog->writter}}</h4>
                <p></p>
              </div>
            </div> --}}
            
          </div>
        </div>
        
          
      </div>
    </div>
@endsection