<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboratoriumController;

// Mengarahkan halaman utama (/) langsung ke fungsi index Laboratorium
Route::get('/', [LaboratoriumController::class, 'index']);

// Kelompok Route Laboratorium dengan Model-View-Controller (MVC)
Route::prefix('laboratorium')->group(function () {
    Route::get('/', [LaboratoriumController::class, 'index']);
    Route::get('/detail/{kode}', [LaboratoriumController::class, 'detail']);
    Route::get('/status/{status?}', [LaboratoriumController::class, 'statusLab']);
});