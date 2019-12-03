@extends('layouts.admin')
@section('adminMain')
<div class="">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">All Published Books</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Description</th>
                    <th>Available</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Cover Page</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                    <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author->name}}</td>
                            <td class="text-center">{{$item->description}}</td>
                            <td class="text-center">{{$item->available}}</td>
                            <td class="text-center">{{$item->status}}</td>
                            <td class="text-center">{{$item->category}}</td>
                            <td class="text-center">
                                <img src="/storage/cover_page/{{$item->cover_page}}" height="50" width="60">
                            </td>
                            <td class="text-center">{{$item->price}}</td>
                            <td class="text-center">{{$item->year_pub}}</td>
                            <td class="d-flex justify-content-between flex-wrap">
                            <a href="/publish/{{$item->id}}/edit" class="btn btn-danger btn-user btn-block">Edit</a>
                             <form action="{{ route('publish.destroy' , [$item->id])}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}                                                       
                                    <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                                    
                            </form>
                            </td>
                     </tr> 
                    @endforeach
                  

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection