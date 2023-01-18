@extends('layouts.master')
@section('title', 'ADHIZ - Participate')

<!--====== Participate CSS ======-->
<link rel="stylesheet" href="assets/css/participate.css">
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
    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card card-body" style="border-radius: 20px">
                    <div class="media col-md-10 col-lg-8 col-xl-7 p-0 my-4 mx-auto">
                        <img src="{{asset('')}}assets/img/profile_picture.png" alt class="d-block ui-w-100 rounded-circle">
                        <div class="media-body ml-5">
                            @if(Session::get('loginStatus') == TRUE)
                            <h4 class="font-weight-bold mb-4">{{Session::get('name_employee')}}</h4>
                            @else
                            <h4 class="font-weight-bold mb-4">John Doe</h4>
                            @endif
                            <div class="text-muted mb-4">
                            Lorem ipsum dolor sit amet, nibh suavitate qualisque ut nam. Ad harum primis electram duo, porro principes ei has.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <!-- </section>
    </div>
    <section id="features" class="services-area"> -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="card card-body">
                    <form action="">
                        <div id="wizard">
                            <!-- SECTION 1 -->
                            <h4></h4>
                            <section>
                                <h5>Silahkan Pilih Jenis Kepesertaan Anda</h5>
                                <br>
                                <select class="form-control" id="selectJenisKepersetaan" onchange="selectJenisKepersetaanChange()">
                                    <option selected="selected" disabled>Pilih Jenis Kepersetaan</option>
                                    <option value="individu">Individu</option>
                                    <option value="group">Group</option>
                                </select>
                            </section>
                            <h4></h4>
                            <section>
                                <div id="group">
                                    <div class="cardx mx-2 mb-4">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Leader</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan NPP Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('npp')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('name_employee')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Unit Kerja Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('department')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" class="form-control" placeholder="Masukkan Email Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('email')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="cardx mx-2 mb-4">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Tim 1</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan NPP Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Unit Kerja Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" class="form-control" placeholder="Masukkan Email Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP Tim 1 ">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="cardx mx-2">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Tim 2</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan NPP Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Unit Kerja Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" class="form-control" placeholder="Masukkan Email Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP Tim 2">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>
                                </div>

                                <div id="individu">
                                    <div class="cardx mx-2 mb-4">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Individu</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan NPP Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('npp')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama Anda" 
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('name_employee')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Unit Kerja Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('department')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" class="form-control" placeholder="Masukkan Email Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('email')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </section> <!-- SECTION 2 -->
                            <h4></h4>
                            <section>
                                <div class="card-body">
                                    <div class="cardx mx-2 mb-4">
                                        <div class="card-body">
                                            <table id="table-pasar" class="table table-borderless table-hover">
                                                <tr>
                                                    <th style="width: 22%;">
                                                        <label>Judul Ide</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control" placeholder="Masukkan Judul Ide">
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <label>Deskripsi</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <textarea class="form-control">Masukkan Deskripsi Ide</textarea>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </section> <!-- SECTION 3 -->
                            <h4></h4>
                            <section>
                            <div class="card-body">
                                <div class="cardx mx-2 mb-4">
                                    <div class="card-body">
                                        <table id="table-pasar" class="table table-borderless table-hover">
                                            <tr>
                                                <th>
                                                    <label>File Materi (ppt)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="file" class="form-control" id="customFile" />
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Link Video</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <textarea class="form-control">Masukkan Link Video</textarea>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <!-- <div class="product">
                                    <div class="item">
                                        <div class="left"> <a href="#" class="thumb"> <img src="https://i.imgur.com/yYu3Hbl.jpg" alt=""> </a>
                                            <div class="purchase">
                                                <h6> <a href="#">Macbook Air Laptop</a> </h6> <span>x1</span>
                                            </div>
                                        </div> <span class="price">$290</span>
                                    </div>
                                    <div class="item">
                                        <div class="left"> <a href="#" class="thumb"> <img src="https://www.businessinsider.in/thumb/msid-70101317,width-600,resizemode-4,imgsize-87580/tech/ways-to-increase-mobile-phone-speed/13d0e0722dbca5aa91e16a8ae2a744e5.jpg" alt=""> </a>
                                            <div class="purchase">
                                                <h6> <a href="#">Mobile Phone Mi</a> </h6> <span>x1</span>
                                            </div>
                                        </div> <span class="price">$124</span>
                                    </div>
                                </div>
                                <div class="checkout">
                                    <div class="subtotal"> <span class="heading">Subtotal</span> <span class="total">$364</span> </div>
                                </div> -->
                            </section> <!-- SECTION 4 -->
                            <h4></h4>
                            <section>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                </svg>
                                <p class="success">Insert Data success</p>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <section>
    <footer id="footer" class="footer-area pt-120">
    <div class="container">
        @include('layouts.footer2')
    </div>
</footer>
</div>


@push('custom-script')
    <script type='text/javascript'>$(function(){
        var element = document.getElementById("nav-participate");
        element.classList.add("active");

        $("#wizard").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            transitionEffectSpeed: 500,
            onStepChanging: function (event, currentIndex, newIndex) { 
                if ( newIndex === 1 ) {
                    $('.steps ul').addClass('step-2');
                } else {
                    $('.steps ul').removeClass('step-2');
                }
                if ( newIndex === 2 ) {
                    $('.steps ul').addClass('step-3');
                } else {
                    $('.steps ul').removeClass('step-3');
                }

                if ( newIndex === 3 ) {
                    $('.steps ul').addClass('step-4');
                } else {
                    $('.steps ul').removeClass('step-4');
                }
                
                if ( newIndex === 4 ) {
                    $('.steps ul').addClass('step-5');
                } else {
                    $('.steps ul').removeClass('step-5');
                    $('.actions ul').removeClass('step-last');
                }
                return true; 
            },
            labels: {
                finish: "Done",
                next: "Next",
                previous: "Previous"
            }
        });
        // Custom Steps Jquery Steps
        $('.wizard > .steps li a').click(function(){
            $(this).parent().addClass('checked');
            $(this).parent().prevAll().addClass('checked');
            $(this).parent().nextAll().removeClass('checked');
        });
        // Custom Button Jquery Steps
        $('.forward').click(function(){
            $("#wizard").steps('next');
        })
        $('.backward').click(function(){
            $("#wizard").steps('previous');
        })
        // Checkbox
        $('.checkbox-circle label').click(function(){
            $('.checkbox-circle label').removeClass('active');
            $(this).addClass('active');
        })
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