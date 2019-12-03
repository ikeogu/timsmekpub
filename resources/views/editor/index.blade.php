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
              <h6 class="m-0 font-weight-bold text-danger">Add Editor</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('editors.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="Name" aria-describedby="name"
                     name="photo">
                 </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Full name" name="name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter email address..."name="email">
                </div>
                 <div class="form-group">
                  <textarea class="form-control "  
                    placeholder="Enter Biography" name="bio" cols="7" rows="8"></textarea>
                 </div>
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Add Editor
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
              <h6 class="m-0 font-weight-bold text-danger">All Editor</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Email</th>
                      <th>Bio</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    @foreach ($editor as $item)
                         <tr>
                        <td>{{$item->name}}</td>
                        <td class="text-center">
                            <img src="/storage/editors/{{$item->photo}}" height="50"width="60" alt="{{$item->name}}">
                        </td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->bio}}</td>
                        <td class="d-flex justify-content-between flex-wrap">
                        <a href="/editors/{{$item->id}}/edit" class="btn btn-danger btn-user btn-block">Edit</a>

                            <form action="{{ route('editors.destroy' , [$item->id])}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}                                                       
                                    <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                                    
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                {{$editor->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection