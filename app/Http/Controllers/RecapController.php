<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
// use Laravel\Socialite\Facades\Socialite;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use GuzzleHttp\Client;

class RecapController extends Controller
{
    public function index()
    {
        return view('/recap', [
            "showData" => 'check'
        ]);
    }

}


?>