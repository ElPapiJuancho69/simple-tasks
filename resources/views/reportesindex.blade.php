@extends('layouts.app')

@section('title', 'Lista de Reportes')

@section('content')
<div class="container mt-4 text-center">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="display-10">Listado de Reportes</h1>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha de Generación</th>
                <th>Total de Tareas</th>
                <th>Tareas Completadas</th>
                <th>Tareas Pendientes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->fecha_generacion }}</td>
                    <td>{{ $reporte->num_total_tareas }}</td>
                    <td>{{ $reporte->num_total_tareas_completadas }}</td>
                    <td>{{ $reporte->num_tareas_pendientes }}</td>
                    <td><a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-primary">Ver Detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="/reportes/create" class="btn btn-outline-primary mr-3">Agregar Reporte</a>
        <a href="/home" class="btn btn-outline-primary">Inicio</a>
        <a href="{{ route('listadoreportes.pdf') }}" class="btn btn-primary">PDF</a>
    </div>  
</div>
@endsection
