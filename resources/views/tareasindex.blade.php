@extends('layouts.app')
@section('title', 'Lista de Tareas')
@section('content')
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="display-10">Listado de Tareas</h1>
        <form class="d-flex" role="search">  
            <a href="/tareas/create" class="btn btn-outline-primary">Agregar tarea</a>
        </form>
    </div>
</nav>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->id }}</td>
                <td>{{ $tarea->titulo }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_creacion }}</td>
                <td>{{ $tarea->estado }}</td>
                <td><a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary">Ver Detalles</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
