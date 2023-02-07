<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipateController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\JudgeController;

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
Route::get('/participate/{id}', ['as' => 'participate', 'uses' => 'ParticipateController@abort']);
Route::get('/participate', ['as' => 'participate', 'uses' => 'ParticipateController@abort']);

Route::get('/details/{id}', ['as' => 'details', 'uses' => 'DetailsController@showData']);
Route::get('/details', ['as' => 'details', 'uses' => 'DetailsController@showData']);
Route::post('convertPdf', ['as' => 'convertPdf', 'uses' => 'DetailsController@convertPdf']);

Route::get('/judge', ['as' => 'judge', 'uses' => 'JudgeController@showData']);
Route::get('/judge/{id}', ['as' => 'judge', 'uses' => 'JudgeController@showData']);
Route::get('/rate/{id}', ['as' => 'rate', 'uses' => 'JudgeController@showRate']);
Route::post('insert-rate', [
    'as' => 'insert-rate',
    'uses' => 'JudgeController@storeRate']);
Route::get('/detail-judge/{id}', ['as' => 'detail-judge', 'uses' => 'JudgeController@detail']);

Route::get('/showFilePdf/{id}', ['as' => 'showFilePdf', 'uses' => 'ParticipateController@showFilePdf']);

Route::get('/voting', ['as' => 'voting', 'uses' => 'VotingController@showData']);
Route::get('/count-vote', ['as' => 'count-vote', 'uses' => 'VotingController@countVote']);
Route::get('/cek-have-vote/{id}', ['as' => 'cek-have-vote', 'uses' => 'VotingController@cekHaveVote']);
Route::post('store-vote', [
    'as' => 'store-vote',
    'uses' => 'VotingController@store']);


Route::get('/countGuest', ['as' => 'countGuest', 'uses' => 'LoginController@countGuest']);

// Route::name('participate')->get('/participate/{id}', [
//     'as' => 'participate', 'uses' => 'ParticipateController@showData'
// ]);
// Route::get('/participate', function () { return view('participate');});

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
