@extends('layouts.app')

@section('title', 'Módulos Inscritos')

@section('content_header')
    <h1>Módulos Inscritos</h1>
@stop


@section('content_body')


    <div class="mb-3">
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Añadir</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Estado</th>
                <th>Curso</th>
                <th>Oficina</th>
                <th>Desde</th>
                <th>Hasta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->profesor }}</td>
                <td>{{ $curso->estado }}</td>
                <td>{{ $curso->curso }}</td>
                <td>{{ $curso->oficina }}</td>
                <td>{{ $curso->desde ? $curso->desde->format('H:i') : '00:00' }}</td>
                <td>{{ $curso->hasta ? $curso->hasta->format('H:i') : '00:00' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
