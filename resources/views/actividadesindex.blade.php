@extends('layouts.app')
@section('title', 'Lista de Actividades')
@section('content')
<div class="container mt-4 text-center" >
    <div class="container-fluid">
    <h1 class="mt-4">Lista de Actividades</h1>
    </div>
    <form action="/search" method="GET" class="d-flex" role="search">
        <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
    @if(isset($results) && count($results) > 0)
    <thead>
        <tr>
            <!-- Columna ID eliminada -->
            <th>Descripción de la Actividad</th>
            <th>Fecha de Actividad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $actividad)
            <tr>
                <!-- Columna ID eliminada -->
                <td>{{ $actividad->tareas->descripcion }}</td>
                <td>{{ $actividad->tareas->fecha_creacion }}</td> <!-- Cambio aquí -->
            </tr>
        @endforeach
    </tbody>
    
</table>
<div class="text-center mt-4">
    <a href="{{ url('/actividades') }}" class="btn btn-primary">Mostrar Todos</a>
</div>
    @else

    <table class="table">
        <thead>
            <tr>
                <!-- Columna ID eliminada -->
                <th>Descripción de la Actividad</th>
                <th>Fecha de Actividad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividades as $actividad)
                <tr>
                    <!-- Columna ID eliminada -->
                    <td>{{ $actividad->tareas->descripcion }}</td>
                    <td>{{ $actividad->tareas->fecha_creacion }}</td> <!-- Cambio aquí -->
                </tr>
            @endforeach
        </tbody>
    </table>

    @endif
    
    <div class="text-center mb-4">
        <a href="/actividades/create" class="btn btn-outline-primary mr-3">Agregar Actividad</a>
        <a href="/tareas" class="btn btn-outline-primary">Ver Tareas</a>
        <a href="/home" class="btn btn-outline-primary">Inicio</a>
        <a href="{{ route('listadoactividades.pdf') }}" class="btn btn-primary">PDF</a>
    </div>
</div>
@endsection
