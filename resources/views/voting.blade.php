@extends('layouts.master')
@section('title', 'ADHIZ - Voting')

@push('custom-css')
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toast -->
<link rel="stylesheet" href="{{asset('')}}assets/css/toastr/toastr.min.css">
<!-- <link rel="stylesheet" href="{{asset('')}}assets/js/bootstrap/js/bootstrap-combined.min.css"></script> -->
<style>
    .select2-container .select2-selection--single {
        width: 100%;
        height: 38px !important;
        /* font-size: 13px; */
        font-weight: normal;
    }

    .selection {
        width: 100%;
    }

    .toasts {
        display: block;
    }

    .toastx {
        display: none;
    }
</style>

@endpush

@section('content')
<div id="toast-container" class="toast-top-right">
</div>
<div id="home" class="header-hero bg_cover" style="background-image: url({{asset('')}}assets/img/banner-bg.svg)">
    <section id="features" class="services-area pt-150">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                <div>
                    <div class="span6 mb-4" id="polling-results">
                        <h5>Voting Results</h5><br>
                        <strong id="vote_tim_1"></strong><span class="pull-right" id="vote_label_1"></span>
                        <div class="progress" id="progress1" style="display:none">
                            <div class="progress-bar bg-success" role="progressbar" id="vote_progress_1" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <strong id="vote_tim_2"></strong><span class="pull-right" id="vote_label_2"></span>
                        <div class="progress" id="progress2" style="display:none">
                            <div class="progress-bar bg-info" role="progressbar" id="vote_progress_2" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <strong id="vote_tim_3"></strong><span class="pull-right" id="vote_label_3"></span>
                        <div class="progress" id="progress3" style="display:none">
                            <div class="progress-bar bg-warning" role="progressbar" id="vote_progress_3" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <strong id="vote_tim_4"></strong><span class="pull-right" id="vote_label_4"></span>
                        <div class="progress" id="progress4" style="display:none">
                            <div class="progress-bar bg-danger" role="progressbar" id="vote_progress_4" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <table id="tableDataVote" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th>Judul Ide</th>
                            <th>Nama Tim</th>
                            <th>Anggota Tim</th>
                            <th style="display:none">Deskripsi Ide</th>
                            <th style="text-align:center;width:100px;">Action
                                <!-- <button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id_email = "";
                            if(Session::get('id_employee'))
                            {
                                $id_email = Session::get('id_employee');
                            }

                            if(count($showData)>0)
                            {
                                for($i=0; $i<count($showData); $i++)
                                {
                        ?>
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$showData[$i]->judul_ide}}</td>
                            <td>{{$showData[$i]->nama_tim}}</td>
                            <td>
                            <?php
                                for($j=0; $j<count($showData[$i]->anggota); $j++)
                                {
                                    $email = $showData[$i]->anggota[0]->email;                                    
                            ?>
                            
                                <li>{{$showData[$i]->anggota[$j]->nama}}</li>
                                <?php } ?>
                            </td>
                            <td id="deskripsi_ide_{{$email}}" style="display:none">{{$showData[$i]->deskripsi}}</td>
                            <td class=" dt-center align-middle">
                                <div class="align-middle" style="width: 100px;">
                                    <div class="col">
                                        <a href="{{ url('details')}}/{{$showData[$i]->id_kepesertaan}}" class="btn btn-primary btn-sm px-2" style="font-size: 12px; width: 70px;">Detail</a>
                                    </div>
                                    <div class="col mt-2">
                                        <button id="buttonVote" class="btn btn-success btn-sm px-2" onclick="modalValidation('{{$showData[$i]->nama_tim}}',{{$showData[$i]->id_ide}})" style="font-size: 12px; width: 70px;">Vote</button>
                                        <!-- <a href="" class="btn btn-success btn-sm px-2" onclick="modalValidation()" style="font-size: 12px; width: 70px;">Vote</a> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            @include('layouts.footer2')
        </div>
    </footer>
</div>

<div id="myModalVoting" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Media</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div>
                <video id="media-video" width="100%" height="100%" controls></video>
            </div>
            <div class="pt-2">
                <h7>Deskripsi Ide : </h7>
                <p id="modal-deskripsi-ide"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
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
                Apakah Anda yakin melakukan vote kepada tim <span id="nama_tim"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="letsVote()" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>


@push('custom-script')
    <script>
        var countToggle = 1;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $id_email = "<?php echo $id_email; ?>";
        cekHaveVote();
        countVote();

        $(document).ready(function() {
            $('#id_ide').select2({
                width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });
        });
        
        function letsVote()
        {
            // let id_employee = $("input[name=id_employee]").val();
            let id_ide = $('#id_tim_modal').text();

            var sendVote = {
                'id_employee': $id_email,
                'id_ide': id_ide
            };
            $.ajax({
                type: 'POST'
                , url: "{{ url('store-vote')}}"
                , data: sendVote
                , dataType: 'json'
                , success: (data) => {
                    var content = "";
                    $("#myModalValidation").modal('hide');

                    var oTable = $('#tableDataVote').dataTable();
                    oTable.fnDraw(false);

                    cekHaveVote();
                    countVote();

                    content += '<div id="toast-update' + countToggle + '" class="toast toast-success toasts" aria-live="polite" style=""><div class="toast-message"><span id="message-succ' + countToggle + '"></span></div></div>';
                    var textToast = "Anda berhasil melakukan voting";

                    $('#toast-container').append(content);

                    document.getElementById("message-succ" + countToggle).innerHTML = textToast;
                    var elementChange = document.getElementById("toast-update" + countToggle);
                    setTimeout(function() {
                        elementChange.remove();
                    }, 5000);
                    elementChange.addEventListener("click", function(e) {
                        elementChange.remove();
                    });

                    countToggle++;
                }
                , error: function(data) {
                    console.log('Error POST');
                    console.log(data);
                }
            });
        }

        function countVote()
        {
            $no = 1;
            $.ajax({
                type: 'GET',
                url: "{{url('count-vote')}}",
                // url: "{{ url('show-drop-down')}}",
                success: function(datas) {
                    $allVote = datas.data.countAll;
                    if ($allVote != 0)
                    {
                        $.each(datas.data.data, function(keys, values) {
                            document.getElementById("polling-results").style.display = "block";

                            document.getElementById("progress"+$no).style.display = "flex";

                            document.getElementById("vote_tim_"+$no).innerText = values['nama_tim'];
                            document.getElementById("vote_label_"+$no).innerText = parseInt(values['total']/$allVote*100)+"%";
                            document.getElementById("vote_progress_"+$no).style.width = parseInt(values['total']/$allVote*100)+"%";
                            $no++;
                        });
                    }
                    else
                    {
                        document.getElementById("polling-results").style.display = "none";
                    }
                }
            });
        }

        function modalValidation(nama,id){            
            document.getElementById('nama_tim').innerText = nama;
            document.getElementById('id_tim_modal').innerText = id;
            // $('#myModalValidation').modal('show');

            cekHaveVote('add');
        }

        function cekHaveVote($param){
            $.ajax({
                type: 'GET',
                url: "{{url('cek-have-vote')}}"+"/"+$id_email,
                success: function(data) {
                    if (data.data != null)
                    {
                        if ($param == 'add')
                        {
                            alert("Mohon maaf, Anda sudah melakukan voting!");      
                        }
                        else
                        {
                            $('[id=buttonVote]').prop("disabled", true);
                        }                        
                    }
                    else
                    {
                        if ($param == 'add')
                        {
                            $('#myModalValidation').modal('show');
                        }
                    }
                }
            });
        }

    </script>
    <script src="{{asset('')}}assets/js/voting.js"></script>
    <script src="{{asset('')}}assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('')}}assets/js/jszip/jszip.min.js"></script>
    <script src="{{asset('')}}assets/js/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('')}}assets/js/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('')}}assets/js/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('')}}assets/js/datatables-buttons/js/buttons.colVis.min.js"></script>
@endpush