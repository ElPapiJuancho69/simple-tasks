@extends('layouts.pdf')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Descripcion de la actividad</th>
                <th>Fecha Finalizacion de la actividad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->tareas->descripcion }}</td>
                    <td>{{ $actividad->tareas->fecha_creacion }}</td>
            @endforeach
        </tbody>
    </table>
@endsection
