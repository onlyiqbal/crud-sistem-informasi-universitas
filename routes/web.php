<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PencarianController;
use App\Models\Dosen;
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

Route::get('/',[JurusanController::class,'index']);

Route::resource('jurusans',JurusanController::class);

Route::resource('dosens',DosenController::class);

Route::resource('matakuliahs',MatakuliahController::class);

Route::resource('mahasiswas',MahasiswaController::class);

Route::get('/jurusan-dosen/{jurusan_id}',[JurusanController::class,'jurusanDosen'])->name('jurusan-dosen');

Route::get('/jurusan-mahasiswa/{jurusan_id}',[JurusanController::class,'jurusanMahasiswa'])->name('jurusan-mahasiswa');

Route::get('/jurusan-matakuliah/{jurusan_id}',[JurusanController::class,'jurusanMatakuliah'])->name('jurusan-matakuliah');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/buat-matakuliah/{dosen}',[MatakuliahController::class,'buatMatakuliah'])->name('buat-matakuliah');

Route::get('/mahasiswas/ambil-matakuliah/{mahasiswa}',[MahasiswaController::class,'ambilMatakuliah'])->name('ambil-matakuliah');

Route::post('/mahasiswas/ambil-matakuliah/{mahasiswa}',[MahasiswaController::class,'prosesAmbilMatakuliah'])->name('proses-ambil-matakuliah');

Route::get('/matakuliahs/dafarkan-mahasiswa/{matakuliah}',[MatakuliahController::class,'daftarkanMahasiswa'])->name('daftarkan-mahasiswa');

Route::post('/matakuliahs/dafarkan-mahasiswa/{matakuliah}',[MatakuliahController::class,'prosesDaftarkanMahasiswa'])->name('proses-daftarkan-mahasiswa');

Route::get('/pencarian',[PencarianController::class,'index']);

Route::get('/pencarian/proses',[PencarianController::class,'proses']);