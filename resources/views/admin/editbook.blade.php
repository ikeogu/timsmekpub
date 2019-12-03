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
              <h6 class="m-0 font-weight-bold text-danger">Edit Book</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form class="user" action="{{route('publish.update',[$book->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                value="{{$book->title}}"name="title">
                <small>Article Title</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                  value="{{$book->isbn}}"name="isbn">
                  <small>Article ISBN</small>
                  </div>
                <div class="form-group">
                  <textarea class="form-control form-control-user" aria-describedby="name" cols="7"row="7"
                name="description">{{$book->description}}</textarea>
                <small>Article Description</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
               name="year_pub" value="{{$book->year_pub}}">
                    <small> Date of Publication</small>
                </div>
                <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                value="{{$book->price}}" name="price">
                      </div>
                      <small>Article price</small>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" value="{{$book->avaliable}}" name="available">
                        {{-- <select class="form-control " id="Name" 
                           name="available" required>
                           <option  >-Select Availablity-</option>
                           <option value="softcopy" >Soft copy</option>
                           <option value="hardcopy" >Hard copy</option>
                           <option value="both" >Both</option>
                      </select>    --}}
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" value="{{$book->category->name}}" name="category_id">
                    {{-- <select class="form-control " id="Name" 
                        name="category_id" required>
                        <option  >-Select Category-</option>
                        @foreach ($cat as $item)
                        <option value="{{$item->id}}" >{{$item->name}}</option>
                        
                        @endforeach
                        
                    </select>    --}}
                    <small>Category</small>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control form-control-user" value="{{$book->author->name}}" name="author_id">
                    {{-- <select class="form-control " id="Name" 
                        name="author_id" required>
                        <option  >-Select Author-</option>
                        @foreach ($author as $item)
                        <option value="{{$item->id}}" >{{$item->name}}</option>
                        
                        @endforeach
                        
                    </select>    --}}
                    <small>Author</small>
                </div>
                <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="Name" aria-describedby="name"
                name="cover_page" value="{{$book->cover_page}}">
                    <small>Upload Cover page</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                  value="{{$book->cover_page}}">
                      <small>Prev Cover page</small>
                  </div>
                <div class="form-group">
                  <input type="file" class="form-control form-control-user" id="Name" aria-describedby="name"
                name="content" value="{{$book->content}}">
                    <small>Upload Book PDF</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Name" aria-describedby="name"
                  value="{{$book->content}}">
                      <small>Prev Book</small>
                  </div>
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Update Book
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>
@endsection