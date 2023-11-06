@extends('layouts.pdf')

@section('content')
<style>
    .container {
        text-align: center;
        padding: 20px;
    }

    img {
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    h1 {
        font-size: 24px;
        margin: 10px 0;
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
</style>

<div class="container">
    <img src="{{ public_path('imagenes/tasks.jpg') }}" alt="Imagen de tareas">
    <h1>PDF De Tareas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Estado</th>
                <th>ID de Usuario</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
