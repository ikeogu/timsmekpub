@extends('layouts.admin')
@section('adminMain')

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
<div >

      <div class="col-12">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">All Authours</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th> Full Name</th>
                    <th>Sex</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Education</th>
                    <th>Books Published</th>

                    <th>Biography</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $item)
                    <tr>
                            <td>{{$item->name}}</td>
                    <td><img src="/storage/authors/{{$item->photo}}"  class="img rounded" height="80" width="80"></td>
                            <td class="text-center">{{$item->sex}}</td>
                            <td class="text-center">{{$item->email}}</td>
                            <td class="text-center">{{$item->dob}}</td>
                            <td class="text-center">{{$item->pob}}</td>
                            <td class="text-center">{{$item->education}}</td>
                            <td class="text-center">{{$item->book_authored}}</td>
                            <td class="text-center">{{$item->biography}}</td>
                            <td class="d-flex justify-content-between flex-wrap">
                            <a href="/authors/{{$item->id}}/edit" class="btn btn-danger btn-user btn-block">Edit</a>
                            <form action="{{ route('authors.destroy' , $item->id)}}" method="POST">
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
      </div>
@endsection