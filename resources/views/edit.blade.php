@extends('layouts.app')
@section('title', 'Editar Tarea')
@section('content')
    <h1>Editar Tarea</h1>
    <form action="{{ route('tareas.update', ['tarea' => $tarea->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $tarea->titulo }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $tarea->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="text" name="fecha_creacion" class="form-control" value="{{ $tarea->fecha_creacion }}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" value="{{ $tarea->estado }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection
