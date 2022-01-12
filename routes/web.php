<?php

use App\Http\Controllers\DataPegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login-act');
Route::post('/logout', 'Auth\LogoutController')->name('logout');
 
Route::middleware(['checkRole:admin,pegawai,ketua,tim_penilai'])->group(function () {
    Route::get('/','DashboardController@index')->name('dashboard');
});

Route::middleware(['checkRole:admin,tim_penilai'])->group(function () {
    Route::get('/data-karyawan', 'DataPegawaiController@index')->name('data-karyawan');
    Route::patch('/data-karyawan', 'DataPegawaiController@update')->name('data-karyawan.update');
});

Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');
    Route::post('/pegawai', 'PegawaiController@store')->name('pegawai.store');
    Route::delete('/pegawai', 'PegawaiController@delete')->name('pegawai.delete');

    Route::get('/satuan-kerja', 'SatuankerjaController@index')->name('satuan-kerja');
    Route::post('/satuan-kerja', 'SatuankerjaController@store')->name('satuan-kerja.store');
    Route::post('/satuan-kerja/hapus/{satuankerja}', 'SatuankerjaController@destroy')->name('satuan-kerja.hapus');

    Route::get('/data-kenaikan-gaji-berkala', 'DataKenaikanGajiBerkalaController@index')->name('data-kenaikan-gaji-berkala');
    Route::patch('/data-kenaikan-gaji-berkala/{daftargaji:id}', 'DataKenaikanGajiBerkalaController@setuju')->name('kenaikan-gaji-berkala.teruskan');
    Route::patch('/penilai/data-kenaikan-gaji-berkala/{daftargaji:id}', 'DataKenaikanGajiBerkalaController@timPenilai')->name('kenaikan-gaji-berkala.teruskan-tim-penilai');
    
    Route::get('/daftar-gaji', 'DaftargajiController@index')->name('daftar-gaji');
    Route::post('/daftar-gaji', 'DaftargajiController@store')->name('daftar-gaji.store');


    Route::get('/laporan-kenaikan-gaji-berkala', 'LaporanKenaikanGajiBerkalaController@index')->name('laporan-kenaikan-gaji-berkala');

});

Route::middleware('checkRole:ketua')->group(function () {
    Route::get('/kenaikan-gaji-berkala', 'Admin\KenaikanGajiController@index')->name('kenaikan-gaji-berkala');
    Route::patch('/kenaikan-gaji-berkala/{daftargaji:id}', 'Admin\KenaikanGajiController@setuju')->name('kenaikan-gaji.setuju');
    Route::patch('/kenaikan-gaji-batal/{daftargaji:id}', 'Admin\KenaikanGajiController@batal')->name('kenaikan-gaji.batal');
});


Route::middleware(['checkRole:pegawai'])->group(function () {
    Route::get('/profil-pegawai', 'Pegawai\ProfilController@index')->name('profil-pegawai');
    Route::patch('/profil-pegawai/{pegawai}', 'Pegawai\ProfilController@update')->name('profil-pegawai.update');
    Route::get('/kenaikan-gaji-pegawai', 'Pegawai\KenaikanGajiController@index')->name('kenaikan-gaji-pegawai');
});
