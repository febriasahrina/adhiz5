<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use DB;
use File;
use App\Video;
use Storage;
use DataTables;
use Exception;
use Response;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showData()
    {
        if (!Session::get('name_employee')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } else if (Session::get('email') == "febria.sahrina@adhi.co.id" || Session::get('email') == "aini.damayanti@adhi.co.id"){
            $variable = DB::table('tb_kepesertaan')
                ->join('tb_tim', 'tb_tim.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
                ->join('tb_ide', 'tb_ide.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
                ->leftjoin('tb_unit_kerja', 'tb_unit_kerja.id_unit_kerja', '=', 'tb_tim.unit_kerja')
                ->leftjoin('tb_department', 'tb_department.id_department', '=', 'tb_tim.id_department')
                ->where('tb_kepesertaan.deleted_at', null)
                ->get([
                    'tb_kepesertaan.id_kepesertaan',
                    'tb_kepesertaan.status_kepesertaan',
                    'tb_kepesertaan.created_at',
                    'tb_tim.nama',
                    'tb_tim.npp',
                    'tb_tim.unit_kerja',
                    'tb_tim.email',
                    'tb_tim.no_hp',
                    'tb_tim.status_tim',
                    'tb_ide.nama_tim',
                    'tb_ide.tema_ide',
                    'tb_ide.judul_ide',
                    'tb_ide.deskripsi',
                    'tb_unit_kerja.nama_unit_kerja',
                    'tb_department.nama_department'
                ]);
            
            // return view('participate', compact('variable'));
            if (count($variable)==0)
            {
                // dd(count($variable));
                $variable = [];
            }
            return view('/voting', [
                "showData" => $variable
            ]);
        }
        else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

}
