<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>@yield('title', 'ADHIZ | XX')</title>
    
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="nocache, no-store, max-age=0, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--====== Favicon Icon ======-->
    <link rel="icon" href="{{asset('')}}assets/img/adhi-z-resize-1.png" type="image/icon type">
        
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
    
    

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  
    @stack('custom-script')
    
    <!-- JQUERY STEP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <!--====== Jquery js ======-->
    <!-- <script src="assets/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="{{asset('')}}assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{asset('')}}assets/js/popper.min.js"></script>
    <script src="{{asset('')}}assets/js/bootstrap.min.js"></script>
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
    
</html>