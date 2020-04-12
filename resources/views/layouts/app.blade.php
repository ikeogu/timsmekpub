<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
  <title>ChizzySavings</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

 
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">
  <!-- https://fonts.google.com/specimen/Roboto -->
    {{-- <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />--}}
    <!-- https://getbootstrap.com/ -->
    {{-- <link rel="stylesheet" href="css/templatemo-style.css">
    --}}
   <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  @yield('css')
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/">ChizzySavings</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link js-scroll-trigger" href="#services">Services</a>-->
          <!--</li>-->
         
         
          @auth
           <li class="nav-item">
           <a class="nav-link" href="{{route('homes')}}">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}"> Logout </a>
          </li> 
          @else
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip"  href="{{route('login')}}" >
             Login
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" href="{{route('register')}}" >
              Register
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" href="{{route('allblog')}}" >
              Blog
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

       @yield('content')

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">ChizzySavings &copy; {{date('Y')}}</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Plugin JavaScript -->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
 <script src="js/creative.min.js"></script>
  {{-- <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script> --}}

</body>

</html>
