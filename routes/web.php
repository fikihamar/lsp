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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return redirect()->route('view.login','admin');
});

Route::get('/login/{role}','AuthController@viewLogin')->name('view.login');
Route::post('/login/{role}','AuthController@login')->name('login');
Route::post('/logout','AuthController@logout')->name('logout');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'login.check:admin'
], function(){
    Route::view('home','admin.home');

    Route::prefix('jurusan')->group(function(){
        Route::get('/','Admin\JurusanController@data')->name('data.jurusan');
        Route::post('/add','Admin\JurusanController@store')->name('add.jurusan');
        Route::get('/edit/{id}','Admin\JurusanController@edit')->name('edit.jurusan');
        Route::post('/save/{id}','Admin\JurusanController@save')->name('save.jurusan');
        Route::post('/delete{id}','Admin\JurusanController@delete')->name('delete.jurusan');
    }); 
    Route::prefix('kelas')->group(function(){
        Route::get('/','Admin\KelasController@data')->name('data.kelas');
        Route::post('/add','Admin\KelasController@store')->name('add.kelas');
        Route::get('/edit/{id}','Admin\KelasController@edit')->name('edit.kelas');
        Route::post('/save/{id}','Admin\KelasController@save')->name('save.kelas');
        Route::post('/delete{id}','Admin\KelasController@delete')->name('delete.kelas');
    }); 
    Route::prefix('siswa')->group(function(){
        Route::get('/','Admin\SiswaController@data')->name('data.siswa');
        Route::post('/add','Admin\SiswaController@store')->name('add.siswa');
        Route::get('/edit/{nis}','Admin\SiswaController@edit')->name('edit.siswa');
        Route::post('/save/{nis}','Admin\SiswaController@save')->name('save.siswa');
        Route::post('/delete{nis}','Admin\SiswaController@delete')->name('delete.siswa');
    }); 
    Route::prefix('guru')->group(function(){
        Route::get('/','Admin\GuruController@data')->name('data.guru');
        Route::post('/add','Admin\GuruController@store')->name('add.guru');
        Route::get('/edit/{nip}','Admin\GuruController@edit')->name('edit.guru');
        Route::post('/save/{nip}','Admin\GuruController@save')->name('save.guru');
        Route::post('/delete{nip}','Admin\GuruController@delete')->name('delete.guru');
    }); 
    Route::prefix('mapel')->group(function(){
        Route::get('/','Admin\MapelController@data')->name('data.mapel');
        Route::post('/add','Admin\MapelController@store')->name('add.mapel');
        Route::get('/edit/{id}','Admin\MapelController@edit')->name('edit.mapel');
        Route::post('/save/{id}','Admin\MapelController@save')->name('save.mapel');
        Route::post('/delete{id}','Admin\MapelController@delete')->name('delete.mapel');
    }); 
    Route::prefix('mengajar')->group(function(){
        Route::get('/','Admin\MengajarController@data')->name('data.mengajar');
        Route::post('/add','Admin\MengajarController@store')->name('add.mengajar');
        Route::get('/edit/{id}','Admin\MengajarController@edit')->name('edit.mengajar');
        Route::post('/save/{id}','Admin\MengajarController@save')->name('save.mengajar');
        Route::post('/delete{id}','Admin\MengajarController@delete')->name('delete.mengajar');
    }); 
});

Route::group([
    'prefix' => 'guru',
    'middleware' => 'login.check:guru'
], function(){
    Route::view('home','guru.home');
    Route::prefix('nilai')->group(function(){
        Route::get('/','Guru\NilaiController@data')->name('data.nilai');
        Route::post('/add','Guru\NilaiController@store')->name('add.nilai');
        Route::get('/edit/{id}','Guru\NilaiController@edit')->name('edit.nilai');
        Route::post('/save/{id}','Guru\NilaiController@save')->name('save.nilai');
        Route::post('/delete{id}','Guru\NilaiController@delete')->name('delete.nilai');
    }); 
});

Route::group([
    'prefix' => 'siswa',
    'middleware' => 'login.check:siswa'
], function(){
    Route::view('home','siswa.home');
    Route::get('nilai','Siswa\NilaiController@data')->name('siswa.nilai');
});