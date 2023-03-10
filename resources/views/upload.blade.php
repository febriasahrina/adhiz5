@extends('layouts.master')
@section('title', 'ADHIZ - Participate')

<!--====== Participate CSS ======-->
<link rel="stylesheet" href="assets/css/participate.css">
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
                    <form method="post" action="insert-file/ppt" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-8">
                                <tr>
                                    <th>
                                        <label>File Materi (ppt)</label>
                                        <span class="text-danger">*</span>
                                    </th>
                                    <th>
                                        <input type="file" class="form-control" name="file" />
                                    </th>
                                </tr>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success w-100" style="margin-top:30px">Upload</button>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="insert-file/video" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-8">
                                <tr>
                                    <th>
                                        <label>File Video</label>
                                        <span class="text-danger">*</span>
                                    </th>
                                    <th>
                                        <input type="file" class="form-control" name="video" />
                                    </th>
                                </tr>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success w-100" style="margin-top:30px">Upload</button>
                            </div>
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