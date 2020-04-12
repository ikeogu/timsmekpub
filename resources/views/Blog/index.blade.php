@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Chizzy Savings Blog Post</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All blog Posts</h6>
          </div>
          <div class="card-body">
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
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    
                    <th>body</th>
                    <th>Posted</th>
                  
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($blog as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        
                        
                        <td>{{$item->body}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        
                        <td> 
                        <a href="{{route('blog.edit',[[$item->id]])}}" class="btn btn-warning btn-user btn-block"> Edit</a>                      
                        <form action="{{ route('blog.destroy' , [$item->id])}}" method="POST">
                          <input name="_method" type="hidden" value="DELETE">
                          {{ csrf_field() }}                                                       
                              <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure you delete?')">Delete</button>
                              
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