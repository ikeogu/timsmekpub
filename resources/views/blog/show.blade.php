@extends('layouts.app')
@section('content')
<div class="container mt-5">
        <marquee behavior="" direction="left">Post article for publication  Post article for publication</marquee>
      <div class="row">
        <div class="col-md-8">
          <div class="blog-read mt-5">
            <div class="blog-title">
              <h2>{{$blog->caption}}</h2>
            </div>
            <div class="blog-body">
              <p class="blog-content mb-3">{{str_limit($blog->body, $limit = 50, $end = '..')}}</p>
              <img src="/storage/blog_post/{{$blog->image}}" alt="{{$blog->caption}}" class="img-fluid">
              <p class="blog-content mt-5">{!!nl2br($blog->body)!!}</p>

              
            </div>
            <div class="about-author my-5 d-flex bg-light p-5">
              <div class="author-img mr-5">
                <img src="/storage/blog_post/{{$blog->image}}" alt="" class="img-fluid" width="200">
              </div>
              <div class="decs">
                <h4>{{$blog->writter}}</h4>
                <p>Study to show yourself approved. New Discoveries and New interventions are they result of Hardwork.</p>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="sidebar-box mt-5">
            <form action="" class="search-form">
              <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="icon ion-md-search"></i>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="sidebar-box">
              <h4 class="heading-sidebar">Recent Blog</h4>
              
              @foreach ($recent as $item)
              <div class="d-flex mt-2">
                <a href="#" class="blog-img mr-4">
                  <img src="/storage/blog_post/{{$item->image}}" alt="" class="img-fluid">
                </a>
                <div class="text">
                  <h4 class="heading">
                  <a href="#">{{$item->caption}}</a>
                  </h4>
                  <div class="meta">
                    <div>
                      <i class="icon ion-md-calendar"></i>
                      <span>{{$item->created_at->diffForHumans()}}</span>
                    </div>
                    <div>
                      <i class="icon ion-md-person"></i>
                      <span>{{$item->writter}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
  
              
            </div> 
          @endforeach
          
        </div>
      </div>
    </div>
@endsection