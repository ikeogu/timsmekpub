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
          <h6 class="m-0 font-weight-bold text-danger">Hard Copy Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  
                  <th>Qty</th>
                  <th>Amount</th>
                  <th>Status</th>
                 
                  
                  <th>PaidAt</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $item)
                  <tr>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->email}}</td>
                        
                        <td>{{$item->phone}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->state}}</td>
                        
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->amount/100}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{date('d/M/Y h:i:s',strtotime($item->paid_at))}}</td>
                        <td>
                        <a href="{{route('orderItem', ['id' => $item->id])}}" class="btn btn-sm btn-danger btn-fill">View Order</a></td>
                      </tr> 
                  @endforeach
                

               
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection