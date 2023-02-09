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
        $varAnggota = [];
        if (!Session::get('email')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } else if(Session::get('email') == "febria.sahrina@adhi.co.id" || Session::get('email') == "aini.damayanti@adhi.co.id" || Session::get('email') == "reza.tp@adhi.co.id")
        {
            $ide = DB::table('tb_kepesertaan')
                ->join('tb_ide', 'tb_ide.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
                ->where('tb_kepesertaan.deleted_at', null)
                ->get([
                    'tb_kepesertaan.id_kepesertaan',
                    'tb_kepesertaan.status_kepesertaan',
                    'tb_kepesertaan.created_at',
                    'tb_ide.id_ide',
                    'tb_ide.nama_tim',
                    'tb_ide.tema_ide',
                    'tb_ide.judul_ide',
                    'tb_ide.deskripsi',
                ]);

            $anggota = DB::table('tb_kepesertaan')
                ->join('tb_tim', 'tb_tim.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
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
                    'tb_unit_kerja.nama_unit_kerja',
                    'tb_department.nama_department'
                ]);

            foreach ($ide as $key => $value) {
                $varAnggota[$value->id_kepesertaan] = [];
                foreach ($anggota as $keys => $values) {
                    if ($values->id_kepesertaan == $value->id_kepesertaan)
                    {
                        array_push($varAnggota[$values->id_kepesertaan], $anggota[$keys]);
                    }
                }
            }

            foreach ($varAnggota as $key => $value) {
                foreach ($ide as $keys => $values) {
                    if ($key == $values->id_kepesertaan)
                    {
                        $ide[$keys]->anggota = $value;
                    }
                }
            }
            if (count($ide)==0)
            {
                $ide = [];
            }
            return view('/voting', [
                "showData" => $ide
            ]);
        }
        else
        {
            return abort(404);
        }
    }

    public function cekHaveVote($id = '')
    {
        $id_employee = $id;
        $checkVote = DB::table('tb_vote')
            ->where('tb_vote.id_employee', '=', $id_employee)
            ->whereNull('deleted_at')
            ->value('id_vote');

        return response()->json([
            'success' => true,
            'message' => 'Get Data Berhasil.',
            'data' => $checkVote
        ], 201);
    }

    public function countVote()
    {

        $countVote = DB::table('tb_vote')
            ->select('tb_vote.id_ide', 'tb_ide.nama_tim', DB::raw('count(*) as total'))
            ->join('tb_ide', 'tb_ide.id_ide', '=', 'tb_vote.id_ide')
            ->groupBy('tb_vote.id_ide', 'tb_ide.nama_tim')
            ->whereNull('tb_vote.deleted_at')
            ->orderBy('total', 'DESC')
            ->get();

        $countAllVote = DB::table('tb_vote')
                    ->count();

        if ($countVote) {
            return response()->json([
                'data' => [
                    'success' => true,
                    'message' => 'Insert Data Berhasil.',
                    'data' => $countVote,
                    'countAll' => $countAllVote
                ]
            ], 201);
        } else {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => 'Insert Data Gagal.',
                    'data' => NULL
                ]
            ], 504);
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {
        $vote = DB::table('tb_vote')
            ->insert([
                'id_employee' => $request->id_employee,
                'id_ide' => $request->id_ide,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);


        if ($vote) {
            return response()->json([
                'data' => [
                    'success' => true,
                    'message' => 'Insert Data Berhasil.'
                ]
            ], 201);
        } else {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => 'Insert Data Gagal.'
                ]
            ], 504);
        }
    }

}
