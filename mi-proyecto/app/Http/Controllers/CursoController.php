<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function search(Request $request)
    {
        $textoABuscar = $request->input('buscar');
        $cursos = Curso::where('profesor', 'LIKE', "%$textoABuscar%")
            ->orWhere('curso', 'LIKE', "%$textoABuscar%")
            ->orWhere('oficina', 'LIKE', "%$textoABuscar%")
            ->orderBy('profesor')
            ->get();

        return view('cursos.index', compact('cursos'));
    }
    
    public function index()
    {
        $cursos = Curso::orderBy('profesor')->get();
        return view('cursos.index', compact('cursos'));
    }

    


    public function create()
    {
        return view('cursos.create');
    }

    // Guarda el curso
    public function store(Request $request)
    {
        $request->validate([
            'profesor' => 'required|string|max:255',
            'estado' => 'required|string|in:Ocupado,Disponible',
            'curso' => 'required|string|max:255',
            'oficina' => 'required|integer',
            'desde' => 'nullable|date_format:H:i',
            'hasta' => 'nullable|date_format:H:i',
        ]);

        Curso::create([
            'profesor' => $request->profesor,
            'estado' => $request->estado,
            'curso' => $request->curso,
            'oficina' => $request->oficina,
            'desde' => $request->desde,
            'hasta' => $request->hasta,
        ]);

        return redirect()->route('cursos.index')
                         ->with('success', 'Curso agregado exitosamente');
    }
    
}
