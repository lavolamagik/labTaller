@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Módulos Inscritos</h1>

    <div class="mb-3">
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Añadir</a>
    </div> 

        <div class="group" >
        <form  method="GET" action="{{ route('cursos.search') }}">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
            <g>
            <path
                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
            ></path>
            </g>
        </svg>

        <input
            id="search"
            class="input"
            type="search"
            placeholder="Ordenar"
            name="search"
            value="{{ request('search') }}"
        />
        
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