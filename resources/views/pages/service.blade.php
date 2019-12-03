@extends('layouts.app')
@section('content')
<section id="service">
    <div class="container">
      <div class="header text-center mt-5">
        <h2>Our Services</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis mollitia cum tempore sequi, vel</p>
      </div>
      <br><br>
      <div class="service-card">
        <div class="row">
          <div class="col-md-4 text-center m-auto">
            <i class="fa fa-university fa-2x"></i>
            <br><br>
            <h4>Service one</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate expedita ipsam repellendus
              distinctio? Voluptas laborum nulla eum. Debitis officia eligendi alias mollitia repudiandae, eaque quae
              nemo enim, magni doloribus esse.</p>
          </div>
          <div class="col-md-4 text-center m-auto">
            <i class="fa fa-university fa-2x"></i>
            <br><br>
            <h4>Book Publishing</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate expedita ipsam repellendus
              distinctio? Voluptas laborum nulla eum. Debitis officia eligendi alias mollitia repudiandae, eaque quae
              nemo enim, magni doloribus esse.</p>
          </div>
          <div class="col-md-4 text-center m-auto">
            <i class="fa fa-university fa-2x"></i>
            <br><br>
            <h4>Editors </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate expedita ipsam repellendus
              distinctio? Voluptas laborum nulla eum. Debitis officia eligendi alias mollitia repudiandae, eaque quae
              nemo enim, magni doloribus esse.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <section>
    <div class="container py-5">
      @foreach($service as $item)
      <div class="header text-center mt-5">
        <h2>{{$item->name}}</h2>
      </div>
      <div class="row">
        <div class="col-md-3 p-3">
          <div class="about-logo">
          <img src="/storage/service/{{$service->image}}" alt="" class="img-fluid" height="160" width="140">
          </div>
        </div>
        <div class="col-md-9 p-3">
          <p class="about-text">{{$item->description}}</p>
        </div>
      </div>
      @endforeach
     
    </div>
  </section>
  <hr>
@endsection