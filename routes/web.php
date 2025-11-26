<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminCafeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- 1. HALAMAN DEPAN (Tamu & User) ---
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// --- 2. PENGATUR LALU LINTAS (Logic Dashboard) ---
// Ini adalah rute yang dituju Laravel setelah login.
// Kita pasang "Polisi Tidur" di sini untuk mengecek siapa yang datang.
Route::get('/dashboard', function () {
    
    // SKENARIO 1: Jika yang login adalah ADMIN
    if (Auth::user()->role === 'admin') {
        // Arahkan ke Dashboard Admin (Tempat input data)
        return redirect()->route('admin.dashboard');
    }

    // SKENARIO 2: Jika yang login adalah USER BIASA
    // Arahkan kembali ke Halaman Depan (Untuk cari cafe)
    return redirect()->route('welcome');

})->middleware(['auth', 'verified'])->name('dashboard');

// --- 3. JALUR KHUSUS ADMIN (Hanya Admin yang bisa akses) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('cafes', AdminCafeController::class);
});

// --- 4. JALUR KHUSUS USER (Beranda Cafe & Favorit) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/cafe/{id}', [HomeController::class, 'show'])->name('cafe.show');
    Route::post('/cafe/{cafeId}/favorite', [HomeController::class, 'toggleFavorite'])->name('cafe.favorite');
});

// --- 5. PROFILE & AUTH ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';