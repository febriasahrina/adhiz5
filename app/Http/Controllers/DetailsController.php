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


class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function showData($id='')
    {
        if (!Session::get('name_employee')) {
            return redirect('login')->with('alert', 'Mohon untuk login terlebih dulu');
        } else if (Session::get('email') == "febria.sahrina@adhi.co.id" || Session::get('email') == "aini.damayanti@adhi.co.id" || Session::get('email') == "reza.tp@adhi.co.id"){
            if($id != '') {
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
                return view('/details', [
                    "showData" => $variable
                ]);
            }
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
                    return view('details', [
                        "showData" => $variable
                    ]);
                }
            }


            $variable = [];
            return view('details', [
                "showData" => $variable
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function setSession(Request $request)
    {
        $data = $request->all();
        $arr = [];

        foreach ($data as $key => $value) {
            $arr[$key] = $value;
        }
        
        if(Session::has('save-data'))
        {
            var_dump(Session::get('save-data'));
            Session::forget('save-data');
            var_dump(Session::get('save-data'));
        }

        Session::put('save-data', $arr);
    }

    public function cekPendaftar($id = '')
    {
        $id_email = $id;
        $checkPendaftar = DB::table('tb_tim')
            ->where('tb_tim.email', '=', $id_email)
            ->where('status_tim', '=', 'leader')
            ->whereNull('deleted_at')
            ->value('id_kepesertaan');

        return response()->json([
            'success' => true,
            'message' => 'Get Data Berhasil.',
            'data' => $checkPendaftar
        ], 201);
    }
    

    public function convertPdf(Request $request){
        $emailFile = $request->emailFile;
        $path = $request->path;

        // var_dump(resource_path('assets\py\convertPdf.py'));
        // var_dump($baseUrl.'/convertPdf.py');
        // dd(app_path());
        // $result = shell_exec("python " . app_path(). "\http\Controllers\convertPdf.py");
        // dd($result);

        $process = new Process(['python', app_path(). "\http\Controllers\convertPdf.py", $path, $emailFile]);
        $process->run();

        if (!$process->isSuccessful()) {
            // throw new ProcessFailedException($process);
            var_dump("err");
        }
        var_dump ($process->getOutput());
    }
}
