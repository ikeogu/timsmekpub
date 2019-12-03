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
        <div class="col-xl-8 col-lg-9">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Add Authors</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('authors.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                  <input type="file" class="form-control form-control-user" 
                    name="photo">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Full name" name="name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter email address..." name="email">
                </div>
                <div class="form-group">
                    <select class="form-control " name="sex">
                        <option > --Gender--</option>
                        <option value="F"> Female</option>
                        <option value="M"> Male</option>
                    </select>     
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" aria-describedby="name"
                    placeholder="Enter Date of Birth " name="dob">
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" aria-describedby="name"
                    placeholder="Enter Place of Birth " name="pob">
                </div>

                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter educational level" name="education">
                </div>

                 <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Number of Books Published" name="book_authored">
                </div>
                <div class="form-group">
                    <textarea rows="7" cols="10"  class="form-control" placeholder=" Authors Biography" name="biography"></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Facebook link (optional) " name="instagram">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter Twitter link (optional) " name="twitter">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                    placeholder="Enter LinkInd link (optional) " name="linkin">
                </div>
               
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Add Authour
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>

        <!-- Area Chart -->
       
      </div>

 @endsection