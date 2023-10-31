@extends('layouts.app')
@section('title', 'Lista de Actividades')
@section('content')
<div class="container">
    <h1 class="mt-4">Lista de Actividades</h1>
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
    <div class="text-center mb-4">
        <a href="/actividades/create" class="btn btn-outline-primary mr-3">Agregar Actividad</a>
        <a href="/tareas" class="btn btn-outline-primary">Ver Tareas</a>
        <a href="/home" class="btn btn-outline-primary">Inicio</a>
    </div>
</div>
@endsection
