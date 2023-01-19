<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;
use DataTables;

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

    public function store_file(Request $request)
    {
        // dd("hai");
        // $this->validate($request, [
        //     'filenames' => 'required',
        //     'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        // ]);
        // if($request->hasfile('filenames'))
        // {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(base_path() . 'files/', $name);
                $data[] = $name;
            }
        // }

        dd(json_encode($data));
        $file= new File();
        $file->filenames=json_encode($data);
        $file->save();

        //  $uniqueFileName = uniqid() . $request->get('upload_file')->getClientOriginalName() . '.' . $request->get('upload_file')->getClientOriginalExtension();

        // $request->get('upload_file')->move(public_path('files') . $uniqueFileName);


         if ($file) {
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
