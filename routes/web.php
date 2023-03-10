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

// google route
Route::get('/sign-in-google', ['as' => 'user.login.google', 'uses' => 'LoginController@google']);
Route::get('/auth/google/callback', ['as' => 'client.google.callback', 'uses' => 'LoginController@handleProviderCallback']);


Route::get('/token', function () {
    return csrf_token();
});
Route::get('/', function () {return view('homepage');});
Route::get('/participate/{id}', ['as' => 'participate', 'uses' => 'ParticipateController@showData']);
Route::get('/participate', ['as' => 'participate', 'uses' => 'ParticipateController@showData']);

Route::get('/details/{id}', ['as' => 'details', 'uses' => 'DetailsController@showData']);
Route::get('/details', ['as' => 'details', 'uses' => 'DetailsController@showData']);
Route::post('convertPdf', ['as' => 'convertPdf', 'uses' => 'DetailsController@convertPdf']);

Route::get('/judge', ['as' => 'judge', 'uses' => 'JudgeController@showData']);
Route::get('/judge-final', ['as' => 'judge-final', 'uses' => 'JudgeController@showDataFinal']);
Route::get('/judge-admin', ['as' => 'judge-admin', 'uses' => 'JudgeController@showDataAdmin']);
Route::get('/judge-admin-final', ['as' => 'judge-admin-final', 'uses' => 'JudgeController@showDataAdminFinal']);
Route::get('/top5-admin', ['as' => 'top5-admin', 'uses' => 'JudgeController@showTop5Admin']);
Route::get('/judge/{id}', ['as' => 'judge', 'uses' => 'JudgeController@showData']);
Route::get('/judge-final/{id}', ['as' => 'judge-final', 'uses' => 'JudgeController@showDataFinal']);
Route::get('/rate/{id}', ['as' => 'rate', 'uses' => 'JudgeController@showRate']);
Route::get('/rate-final/{id}', ['as' => 'rate-final', 'uses' => 'JudgeController@showRateFinal']);
Route::get('/minmax/{id}', ['as' => 'minmax', 'uses' => 'JudgeController@minmax']);
Route::post('insert-rate', [
    'as' => 'insert-rate',
    'uses' => 'JudgeController@storeRate']);
Route::post('insert-rate-ex', [
    'as' => 'insert-rate',
    'uses' => 'JudgeController@storeRateEx']);
Route::get('/detail-judge/{id}', ['as' => 'detail-judge', 'uses' => 'JudgeController@detail']);
Route::get('/detail-judge-admin/{id}', ['as' => 'detail-judge', 'uses' => 'JudgeController@detailAdmin']);
Route::get('/detail-top5-admin/{id}', ['as' => 'detail-top5-admin', 'uses' => 'JudgeController@detailTop5Admin']);
Route::get('/detail-judge-tim-admin/{id}/{id2}', ['as' => 'detail-judge-admin', 'uses' => 'JudgeController@showRateAdmin']);
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
Route::get('/login-ex', function () { return view('loginEx');});

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

Route::get('/recap', ['as' => 'recap', 'uses' => 'RecapController@index']);
