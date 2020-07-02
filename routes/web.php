<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route pertanyaan
Route::get('/pertanyaan', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/pertanyaan', 'PertanyaanController@store');

// Route jawaban
Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index');
Route::post('/jawaban/{pertanyaan_id}', 'JawabanController@store');
Route::get('/jawaban/{pertanyaan_id}/jawab', 'JawabanController@create');