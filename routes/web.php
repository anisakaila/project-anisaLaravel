<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');

// Route khusus halaman konfirmasi hapus dan edit
Route::resource('kelas', KelasController::class)->except(['edit', 'update', 'destroy']);
Route::get('kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::get('kelas/{id}/hapus', [KelasController::class, 'hapus'])->name('kelas.hapus');
Route::delete('kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::POST('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}/hapus', [SiswaController::class, 'destroy'])->name('siswa.destroy');
