@extends('layouts.pdf')

@section('content')
<style>
    .container {
        text-align: center;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    h1 {
        font-size: 24px;
        margin: 10px 0;
    }
</style>

<div class="container">
    <img src="{{ public_path('imagenes/tasks.jpg') }}" alt="Imagen de tareas">
    <h1>Informe de Reportes</h1>

    <table>
        <thead>
            <tr>
                <th>Fecha de Generación del Reporte</th>
                <th>Número Total de Tareas</th>
                <th>Número Total de Tareas Completadas</th>
                <th>Número Total de Tareas Pendientes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->fecha_generacion }}</td>
                    <td>{{ $reporte->num_total_tareas }}</td>
                    <td>{{ $reporte->num_total_tareas_completadas }}</td>
                    <td>{{ $reporte->num_tareas_pendientes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
