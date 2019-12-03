@extends('layouts.app')
@section('content')
<section id="store" class="container mt-5">
    <div class="header text-center">
      <h2>Meet Our Authors</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis mollitia cum tempore sequi, vel</p>
		</div>
		
		
    <div class="row">
			@if($author->count() > 0)
				@foreach ($author as $item)

				<div class="col-md-4">
						<div class="card user-card mt-5">
							<div class="card-block">
								<div class="user-image">
								<img src="/storage/authors/{{$item->photo}}" class="img-radius"
										alt="{{$item->name}}" height="60" width="70">
								</div>
								<h6 class="f-w-600 m-t-25 m-b-10">{{$item->name}}</h6>
								<p class="text-muted">Status | Author |</p>
								
                <p><a href="/authors/{{$item->id}}" class="btn btn-read">read more...</a></p>
                <hr>
								<div class="row justify-content-center user-social-link">
									<div class="col-auto"><a href="{{$item->instagram}}"><i class="fa fa-facebook text-facebook"></i></a></div>
									<div class="col-auto"><a href="{{$item->linkin}}"><i class="fa fa-linkedin text-linkedin"></i></a></div>
									<div class="col-auto"><a href="{{$item->twitter}}"><i class="fa fa-twitter text-twitter"></i></a></div>
								</div>
							</div>
						</div>
					</div>	
				@endforeach
		</div>
		@else
	
      <div class="row">
        <div class="col-md-4">
          <div class="card user-card mt-5">
            <div class="card-block">
              <div class="user-image">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius"
                  alt="User-Profile-Image">
              </div>
              <h6 class="f-w-600 m-t-25 m-b-10">prof Alessa Robert</h6>
              <p class="text-muted">Author | Male |</p>
              <hr>
              <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              </p>
              <p><a href="/authors/1" class="btn btn-read">read more...</a></p>
              <hr>
              <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-linkedin text-linkedin"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card user-card mt-5">
            <div class="card-block">
              <div class="user-image">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius"
                  alt="User-Profile-Image">
              </div>
              <h6 class="f-w-600 m-t-25 m-b-10">prof Alessa Robert</h6>
              <p class="text-muted">Author | Male |</p>
              <hr>
              <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              </p>
              <hr>
              <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-linkedin text-linkedin"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card user-card mt-5">
            <div class="card-block">
              <div class="user-image">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius"
                  alt="User-Profile-Image">
              </div>
              <h6 class="f-w-600 m-t-25 m-b-10">prof Alessa Robert</h6>
              <p class="text-muted">Authors | Male |</p>
              <hr>
              <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              </p>
              <hr>
              <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-linkedin text-linkedin"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
              </div>
            </div>
          </div>
        </div>
     
	</section> 
	@endif
@endsection