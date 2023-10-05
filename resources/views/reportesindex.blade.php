@extends('layouts.app')

@section('title', 'Lista de Reportes')

@section('content')
    <h1>Lista de Reportes</h1>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
