@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Edit Blog Post</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit an {{$blog->title}}</h6>
          </div>
          <div class="card-body">
          <form class="user" method="POST" action="{{route('blog.update',[$blog->id])}}">
            {{csrf_field('PUT')}}
                <div class="form-group">
                  <input type="title" class="form-control form-control-user" id="exampleInputEmail"  placeholder="Enter Title" name="title" value="{{$blog->title}}">
                </div>
                <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="exampleInputPassword" name="image">
                  <small>Select image for blog</small>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <textarea class="form-control form-control-user" name="body">
                        {{$blog->body}}
                    </textarea>
                  </div>
                </div>
                
                <hr>
                <button  class="btn btn-primary btn-user btn-block">
                    Update
                </button>
            </form>
          </div>
        </div>
      </div>
@endsection