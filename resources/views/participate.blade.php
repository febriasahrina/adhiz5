@extends('layouts.master')
@section('title', 'ADHIZ - Participate')

<!--====== Participate CSS ======-->
@push('custom-css')
<link rel="stylesheet" href="{{asset('')}}assets/css/participate.css">
<link rel="stylesheet" href="{{asset('')}}assets/css/profile.css">

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

    .select2-container .select2-selection--single {
        width: 100%;
        height: 38px !important;
        font-size: 13px;
        font-weight: normal;
    }

    .selection {
        width: 100%;
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
                                <div id="sudah_mendaftar" style="display : none">
                                    <div class="succ-btn">Sudah Mendaftar</div>
                                    @if (count($showData) > 0)
                                    <div class="pt-2 pl-2">{{$showData[0]->created_at}}</div>
                                    @endif
                                </div>
                                
                            <a href="" class="warn-btn" id="belum_mendaftar" style="display : none">
                            <span>Belum Mendaftar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row justify-content-center" id="form_utama" style="display: none;">
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
                                                    <input type="text" id="inputUnitKerja1" name="inputUnitKerja1" class="form-control" placeholder="Masukkan Unit Kerja Anda"
                                                    value="@if(Session::get('loginStatus') == TRUE){{Session::get('department')}}" disabled @endif>

                                                    <input type="hidden" id="inputDepartment1" name="inputDepartment1" class="form-control" value="0">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <label>Email</label>
                                                    <span class="text-danger">*</span>
                                                </th>
                                                <th>
                                                    <input type="email" id="inputEmail1" name="inputEmail1" class="form-control" placeholder="Masukkan Email Anda"
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
                                                    <select class="form-control js-example-basic-single" id="inputUnitKerja2" name="inputUnitKerja2" onchange="selectUnitKerja2()" style="width: 100%; font-size:13px">
                                                        <option selected="selected" value="">--Pilih Unit Kerja--</option>
                                                    </select>
                                                    <div id="divDepartment2" style="display: none" class="pt-4">
                                                        <select class="form-control js-example-basic-single" id="inputDepartment2" name="inputDepartment2" style="width: 100%; font-size:13px; display:none">
                                                            <option selected="selected" value="0">--Pilih Department--</option>
                                                        </select>
                                                    </div>
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
                                                    <select class="form-control js-example-basic-single" id="inputUnitKerja3" onchange="selectUnitKerja3()" style="width: 100%; font-size:13px">
                                                        <option selected="selected" value="">--Pilih Unit Kerja--</option>
                                                    </select>
                                                    <div id="divDepartment3" style="display: none" class="pt-4">
                                                        <select class="form-control js-example-basic-single" id="inputDepartment3" style="width: 100%; font-size:13px; display:none">
                                                            <option selected="selected" value="0">--Pilih Department--</option>
                                                        </select>
                                                    </div>
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
                                </div>
                            </section> <!-- SECTION 4 -->
                            <h4></h4>
                            <section>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                </svg>
                                <br>
                                <p class="success" style="text-align: center;">Data berhasil diinput</p>
                                <br>
                                <p style="text-align: center;">Terima kasih telah berpartisipasi dalam kompetisi ADHI Z</p>
                            </section>
                        </div>
                </div>
            </div>
        </div>

        @if (count($showData) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="card card-body">
                    <div class="user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-1 bg-c-lite-green user-profile">
                            </div>
                            <div class="col-sm-11">
                                <div class="card-block">                                    
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600 pt-5">Keanggotaan</h6>
                                    <?php
                                        if(count($showData)>0)
                                        {
                                            for($i=0; $i<count($showData); $i++)
                                            {
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <p class="m-b-10 f-w-600">No</p>
                                            <h6 class="text-muted f-w-400">{{$i+1}}</h6>
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="m-b-10 f-w-600">Nama</p>
                                            <h6 class="text-muted f-w-400">{{$showData[$i]->nama}}</h6>
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="m-b-10 f-w-600">Unit Kerja</p>
                                            <h6 class="text-muted f-w-400">
                                                @if (strlen($showData[$i]->unit_kerja) <= 2)
                                                    @if ($showData[$i]->unit_kerja == 1)
                                                    {{$showData[$i]->nama_unit_kerja}} - {{$showData[$i]->nama_department}}
                                                    @else
                                                    {{$showData[$i]->nama_unit_kerja}}
                                                    @endif
                                                @else
                                                {{$showData[$i]->unit_kerja}}
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="m-b-10 f-w-600">NPP</p>
                                            <h6 class="text-muted f-w-400">{{$showData[$i]->npp}}</h6>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{$showData[$i]->email}}</h6>
                                        </div>
                                        <div class="col-sm-2">
                                            <p class="m-b-10 f-w-600">No Hp</p>
                                            <h6 class="text-muted f-w-400">{{$showData[$i]->no_hp}}</h6>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }}
                                    ?>

                                    <div class="row">
                                        <div class="col-sm-6">
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 pt-5">Tim</h6>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Nama Tim</p>
                                                        <h6 class="text-muted f-w-400 pb-4" id="judul-ide">{{$showData[0]->nama_tim}}</h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Jenis Kepesertaan</p>
                                                        <h6 class="text-muted f-w-400 pb-4" id="deskripsi-ide">{{$showData[0]->status_kepesertaan}}</h6>
                                                    </div>
                                                </div>

                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 pt-2">Ide</h6>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Judul Ide</p>
                                                        <h6 class="text-muted f-w-400 pb-4" id="judul-ide">{{$showData[0]->judul_ide}}</h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Deskripsi</p>
                                                        <h6 class="text-muted f-w-400 pb-4" id="deskripsi-ide">{{$showData[0]->deskripsi}}</h6>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 pt-5">File</h6>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="m-b-10 f-w-600">Materi</p>
                                                    <h6 class="text-muted f-w-400 pb-4" id="file-pdf"><a href='{{asset('files/')}}/{{$showData[0]->email}}.pptx' role="button" target="_blank">file.pptx</a></h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <p class="m-b-10 f-w-600">Video</p>
                                                    <video src='{{asset('files/')}}/{{$showData[0]->email}}.mp4' width="100%" height="100%" controls></video>
                                                </div>
                                            </div>
                                        </div>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endif
        
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

        $(document).ready(function() {
            showDropDown();
            $('#inputUnitKerja2').select2({
                // width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });
            $('#inputUnitKerja3').select2({
                // width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });
            $('#inputDepartment2').select2({
                // width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });
            $('#inputDepartment3').select2({
                // width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });
        });

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
                url: "{{url('cek-pendaftar')}}"+"/"+$users,
                // url: "{{ url('show-drop-down')}}",
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
                    'department':'inputDepartment','email': 'inputEmail','no_hp': 'inputNoHp'};

            var arrSelect = ["inputUnitKerja", "inputDepartment"];

            
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
                                if(arrSelect.includes(value2) && x > 1)
                                {
                                    console.log('#'+value2+x);
                                    console.log(passedArray['group'][x-1][key2]);

                                    // $('#'+value2+x).val(passedArray['group'][x-1][key2]).select2().trigger("change");
                                    // console.log($('#'+value2+x).find(':selected'));
                                    // if ($('#'+value2+x).find("option[value=" + passedArray['group'][x-1][key2] + "]").length) {
                                    //     console.log("find");
                                    //     $('#'+value2+x).val(passedArray['group'][x-1][key2]).trigger('change');
                                    // } else { 
                                    //     console.log("nott find");
                                    //     // Create a DOM Option and pre-select by default
                                    //     var newOption = new Option(data.text, data.id, true, true);
                                    //     // Append it to the select
                                    //     $('#'+value2+x).append(newOption).trigger('change');
                                    // }

                                    const $select = document.querySelector('#'+value2+x);
                                    const $options = Array.from($select.options);
                                    const optionToSelect = $options.find(item => item.value === passedArray['group'][x-1][key2]);
                                    if(optionToSelect != undefined)
                                    {
                                        optionToSelect.selected = true;
                                    }
                                    
                                    $('#'+value2+x).val(passedArray['group'][x-1][key2]).trigger("change");

                                    // $("#"+value2+x).select2('destroy');
                                    // $("#"+value2+x).val(passedArray['group'][x-1][key2]);
                                    // $("#"+value2+x).select2();
                                    // $('#'+value2+x).val("2").select2().trigger("change");
                                    // console.log($("#"+value2+x).val());
                                    // console.log(document.getElementById(value2+x).value);
                                }
                                else
                                {
                                    document.getElementById(value2+x).value = passedArray['group'][x-1][key2];
                                }
                            }
                        });
                    }
                    // selectUnitKerja2();
                    // selectUnitKerja3();
                }
            }
        
            $("#wizard").steps("next",{});
            $("#wizard").steps("next",{});
            $("#wizard").steps("next",{});           
        }

        function assignValue()
        {
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
                            "department" : 0,
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
                            "department" : $("#inputDepartment"+x).val(),
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

        function showDropDown() {
            $.ajax({
                type: 'GET',
                url: "{{ url('show-drop-down')}}",
                success: function(data) {
                    //dropdown unit kerja
                    var selectUnitKerja = document.getElementById("inputUnitKerja2");
                    var selectUnitKerja3 = document.getElementById("inputUnitKerja3");
                    var unitKerjaList = [];

                    //dropdown department
                    var selectDepartment = document.getElementById("inputDepartment2");
                    var selectDepartment3 = document.getElementById("inputDepartment3");
                    var departmentList = [];    
                                        
                    for (var con = 0; con < data.unit_kerja.length; con++) {
                        var unitKerjaObj = {
                            "id_unit_kerja": data.unit_kerja[con].id_unit_kerja,
                            "nama_unit_kerja": data.unit_kerja[con].nama_unit_kerja,
                        }
                        unitKerjaList.push(unitKerjaObj);
                    }

                    for (var con = 0; con < data.department.length; con++) {
                        var departmentObj = {
                            "id_department": data.department[con].id_department,
                            "nama_department": data.department[con].nama_department,
                        }
                        departmentList.push(departmentObj);
                    }

                    for (var listCon = 0; listCon < unitKerjaList.length; listCon++) {
                        var el = document.createElement("option");
                        el.textContent = unitKerjaList[listCon].nama_unit_kerja;
                        el.value = unitKerjaList[listCon].id_unit_kerja;
                        selectUnitKerja.appendChild(el);
                    }

                    for (var listCon = 0; listCon < unitKerjaList.length; listCon++) {
                        var el = document.createElement("option");
                        el.textContent = unitKerjaList[listCon].nama_unit_kerja;
                        el.value = unitKerjaList[listCon].id_unit_kerja;
                        selectUnitKerja3.appendChild(el);
                    }

                    for (var listCon = 0; listCon < departmentList.length; listCon++) {
                        var el = document.createElement("option");
                        el.textContent = departmentList[listCon].nama_department;
                        el.value = departmentList[listCon].id_department;
                        selectDepartment.appendChild(el);
                    }

                    for (var listCon = 0; listCon < departmentList.length; listCon++) {
                        var el = document.createElement("option");
                        el.textContent = departmentList[listCon].nama_department;
                        el.value = departmentList[listCon].id_department;
                        selectDepartment3.appendChild(el);
                    }
                    
                    $('div.alert').each(function(i, d) {
                        alertSuccess();
                    });
                }
                , error: function(data) {
                    console.log('Error GET');
                    console.log(data);
                }
            })
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
                            "department" : 0,
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
                            "department" : $("#inputDepartment"+x).val(),
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
                    url: "{{ url('insert-tim')}}",
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
                            url: "{{ url('set-session')}}",
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

    function selectUnitKerja2() {
        var x = document.getElementById("inputUnitKerja2").value;
        var element = document.getElementById("divDepartment2");

        if (x === "1") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }

    function selectUnitKerja3() {
        var x = document.getElementById("inputUnitKerja3").value;
        var element = document.getElementById("divDepartment3");

        if (x === "1") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }

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

    <script src="{{asset('')}}assets/js/jquery-ui/jquery-ui.min.js"></script>
@endpush