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
                            <a href="{{url('/participate')}}" class="succ-btn">
                            <span>Sudah Mendaftar</span></a>

                            <a href="{{url('/participate')}}" class="warn-btn">
                            <span>Belum Mendaftar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <form method="post" action="insert-file" enctype="multipart/form-data">
                {{csrf_field()}}
                <tr>
                    <th>
                        <label>File Materi (ppt)</label>
                        <span class="text-danger">*</span>
                    </th>
                    <th>
                        <input type="file" class="form-control" name="filenames[]" />
                    </th>
                </tr>
                <button type="submit" class="btn btn-success w-100 p-3" style="margin-top:10px">Submit</button>
            </form> -->
        </div>
        <br>
    <!-- </section>
    </div>
    <section id="features" class="services-area"> -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="card card-body">
                    <form action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="wizard">
                            <!-- SECTION 1 -->
                            <h4></h4>
                            <section id="section-kepesertaan">
                                <h5>Silahkan Pilih Jenis Kepesertaan Anda</h5>
                                <br>
                                <select class="form-control" id="selectJenisKepersetaan" name="selectJenisKepersetaan" onchange="selectJenisKepersetaanChange()">
                                    <option selected="selected" disabled>Pilih Jenis Kepersetaan</option>
                                    <option value="individu">Individu</option>
                                    <option value="group">Tim</option>
                                </select>
                                <div id="jlh-anggota" style="display: none" class="pt-5">
                                    <h5>Silahkan Pilih Jumlah Anggota</h5>
                                    <br>
                                    <select class="form-control" id="selectJumlahAnggota" name="selectJumlahAnggota" onchange="selectJumlahAnggotaChange()">
                                        <option selected="selected" disabled>Pilih Jumlah Anggota</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
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
                                                    <input type="text" id="inputNpp1" class="form-control" placeholder="Masukkan NPP Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('npp')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNama1" class="form-control" placeholder="Masukkan Nama Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('name_employee')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputUnitKerja1" class="form-control" placeholder="Masukkan Unit Kerja Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('department')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" id="inputEmail1" class="form-control" placeholder="Masukkan Email Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('email')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNoHp1" class="form-control" placeholder="Masukkan Nomor HP">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="cardx mx-2 mb-4" id="form-tim1" style="display: none">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Anggota 1</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNpp2" class="form-control" placeholder="Masukkan NPP Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNama2" class="form-control" placeholder="Masukkan Nama Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputUnitKerja2" class="form-control" placeholder="Masukkan Unit Kerja Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" id="inputEmail2" class="form-control" placeholder="Masukkan Email Tim 1 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNoHp2" class="form-control" placeholder="Masukkan Nomor HP Tim 1 ">
                                                </th>
                                            </tr>

                                            
                                            </table>
                                        <div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="cardx mx-2" id="form-tim2" style="display: none">
                                        <div class="card-body">
                                            <table id="table-group" class="table table-borderless table-hover">
                                            <tr>
                                            <h5><i>Anggota 2</i></h5>
                                            <br>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 22%;">
                                                    <label>NPP</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNpp3" class="form-control" placeholder="Masukkan NPP Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNama3" class="form-control" placeholder="Masukkan Nama Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputUnitKerja3" class="form-control" placeholder="Masukkan Unit Kerja Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" id="inputEmail3" class="form-control" placeholder="Masukkan Email Tim 2 Anda">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNoHp3" class="form-control" placeholder="Masukkan Nomor HP Tim 2">
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
                                                    <input type="text" id="inputNppIndividu" class="form-control" placeholder="Masukkan NPP Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('npp')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Nama </label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNamaIndividu" class="form-control" placeholder="Masukkan Nama Anda" 
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('name_employee')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Unit Kerja</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputUnitKerjaIndividu" class="form-control" placeholder="Masukkan Unit Kerja Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('department')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" id="inputEmailIndividu" class="form-control" placeholder="Masukkan Email Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('email')}}" disabled @endif>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>No HP (WA)</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="text" id="inputNoHpIndividu" class="form-control" placeholder="Masukkan Nomor HP">
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
                                                        <label>Nama Tim</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <input type="text" id="inputNamaTim" class="form-control" placeholder="Masukkan Nama Tim">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <label>Judul Ide</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <input type="text" id="inputJudulIde" class="form-control" placeholder="Masukkan Judul Ide">
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <label>Deskripsi</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <textarea class="form-control" id="inputDeskripsi" placeholder="Masukkan Deskripsi Ide"></textarea>
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
                                            <form method="post" action="insert-file" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <tr>
                                                    <th>
                                                        <label>File Materi (ppt)</label>
                                                        <span class="text-danger">*</span>
                                                    </th>
                                                    <th>
                                                        <input type="file" class="form-control" name="filenames[]" />
                                                    </th>
                                                </tr>
                                                <button type="submit" class="btn btn-success w-100 p-3" style="margin-top:10px">Submit</button>
                                            </form>
                                            <tr>
                                                <th>
                                                    <label>Link Video</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <textarea class="form-control" placeholder="Masukkan Link Video"></textarea>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </section> <!-- SECTION 4 -->
                            <h4></h4>
                            <section>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                </svg>
                                <br>
                                <p class="success">Data berhasil diinput</p>
                                <br>
                                <p>Terima kasih telah berpartisipasi dalam kompetisi ADHI Z</p>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function submitData() {
            var objEmp = {};
            var objUpload = {};

            objEmp["jenisKepesertaan"] =  $('select[name=selectJenisKepersetaan] option').filter(':selected').val();

            if (objEmp["jenisKepesertaan"] == "individu")
            {
                objEmp["npp_individu"] = $("#inputNppIndividu").val();
                objEmp["nama_individu"] = $("#inputNamaIndividu").val();
                objEmp["unit_kerja_individu"] = $("#inputUnitKerjaIndividu").val();
                objEmp["email_individu"] = $("#inputEmailIndividu").val();
                objEmp["no_hp"] = $("#inputNoHpIndividu").val();
                objEmp["status_tim"] = 'leader';
            }

            else
            {
                objEmp["group"] = objEmp["group"] || [];
                var jumlahAnggota = parseInt(document.getElementById("selectJumlahAnggota").value);

                for (var x = 1; x < jumlahAnggota+2; x++) {
                    if (x == 1)
                    {
                        var object = {
                            "npp" : $("#inputNpp"+x).val(),
                            "nama" : $("#inputNama"+x).val(),
                            "unit_kerja" : $("#inputUnitKerja"+x).val(),
                            "email" : $("#inputEmail"+x).val(),
                            "no_hp" : $("#inputNoHp"+x).val(),
                            "status_tim" : 'leader',
                        }
                    }
                    else
                    {
                        var object = {
                            "npp" : $("#inputNpp"+x).val(),
                            "nama" : $("#inputNama"+x).val(),
                            "unit_kerja" : $("#inputUnitKerja"+x).val(),
                            "email" : $("#inputEmail"+x).val(),
                            "no_hp" : $("#inputNoHp"+x).val(),
                            "status_tim" : 'member',
                        }
                    }
                    objEmp["group"].push(object);
                }
            }

            objEmp["nama_tim"] = $("#inputNamaTim").val();
            objEmp["judul_ide"] = $("#inputJudulIde").val();
            objEmp["deskripsi_ide"] = $("#inputDeskripsi").val();
            // objEmp["upload_file"] = $("#upload_file").val();

            var formData = new FormData()
            
            var files = $('#upload_file')[0].files;
            formData.append('file', files[0])
            // objUpload["upload_file"] = files[0];

            console.log(formData);
            // var datas = new FormData($('input[name^="upload_file"]'));     
            //     jQuery.each($('input[name^="upload_file"]')[0].files, function(i, file) {
            //         datas.append(i, file);
            // });

            // var datas = new FormData(document.getElementById("upload_file"));

            var notMandatory = [];

            var arrEmptyData = [];
            let shouldSkip = false;

            $.each(objEmp, function(key, value) {
                if (value == "" || value == key) {
                    if (!notMandatory.includes(key)) {
                        strEmpty = key.replace(/[ *_#]/g, ' ');
                        arrEmptyData.push(strEmpty);
                    }
                }
            })

            // if(objEmp["npwp"]!="" && (objEmp["npwp"].length<19 || objEmp["npwp"].length>20))
            // {
            //     showNotifKuesioner("Silahkan masukkan data NPWP dengan benar!", null);
            // }
            // else if((objEmp["email"]!="" && !validateEmail(objEmp["email"])) || (objEmp["email_pengisi"]!="" && !validateEmail(objEmp["email_pengisi"])))
            // {
            //     showNotifKuesioner("Silahkan masukkan data Email dengan benar!", null);
            // }
            if(arrEmptyData.length != 0)
            {
                showNotifKuesioner("Silahkan isi data " + arrEmptyData.join(', ') + "!", null);
            }
            else{
                showLoading();

                $.ajax({
                    type: 'POST',
                    url: '/insert-file',
                    data: formData,
                    processData: false,
                    // contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.data.message);
                        if (data.data.message == 'Insert Data Berhasil.') {
                            setTimeout(hideLoading, 1000);
                            showNotifTerimakasih(data.data.type);
                        } else {
                            showNotifKuesioner(data.data.message + "!", null);
                        }
                    }
                });
            }
            }

        $("#wizard").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            transitionEffectSpeed: 500,
            onStepChanging: function (event, currentIndex, newIndex) { 
                console.log(newIndex);
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
                    // submitData();
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
        var elementAnggota = document.getElementById("jlh-anggota");
        if (x === "individu") {
            elementIndividu.style.display = "block";
            elementGroup.style.display = "none";
            elementAnggota.style.display = "none";
        } else {
            elementIndividu.style.display = "none";
            elementGroup.style.display = "block";
            elementAnggota.style.display = "block";
        }
    }

    function selectJumlahAnggotaChange() {
        var x = document.getElementById("selectJumlahAnggota").value;

        var elementInput1 = document.getElementById("form-tim1");
        var elementInput2 = document.getElementById("form-tim2");

        if (x == 1) {
            elementInput1.style.display = "block";
            elementInput2.style.display = "none";
        } else {
            elementInput1.style.display = "block";
            elementInput2.style.display = "block";
        }
    }

    </script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>
@endpush