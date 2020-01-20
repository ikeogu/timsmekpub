<!--
=========================================================
* BLK Design System- v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/blk-design-system
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href=".{{secure_asset('img/apple-icon.png')}}">
   <link rel="icon" type="image/png" href="{{secure_asset('img/favicon.png')}}">
   <title>
     Chizzy Savings
   </title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   <!-- Nucleo Icons -->
   <link href="{{secure_asset('css/nucleo-icons.css')}}" rel="stylesheet" />
   <!-- CSS Files -->
   <link href="{{secure_asset('css/blk-design-system.css')}}" rel="stylesheet" />
   
 </head>
 
 <body class="landing-page">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
     <div class="container">
       <div class="navbar-translate">
         <a class="navbar-brand" href="/" rel="tooltip" title="" data-placement="bottom" >
           <span>Chizzy•</span> Savings
         </a>
         <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-bar bar1"></span>
           <span class="navbar-toggler-bar bar2"></span>
           <span class="navbar-toggler-bar bar3"></span>
         </button>
       </div>
       <div class="collapse navbar-collapse justify-content-end" id="navigation">
         <div class="navbar-collapse-header">
           <div class="row">
             <div class="col-6 collapse-brand">
               <a>
                 Chizzy Savings
               </a>
             </div>
             <div class="col-6 collapse-close text-right">
               <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="tim-icons icon-simple-remove"></i>
               </button>
             </div>
           </div>
         </div>
         <ul class="navbar-nav">
           
           @auth
           <li class="nav-item">
           <a class="nav-link" href="{{route('homes')}}">My Profile</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout') }}"> Logout </a>
          </li> 
          @else
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Login to your dashboard" data-placement="bottom" href="{{route('login')}}" >
             Login
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Register and Join Us" data-placement="bottom" href="{{route('register')}}" >
              Register
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
           @endauth
           
         </ul>
       </div>
     </div>
   </nav>
   <!-- End Navbar -->

   <main class="container">
    <div class="wrapper">
       @yield('content')
    </div>   
   </main>
   <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h1 class="title">Chizzy Savings</h1>
        </div>
        <div class="col-md-3">
          <ul class="nav">
            <li class="nav-item">
              <a href="../index.html" class="nav-link">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                Landing
              </a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link">
                Register
              </a>
            </li>
            <li class="nav-item">
              <a href="/profile" class="nav-link">
                Profile
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav">
            <li class="nav-item">
              <a href="/" class="nav-link">
                Contact Us
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="h/" class="nav-link">
                Blog
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                License
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3 class="title">Follow us:</h3>
          <div class="btn-wrapper profile">
            <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fab fa-twitter"></i>
            </a>
            <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
              <i class="fab fa-facebook-square"></i>
            </a>
            <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
              <i class="fab fa-dribbble"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<!--   Core JS Files   -->
<script src="{{secure_asset('/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{secure_asset('/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{secure_asset('/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!-- Chart JS -->
<script src="{{secure_asset('/js/plugins/chartjs.min.js')}}"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{secure_asset('/js/plugins/moment.min.js')}}"></script>
<script src="{{secure_asset('/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!-- Black Dashboard DEMO methods, don't include it in your project! -->

<!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{secure_asset('/js/blk-design-system.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in secure_assets/secure_assets-for-demo/js/demo.js
    // demo.initLandingPageChart();
  });
</script>
</body>

</html>
