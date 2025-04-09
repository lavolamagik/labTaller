<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::resource('cursos', CursoController::class);
Route::get('/cursos', [CursoController::class, 'search'])->name('cursos.search');
