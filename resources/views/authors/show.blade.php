@extends('layouts.app')
@section('content')
<section id="author-page">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="author-img m-auto">
              <img src="/storage/authors/{{$author->photo}}" alt="{{$author->photo}}" class="img-fluid">
              </div>
              <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="{{$author->instagram}}"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="{{$author->linkin}}"><i class="fa fa-linkedin text-linkedin"></i></a></div>
                <div class="col-auto"><a href="{{$author->twitter}}"><i class="fa fa-twitter text-twitter"></i></a></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="author-details pl-5">
                <ul class="details">
                  <li><i class="fa fa-user"></i><span>{{$author->name}}</span></li>
                  <li><i class="fa fa-graduation-cap"></i><span>{{$author->education}}</span></li>
                  <li><i class="fa fa-flag"></i><span>{{$author->country}}</span></li>
                  <li><i class="fa fa-envelope"></i><span>{{$author->email}}</span></li>
                  <li><i class="fa fa-phone"></i><span>{{$author->phone}}</span></li>
                  <li><i class="fa fa-globe"></i><span><a href="#">www.website.com</a></span></li>
                </ul>
                <hr>
                <div class="about-me">
                  <h4 class="header">About {{$author->name}}</h4>
                  <p class="discription">{{$author->biography}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr>
      <section id="my-books">
        <div class="container">
          <h2 class="header">Author's books</h2>
          <div class="row m-auto">
               @foreach ($book as $item) 
              
                <div class="col-md-3 col-6">
                    <div class="author-book">
                    <a href="/publish/{{$item->id}}">
                      <img src="/storage/cover_page/{{$item->cover_page}}" alt="{{$item->cover_page}}" class="img-fluid" ><br>
                      <strong>{{$item->title}}</strong>
                      </a>
                    </div>
                </div> 
              @endforeach 
            
            
          </div>
        </div>
        </div>
      </section>
@endsection