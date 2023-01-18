<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/token', function () {
    return csrf_token();
});
Route::get('/', function () {return view('homepage');});
Route::get('/participate', function () { return view('participate');});
Route::get('/panduan', function () { return view('panduan');});
Route::get('/login', function () { return view('login');});
Route::post('actionlogin', [
    'as' => 'actionlogin',
    'uses' => 'LoginController@actionlogin']);
Route::get('logout', [
    'as' => 'actionlogout',
    'uses' => 'LoginController@actionlogout']);

// Route::get('logout', [LoginController::class, 'actionlogout']);
