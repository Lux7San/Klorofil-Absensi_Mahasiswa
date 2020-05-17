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
    return view('home');
});

Route::get('/login','AuthController@login')->name('login');

Route::get('/dashboard','DashboardController@index')->middleware('auth');

Route::post('/postlogin','AuthController@postlogin');
Route::group(['middleware' => 'auth'],function(){
    // User
    Route::get('/home','HomeController@index');

    // mahasiswa    
    Route::get('/logout','AuthController@logout');
    Route::get('/mahasiswa','MahasiswaController@index');
    Route::post('/mahasiswa/create','MahasiswaController@create');
    Route::get('/mahasiswa/{id}/edit','MahasiswaController@edit');
    Route::post('/mahasiswa/{id}/update','MahasiswaController@update');
    Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete');
    Route::get('/mahasiswa/{id}/profile','MahasiswaController@profile');

    // matakuliah
    Route::get('/mahasiswa/matakuliah','MatakuliahController@index2');
    Route::post('/mahasiswa/matakuliah/add','MatakuliahController@add');
    Route::get('/mahasiswa/matakuliah/edit/{id_matakuliah}','MatakuliahController@edit');
    Route::post('/mahasiswa/matakuliah/update/{id_matakuliah}','MatakuliahController@update');
    Route::get('/mahasiswa/matakuliah/delete/{id_matakuliah}', 'MatakuliahController@delete');

    // Dosen
    Route::get('/dosen','DosenController@index');
    Route::post('/dosen/add','DosenController@add');
    Route::get('/dosen/delete/{nip}', 'DosenController@delete');
});

// gak kepakek
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');