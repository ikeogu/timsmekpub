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
              <li><span>ISBN:{{$book->isbn}}</span></li>
              <li><span>Price: ₦{{$book->price/100}}</span></li>
              <li><span>Available :@if($book->available == 1)
                Soft copy
                @elseif($book->available == 2)
                    Hard copy
                @elseif($book->available == 3)
                    Hard and soft copy
                @endif </span></li>
              @if($book->status == 1)
              <li><span> Book Status: Not free</span></li>
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