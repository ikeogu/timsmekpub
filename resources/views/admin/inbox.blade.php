@extends('layouts.admin')
@section('adminMain')
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">All contacts message</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($inbox as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->reason}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                      </tr> 
                  @endforeach
                

             
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection