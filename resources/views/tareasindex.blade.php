@extends('layouts.app')
@section('title', 'Lista de Tareas')
@section('content')
<h1>Lista de Tareas</h1>
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
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
