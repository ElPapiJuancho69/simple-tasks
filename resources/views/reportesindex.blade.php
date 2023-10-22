@extends('layouts.app')

@section('title', 'Lista de Reportes')

@section('content')
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <h1 class="display-10">Listado de Reportes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Generación</th>
                <th>Total de Tareas</th>
                <th>Tareas Completadas</th>
                <th>Tareas Pendientes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->fecha_generacion }}</td>
                    <td>{{ $reporte->num_total_tareas }}</td>
                    <td>{{ $reporte->num_total_tareas_completadas }}</td>
                    <td>{{ $reporte->num_tareas_pendientes }}</td>
                    <td><a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-primary">Ver Detalles</a></td>

                </tr>

            @endforeach
        </tbody>

    </table>
    <form class="d-flex" role="search">  
        <a href="/reportes/create" class="btn btn-outline-primary">Agregar reporte</a>  
    </form>
@endsection
    