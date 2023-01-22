<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipateController;

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

Route::get('cek-pendaftar/{id}', [
    'as' => 'cek-pendaftar',
    'uses' => 'ParticipateController@cekPendaftar']);


Route::get('/panduan', function () { return view('panduan');});
Route::get('/login', function () { return view('login');});

Route::get('/upload', function () { return view('upload');});

Route::post('actionlogin', [
    'as' => 'actionlogin',
    'uses' => 'LoginController@actionlogin']);

// Route::get('upload', [
//     'as' => 'upload',
//     'uses' => 'LoginController@actionlogout']);

Route::get('logout', [
    'as' => 'actionlogout',
    'uses' => 'LoginController@actionlogout']);

Route::get('actionFirst', [
    'as' => 'actionFirst',
    'uses' => 'LoginController@actionFirst']);

Route::get('show-drop-down', [
    'as' => 'show-drop-down',
    'uses' => 'ParticipateController@showDropDown']);

// insert tim
Route::post('insert-tim', [
    'as' => 'insert-tim',
    'uses' => 'ParticipateController@store']);

Route::post('set-session', [
    'as' => 'set-session',
    'uses' => 'ParticipateController@setSession']);

Route::post('insert-file/{route}', [
    'as' => 'insert-file',
    'uses' => 'ParticipateController@store_file']);
