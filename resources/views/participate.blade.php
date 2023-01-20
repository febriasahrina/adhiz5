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
                            <a href="" class="succ-btn" id="sudah_mendaftar" style="display : none">
                            <span>Sudah Mendaftar</span></a>

                            <a href="" class="warn-btn" id="belum_mendaftar" style="display : none">
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
            <div class="row justify-content-center" id="form_utama">
                <div class="card card-body">
                    <form action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php

                            $saveData = "";
                            $emailPendaftar = "";
                            $uploadPpt = "";
                            $uploadVideo = "";

                            if(Session::get('save-data'))
                            {
                                $saveData = Session::get('save-data');
                            }

                            if(Session::get('email'))
                            {
                                $emailPendaftar = Session::get('email');
                            }

                            if(Session::get('upload-ppt'))
                            {
                                $uploadPpt = Session::get('upload-ppt');
                            }

                            if(Session::get('upload-video'))
                            {
                                $uploadVideo = Session::get('upload-video');
                            }
                        ?>
                        <div id="wizard">
                            <!-- SECTION 1 -->
                            <h4></h4>
                            <section id="section-kepesertaan">
                                <h5>Silahkan Pilih Jenis Kepesertaan Anda</h5>
                                <br>
                                <select class="form-control" id="selectJenisKepersetaan" name="selectJenisKepersetaan" onchange="selectJenisKepersetaanChange()">
                                    <option selected="selected" value="null" disabled>Pilih Jenis Kepersetaan</option>
                                    <option value="individu">Individu</option>
                                    <option value="group">Tim</option>
                                </select>
                                <div id="jlh-anggota" style="display: none" class="pt-5">
                                    <h5>Silahkan Pilih Jumlah Anggota</h5>
                                    <br>
                                    <select class="form-control" id="selectJumlahAnggota" name="selectJumlahAnggota" onchange="selectJumlahAnggotaChange()">
                                        <option selected="selected" value="null" disabled>Pilih Jumlah Anggota</option>
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
                                                    <input type="number" id="inputNoHp1" class="form-control" placeholder="Masukkan Nomor HP">
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
                                                    <input type="number" id="inputNoHp2" class="form-control" placeholder="Masukkan Nomor HP Tim 1 ">
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
                                                    <input type="number" id="inputNoHp3" class="form-control" placeholder="Masukkan Nomor HP Tim 2">
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
                                                    <input type="number" id="inputNoHpIndividu" class="form-control" placeholder="Masukkan Nomor HP">
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
                            </form>
                            <h4></h4>
                            <section>
                            <div class="card-body">
                                <div class="cardx mx-2 mb-4">
                                    <div class="card card-body">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                            
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Whoops!</strong> Upload Gagal.
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form method="post" action="insert-file/ppt" enctype="multipart/form-data" id="upload-ppt">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <tr>
                                                        <th>
                                                            <label>File Materi (ppt)</label>
                                                            <span class="text-danger">*</span>
                                                        </th>
                                                        <th>
                                                            <input type="file" class="form-control" name="file" accept=".pptx" />
                                                            @if(Session::get('upload-ppt') == TRUE)
                                                            <span>{{Session::get('upload-ppt')}}</span>@endif
                                                        </th>
                                                    </tr>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="submit" id="submit-ppt" class="btn btn-success w-100" style="margin-top:30px">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form method="post" action="insert-file/video" enctype="multipart/form-data" id="upload-video" class="pt-3">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <tr>
                                                        <th>
                                                            <label>File Video (max: 300mb)</label>
                                                            <span class="text-danger">*</span>
                                                        </th>
                                                        <th>
                                                            <input type="file" class="form-control" id="input-video" accept=".mp4" name="video" disabled />
                                                            @if(Session::get('upload-video') == TRUE)
                                                            <span>{{Session::get('upload-video')}}</span>@endif
                                                        </th>
                                                    </tr>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-success w-100" id="button-video" style="margin-top:30px" disabled>Upload</button>
                                                </div>
                                            </div>
                                        </form>
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
        $objEmp = {};
        var objUpload = {};
        $users = "<?php echo $emailPendaftar; ?>";
        $uploadPpt = "<?php echo $uploadPpt; ?>";
        $uploadVideo = "<?php echo $uploadVideo; ?>";

        if($uploadPpt != "")
        {
            $('#input-video').prop('disabled', false);
            $('#button-video').prop('disabled', false);
        }

        if ($users != '')
        {
            cekPendaftar();
        }
        else
        {
            window.location.href = "{{ route('actionFirst')}}";
        }
        function removeNotNumber(angka)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString();

            return number_string;
        }

        const formatToPhone = (event) => {
            console.log(event.target.value);
            event.target.value = removeNotNumber(event.target.value);
            const input = event.target.value.substring(0,13); // First ten digits of input only
            if (input.length >11) {
                var areaCode = input.substring(0,4);
                var middle = input.substring(4,8);
                var last = input.substring(8,13);
            } else {
                var areaCode = input.substring(0,3);
                var middle = input.substring(3,7);
                var last = input.substring(7,12);
            }
                if(input.length > 7){event.target.value = `${areaCode} ${middle} ${last}`;}
                else if(input.length > 3){event.target.value = `${areaCode} ${middle}`;}
                else if(input.length > 0){event.target.value = `${areaCode}`;}
        };

        // const inputNoHpIndividu = document.getElementById('inputNoHpIndividu');
        // inputNoHpIndividu.addEventListener('keyup',formatToPhone);

        var inputNoHpIndividu = document.getElementById("inputNoHpIndividu");
        inputNoHpIndividu.addEventListener("keyup", function(e) 
        {
            console.log(this.value);
        });
        
        $(document).ready(function(){
            $("#upload-ppt").on("submit", function(){
                showLoading();
            });

            $("#upload-video").on("submit", function(){
                showLoading();
            });
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function cekPendaftar(){
            $.ajax({
                type: 'GET',
                url: 'cek-pendaftar/'+$users,
                success: function(data) {
                    if (data.data != null)
                    {
                        document.getElementById("sudah_mendaftar").style.display = "";
                        document.getElementById("belum_mendaftar").style.display = "none";
                        document.getElementById("form_utama").style.display = "none";
                    }

                    else
                    {
                        document.getElementById("sudah_mendaftar").style.display = "none";
                        document.getElementById("belum_mendaftar").style.display = "";
                        document.getElementById("form_utama").style.display = "";
                    }
                }
            });
        }

        function alertSuccess(){
            var translate = { 'jenisKepesertaan': 'selectJenisKepersetaan','jumlah_anggota':'selectJumlahAnggota','no_hp': 'inputNoHpIndividu',
                'nama_tim': 'inputNamaTim','judul_ide': 'inputJudulIde','deskripsi_ide': 'inputDeskripsi'};

            var translateIndividu = {'npp_individu': 'inputNppIndividu','nama_individu': 'inputNamaIndividu', 
                'unit_kerja_individu': 'inputUnitKerjaIndividu','email_individu': 'inputEmailIndividu'}              

            var translateGroup = {'npp': 'inputNpp','nama': 'inputNama','unit_kerja': 'inputUnitKerja',
                    'email': 'inputEmail','no_hp': 'inputNoHp'};

            
            var passedArray = <?php echo json_encode($saveData); ?>;

            if (passedArray != ''){
                $.each(translate, function(key2, value2) {
                    if (passedArray[key2]) {
                        if (key2 == 'jenisKepesertaan' || key2 == 'jumlah_anggota')
                        {
                            $("#"+value2).val(passedArray[key2]);
                            selectJenisKepersetaanChange();
                            selectJumlahAnggotaChange();
                        }
                        else
                        {
                            document.getElementById(value2).value = passedArray[key2];
                        }
                    }
                });

                if (passedArray['jenisKepesertaan'] == 'individu')
                {
                    $.each(translateIndividu, function(key2, value2) {
                        if (passedArray[key2]) {
                            document.getElementById(value2).value = passedArray[key2];
                        }
                    });
                }
                else if (passedArray['jenisKepesertaan'] == 'group')
                {
                    var jumlahAnggota = parseInt(passedArray['jumlah_anggota']);
                    for (var x = 1; x < jumlahAnggota+2; x++) {
                        $.each(translateGroup, function(key2, value2) {
                            if (passedArray['group'][x-1][key2]) {
                                document.getElementById(value2+x).value = passedArray['group'][x-1][key2];
                            }
                        });
                    }
                }
            }
        
            $("#wizard").steps("next",{});
            $("#wizard").steps("next",{});
            $("#wizard").steps("next",{});           
        }

        $(document).ready( function() {
            // Draw all slots
            $('div.alert').each(function(i, d) {
                alertSuccess();
            });
        });

        function assignValue()
        {
            $objEmp["jenisKepesertaan"] =  $('select[name=selectJenisKepersetaan] option').filter(':selected').val();

            if ($objEmp["jenisKepesertaan"] == "individu")
            {
                $objEmp["npp_individu"] = $("#inputNppIndividu").val();
                $objEmp["nama_individu"] = $("#inputNamaIndividu").val();
                $objEmp["unit_kerja_individu"] = $("#inputUnitKerjaIndividu").val();
                $objEmp["email_individu"] = $("#inputEmailIndividu").val();
                $objEmp["no_hp"] = $("#inputNoHpIndividu").val();
                $objEmp["status_tim"] = 'leader';
            }

            else
            {
                $objEmp["group"] = $objEmp["group"] || [];
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
                    $objEmp["group"].push(object);
                }
            }

            $objEmp["nama_tim"] = $("#inputNamaTim").val();
            $objEmp["judul_ide"] = $("#inputJudulIde").val();
            $objEmp["deskripsi_ide"] = $("#inputDeskripsi").val();
            $objEmp["jumlah_anggota"] = jumlahAnggota;
        }

        function submitData() {
            $objEmp = {};
            $objEmp["jenisKepesertaan"] =  $('select[name=selectJenisKepersetaan] option').filter(':selected').val();

            if ($objEmp["jenisKepesertaan"] == "individu")
            {
                $objEmp["npp_individu"] = $("#inputNppIndividu").val();
                $objEmp["nama_individu"] = $("#inputNamaIndividu").val();
                $objEmp["unit_kerja_individu"] = $("#inputUnitKerjaIndividu").val();
                $objEmp["email_individu"] = $("#inputEmailIndividu").val();
                $objEmp["no_hp"] = $("#inputNoHpIndividu").val();
                $objEmp["status_tim"] = 'leader';
            }

            else
            {
                $objEmp["group"] = $objEmp["group"] || [];
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
                    $objEmp["group"].push(object);
                }
            }

            $objEmp["nama_tim"] = $("#inputNamaTim").val();
            $objEmp["judul_ide"] = $("#inputJudulIde").val();
            $objEmp["deskripsi_ide"] = $("#inputDeskripsi").val();

            var notMandatory = ["group"];

            var arrEmptyData = [];
            let shouldSkip = false;

            $.each($objEmp, function(key, value) {
                if (value == "" || value == key) {
                    if (!notMandatory.includes(key)) {
                        strEmpty = key.replace(/[ *_#]/g, ' ');
                        arrEmptyData.push(strEmpty);
                    }
                }
            })

            if(arrEmptyData.length != 0)
            {
                showNotifKuesioner("Silahkan isi data " + arrEmptyData.join(', ') + "!", null);
            }
            else{
                showLoading();

                $.ajax({
                    type: 'POST',
                    url: 'insert-tim',
                    data: $objEmp,
                    dataType: 'json',
                    success: function(data) {
                        if (data.data.message == 'Insert Data Berhasil.') {
                            setTimeout(hideLoading, 1000);
                            setTimeout(function(){window.location.href = "{{ url('participate')}}"}, 5000);
                        } else {
                            setTimeout(hideLoading, 1000);
                            showNotifKuesioner(data.data.message + "!", null);
                        }
                    }, error: function(data) {
                        console.log('Error POST');
                        console.log(data);
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
                $err = 'no';
                if ( newIndex === 1 ) {
                    $jenisKepesertaan =  $('select[name=selectJenisKepersetaan] option').filter(':selected').val();
                    if ($jenisKepesertaan != 'null')
                    {
                        if ($jenisKepesertaan == 'group')
                        {
                            $jumlahAnggota =  parseInt($('select[name=selectJumlahAnggota] option').filter(':selected').val());
                            $jumlahAnggotaOri =  $('select[name=selectJumlahAnggota] option').filter(':selected').val(); 
                            if ($jumlahAnggotaOri == 'null')
                            {
                                showNotifKuesioner("Mohon pilih jumlah anggota", null);
                                $err = 'yes';
                                return;
                            }
                            else{
                                $('.steps ul').addClass('step-2');
                            }
                        } 
                        
                    }
                    else
                    {
                        showNotifKuesioner("Mohon pilih jenis kepesertaan", null);
                        $err = 'yes';
                        return;
                    }
                } else {
                    $('.steps ul').removeClass('step-2');
                }
                if ( newIndex === 2 ) {
                    var arrCheck = ["inputNpp", "inputNama", "inputUnitKerja", "inputEmail", "inputNoHp"];

                    if ($jenisKepesertaan == "group")
                    {
                        for (var con = 1; con < $jumlahAnggota+2; con++) 
                        {
                            for (var x = 0; x < arrCheck.length; x++)
                            {
                                if($("#"+arrCheck[x]+(con)).val() == "")
                                {
                                    showNotifKuesioner("Mohon lengkapi data", null);
                                    $err = 'yes';
                                    return;
                                }
                            }
                        }
                    }
                    else if ($jenisKepesertaan == "individu")
                    {
                        for (var x = 0; x < arrCheck.length; x++)
                        {
                            if($("#"+arrCheck[x]+"Individu").val() == "")
                            {
                                showNotifKuesioner("Mohon lengkapi data", null);
                                $err = 'yes';
                                return;
                            }
                        }
                    }
                    $('.steps ul').addClass('step-3');
                } else {
                    $('.steps ul').removeClass('step-3');
                }

                if ( newIndex === 3 ) {
                    var arrCheck = ["inputNamaTim", "inputJudulIde", "inputDeskripsi"];
                    for (var x = 0; x < arrCheck.length; x++)
                    {
                        if($("#"+arrCheck[x]).val() == "")
                        {
                            showNotifKuesioner("Mohon lengkapi data", null);
                            $err = 'yes';
                            return;
                        }
                    }
                    $('.steps ul').addClass('step-4');
                    if ($err == 'no')
                    {
                        assignValue();
                        
                        $.ajax({
                            type: 'POST',
                            url: 'set-session',
                            data: $objEmp,
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                            }, error: function(data) {
                                console.log('Error POST');
                                console.log(data);
                            }
                        });
                    //     submitData();
                    }
                } else {
                    $('.steps ul').removeClass('step-4');
                }
                
                if ( newIndex === 4 ) {
                    $('.steps ul').addClass('step-5');

                    if($uploadPpt == "")
                    {
                        showNotifKuesioner("Mohon upload file materi", null);
                        $err = 'yes';
                        return;
                    }
                    else if($uploadVideo == "")
                    {
                        $('#input-video').prop('disabled', false);
                        $('#button-video').prop('disabled', false);
                        showNotifKuesioner("Mohon upload file video", null);
                        $err = 'yes';
                        return;
                    }

                    submitData();
                } else {
                    $('.steps ul').removeClass('step-5');
                    $('.actions ul').removeClass('step-last');
                }

                if ( newIndex === 5 ) {
                    
                    window.location.href = "{{ url('participate')}}";
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
            if ($err == 'no')
            {
                $(this).parent().addClass('checked');
                $(this).parent().prevAll().addClass('checked');
                $(this).parent().nextAll().removeClass('checked');
            }
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