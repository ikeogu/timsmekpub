@extends('layouts.app')
@section('content')
<section id="blog">
        <marquee behavior="" direction="left">Post article for publication  Post article for publication</marquee>
      <div class="container mt-5">
        <div class="jumbotron">
          <h1>Our Blog</h1>
        </div>
        <p>Read interesting topics from Timsmek Global Publishers.</p>

        <div class="row">
          <div class="col-md-8">
            <div class="row">
                @if($blog->count() > 0)
                    @foreach ($blog  as $item)
                        <div class="col-md-4">
                            <a href="/blog/{{$item->id}}" class="blog-card mt-5">
                              <div class="card-img">
                              <img src="storage/blog_post/{{$item->image}}" alt="" class="img-fluid">
                              </div>
                              <div class="blog-title">
                                <h3 class="heading">{{$item->caption}}</h3>
                                <date>{{$item->created_at->diffForHumans()}} {{$item->writter}}<i class="icon ion-md-chatbubbles"></i> </date>
                                <p>{{str_limit($item->body, $limit = 50, $end = '...') }}</p>
                              </div>
                            </a>
                          </div>
                    @endforeach
                @else
                    <div class="col-md-8">
                    <h3>We Don't have recent Post on Our Blog.</h3>
                    </div>
                @endif
            </div>
          </div>
          <div class="col-md-4">
            
            
          </div>
        </div>
      </div>
    </section>
@endsection