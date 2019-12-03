@extends('layouts.admin')
@section('adminMain')
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Edit Editor</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('editors.update',[$editor->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                 <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="Name" aria-describedby="name"
                 name="photo" value="{{$editor->photo}}">
                 </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                value="{{$editor->name}}" name="name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="Name" aria-describedby="name"
                  value="{{$editor->email}}" name="email">
                </div>
                 <div class="form-group">
                  <textarea class="form-control "  
                 name="bio" cols="7" rows="8"> {{$editor->bio}}</textarea>
                 </div>
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Update
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>
    
@endsection