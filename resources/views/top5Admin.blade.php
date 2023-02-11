@extends('layouts.master')
@section('title', 'ADHIZ - Top 5 Admin')

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
                <table id="tableDataJudge" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th>Nama Tim</th>
                            <th>Anggota</th>
                            <th>Total Bobot</th>
                            <th style="text-align:center;width:100px;">Action</th>
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
                                $showDataSort = $showData->sortByDesc('penilaian');
                                $len = count($showData);
                                if ($len > 5)
                                    $len = 5;

                                $i=0;
                                foreach ($showDataSort as $key => $value) 
                                {
                        ?>
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$value->nama_tim}}</td>
                            <td>
                            <?php
                                for($j=0; $j<count($value->anggota); $j++)
                                {                                
                            ?>
                                @if($value->anggota[$j]->nama_unit_kerja == null)
                                <li>{{$value->anggota[$j]->nama}} ({{$value->anggota[$j]->unit_kerja}})</li>
                                @else
                                <li>{{$value->anggota[$j]->nama}} ({{$value->anggota[$j]->nama_unit_kerja}})</li>
                                @endif
                                <?php } ?>
                            </td>
                            <td>{{$value->penilaian}}%</td>
                            <td class=" dt-center align-middle">
                                <div class="align-middle" style="width: 100px;">
                                    <div class="col">
                                        <a href="{{ url('detail-top5-admin')}}/{{$value->id_kepesertaan}}" class="btn btn-primary btn-sm px-2" style="font-size: 12px; width: 70px;">Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            $i++;
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
                <!-- <button type="button" onclick="letsVote()" class="btn btn-primary">Yes</button> -->
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
        $email = "<?php echo Session::get('email'); ?>";

        $id_email = "<?php echo $id_email; ?>";

        $(document).ready(function() {
            if($email == "febria.sahrina@adhi.co.id" || $email == "aini.damayanti@adhi.co.id" || $email == "reza.tp@adhi.co.id")
            {
                $('#tableDataJudge').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 4 }
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
                $('#tableDataJudge').DataTable(
                {
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 4 }
                    ],
                    "ordering": false,
                });
            }
        });

        function modalValidation(nama,id){            
            document.getElementById('nama_tim').innerText = nama;
            document.getElementById('id_tim_modal').innerText = id;
            // $('#myModalValidation').modal('show');

            // cekHaveVote('add');
        }

    </script>
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