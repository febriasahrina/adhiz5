@extends('layouts.master')
@section('title', 'ADHIZ - Homepage')

<!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
@push('custom-css')

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
@endpush

@section('content')
    <div id="home" class="header-hero bg_cover" style="background-image: url({{asset('')}}assets/img/banner-bg.svg)">
        <div class="container">
            <!-- <div class="col-lg-4" style="margin-top:90px">
                    <img src="{{asset('')}}assets/img/adhi63thAdhi.png" alt="hero">
            </div> -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="header-hero-content text-center">
                        <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">ADHI - Z</h2>
                        <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Where Idea Grow and Blow</h3>
                        <!-- <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p> -->
                        <a href="{{url('/participate')}}" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s" style="height: 70px;width: 270px; font-size: 25px; font-weight: 500;">
                        <span style="margin-top: 10px;">Let's Participate</span></a>
                    </div> <!-- header hero content -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                        <img src="{{asset('')}}assets/img/adhi63thAdhi.png" alt="hero">
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- header hero -->

    <!--====== SERVICES PART START ======-->
    
    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <h2 class="title">About Us</span></h2>
                        <div class="line m-auto"></div>
                        <h3 class="title"><span> Kita percaya bahwa dimulai dari sebuah</span> ide <span>yang diberikan tempat untuk didengar, maka hal-hal besar bisa terwujud.</span></h3>
                        <br><h5>Oleh karena itu, ADHI-Z muncul sebagai wadah bagi Insan ADHI yang memiliki ide dalam bentuk solusi untuk memecahkan permasalahan yang telah menimbulkan kegusaran.</h5>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div>
    </section>
    <!--====== OVERFIEW FINAL STARTS ======-->
    
    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
        </div>
        <div class="container pb-40">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-wrapper mt-50 wow fadeIn pl-0" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Overview <span> Category</span></h3>
                        </div> <!-- section title -->
                        <br>
                        <p class="text">
                            Setiap perusahaan dalam menjalankan bisnisnya sangat berketerkaitan dengan masalah lingkungan (Environmental), sosial (Social), dan tata kelola (Governance) atau lebih dikenal dengan istilah ESG. 
                            Apa kepanjangan dari ESG dan maknanya? Simak yuk!
                        </p>
                        <br>
                        <p>ESG atau “Environmental, Social, and Governance” adalah seperangkat standar yang mengacu pada tiga kriteria utama dalam mengukur keberlanjutan (sustainability). 
                            ESG sering digunakan dalam bisnis sebagai key metric dalam membuat keputusan investasi dan juga berfungsi sebagai referensi bagi perusahaan untuk melaporkan pengaruh dari bisnis mereka. 
                            Akibatnya, ESG telah menjadi pertimbangan yang diakui secara global dalam membuat keputusan investasi dan semakin menjadi fokus agenda strategis dan operasional perusahaan-perusahaan.</p>
                        <!-- <a href="#" class="main-btn">Try it Free</a> -->
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('')}}assets/img/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{asset('')}}assets/img/services-shape-1.svg" alt="shape">
                            <i class="lni-grow"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Environment</a></h4>
                            <p class="text">Mencakup energi yang digunakan perusahaan dan limbah yang dibuangnya, sumber daya alam yang dibutuhkan, dan dampaknya bagi makhluk hidup. Paling tidak, E mencakup emisi karbon dan perubahan iklim. Setiap perusahaan menggunakan energi dan sumber daya alam; setiap perusahaan mempengaruhi, dan dipengaruhi oleh, lingkungan.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('')}}assets/img/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{asset('')}}assets/img/services-shape-2.svg" alt="shape">
                            <i class="lni-seo-consulting"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Social</a></h4>
                            <p class="text">Kriteria sosial, membahas hubungan yang dimiliki perusahaan dan reputasi yang dibangung dengan orang dan lembaga di lingkungan tempat perusahaan menjalankan bisnis. S didalamnya termasuk hubungan kerja & keberagaman dan inklusi. Setiap perusahaan menjalankan bisnisnya dalam masyarakat yang luas & beragam.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="{{asset('')}}assets/img/services-shape.svg" alt="shape">
                            <img class="shape-1" src="{{asset('')}}assets/img/services-shape-3.svg" alt="shape">
                            <i class="lni-construction"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Governance</a></h4>
                            <p class="text">Tata kelola, adalah sistem, kontrol, dan prosedur internal yang diterapkan perusahaan untuk mengatur dirinya sendiri, membuat keputusan yang efektif, mematuhi hukum, dan memenuhi kebutuhan stakeholder. Setiap perusahaan sejatinya merupakan produk hukum sehingga membutuhkan tata Kelola dalam pengoperasiannya.</p>
                            <!-- <a class="more" href="#">Learn More <i class="lni-chevron-right"></i></a> -->
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section class="services-area pt-30">
        <div class="about-shape-2">
            <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
        </div>
        <div class="container pb-30">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-services mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <p class="text">
                        Sama seperti ESG yang merupakan bagian tak terpisahkan dari cara suatu perusahaan menjalankan bisnisnya, elemen individualnya pun saling terkait.
                        </p>
                        <br>
                        <p>
                        Fokus kita seringkali pada kriteria lingkungan (E) dan sosial (S), tetapi tata kelola (G) tidak pernah dapat dipisahkan secara keseluruhan. 
                        Dikarenakan tata Kelola (G) tak hanya sekedar membutuhkan penguasaan pada konteks hukum, tetapi juga hal-hal seperti bagaimana mengantisipasi pelanggaran sebelum terjadi, 
                        atau memastikan transparansi dan dialog dengan regulator (seperti pemerintah ataupun kementerian) yang menjadi aktifitas rutin.
                        </p>
                        <br>
                        <p>
                        Para investor dan eksekutif menyadari bahwa ESG yang kuat dapat menjamin kesuksesan jangka panjang perusahaan, terlihat dari besarnya aliran investasi terhadap bisnis yang menerapkan ESG. 
                        Terbukti dari sejumlah penelitian yang dilakukan terhadap performa bisnis, memperhatikan masalah lingkungan, sosial, dan tata kelola (ESG) <b>tidak akan mengurangi keuntungan</b> —justru sebaliknya.
                        </p>
                        <br>
                        <p>
                        Menurut laporan kuartal yang diterbitkan Mc Kinsey pada tahun 2019, bisnis konstruksi berada pada posisi ketiga teratas sebagai bisnis yang bergantung besar pada keterlibatan pihak eksternal dan intervensi negara. 
                        Dalam konteks ADHI, kita sebagai perusahaan konstruksi BUMN akan bergantung pada regulasi harga yang ditetapkan terhadap bahan material , subsidi negara, pembebasan lahan dan lain sebagainya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ISU ISU STARTS ======-->
    
    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last">
                    <div class="mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Issues</h3>
                        </div> <!-- section title -->
                        <P>Beberapa isu atau permasalahan yang berada pada konteks ESG:</P>
                        <br>
                        <p class="text">
                            -	Menarik pelanggan B2B dan B2C dengan produk yang lebih sustainable <br>
                            -	Mencapai akses yang lebih baik ke sumber daya alam ataupun bahan baku produksi melalui hubungan masyarakat dan pemerintah yang lebih kuat <br>
                            -	Efisiensi sumber daya alam <br>
                            -	Konsumsi energi yang lebih rendah <br>
                            -	Meningkatkan dukungan investor, kementerian BUMN dan pemerintah <br>
                            -	Meningkatkan motivasi karyawan <br>
                            -	Menarik minat calon pegawai melalui kegiatan sosial perusahaan <br>
                            -	Mengalokasikan modal secara lebih baik dan bijak untuk jangka panjang (misalnya, pabrik dan peralatan yang sustainable) <br>
                            -	Hindari investasi yang mungkin tidak membayar karena masalah lingkungan jangka Panjang <br>
                            -	Memformulasi ulang produk, desain, proses kerja, proses manufaktur, mendesain ulang peralatan, ataupun mendaur ulang serta menggunakan kembali limbah dari produksi <br>
                        </p>
                        <!-- <a href="#" class="main-btn">Try it Free</a> -->
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('')}}assets/img/issue.jpg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ROAD MAP ENDS ======-->

    <section class="road-map pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="horizontal-timeline" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-title">
                        <div class="line"></div>
                        <h3 class="title">Road <span> Map</span></h3>
                    </div> <!-- section title -->
                <p class="text mt-2">
                <br>
                <h5>Time for Action</h5>
                <br>
                Dengan tantangan global yang menuntut kita untuk terus memiliki <b>ambisi dan inovasi seputar ESG, ADHI Z</b> hadir untuk mengajak Insan ADHI memberikan ide terbaik guna menjadi solusi 
                terhadap <b>isu ataupun permasalahan</b> yang dihadapi <b>ADHI saat ini maupun yang akan datang</b> agar kita menjadi perusahaan yang sustainable.
                </p>
                <p class="text" style="margin-bottom: 70px;">
                    <ul class="list-inline items">
                    <li class="list-inline-item items-list">
                        <div class="px-2">
                        <div class="event-date badge bg-info" style="color : white;">20 Jan - 1 Feb</div>
                        <h5 class="pt-2">Submission</h5>
                        <!-- <p class="text-muted">Informasi Kegiatan</p> -->
                        <!-- <div>
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        </div> -->
                        </div>
                    </li>
                    <li class="list-inline-item items-list">
                        <div class="px-2">
                        <div class="event-date badge bg-warning" style="color : white;">11 Februari</div>
                        <h6 class="pt-2">Pengumuman Tahap 1</h6>
                        <!-- <p class="text-muted">Pengumuman Tahap 1</p> -->
                        <!-- <div>
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        </div> -->
                        </div>
                    </li>
                    <li class="list-inline-item items-list">
                        <div class="px-2">
                        <div class="event-date badge bg-secondary" style="color : white;">13 - 15 Februari</div>
                        <h5 class="pt-2">Feedback</h5>
                        <!-- <p class="text-muted">Presentasi</p> -->
                        <!-- <div>
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        </div> -->
                        </div>
                    </li>
                    <li class="list-inline-item items-list">
                        <div class="px-2">
                        <div class="event-date badge bg-danger" style="color : white;">23 Februari</div>
                        <h5 class="pt-2">Penjurian Final</h5>
                        <!-- <p class="text-muted">Pengumuman Final</p> -->
                        <!-- <div>
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        </div> -->
                        </div>
                    </li>
                    <li class="list-inline-item items-list">
                        <div class="px-2">
                        <div class="event-date badge bg-danger" style="color : white;">Acara Puncak HUT</div>
                        <h5 class="pt-2">Pengumuman Final</h5>
                        <!-- <p class="text-muted">Pengumuman Final</p> -->
                        <!-- <div>
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        </div> -->
                        </div>
                    </li>
                    </ul>
                </p>
            </div>
        
            </div>
        </div>
    
    </div>
</section>

    
    <!--====== SERVICES PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="section-title pb-5">
                    <div class="line"></div>
                    <h3 class="title">Winner <span> Category</span></h3>
                </div> <!-- section title -->
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-8">
                        <img class="shape" src="{{asset('')}}assets/img/first.png" alt="shape">
                        <br>
                        <h5 class="text-center">1st Place</h5>
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-8">
                        <img class="shape" src="{{asset('')}}assets/img/second.png" alt="shape">
                        <br>
                        <h5 class="text-center">2nd Place</h5>
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-8">
                        <img class="shape" src="{{asset('')}}assets/img/third.png" alt="shape">
                        <br>
                        <h5 class="text-center">3rd Place</h5>
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-8">
                        <img class="shape" src="{{asset('')}}assets/img/favorite.png" alt="shape">
                        <br>
                        <h5 class="text-center">Favorite Place</h5>
                    </div>
                    
                 </div> <!-- row -->
            </div> <!-- subscribe area -->
            @include('layouts.footer')
        </div> <!-- container -->
    </footer>

    @push('custom-script')
    <script>
        var element = document.getElementById("nav-home");
        element.classList.add("active");
    </script>
    @endpush