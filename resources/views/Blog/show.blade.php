@extends('layouts.app')
@section('css')
<link href="{{asset('css/blog.css')}}" rel="stylesheet">
@endsection
@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            
            <h2 class="subheading">{{$blog->title}}</h2>
            <span class="meta">Posted on
              
            {{date("jS F, Y", strtotime($blog->created_at))}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
    <img src="/storage/blop_post/{{$blog->image}}" height="99">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p>{{$blog->body}}</p>
        </div>
      </div>
    </div>
  </article>
@endsection