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

class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     if (!Session::get('loginStatus')) {
    //         return redirect('loginuser')->with('alert', 'Kamu harus login dulu');
    //     } else if (!Session::get('menu_master_department')) {
    //         return redirect('redirect')->with('alert-dashboard', 'Anda tidak memiliki akses ke halaman ini');
    //     } else {
    //         if (request()->ajax()) {
    //             $variable = DB::table('tb_department')
    //                 ->leftjoin('tb_employee', 'tb_employee.id_employee', '=', 'tb_department.manager_department')
    //                 ->where('tb_department.deleted_at', null)
    //                 ->get([
    //                     'tb_department.id_department',
    //                     'tb_department.department_name',
    //                     'tb_department.manager_department',
    //                     'tb_employee.id_employee',
    //                     'tb_employee.name_employee',
    //                     'tb_department.created_at',
    //                     'tb_department.updated_at'
    //                 ]);

    //             //var_dump($variable);die();

    //             return datatables()->of($variable)
    //                 ->addColumn('action', 'department_action')
    //                 ->rawColumns(['action'])
    //                 ->addIndexColumn()
    //                 ->make(true);
    //         }

    //         $tb_employee = DB::table("tb_employee")
    //             ->whereNull('deleted_at')
    //             ->orderBy('name_employee', 'asc')
    //             ->pluck("name_employee", "id_employee");

    //         return view('department', compact('tb_employee'));
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kepesertaan = DB::table('tb_kepesertaan')
            ->insert([
                'status_kepesertaan' => $request->jenisKepesertaan,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        $id_kepesertaan = DB::table('tb_kepesertaan')->max('id_kepesertaan');

        if ($request->jenisKepesertaan == 'individu')
        {
        
            $employee = DB::table('tb_employee')
                ->select('id_employee')
                ->whereNull('deleted_at')
                ->where('npp', '=', $request->npp_individu)
                ->get();

            $kepesertaan = DB::table('tb_tim')
                ->insert([
                    'id_kepesertaan' => $id_kepesertaan,
                    'nama' => $request->nama_individu,
                    'npp' => $request->npp_individu,
                    'unit_kerja' => $request->unit_kerja_individu,
                    'id_department' => 0,
                    'email' => $request->email_individu,
                    'no_hp' => $request->no_hp,
                    'status_tim' => $request->status_tim,
                    'id_employee' => $employee[0]->id_employee,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
        else
        {
            $group = $request->input('group');
            $x = 0;
            foreach ($group as $key => $value) {
                if ($x == 0)
                {
                    $employee = DB::table('tb_employee')
                        ->select('id_employee')
                        ->whereNull('deleted_at')
                        ->where('npp', '=', $group[$key]['npp'])
                        ->get();

                    $getEmployee = $employee[0]->id_employee;
                }
                else
                {
                    $getEmployee = null;
                }
                
                $kepesertaan = DB::table('tb_tim')
                    ->insert([
                        'id_kepesertaan' => $id_kepesertaan,
                        'nama' => $group[$key]['nama'],
                        'npp' => $group[$key]['npp'],
                        'unit_kerja' => $group[$key]['unit_kerja'],
                        'id_department' => $group[$key]['department'],
                        'email' => $group[$key]['email'],
                        'no_hp' => $group[$key]['no_hp'],
                        'status_tim' => $group[$key]['status_tim'],
                        'id_employee' => $getEmployee,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                
                $x = $x + 1;
            }
        }

        $ide = DB::table('tb_ide')
            ->insert([
                'id_kepesertaan' => $id_kepesertaan,
                'nama_tim' => $request->nama_tim,
                'judul_ide' => $request->judul_ide,
                'deskripsi' => $request->deskripsi_ide,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        
        if ($kepesertaan && $ide) {
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

        // if ($checkPendaftar) {
            return response()->json([
                'success' => true,
                'message' => 'Get Data Berhasil.',
                'data' => $checkPendaftar
            ], 201);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Get Data Gagal.',
        //         'data' => ''
        //     ], 504);
        // }
    }

    public function store_file(Request $request, $route = '')
    {
        $email = Session::get('email');
        $data = Session::get('save-data');
        if ($route == 'ppt')
        {
            $request->validate([
                'file' => 'required|mimes:pptx|max:15000',
            ]);
            
            $oriFileName = $request->file->getClientOriginalName();
            $fileName = $email.'.'.$request->file->extension();  
    
            $request->file->move(public_path('files'), $fileName);
            Session::put('upload-ppt', $oriFileName);
            return back()->with('success','Berhasil Upload File Materi.');            
        }
        else if ($route == 'video')
        {
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4|max:30000',
            ]);

            $videoSrc = "";
            $thumbnailSrc = "";

            $file = $request->file('video');        
           
            $destinationPath = 'files';

            $oriFileName = $file->getClientOriginalName();
            $fileName = $email.'.'.$file->getClientOriginalExtension();
            $uploadSuccess = $file->move(public_path('files'), $fileName);
            $videoSrc = '/'.$destinationPath.'/'.$fileName;
            
            Session::put('upload-video', $oriFileName);
            return back()->with('success','Berhasil Upload File Video.');
        }
    }

    public function showDropDown()
    {
        $get_unit_kerja =  DB::table('tb_unit_kerja')
            ->select('id_unit_kerja','nama_unit_kerja')
            ->whereNull('deleted_at')
            ->orderBy('id_unit_kerja', 'ASC')
            ->get();

        $get_department =  DB::table('tb_department')
            ->select('id_department','nama_department')
            ->whereNull('deleted_at')
            ->orderBy('nama_department', 'ASC')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Get Data Berhasil.',
            'unit_kerja' => $get_unit_kerja,
            'department' => $get_department
        ], 201);
    }

}
