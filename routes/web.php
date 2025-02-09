<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalisesSoloController;
use App\Http\Controllers\RecomendacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard/info', [DashboardController::class, 'info'])->middleware(['auth', 'verified'])->name('dashboard.info');    

    Route::get('/analysis', [AnalisesSoloController::class, 'index'])->name('analysis.index');
    Route::post('/analysis', [AnalisesSoloController::class, 'store'])->name('analysis.store');
    Route::get('/analysis/create', [AnalisesSoloController::class, 'create'])->name('analysis.create');
    Route::get('/analysis/{id}', [AnalisesSoloController::class, 'show'])->name('analysis.show');
    Route::put('/analysis/{id}', [AnalisesSoloController::class, 'update'])->name('analysis.update');
    Route::delete('/analysis/{id}', [AnalisesSoloController::class, 'destroy'])->name('analysis.destroy');
    Route::get('/analysis/{id}/edit', [AnalisesSoloController::class, 'edit'])->name('analysis.edit');

    Route::post('/recommendations/{idAnalise}', [RecomendacaoController::class, 'store'])->name('recommendations.store');
    Route::get('/recommendations/{idAnalise}', [RecomendacaoController::class, 'create'])->name('recommendations.create');
    Route::post('/recommendations/{id}/store/{idAnalise}', [RecomendacaoController::class, 'store_part2'])->name('recommendations.store-part2');
    Route::get('/recommendations/{id}/create/{idAnalise}', [RecomendacaoController::class, 'create_part2'])->name('recommendations.create-part2');
    Route::get('/recommendations/{id}/show', [RecomendacaoController::class, 'show'])->name('recommendations.show');
    Route::get('/recommendations/exportar/{id}', [RecomendacaoController::class, 'exportarPdf'])->name('recommendations.exportar');
    Route::delete('/recommendations/{id}', [RecomendacaoController::class, 'destroy'])->name('recommendations.destroy');

    Route::get('/propriedades', [PropriedadeController::class, 'index'])->name('propriedades.index');
    Route::post('/propriedades', [PropriedadeController::class, 'store'])->name('propriedades.store');
    Route::get('/propriedades/create', [PropriedadeController::class, 'create'])->name('propriedades.create');
    Route::put('/propriedades/{id}', [PropriedadeController::class, 'update'])->name('propriedades.update');
    Route::get('/propriedades/{id}/edit', [PropriedadeController::class, 'edit'])->name('propriedades.edit');
    Route::delete('/propriedades/{id}', [PropriedadeController::class, 'destroy'])->name('propriedades.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{id}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggleActive');
    Route::put('/users/{id}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
