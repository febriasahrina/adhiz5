<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function actionlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->passwordLogin;
        
        $arrayLogin = [];

        $client = new Client;
        $myBody['api_id'] = "4";
        $myBody['api_token'] = "e9de65363c6f2943765bed165efa15cdd54629a4f6d59fcc1834fa944fccc2d0";
        $myBody['email'] = $email;
        $myBody['password'] = $password;

        $response = $client->post('https://sinta.adhi.co.id/index.php/api/auth', ['body'=>$myBody]);

        // $response = $request->send();
        // dd($response->json()['error_code']);
        
        // var_dump($response['error_code']);die();
        if($response->json()['error_code'] == 0) {
            $variableEmp = DB::getSchemaBuilder()->getColumnListing('tb_employee');
            // $variableRole = DB::getSchemaBuilder()->getColumnListing('tb_role');
            $arrayLogin = $variableEmp;

            $cekData = DB::table('tb_employee')
            ->where('tb_employee.email', $email)
            ->first();
            if (!$cekData) {
                $url = 'https://mobile.adhi.co.id/api/index.php/v2/crm/biodata/index/'.$email;
                $response = $client->get($url);
                // dd($response);
                // var_dump($response->json()['data']['Nama']); die();
                if ($response) {
                    $Jabatan = $response->json()['data']['Jabatan'];

                    $employee = DB::table('tb_employee')
                            ->insert([
                                'name_employee' => $response->json()['data']['Nama'],
                                'npp' => $response->json()['data']['NPP'],
                                'email' => $response->json()['data']['Email ADHI'],
                                'department' => $response->json()['data']['Unit Kerja'],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
                }
            }
            
            $data = DB::table('tb_employee')
                ->where('tb_employee.email', $request->input('email'))
                ->first();

            if (!$data) {
                return redirect('/login')->with('alert', 'Maafs, Password atau Email Salah!');
            } 
            else {
                foreach ($arrayLogin as $subVariable2) {
                    Session::put($subVariable2, $data->$subVariable2);
                }
                Session::put('loginStatus', TRUE);
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('alert', 'Maaf, Password atau Email Salah!');
        }
    }

    public function actionlogout()
    {
        Session::flush();
        return redirect('/login')->with('alert', 'Kamu berhasil logout');
    }

}


?>