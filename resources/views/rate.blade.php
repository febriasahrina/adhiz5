@extends('layouts.master')
@section('title', 'ADHIZ - Rate Participant')

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
            $emailJudge = "";

            if(Session::get('email'))
            {
                $emailJudge = Session::get('email');
            }
        ?>

        @if (count($ide) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="card card-body">
                    <div class="user-card-full">
                        <div class="row m-l-0 m-r-0">
                            
                            <div class="col-sm-12">
                                <div class="card-block">   
                                    <div class="row">
                                        <h4 class="pb-4">Detail</h4>
                                        <div class="col-sm-12 bg-c-lite-green user-rate">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Nama Tim</p>
                                                <h6 class="text-muted f-w-400 pb-4" id="judul-ide">{{$ide->nama_tim}}</h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Judul Ide</p>
                                                <h6 class="text-muted f-w-400 pb-4" id="deskripsi-ide">{{$ide->judul_ide}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Deskripsi Ide</p>
                                                <h6 class="text-muted f-w-400 pb-4" id="judul-ide">{{$ide->deskripsi}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="card card-body">
                <div class="col-sm-12">
                    <h4 class="pb-4">Silahkan melakukan penilaian</h4>
                    <div class="bg-c-lite-blue user-rate"></div>
                        <table id="tableDataRate" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">No</th>
                                    <th>Criteria</th>
                                    <th>Deskripsi</th>
                                    <th>Range</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(count($criteria)>0)
                                    {
                                        for($i=0; $i<count($criteria); $i++)
                                        {
                                ?>
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$criteria[$i]->criteria_name}}</td>
                                    <td>@foreach ($criteria[$i]->criteriaDesc as $criteriaDesc)
                                        - {{$criteriaDesc->name_criteria_desc}} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(count($fill)>0)
                                        <p>{{$fill[$i]->name_range}}</p>
                                        @else
                                        <p>-</p>
                                        @endif
                                    </td>
                                </tr>
                                <?php }} ?>
                        </table>
                        <button id="buttonVote" class="btn btn-success btn-lg px-2 float-right" onclick="modalValidation()" style="font-size: 12px; width: 70px;">Save</button>
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

<div id="myModalValidation" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <span id="id_tim_modal" style="display:none"></span>
            <div class="modal-body">
                Apakah Anda yakin untuk melakukan penilaian kepada tim {{$ide->nama_tim}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="submitData()" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>


@push('custom-script')
    <script src="{{asset('')}}assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type='text/javascript'>
        var element = document.getElementById("nav-participate");
        element.classList.add("active");
        var objUpload = {};
        $users = "<?php echo $emailJudge; ?>";        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function modalValidation(){   
            for (var x = 1; x <= 5; x++) {
                // $objEmp[x] = $objEmp[x] || [];
                var id_range = $("#id-rate-"+x).val();
                if (id_range == null)
                {
                    showNotifKuesioner("Mohon untuk lengkapi data", null);
                    return;
                }
            }
            $('#myModalValidation').modal('show');
        }

        function submitData()
        {
            $objEmp = {};
            $objEmp["range"] = $objEmp["range"] || [];
            $objEmp["rate"] = $objEmp["rate"] || [];
            for (var x = 1; x <= 5; x++) {
                // $objEmp[x] = $objEmp[x] || [];
                var id_range = $("#range-"+x).val();
                var id_rate = $("#id-rate-"+x).text();
                if (id_range == null)
                {
                    showNotifKuesioner("Mohon untuk lengkapi data", null);
                    return;
                }
                var object = {
                    x : id_range
                }                    
                $objEmp["range"].push(id_range);
                $objEmp["rate"].push(id_rate);
            }

            $objEmp["id_judge"] = "<?php echo $id_judge; ?>";
            $objEmp["id_kepesertaan"] = "<?php echo $id_kepesertaan; ?>";

            console.log($objEmp);

            showLoading();

            $.ajax({
                type: 'POST',
                url: "{{ url('insert-rate')}}",
                data: $objEmp,
                dataType: 'json',
                success: function(data) {
                    if (data.data.message == 'Insert Data Berhasil.') {
                        setTimeout(hideLoading, 1000);
                        window.location.href = "{{ url('judge/success')}}";
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
    </script>
@endpush