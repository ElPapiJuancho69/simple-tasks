@extends('layouts.pdf')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha creacion</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->fecha_creacion }}</td>
                    <td>{{ $tarea->estado }}</td>
                    <td>{{ $tarea->usuario_id }}</td>
            @endforeach
        </tbody>
    </table>
@endsection
