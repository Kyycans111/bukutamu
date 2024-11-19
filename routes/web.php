<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BtamuController;
use App\Http\Controllers\UserController;


// Route Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman dashboard Buku Tamu yang membutuhkan login
Route::get('/bukutamu', [BukuTamuController::class, 'index'])->middleware('auth');

// Route CRUD Buku Tamu hanya dapat diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {
    Route::resource('bukutamu', BukuTamuController::class);

    Route::get('user/edit-password', [UserController::class, 'editPassword'])->name('user.editPassword');
    Route::post('user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
});

// Route CRUD BTamu (tanpa login)
Route::resource('btamu', BtamuController::class)->only(['index', 'create', 'store']);