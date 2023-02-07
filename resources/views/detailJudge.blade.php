@extends('layouts.master')
@section('title', 'ADHIZ - Detail Participant')

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
        <br>
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
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Tim</h6>
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
                                                        <h6 class="text-muted f-w-400 pb-2" id="judul-ide">{{$showData[0]->judul_ide}}</h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Tema Ide</p>
                                                        <h6 class="text-muted f-w-400 pb-2" id="tema-ide">{{$showData[0]->tema_ide}}</h6>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Deskripsi</p>
                                                        <h6 class="text-muted f-w-400 pb-2" id="deskripsi-ide">{{$showData[0]->deskripsi}}</h6>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">File</h6>
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
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Keanggotaan</h6>
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
    <script src="{{asset('')}}assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type='text/javascript'>$(function(){
        var element = document.getElementById("nav-participate");
        element.classList.add("active");
        $objEmp = {};
        var objUpload = {};
        $users = "<?php echo $emailPendaftar; ?>";
        $uploadPpt = "<?php echo $uploadPpt; ?>";
        $uploadVideo = "<?php echo $uploadVideo; ?>";

        $path = document.getElementById("file-pdf-a").getAttribute("href");

        // convertPdf();

        if ($users != '')
        {
            cekPendaftar();
        }
        else
        {
            window.location.href = "{{ route('actionFirst')}}";
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function convertPdf(){
            $objEmp = {
                "_token": "{{ csrf_token() }}",
                "path" : $path,
                "emailFile" : $emailFile
            };
            // $objEmp["path"] = $path;
            $.ajax({
                type: 'POST',
                url: "{{url('convertPdf')}}",
                data: $objEmp,
                dataType: 'json',

                // type: 'GET',
                // url: "{{url('convertPdf')}}"+"/"+$path,
                success: function(data) {
                    console.log(data);
                }
            });
        }

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
    });
    </script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>
@endpush