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
    <h1>PDF De Actividades</h1>

    <table>
        <thead>
            <tr>
                <th>Descripción de la actividad</th>
                <th>Fecha de Finalización de la actividad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->tareas->descripcion }}</td>
                    <td>{{ $actividad->tareas->fecha_creacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
