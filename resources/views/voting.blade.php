@extends('layouts.master')
@section('title', 'ADHIZ - Voting')

@push('custom-css')
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}assets/js/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')
<div id="home" class="header-hero bg_cover" style="background-image: url({{asset('')}}assets/img/banner-bg.svg)">
    <section id="features" class="services-area pt-150">
        <div class="container">
            <div class="card card-body" style="border-radius: 20px">
                <div class="about-shape-2">
                    <img src="{{asset('')}}assets/img/about-shape-2.svg" alt="shape">
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-danger " role="alert">
                    <strong>Info!</strong> Add row and Delete row are working. Edit row displays modal with row cells information.
                </div>
                @endif
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tim</th>
                            <th>Judul Ide</th>
                            <th>Anggota Tim</th>
                            <th style="display:none">Deskripsi Ide</th>
                            <th style="display:none">Video</th>
                            <th style="text-align:center;width:100px;">Action
                                <!-- <button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($showData)>0)
                            {
                                for($i=0; $i<count($showData); $i++)
                                {
                        ?>
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$showData[$i]->nama_tim}}</td>
                            <td>{{$showData[$i]->judul_ide}}</td>
                            <td>
                            <?php
                                for($j=0; $j<count($showData[$i]->anggota); $j++)
                                {
                                    $email = $showData[$i]->anggota[0]->email;                                    
                            ?>
                            
                                <li>{{$showData[$i]->anggota[$j]->nama}}</li>
                                <?php } ?>
                            </td>
                            <td style="display:none">{{$showData[$i]->deskripsi}}</td>
                            <td style="display:none"><video src='{{asset('files/')}}/{{$email}}.mp4' width="100%" height="100%" controls></video></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                                    <!-- <span class="lni lni-eye" aria-hidden="true">Details</span> -->
                                    Details
                                </button>
                                <!-- <button type="button" class="btn btn-danger btn-xs dt-delete">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button> -->
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


@push('custom-script')
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