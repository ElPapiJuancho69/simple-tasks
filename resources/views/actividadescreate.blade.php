@extends('layouts.app')

@section('title', 'Crear Actividad')

@section('content')
<div class="container">
    <h1>Crear Actividad</h1>
    <form method="POST" action="{{ route('actividades.store') }}">
        @csrf
        <div class="form-group">
            <label for="fecha_actividad">Fecha de Actividad</label>
            <input type="text" name="fecha_actividad" class="form-control" id="fecha_actividad">
        </div>
        <div class="form-group">
            <label for="descripcion_actividad">Descripción de Actividad</label>
            <input type="text" name="descripcion_actividad" class="form-control" id="descripcion_actividad">
        </div>
        <div class="form-group">
            <label for="tarea_id">ID de Tarea</label>
            <input type="text" name="tarea_id" class="form-control" id="tarea_id">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
