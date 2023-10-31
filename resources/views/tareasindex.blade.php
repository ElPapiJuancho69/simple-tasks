@extends('layouts.app')
@section('title', 'Lista de Tareas')
@section('content')
<div class="container mt-4 text-center">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="display-10">Listado de Tareas</h1>
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
                <th>Acciones</th> <!-- Nueva columna para acciones -->
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
                    <td>
                        <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="/tareas/create" class="btn btn-outline-primary mr-3">Agregar Tarea</a>
        <a href="/home" class="btn btn-outline-primary">Inicio</a>
    </div>
</div>
@endsection