<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirige a la página principal de cursos
     */
    public function index()
    {
        return redirect()->route('cursos.index');
    }
}