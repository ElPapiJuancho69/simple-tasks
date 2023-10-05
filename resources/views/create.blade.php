@extends('layouts.app')

@section('title', 'Crear Tarea')

@section('content')
    <h1>Crear Tarea</h1>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación:</label>
            <input type="text" name="fecha_creacion" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
