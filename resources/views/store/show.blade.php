@extends('layouts.app')
@section('content')
<section id="author-page">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="author-img m-auto">
          <img src="/storage/cover_page/{{$book->cover_page}}" alt="{{$book->cover_page}}" class="img-fluid">
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="author-details pl-5">
            <ul class="details">
              <li><span>Title: {{$book->title}}</span></li>
              <li><span>Year Published :{{$book->year_pub}}</span></li>
              <li><span>Price: ₦{{$book->price}}</span></li>
              <li><span>Also available :{{$book->available}}</span></li>
              @if($book->status == 1)
              <li><span> Book Status: For Sale</span></li>
              @else
              <li><span> Book Status: Free</span></li>
              @endif
            </ul>
            <hr>
            <div class="about-me">
              <h4 class="header">About {{$book->title}}</h4>
              <p class="discription">{{$book->description}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection