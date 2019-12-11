@extends('layouts.app')
@section('content')
<div class="container mt-5">
        <marquee behavior="" direction="left">Post article for publication  Post article for publication</marquee>
        <div class="row">
            <div class="col-md-8">
                <div class="blog-read mt-5">
                    <div class="blog-title">
                    <h5>Results for {{$text}}</h5>
                    </div>

                    <div class="blog-body">
                            @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
                            @endif
                        
                        <div class="about-author my-5 d-flex bg-light p-5">
                            <div class="decs">
                                
                                @if(count($details) > 0)
                                    @foreach($details as $item)

                                        
                                            <a href="{{route('art_cat',['id'=>$item->id])}}">
                                            <p>{{$item->name ?? ''}}</p>
                                            </a>
                                        
                                        
                                            <a href="publish/{{$item->id}}">
                                                    <p>{{$item->title ?? ''}}</p>
                                                    <p>{{$item->description ?? '' }}</p>
                                            </a>
                                       
                                        
                                            <a href="{{route('authors.show',['id'=> $item->id])}}">
                                                <p>{{$item->biography ?? '' }}</p>
                                            </a>

                                            <a href="{{route('blog.show',['id'=> $item->id])}}">
                                                <p>{{$item->caption ?? '' }}</p>
                                                <p>{{$item->body}}</p>
                                            </a>
                                            
                                        <hr>
                                    @endforeach
                                @else
                                 <h6 class="text-warning">No result found Check Spelling.</h6>
                                 @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>  
</div> 
            
             
        
        
@endsection