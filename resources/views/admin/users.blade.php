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
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">All Registered users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Terms</th>
                  <th>Status</th>
                  <th>Is Admin</th>
                  <th>Joined</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($user as $item)
                  <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        @if($item->agree === 1)
                            <td>Yes</td>
                            @else
                            <td>No</td>
                        @endif
                        @if($item->newslater === null)
                            <td>No</td>
                            @else
                            <td>Yes</td>
                        @endif    
                        
                        <td>{{$item->isAdmin}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td class="d-flex justify-content-between flex-wrap">
                        <a href="{{route('isAdmin',[$item->id])}}" class="btn btn-danger btn-user btn-block">Make  Admin</a>
                        <a href="{{route('RisAdmin',[$item->id])}}"  class="btn btn-danger btn-user btn-block">Remove Admin</a>
                        </td>
                      </tr> 
                  @endforeach
                

               
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection