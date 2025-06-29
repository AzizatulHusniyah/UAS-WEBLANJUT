<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;

// ===== PUBLIC ROUTES ===== //
Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// ===== PROTECTED ROUTES (AUTH) ===== //
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'auth'
])->group(function () {
    
    // Jika pakai controller untuk dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Jika tetap pakai closure:
    Route::get('/dashboard', function () {
        // Jika ingin load berita terbaru juga:
        $beritas = \App\Models\Berita::latest()->take(3)->get();
        return view('dashboard', compact('beritas'));
    })->name('dashboard');

    // User Management View
    Route::get('/user-management', function () {
        return view('user-management');
    });

    // CRUD Berita
    Route::resource('berita', BeritaController::class);
});
