<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;

// 🔥 TAMBAHAN INI
use App\Models\Siswa;
use App\Models\Kelas;

// ================= HOME =================
Route::get('/', function () {
    return view('welcome');
});

// ================= LOGIN =================
Route::get('/log', function (){
    return view('login');
})->name('login');

Route::post('/log', [AuthController::class, 'authenticate'])->name('log');

// ================= DASHBOARD =================
Route::get('/dashboard', function () {
    return view('dashboard', [
        'jumlahSiswa' => Siswa::count(),
        'jumlahKelas' => Kelas::count()
    ]);
})->middleware('auth')->name('dashboard');

// ================= KELAS & SISWA =================
Route::middleware('auth')->group(function () {

    // ===== KELAS =====
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}/hapus', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // ===== SISWA =====
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}/hapus', [SiswaController::class, 'destroy'])->name('siswa.destroy');

});

// ================= LOGOUT =================
Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/log');
})->name('logout');


// ================= ADMIN =================
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard', [
            'jumlahSiswa' => Siswa::count(),
            'jumlahKelas' => Kelas::count()
        ]);
    })->name('admin.dashboard');
});


// ================= USER =================
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard', [
            'jumlahSiswa' => Siswa::count(),
            'jumlahKelas' => Kelas::count()
        ]);
    })->name('user.dashboard');
});