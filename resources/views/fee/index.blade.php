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
<div class="row">

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Add New Shipping Fee</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('shippingFee.store')}}" method="POST" >
                @csrf
                 
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter City name" name="city">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Shipping Fee" name="fee">
                </div>
                 
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Add Shipping Fee
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">

          <!-- Area Chart -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">All Shipping Fee and Cities</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> City Name</th>
                      <th>Fee</th>
                      
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    @foreach ($fee as $item)
                         <tr>
                        <td>{{$item->city}}</td>
                        
                        <td>{{$item->fee}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td class="d-flex justify-content-between flex-wrap">
                        <a href="/shippingFee/{{$item->id}}/edit" class="btn btn-warning btn-user btn-block">Edit</a>

                            <form action="{{ route('shippingFee.destroy' , [$item->id])}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}                                                       
                                    <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                                    
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                {{$fee->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection