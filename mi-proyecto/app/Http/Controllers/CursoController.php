<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $cursos = Curso::orderBy('profesor')->get();
        return view('cursos.index', compact('cursos'));
    }

    public function search(Request $request){
    $search = $request->input('query');

    $cursos = Curso::when($search, function ($query, $search) {
        return $query->where('profesor', 'like', '%' . $search . '%');
    })->get();
    return view('cursos.index', compact('cursos', 'search'));
    }


    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profesor' => 'required|string|max:255',
            'estado' => 'required|string|in:Ocupado,Disponible',
            'curso' => 'required|string|max:255',
            'oficina' => 'required|integer'
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')
                         ->with('success', 'Curso agregado exitosamente');
    }
    
}