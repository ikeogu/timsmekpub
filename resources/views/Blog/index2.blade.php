
@extends('layouts.app')
@section('css')
<link href="{{asset('css/blog.css')}}" rel="stylesheet">
@endsection
@section('content')
    



<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Welcome</h1>
            <span class="subheading">To ChizzySavings Blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          @foreach ($blogs as $blog)
              
         
        <div class="post-preview">
        <a href="{{route('show_post',[$blog->slug])}}">
            <h2 class="post-title">
             {{$blog->title}}
            </h2>
            <div class="row">
                <div class="col-4-md">
                <img src="/storage/blop_post/{{$blog->image}}" height="90">
                </div>
                <div class="col-8-md">
                    <p class="post-subtitle">
                        {{$blog->body}}
                    </p>
                </div>
            </div>
          </a>
          <p class="post-meta">Posted by Admin
            
            {{$blog->created_at->diffForHumans()}}</p>
            
        </div>
        <hr>
        @endforeach
        <!-- Pager -->
        <div class="clearfix">
         {{$blog->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection