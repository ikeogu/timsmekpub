@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Payments Recieved Online</h1>
        <p class="mb-4">Active users of your platform.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payment Details</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Plan</th>
                    <th>Paid Amount</th>
                    
                    <th>Bank</th>
                    <th>Card Type</th>
                    <th>Paid At</th>
                    <th>Recieved</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($payment as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->reference}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->user->email}}</td>
                        <td>{{$item->user->phone}}</td>
                        <td>{{$item->plan}}</td>
                        <td>{{$item->amount}}</td>
                        
                        <td>{{$item->bank}}</td>
                        <td>{{$item->card_type}}</td>
                        <td>{{$item->paid_at}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>
                           
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