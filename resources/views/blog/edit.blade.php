@extends('layouts.admin')
@section('adminMain')
<div >
        @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                        @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                        @endforeach
                </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
</div>   
<div class="row">

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Edit Blog news</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('blog.update',[$blog->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                  <div class="custom-file">
                  <input type="file" class="form-control form-control-user" name="image" required value="{{$blog->image}}">
                    <small>Upload Image</small>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                value="{{$blog->caption}}" name="caption">
                </div>
                <div class="form-group">
                  <textarea name="body" id="" cols="36" rows="5"
                    class="p-3 form-control"> {{$blog->body}}
                </textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                value="{{$blog->writter}}" name="writter">
                </div>
                <button class="btn btn-danger btn-user btn-block" type="submit">
                  Update blog
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>
@endsection