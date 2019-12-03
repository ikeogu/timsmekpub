@extends('layouts.admin')
@section('adminMain')
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">Published Article</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Authors</th>
                  <th>Title</th>
                  <th>Email</th>
                  <th>Category</th>
                  
                  <th>Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($art as $item)
                  <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->email}}</td>
                        {{-- <td>{{$item->category()->name}}</td> --}}
                        <td>{{$item->code}}</td>
                        <td class="d-flex justify-content-between flex-wrap">
 
                          <a href="{{route('preview',[$item->id])}}" target="_blank" class="btn btn-danger btn-user btn-block"></i>Preview</a>
                          <a href="{{route('download',[$item->id])}}" class="btn btn-warning btn-user btn-block"> Download</a>
                                  
                        </td>
                      </tr> 
                  @endforeach
                {{$art->links()}}

              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection