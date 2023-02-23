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

    .one{
        bottom: 0;
        left: 350;
    }

    .one img{
        height: 60%;
    }

    .two{
        position: absolute;
        bottom: 50;
        left: 50;
    }

    .three{
        position: absolute;
        bottom: 20px;
        right: 80;
    }

    @media (max-width: 767px) {
    .one, .two, .three {
        all: initial; } }
</style>

@endpush

@section('content')
<div id="toast-container" class="toast-top-right">
</div>
<div id="home" class="header-hero bg_cover" style="background-image: url({{asset('')}}assets/img/banner-bg.svg)">
    <section id="features" class="services-area pt-150">
        <div class="container mb-4">
            <div class="card card-body" style="border-radius: 20px;">
                <div class="row" id="polling-results">
                    <h5 class="ml-4">Voting Results</h5><br>
                    <div class="col-lg-4 col-md-7 col-sm-8 issue-img one" id="progress1" style="display:none">
                        <img class="shape" src="{{asset('')}}assets/img/favoritecup.png" alt="shape">
                        <br>
                        <h4 class="text-center">Favorit</h4>
                        <h5 class="pt-2 text-center" id="vote_tim_1"></h5>
                        <p class="pt-2 text-center" id="countdown"></p>
                    </div>
                 </div>
            </div>
        </div>
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
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
        $email = "<?php echo Session::get('email'); ?>";
        cekHaveVote();
        countVote();
        CountDownTimer('02/23/2023 11:59 PM', 'countdown');

        $(document).ready(function() {
            $('#id_ide').select2({
                width: '100%',
                // closeOnSelect: true,
                selectOnClose: true,
                width: 'resolve'
            });

            if($email == "febria.sahrina@adhi.co.id" || $email == "aini.damayanti@adhi.co.id" || $email == "reza.tp@adhi.co.id")
            {
                $('#tableDataVote').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 5 }
                    ],
                    "ordering": false,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                'csvHtml5',
                        'excelHtml5',
                'pdfHtml5',
                        'print'
                    ]
                });
            }
            else
            {
                $('#tableDataVote').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 5 }
                    ],
                    "ordering": false,
                });
            }
        });
        
        function letsVote()
        {
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
                success: function(datas) {
                    $allVote = datas.data.countAll;
                    if ($allVote != 0)
                    {
                        $.each(datas.data.data, function(keys, values) {
                            if ($no <= 1)
                            {
                                document.getElementById("polling-results").style.display = "block";

                                document.getElementById("progress"+$no).style.display = "";

                                document.getElementById("vote_tim_"+$no).innerText = values['nama_tim'];
                            }
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

            cekHaveVote('add');
        }

        function cekHaveVote($param=''){
            $.ajax({
                type: 'GET',
                url: "{{url('cek-have-vote')}}"+"/"+$id_email,
                success: function(data) {
                    if (data.message == 'Voting closed!')
                    {
                        alert(data.message);    
                    }
                    else
                    {
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
                }
            });
        }

        function CountDownTimer(dt, id)
        {
            var end = new Date(dt);
            console.log(end);

            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);
                    document.getElementById(id).innerHTML = 'VOTING CLOSED';
                    const box = $('[id=buttonVote]').remove();

                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById(id).innerHTML = days + ' Hari ';
                document.getElementById(id).innerHTML += hours + ' Jam ';
                document.getElementById(id).innerHTML += minutes + ' Menit ';
                document.getElementById(id).innerHTML += seconds + ' Detik';
            }

            timer = setInterval(showRemaining, 1000);
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