<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('landing');


/*
|--------------------------------------------------------------------------
| 2. REDIRECT LOGIC (Pintu Masuk Utama Setelah Login/Register)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $user = Auth::user();
    
    // Logic redirect berdasarkan role agar tidak nyasar
    if ($user?->role === 'Admin') return redirect()->route('admin.dashboard');
    if ($user?->role === 'Guru') return redirect()->route('guru.dashboard');
    if ($user?->role === 'Siswa') return redirect()->route('siswa.dashboard');
    
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); // Middleware 'verified' dihapus biar akun baru bisa langsung masuk


/*
|--------------------------------------------------------------------------
| 3. PROTECTED ROUTES (Hanya User yang Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // --- AUTH PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- RUTE GURU ---
    Route::prefix('guru')->name('guru.')->group(function () {
        // Dashboard & Main Pages
        Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');
        Route::get('/review-karya', [GuruController::class, 'review'])->name('review');
        Route::get('/database-siswa', [GuruController::class, 'siswa'])->name('siswa');
        
        // VIEW PROFILE SISWA
        Route::get('/database-siswa/{id}', [GuruController::class, 'showSiswa'])->name('siswa.show');
        
        // Actions & Management
        Route::post('/karya/{id}/update', [GuruController::class, 'updateStatus'])->name('updateStatus');
        Route::get('/pesan-siswa', [GuruController::class, 'pesan'])->name('pesan');
        Route::get('/berita', [GuruController::class, 'berita'])->name('berita');
        Route::get('/kategori', [GuruController::class, 'kategori'])->name('kategori');
    });

    // --- RUTE SISWA ---
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
        Route::get('/create', [SiswaController::class, 'create'])->name('create'); 
        Route::post('/store', [SiswaController::class, 'storeKarya'])->name('storeKarya'); 
        
        // Detail Karya Siswa
        Route::get('/karya/{id}', [SiswaController::class, 'show'])->name('showKarya');
        
        Route::get('/berita', [SiswaController::class, 'berita'])->name('berita');
        Route::get('/karyaku', [SiswaController::class, 'karyaku'])->name('karyaku');
    });

    // --- RUTE ADMIN ---
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            // Jika ada controller admin, ganti baris ini
            return view('admin.dashboard'); 
        })->name('dashboard');
    });

});

require __DIR__.'/auth.php';