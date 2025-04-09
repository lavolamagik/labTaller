<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::resource('cursos', CursoController::class);
Route::post('/cursos/buscar', [CursoController::class, 'search'])->name('cursos.search');
Route::get('/', [CursoController::class, 'index'])->name('cursos.index');
