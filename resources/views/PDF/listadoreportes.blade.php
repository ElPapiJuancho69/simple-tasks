@extends('layouts.pdf')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Fecha generacion de reporte</th>
                <th>Numero total de tareas</th>
                <th>Numero total de tareas completadas</th>
                <th>Numero total de tareas pendientes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->fecha_generacion }}</td>
                    <td>{{ $reporte->num_total_tareas }}</td>
                    <td>{{ $reporte->num_total_tareas_completadas }}</td>
                    <td>{{ $reporte->num_tareas_pendientes }}</td>
            @endforeach
        </tbody>
    </table>
@endsection
