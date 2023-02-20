@extends('layouts.masterform')
@section('title', 'ADHIZ - Login External')

<!--====== Participate CSS ======-->
<link rel="stylesheet" href="assets/css/participate.css">

@push('custom-css')
<style>
    body {
        background: #007bff;
        background: linear-gradient(to right, #76cbd3, #c3d668, #839a3b);
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }

    .btn-google {
        color: white !important;
        background-color: #ea4335;
    }

    .btn-facebook {
        color: white !important;
        background-color: #3b5998;
    }

    .signin{
        display: flex;
        justify-content: center;
    }

</style>
@endpush

@section('content')
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          @if(\Session::has('alert'))
            <div class="alert alert-danger">
                <div>{{Session::get('alert')}}</div>
            </div>
          @endif
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <div class="col-sm">
                <div class="container-fluid" style="text-align: center;">
                  <a href="{{url('/')}}">
                    <img class="shape-1" src="{{asset('')}}assets/img/adhi-z-fix-resize.png" alt="shape">
                  </a>
                  <hr>
                  <h1 class="header-third mt-3" style="font-size:4vh;">
                      Login Juri External
                  </h1>
                  <h5 class="mt-2" style="font-size:2vh;">
                      Silahkan login menggunakan SSO Google.
                  </h5>
                  <br>
                  <a class="btn btn-primary" href="{{route('user.login.google')}}">
                      <img src="{{asset('assets/img/ic_google.svg')}}" class="icon" alt=""> Sign In with Google
                  </a>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>


  @push('custom-script')
  <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--====== Plugins js ======-->
    <script src="assets/js/plugins.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="assets/js/wow.min.js"></script>

    <!--====== Particles js ======-->
    <script src="assets/js/particles.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
    </script>
@endpush