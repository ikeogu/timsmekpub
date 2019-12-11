@extends('layouts.admin')
@section('adminMain')
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">What People said about Timsmek Products</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User</th>
                  <th>BooK Title</th>
                  <th>Email</th>
                  <th>Star Rating</th>
                  <th>Subject</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($re as $item)
                  <tr>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->publish->title}}</td>
                        <td>{{$item->user->email}}</td>
                        <td>{{$item->ratings}}</td> 
                        <td>{{$item->subject}}</td>
                        <td>{{$item->comment}}</td>
                        <td class="d-flex justify-content-between">
                                <a href="/review/{{$item->id}}/edit" class="btn btn-danger btn-user btn-block">Edit</a>

                                    <form action="{{ route('review.destroy' , $item->id)}}" method="POST">
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
@endsection