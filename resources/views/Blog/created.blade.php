@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Make a Blog Post</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post an Article</h6>
          </div>
          <div class="card-body">
          <form class="user" method="POST" action="{{route('blog.store')}}">
            @csrf
                <div class="form-group">
                  <input type="title" class="form-control form-control-user" id="exampleInputEmail"  placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="exampleInputPassword" name="image">
                  <small>Select image for blog</small>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <textarea class="form-control form-control-user" name="body"></textarea>
                  </div>
                </div>
                
                <hr>
                <button  class="btn btn-primary btn-user btn-block">
                    Post
                </button>
            </form>
          </div>
        </div>
      </div>
@endsection