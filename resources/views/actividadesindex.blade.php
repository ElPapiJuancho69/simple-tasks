@extends('layouts.app')
@section('title', 'Lista de Actividades')
@section('content')
<h1>Lista de Actividades</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción de la Actividad</th>
            <th>Fecha de Actividad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($actividades as $actividad)
            <tr>
                <td>{{ $actividad->id }}</td>
                <td>{{ $actividad->tareas->descripcion }}</td>
                <td>{{ $actividad->fecha_actividad }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
