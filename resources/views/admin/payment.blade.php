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
          <h6 class="m-0 font-weight-bold text-danger">Purchases on SoftCopy</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Invoice ID</th>
                  <th>Email</th>
                  <th>Title</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Bank</th>
                  <th>Card Type</th>
                  <th>PaidAt</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($tranx as $item)
                  <tr>
                        <td>{{$item->reference}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->title}}</td>
                        
                        <td>{{$item->amount}}</td>

                        <td>{{$item->status}}</td>
                            
                        <td>{{$item->bank}}</td>
                        
                        
                        <td>{{$item->card_type}}</td>
                        <td>{{$item->paid_at}}</td>
                        
                      </tr> 
                  @endforeach
                

               
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection