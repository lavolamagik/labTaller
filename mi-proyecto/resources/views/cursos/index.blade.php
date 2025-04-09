@extends('layouts.app')


    

@section('title', 'Módulos Inscritos')

@section('content_header')
    <h1>Módulos Inscritos</h1>
@stop


@section('content_body')     


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
        <form  method="POST" action="/cursos/buscar">
            @csrf
            <h2 class="text-center display-4">Buscar</h2>
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Buscar" name="buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

        </div>
        
        </form>
    <!-- Botón para abrir el popup -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#popupCurso">
        Añadir Curso
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Estado</th>
                <th>Curso</th>
                <th>Oficina</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cursos as $curso)
            <tr>
                <td>{{ $curso->profesor }}</td>
                <td>{{ $curso->estado }}</td>
                <td>{{ $curso->curso }}</td>
                <td>{{ $curso->oficina }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="X">No se encontraron cursos.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="popupCurso" tabindex="-1" aria-labelledby="popupCursoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content custom-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="popupCursoLabel">Añadir nuevo curso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario -->
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <input type="text" class="form-control" id="profesor" name="profesor" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Disponible">Disponible</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" required>
            </div>

            <div class="mb-3">
                <label for="oficina" class="form-label">Oficina</label>
                <input type="number" class="form-control" id="oficina" name="oficina" required>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
