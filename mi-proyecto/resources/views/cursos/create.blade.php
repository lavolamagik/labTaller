@extends('layouts.app')

<<<<<<< HEAD
@section('content')
<link rel="stylesheet" href="{{ asset('css/CursosCreate.css') }}">

<div class="container">
=======
@section('title', 'Añadir Nuevo Curso')

@section('content_header')
>>>>>>> origin/yanko
    <h1>Añadir Nuevo Curso</h1>
@stop

@section('content_body')
<div class="container">


    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="profesor">Profesor</label>
            <input type="text" class="form-control" id="profesor" name="profesor" required>
        </div>

        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Ocupado">Ocupado</option>
                <option value="Disponible">Disponible</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="curso">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" required>
        </div>

        <div class="form-group mb-3">
            <label for="oficina">Oficina</label>
            <input type="number" class="form-control" id="oficina" name="oficina" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
