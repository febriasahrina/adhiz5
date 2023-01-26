@extends('layouts.master')
@section('title', 'ADHIZ - Participate')

<!--====== Participate CSS ======-->
<!-- <link rel="stylesheet" href="assets/css/participate.css"> -->
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
                                1.	Insan ADHI maksimal usia 35 tahun per 11 maret 2023 <br>
                                2.	Peserta adalah individu ataupun tim dengan maksimal anggota sebanyak 3 (tiga) orang <br>
                                3.	Materi diunggah dalam format Power Point (pptx) dan terdapat video penjelasan dengan maksimal durasi 10 menit <br>
                                4.	Mengisikan data secara benar dan lengkap <br>
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
                                5.	Materi <b>tidak dapat</b> direvisi setelah tenggat waktu penutupan <i>submission</i> <br>
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
                                3.	Materi <b>tidak dapat</b> direvisi setelah tenggat waktu penutupan <i>submission</i> <br>
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
                                3. Jika peserta adalah tim, maka sesi paparan materi dipresentasikan oleh hanya 1 (satu) orang yang telah ditetapkan oleh masing-masing tim. Namun, pada sesi diskusi atau tanya jawab, <b>seluruh anggota tim</b> dapat memberikan tanggapannya. <br>
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