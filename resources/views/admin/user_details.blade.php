@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Payment Record</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Record</h6>
            <h6 class="m-0 font-weight-bold text-danger"> Bal: ₦{{$user->acct_bal}} </h6>
          </div>
          
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Month</th>
                      <th>Day</th>
                      <th>Amount</th>
                      <th>Signature</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($acct_det as $item)
                      <tr>
                          <td>{{$item->mnth}}</td>
                          <td>{{$item->day}}</td>
                          @if($item->signature == 'Debited')
                          
                          <td>{{$item->status}} </td>
                          @else
                          <td>{{$item->amount}} </td>
                          @endif
                          
                          <td>{{$item->signature}}</td>
                          
                          @if($item->signature == 'Debited')
                          <td>Debited</td>
                          @else
                          <td>Credited</td>
                          @endif
                          <td >{{$item->created_at->format('d/m/Y')}}</td>
                          
                      </tr>
                      
                      @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
        </div>

      </div>
      </div>
@endsection