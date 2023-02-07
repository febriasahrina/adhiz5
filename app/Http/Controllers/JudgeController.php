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
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showData($id='')
    {
        $varAnggota = [];
        $varBobot = [];
        if (!Session::get('email')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } 
        else{
            $email = Session::get('email');
            $checkJudge = DB::table('tb_judge')
                ->select('id_judge')
                ->where('email', $email)
                ->first();

            if($checkJudge != null)
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

                $checkHaveBobot = DB::table('tb_view_bobot')
                    ->select('id_judge','bobot','id_kepesertaan')
                    ->get();

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

                foreach ($ide as $key => $value) {
                    $varBobot[$value->id_kepesertaan] = [];
                    foreach ($checkHaveBobot as $keys => $values) {
                        if ($values->id_kepesertaan == $value->id_kepesertaan)
                        {
                            array_push($varBobot[$values->id_kepesertaan], $checkHaveBobot[$keys]);
                        }
                    }
                }

                foreach ($varBobot as $key => $value) {
                    foreach ($ide as $keys => $values) {
                        if ($key == $values->id_kepesertaan)
                        {
                            $ide[$keys]->bobot = $value;
                        }
                    }
                }

                if (count($ide)==0)
                {
                    $ide = [];
                }
                return view('/judge', [
                    "showData" => $ide,
                    "isSuccess" => $id
                ]);
            }
            else
            {
                return abort(404);
            }
        }
    }

    public function showRate($participant='')
    {
        if (!Session::get('email')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        }
        else
        {
            $email = Session::get('email');
            $checkJudge = DB::table('tb_judge')
                ->select('id_judge')
                ->where('email', $email)
                ->first();

            $checkHaveRate = DB::table('tb_rate')
                ->where('tb_rate.id_judge', $checkJudge->id_judge)
                ->where('tb_rate.id_kepesertaan', $participant)
                ->leftJoin('tb_range', 'tb_range.id_range', '=', 'tb_rate.id_range')
                ->get(['tb_rate.id_rate','tb_rate.id_criteria','tb_rate.id_range','name_range']);

            $varDesc = [];
            $varRange = [];
            if($checkJudge != null)
            {
                $ide = DB::table('tb_ide')
                ->select('id_kepesertaan','nama_tim','judul_ide','deskripsi')
                ->where('id_kepesertaan', $participant)
                ->first();

                $criteria = DB::table('tb_criteria')
                    ->select('tb_criteria.id_criteria','tb_criteria.criteria_name')
                    ->get();

                $criteriaDesc = DB::table('tb_criteria_desc')
                    ->select('tb_criteria_desc.id_criteria','tb_criteria_desc.id_criteria_desc','tb_criteria_desc.name_criteria_desc')
                    ->get();
                
                $range = DB::table('tb_range')
                    ->select('tb_range.id_criteria','tb_range.id_range','tb_range.name_range','tb_range.bobot_range')
                    ->get();

                // concat desc
                foreach ($criteria as $key => $value) {
                    $varDesc[$value->id_criteria] = [];
                    foreach ($criteriaDesc as $keys => $values) {
                        if ($values->id_criteria == $value->id_criteria)
                        {
                            array_push($varDesc[$values->id_criteria], $criteriaDesc[$keys]);
                        }
                    }
                }
    
                foreach ($varDesc as $key => $value) {
                    foreach ($criteria as $keys => $values) {
                        if ($key == $values->id_criteria)
                        {
                            $criteria[$keys]->criteriaDesc = $value;
                        }
                    }
                }

                // concat range
                foreach ($criteria as $key => $value) {
                    $varDesc[$value->id_criteria] = [];
                    foreach ($range as $keys => $values) {
                        if ($values->id_criteria == $value->id_criteria)
                        {
                            array_push($varDesc[$values->id_criteria], $range[$keys]);
                        }
                    }
                }
    
                foreach ($varDesc as $key => $value) {
                    foreach ($criteria as $keys => $values) {
                        if ($key == $values->id_criteria)
                        {
                            $criteria[$keys]->range = $value;
                        }
                    }
                }
                
                return view('/rate', [
                        "id_judge" => $checkJudge->id_judge,
                        "id_kepesertaan" => $participant,
                        "ide" => $ide,
                        "criteria" => $criteria,
                        "fill" => $checkHaveRate
                    ]);
                
            }
            else{
                return abort(404);
            }

        }

        $varAnggota = [];
        if (!Session::get('name_employee')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } else if (Session::get('email') == "febria.sahrina@adhi.co.id" || Session::get('email') == "aini.damayanti@adhi.co.id"){
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
            return view('/judge', [
                "showData" => $ide
            ]);
        }
        else{
            return abort(404);
        }
    }
   
    public function detail($id='')
    {
        if (!Session::get('name_employee')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } else if($id != '') {
            $variable = DB::table('tb_kepesertaan')
                ->join('tb_tim', 'tb_tim.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
                ->join('tb_ide', 'tb_ide.id_kepesertaan', '=', 'tb_kepesertaan.id_kepesertaan')
                ->leftjoin('tb_unit_kerja', 'tb_unit_kerja.id_unit_kerja', '=', 'tb_tim.unit_kerja')
                ->leftjoin('tb_department', 'tb_department.id_department', '=', 'tb_tim.id_department')
                ->where('tb_kepesertaan.deleted_at', null)
                ->where('tb_kepesertaan.id_kepesertaan', '=', $id)
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
            return view('/detailJudge', [
                "showData" => $variable
            ]);
        }
        else{
            if(Session::get('id_employee'))
            {
                $id_employee = Session::get('id_employee');
                $variable = DB::table('tb_tim')
                    ->where('deleted_at', null)
                    ->where('id_employee', '=', $id_employee)
                    ->pluck('id_kepesertaan');

                if(count($variable)>0)
                {
                    return redirect('details/'.$variable[0]);
                    // dd($variable[0]);
                }
                else
                {
                    $variable = [];
                    return view('detailJudge', [
                        "showData" => $variable
                    ]);
                }
            }


            $variable = [];
            return view('detailJudge', [
                "showData" => $variable
            ]);
        }
    }

    public function storeRate(Request $request)
    {
        $arrBobot = [];
        $rate = $request->input('range');
        $idRate = $request->input('rate');
        $count = 0;
        
        foreach ($rate as $key => $value) {
            $countBobot = DB::table('tb_range')
                ->select('bobot_range')
                ->where('id_range', $value)
                ->first();

            array_push($arrBobot, $countBobot->bobot_range);
            
            if($idRate[0] != "null")
            {
                $insertRate = DB::table('tb_rate')
                    ->where('id_rate', $request->rate[$count])
                    ->update([
                        'id_judge' => $request->id_judge,
                        'id_kepesertaan' => $request->id_kepesertaan,
                        'id_criteria' => $key+1,
                        'id_range' => $value,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                $count++;
            }
            else
            {
                $insertRate = DB::table('tb_rate')
                ->insert([
                    'id_judge' => $request->id_judge,
                    'id_kepesertaan' => $request->id_kepesertaan,
                    'id_criteria' => $key+1,
                    'id_range' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }

        }

        $sumBobot = array_sum($arrBobot);
        $avgBobot = $sumBobot/5;

        if($idRate[0] != "null")
        {
            $insertBobot = DB::table('tb_view_bobot')
                ->where('id_judge', $request->id_judge)
                ->where('id_kepesertaan', $request->id_kepesertaan)
                ->update([
                    'bobot' => $avgBobot,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
        else
        {
            $insertBobot = DB::table('tb_view_bobot')
            ->insert([
                'id_judge' => $request->id_judge,
                'id_kepesertaan' => $request->id_kepesertaan,
                'bobot' => $avgBobot,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }     

        if ($insertBobot) {
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

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
}
