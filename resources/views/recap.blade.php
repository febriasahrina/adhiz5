@extends('layouts.master')
@section('title', 'ADHIZ - Recap')

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
    .check{
        display: none;
    }
</style>

@push('custom-css')

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('')}}assets/fonts/icomoon/style.css">

<link rel="stylesheet" href="{{asset('')}}assets/css/owl.carousel.min.css">

<link rel="stylesheet" href="{{asset('')}}assets/css/animate.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="{{asset('')}}assets/css/carousel.css">

<link rel="stylesheet" href="{{asset('')}}assets/css/carousel-page.css">
@endpush

@section('content')
        <div class="content">
            <div class="site-blocks-cover">
                <div class="img-wrap">
                    <div class="owl-carousel slide-one-item hero-slider" onchange="slide()">
                        <div class="slide" id="slide_inner">
                            <img src="{{asset('')}}assets/documentary/best-performance-res.jpg" alt="Best Idea">  
                        </div>
                        <div class="slide" id="slide_inner">
                            <img src="{{asset('')}}assets/documentary/best-idea-res.jpg" alt="Penyerahan plakat kepada Prof. SIDHARTA UTAMA PhD CA CFA">  
                        </div>
                        <div class="slide" id="slide_inner">
                            <img src="{{asset('')}}assets/documentary/plakat-1-res.jpg" alt="Penyerahan plakat kepada Ibrahim Arsyad, Ir. MT. DR (Cand.)">  
                        </div>
                        <div class="slide" id="slide_inner">
                            <img src="{{asset('')}}assets/documentary/plakat-2-res.jpg" alt="Best Performance">  
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto align-self-center">
                            <div class="intro">
                            <div>
                                <h1 class="text-white font-weight-bold">Highlight</h1>
                            </div>
                            <div class="text sub-text">
                                <h3 class="text-white" id="text-highlight">Best Performance ADHI Z</h3>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- END .site-blocks-cover -->
        </div>

        <div class="content">
            <div class="container">
                <div class="heading">
                    <h1 class="text-white font-weight-bold">Video Highlight</h1>
                </div>
                <!-- <video src="{{asset('')}}assets/documentary/video/HIGHLIGHT.mp4" width="100%" height="100%" autoplay controls></video> -->
                <iframe src="https://drive.google.com/file/d/1rkEEa_I6xqqvkLqkiEMz0U9wmNf700g7/preview" width="100%" height="100%"></iframe>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="heading">
                    <h1 class="text-white font-weight-bold">Dokumentasi</h1>
                </div>

            <div class="d-flex carousel-nav">
                <a href="#" class="col active">Kegiatan</a>
                <a href="#" class="col">Peserta</a>
                <a href="#" class="col">Penonton</a>
            </div>


            <div class="owl-carousel owl-1">

                <!-- Gallery -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-1-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-2-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-3-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-4-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-5-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-6-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-7-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-8-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-9-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-10-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-11-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-12-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-13-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-14-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-15-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-16-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-17-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-18-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>
                </div>
                <!-- Gallery -->

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-1-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-1a-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-2-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-2a-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-3-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-3a-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-4-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-4a-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-5-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/img-peserta-5a-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/best-1-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/best-2-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-1-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-2-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-3-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-4-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-5-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-6-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-8-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-9-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-10-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-11-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-12-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('')}}assets/documentary/santai/santai-13-res.jpg"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />
                    </div>
                </div>

                

            </div>
            </div>
        </div>
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            @include('layouts.footer2')
        </div>
    </footer>
@endsection
    
    @push('custom-script')
    <script src="{{asset('')}}assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('')}}assets/js/popper-carousel.min.js"></script>
    <script src="{{asset('')}}assets/js/bootstrap-carousel.min.js"></script>
    <script src="{{asset('')}}assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('')}}assets/js/main-carousel.js"></script>
    <script src="{{asset('')}}assets/js/main-carousel-page.js"></script>
    <script>
        function slide() {
            var currents = document.getElementsByClassName("checkActive");
            var current = currents[0];
            if (current != undefined)
            {
                if (current.classList.contains('owl-item'))
                {
                    let tagImg = current.getElementsByTagName("img")[0];
                    document.getElementById("text-highlight").innerHTML = tagImg.alt;
                }
            }
        }
    </script>
    @endpush