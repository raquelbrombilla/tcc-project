<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalisesSoloController;
use App\Http\Controllers\RecomendacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropriedadeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/info', [DashboardController::class, 'info'])->middleware(['auth', 'verified'])->name('dashboard.info');


// Route::get('/dashboard', function () {
    
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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

    Route::get('/propriedades', [PropriedadeController::class, 'index'])->name('propriedades.index');
    Route::post('/propriedades', [PropriedadeController::class, 'store'])->name('propriedades.store');
    Route::get('/propriedades/create', [PropriedadeController::class, 'create'])->name('propriedades.create');
    Route::put('/propriedades/{id}', [PropriedadeController::class, 'update'])->name('propriedades.update');
    Route::delete('/propriedades/{id}', [PropriedadeController::class, 'destroy'])->name('propriedades.destroy');
    Route::get('/propriedades/{id}/edit', [PropriedadeController::class, 'edit'])->name('propriedades.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
