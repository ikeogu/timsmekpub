@extends('layouts.admin')
@section('adminMain')
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Categories</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form class="user" action="{{route('category.update',[$cat->id])}}" method="POST">
                @csrf
                 {{method_field('PUT')}}
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                  value="{{$cat->name}}" name="name">
              </div>
              <div class="form-group">
                <textarea name="description" id="" cols="36" rows="2"
              class="p-3 form-control"> {{$cat->description}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block text-white">
                Update
             </button>
              <hr>
            </form>
          </div>
        </div>
      </div>    
@endsection