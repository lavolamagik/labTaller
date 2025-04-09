@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Módulos Inscritos</h1>

    <div class="mb-3">
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Añadir</a>
    </div> 

        <div class="group" >
        <form  method="GET" action="{{ route('cursos.search') }}">
        <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        <button type="submit">Buscar</button>
        </form>
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
            @forelse($cursos as $curso)
            <tr>
                <td>{{ $curso->profesor }}</td>
                <td>{{ $curso->estado }}</td>
                <td>{{ $curso->curso }}</td>
                <td>{{ $curso->oficina }}</td>
                <td>{{ $curso->desde ? $curso->desde->format('H:i') : '00:00' }}</td>
                <td>{{ $curso->hasta ? $curso->hasta->format('H:i') : '00:00' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="X">No se encontraron cursos.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<style>
.group {
  display: flex;
  line-height: 28px;
  align-items: center;
  position: relative;
  max-width: 190px;
  float: right;
  margin-bottom: 1rem;  
}

.input {
  font-family: "Montserrat", sans-serif;
  width: 100%;
  height: 45px;
  padding-left: 2.5rem;
  box-shadow: 0 0 0 1.5px #2b2c37, 0 0 25px -17px #000;
  border: 0;
  border-radius: 12px;
  background-color: #16171d;
  outline: none;
  color: #bdbecb;
  transition: all 0.25s cubic-bezier(0.19, 1, 0.22, 1);
  cursor: text;
  z-index: 0;
}

.input::placeholder {
  color: #bdbecb;
}

.input:hover {
  box-shadow: 0 0 0 2.5px #2f303d, 0px 0px 25px -15px #000;
}

.input:active {
  transform: scale(0.95);
}

.input:focus {
  box-shadow: 0 0 0 2.5px #2f303d;
}

.search-icon {
  position: absolute;
  left: 1rem;
  fill: #bdbecb;
  width: 1rem;
  height: 1rem;
  pointer-events: none;
  z-index: 1;
}

</style>


@endsection