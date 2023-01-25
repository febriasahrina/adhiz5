<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">   
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="nocache, no-store, max-age=0, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--====== Title ======-->
    <title>@yield('title', 'ADHIZ | XX')</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="icon" href="{{asset('')}}assets/img/favicon.ico">
    <img src="{{asset('')}}assets/img/favicon.ico" alt="Logo">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/LineIcons.css">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-awesome.min.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/default.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/select2/css/select2.min.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    
    @stack('custom-css')
    <style>
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0px;
        }

        .text-center{
            text-align: center;
        }

        
        .coming {
            padding: 0 0; }
            @media only screen and (min-width: 768px) and (max-width: 991px) {
                .coming {
                padding: 0 0; } }
            @media (max-width: 767px) {
                .coming {
                padding: 0 15px; } }
            @media (max-width: 767px) {
                .coming {
                width: 0%; } }
            @media only screen and (min-width: 576px) and (max-width: 767px) {
                .coming {
                width: 33.33%; } }
            .coming img {
                width: 100%;
                opacity: 0.5;
                -webkit-transition: all 0.3s ease-out 0s;
                -moz-transition: all 0.3s ease-out 0s;
                -ms-transition: all 0.3s ease-out 0s;
                -o-transition: all 0.3s ease-out 0s;
                transition: all 0.3s ease-out 0s; }
            .coming:hover img {
                opacity: 3; }


        @media (max-width: 767px) {
            .logos {
            padding: 0 15px; } }
        @media (max-width: 767px) {
            .logos {
            width: 30%; }
        
            .issue-img {
                width:70%;
            }}
    </style>
    
</head>

<body>
    <!-- <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    @section('footer-js') <script> $(function() {alert('Jquery is defined and ready for service.');});</script> @endsection


    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand logos" href="{{url('/')}}">
                                <img src="{{asset('')}}assets/img/adhi-z-fix-resize.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item" id="nav-home">
                                        <a class="page-scroll" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item" id="nav-panduan">
                                        <a class="page-scroll" href="{{url('/panduan')}}">Guide</a>
                                    </li>
                                    <li class="nav-item" id="nav-participate">
                                        <a class="page-scroll" href="{{url('/participate')}}">Participate</a>
                                    </li>
                                    <li class="nav-item coming">
                                        <img src="{{asset('')}}assets/img/comingsoon.png" alt="Logo" style="position:absolute;z-index: -1;margin-left: 40px">
                                        <a class="page-scroll" href="#">Voting</a>
                                    </li>
                                    <li class="nav-item coming">
                                        <img src="{{asset('')}}assets/img/comingsoon.png" alt="Logo" style="position:absolute;z-index: -1;margin-left: 40px">
                                        <a class="page-scroll" href="#">Judges</a>
                                    </li>
                                    <li class="nav-item coming">
                                        <img src="{{asset('')}}assets/img/comingsoon.png" alt="Logo" style="position:absolute;z-index: -1;margin-left: 40px">
                                        <a class="page-scroll" href="#">Recap</a>
                                    </li>
                                    @if(Session::get('loginStatus') == TRUE)
                                    <li class="nav-item dropdown align-self-center">
                                        <a class=" btn nav-link p-0 mr-3 text-left" data-toggle="dropdown" href="#" aria-expanded="false">
                                            <div>
                                                <b>Hi, {{Session::get('name_employee')}}</b>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="nav-link dropdown-item" role="button" href="logout" id="btnLogout">
                                                <div class="row align-items-center">
                                                    <div class="col-2">
                                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                    </div>
                                                    <div class="col-10" style="color: #3070e7">
                                                        Logout
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- <a class="page-scroll" href="#">Hi, {{Session::get('name_employee')}}</a> -->
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="{{url('/login')}}">
                                            Login
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
    </header>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <div class="modal fade" id="showNotifModalKuesioner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <h5 id="msg_notif_kuesioner" class="text-center">Notification</h5>

                </div>
                <div class="modal-footer" id="modal-footerq">
                    <button type="button" class="btn" data-dismiss="modal" id="btn_oke_kuesioner">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalWoi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content" style="background-color: white !important;">
                <div class="modal-header">
                    <!-- <h4 class="modal-title">Success Modal</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 id="msg_loading" class="text-center"> <i class="fas fa-sync-alt fa-spin"></i>Now Loading</h3>
                    </div>

                </div>
                <div class="modal-footer" id="modal-footerq">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showNotifModalThank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body text-center">
                    <div class="h2 my-4">Terima kasih telah mengisi <span id='type-form'>survei</span></div>
                    <div class="h6">
                        Terima kasih banyak atas tanggapan Anda. Kami sangat menghargai itu. Informasi Anda sangat penting bagi kami. Data berhasil diinput.
                    </div>
                </div>
                <div class="modal-footer" id="modal-footerq">
                    <button type="button" class="btn" data-dismiss="modal" id="btn_oke_kuesioner">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    
    <!-- JQUERY STEP -->
    <script src="{{asset('')}}assets/js/jquery/jquery.min.js"></script>
    @stack('custom-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="{{asset('')}}assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <!-- <script src="{{asset('')}}assets/js/popper.min.js"></script> -->
    <script src="{{asset('')}}assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!--====== Plugins js ======-->
    <script src="{{asset('')}}assets/js/plugins.js"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('')}}assets/js/slick.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('')}}assets/js/ajax-contact.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('')}}assets/js/waypoints.min.js"></script>
    <script src="{{asset('')}}assets/js/jquery.counterup.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('')}}assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('')}}assets/js/jquery.easing.min.js"></script>
    <script src="{{asset('')}}assets/js/scrolling-nav.js"></script>
    
    <!--====== wow js ======-->
    <script src="{{asset('')}}assets/js/wow.min.js"></script>
     <!--====== Particles js ======-->
     <script src="{{asset('')}}assets/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('')}}assets/js/main.js"></script>

    <!-- Select2 -->
    <script src="{{asset('')}}assets/css/select2/js/select2.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('')}}assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function showNotifKuesioner(message) {
            $('#msg_notif_kuesioner').html(message);
            $('#showNotifModalKuesioner').modal('show');
            $('#btn_oke_kuesioner').click(function() {
                $('#showNotifModalKuesioner').modal('hide');
                // action();
            });
        }

        function showNotifTerimakasih(message) {
            $('#type-form').html(message);
            $('#showNotifModalThank').modal('show');
            $('#btn_oke_kuesioner').click(function() {
                $('#showNotifModalThank').modal('hide');
                action();
            });
        }

        function showLoading() {
            $('#myModalWoi').modal('show');
        }

        function hideLoading() {
            $('#myModalWoi').modal('hide');
        }
    </script>
    </body>
</html>