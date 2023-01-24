@extends('layouts.masterform')
@section('title', 'ADHIZ - Login')

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
              <img class="shape-1" src="{{asset('')}}assets/img/adhiz-x-sinta-fix.png" alt="shape">
              <br>
              <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5> -->
              <form action="{{ route('actionlogin') }}" id="loginForm" name="loginForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-floating mb-3">
                  <label for="floatingInput">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="sinta@adhi.co.id">
                  <span id="resultemail" style="font-size: 12px" class="mt-2 ml-2"></span>
                </div>
                <div class="form-floating mb-3">
                  <label for="floatingPassword">Password</label>
                  <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Password">
                </div>
                <div>
                <h8>Note : Silahkan sign in menggunakan email dan password SINTA</h8>
                <br>
                </div>
                <div class="d-grid signin">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" id="signin" value="signin">Sign
                    in</button>
                </div>
                <hr class="my-4">
              </form>
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
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#signin').click(function(e)
      {
        if($('#resultemail').css("color") == "rgb(255, 0, 0)")
        {
          alert('Mohon masukkan email adhi')
          event.preventDefault();
          return false;
        }
        else{
          $(this).parent().trigger('submit')
        }
      })

      var inputEmail = document.getElementById("email");
      inputEmail.addEventListener("keyup", function(e)
      {
          validate('email');
      });

      function validateEmail(email){
          return String(email)
              .toLowerCase()
              .match(
              /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
              );
      };

      function validateAdhi(email){
        return email.match(/@adhi.co.id/);
      }

      function validate(id){
          const $result = $('#result'+id);
          const email = $('#'+id).val();
          $result.text('');

          if (validateEmail(email) && validateAdhi(email)) {
            $result.text(email + ' is valid');
            $result.css('color', 'green');
          } else {
              $result.text(email + ' is not valid');
              $result.css('color', 'red');
          }
          return false;
      }
    </script>
@endpush