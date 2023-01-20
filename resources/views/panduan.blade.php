@extends('layouts.master')
@section('title', 'ADHIZ - Participate')

<!--====== Participate CSS ======-->
<!-- <link rel="stylesheet" href="assets/css/participate.css"> -->
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@push('custom-css')


<style>
    ::-webkit-scrollbar {
        width: 8px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
        
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888; 
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }

    .ui-w-100 {
        width: 100px !important;
        height: auto;
    }

    .cardx{
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    }
</style>
@endpush

@section('content')
<div id="home" class="header-hero bg_cover" style="background-image: url({{asset('')}}assets/img/banner-bg.svg)">
    <section id="features" class="services-area pt-150">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                <div class="container pb-20">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="counter-wrapper mt-10 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="section-title">
                                    <div class="line"></div>
                                    <h3 class="title">Syarat <span> Pendaftaran</span></h3>
                                </div> <!-- section title -->
                                <br>
                                <p class="text">
                                1.	Insan ADHI <br>
                                2.	Peserta adalah individu ataupun tim dengan maksimal anggota sebanyak 3 (tiga) orang <br>
                                3.	Materi diunggah dalam format Power Point (pptx) dan terdapat video penjelasan dengan maksimal durasi 10 menit <br>
                                4.	Mendaftarkan diri ataupun tim-nya melalui <a href="https://mobile.adhi.co.id/adhiz/adhiz5/"><ul>mobile.adhi.co.id/adhiz/adhiz5<ul></a> sebelum tenggat waktu yang telah ditentukan <br>
                                5.	Mengisikan data secara benar dan lengkap <br>
                                </p>
                                <br>
                            </div> <!-- about content -->
                        </div>
                        <div class="col-lg-6">
                            <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{asset('')}}assets/img/overview1.jpg" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </div>
    </section>
    
    <section id="features" class="services-area pt-40">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                <div class="container pb-20">
                    <div class="row">
                        <div class="col-lg-6 order-lg-last">
                            <div class="counter-wrapper mt-10 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="section-title">
                                    <div class="line"></div>
                                    <h3 class="title">Panduan <span> Penyusunan Materi</span></h3>
                                </div> <!-- section title -->
                                <br>
                                <p class="text">
                                1.	Maksimal materi dibuat dalam 10 slide <br>
                                2.	Format yang diunggah adalah ppt atau pptx <br>
                                3.	Tidak perlu menggunakan animation atau transition <br>
                                4.	Materi presentasi mencakup seluruh poin-poin pokok yang telah ditentukan <a href='{{asset('')}}assets/files/PanduanPenyusunanMateri.pdf' role="button" target="_blank">(link download)</a> <br>
                                5.	Materi tidak dapat direvisi setelah tenggat waktu penutupan submission <br>
                                </p>
                                <br>
                            </div> <!-- about content -->
                        </div>
                        <div class="col-lg-6 order-lg-first">
                            <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{asset('')}}assets/img/ppt.jpg" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </div>
    </section>

    <!--====== REQUIREMENTS START ======-->

    <section id="facts" class="video-counter pt-30 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-wrapper mt-50 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="section-title">
                                <div class="line"></div>
                                <h3 class="title">Requirements</span></h3>
                            </div> <!-- section title -->
                            <p class="text">Materi presentasi yang diunggah mencakup seluruh poin-poin pokok yang telah ditentukan, yaitu :</p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="single-counter counter-color-1 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">01</span>
                                        <p class="text">Cover: Judul Project, Nama-Unit Kerja seluruh anggota</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-2 pl-2">
                                <div class="single-counter counter-color-2 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">02</span>
                                        <p class="text">Latar Belakang</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-2 pl-2">
                                <div class="single-counter counter-color-3 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">03</span>
                                        <p class="text">Analisa Masalah</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-2 pl-2">
                                <div class="single-counter counter-color-4 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">04</span>
                                        <p class="text">Solusi</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-2 pl-2">
                                <div class="single-counter counter-color-5 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">05</span>
                                        <p class="text">Indikator Keberhasilan Solusi</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                            <div class="col-2 pl-2">
                                <div class="single-counter counter-color-6 d-flex align-items-center justify-content-center">
                                    <div class="counter-items text-center">
                                        <span class="count">06</span>
                                        <p class="text">Dampak Keberhasilan</p>
                                    </div>
                                </div> <!-- single counter -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== REQUIREMENTS ENDS ======-->

    <section id="features" class="services-area pt-90">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                <div class="container pb-20">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="counter-wrapper mt-10 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="section-title">
                                    <div class="line"></div>
                                    <h3 class="title">Panduan <span> Penyusunan Video</span></h3>
                                </div> <!-- section title -->
                                <br>
                                <p class="text">
                                1.	Video menjelaskan ide solusi yang telah disusun secara lugas dengan maksimal durasi 10 menit <br>
                                2.	Format video yang diunggah adalah mp4 dengan maksimum 300mb <br>
                                3.	Materi tidak dapat direvisi setelah tenggat waktu penutupan submission <br>
                                </p>
                                <br>
                            </div> <!-- about content -->
                        </div>
                        <div class="col-lg-6">
                            <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{asset('')}}assets/img/video.jpg" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </div>
    </section>

    <section id="features" class="services-area pt-40">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                <div class="container pb-20">
                    <div class="row">
                        <div class="col-lg-6 order-lg-last">
                            <div class="counter-wrapper mt-10 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="section-title">
                                    <div class="line"></div>
                                    <h3 class="title">Panduan <span> Presentasi Final</span></h3>
                                </div> <!-- section title -->
                                <br>
                                <p class="text">
                                1.	Dihadiri seluruh peserta baik secara individu maupun tim, yang telah dinyatakan <b>lolos ke tahap presentasi final</b> <br>
                                2.	Presentasi dilakukan dihadapan dewan juri <br>
                                3.	Jika peserta adalah tim, maka saat sesi paparan materi, dipresentasikan oleh hanya 1 (satu) orang yang telah ditetapkan oleh masing-masing tim. Namun, pada sesi diskusi atau tanya jawab, seluruh anggota tim dapat memberikan tanggapannya. <br>
                                </p>
                                <br>
                            </div> <!-- about content -->
                        </div>
                        <div class="col-lg-6 order-lg-first">
                            <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{asset('')}}assets/img/overview2.jpg" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </div>
    </section>

    
    <footer id="footer" class="footer-area pt-120">
    <div class="container">
        @include('layouts.footer2')
    </div>
</footer>
</div>


@push('custom-script')
    <script type='text/javascript'>$(function(){
        var element = document.getElementById("nav-panduan");
        element.classList.add("active");
    })



    function selectJenisKepersetaanChange() {
        var x = document.getElementById("selectJenisKepersetaan").value;

        var elementGroup = document.getElementById("group");
        var elementIndividu = document.getElementById("individu");
        if (x === "individu") {
            elementIndividu.style.display = "block";
            elementGroup.style.display = "none";
        } else {
            elementIndividu.style.display = "none";
            elementGroup.style.display = "block";
        }
    }

    </script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>
@endpush