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
      <!-- Content Row -->
	<div class="row">
		<!-- Donut Chart -->
				
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Add Service</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
					<form class="user" action="{{route('service.store')}}" method="POST">
                            @csrf
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="Name" aria-describedby="name"
                            placeholder="Enter Service Name" name="image">
                            <small>upload Service Image</small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                            placeholder="Enter Service Name" name="name">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="36" rows="2" placeholder="Description"
                            class="p-3 form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block text-white">
                        Add Service
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
              <h6 class="m-0 font-weight-bold text-danger">View All Services</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($service as $item)
                        <tr>
                                <td>{{$item->name}}</td>
                                <td class="text-center">{{$item->description}}</td>
                                <td class="d-flex justify-content-between">
                                <a href="/service/{{$item->id}}/edit" class="btn btn-danger btn-user btn-block">Edit</a>

                                    <form action="{{ route('service.destroy' , $item->id)}}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}                                                       
                                                <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                                            
                                    </form>
                                </td>
                            </tr>	
                        @endforeach
                   {{$service->links()}}

                    

                   
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div> 
      </div>
@endsection