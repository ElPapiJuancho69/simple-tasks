@extends('layouts.app')
@section('title', 'Tareas Edit')
@section('content')
    <h1 class="display-6">Editar Tarea</h1>

    <form method="POST" class="row g-3 needs-validation" action="{{ route('tareas.update', $tarea->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Usa el método PUT para actualización --}}

        <div class="col-md-6">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" class="form-control" value="{{ $tarea->titulo }}" required>
        </div>

        <div class="col-md-6">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input name="descripcion" class="form-control" value="{{ $tarea->descripcion }}">
        </div>

        <div class="col-md-6">
            <label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
            <input type="date" name="fecha_creacion" class="form-control" value="{{ $tarea->fecha_creacion }}" required>
        </div>

        <div class="col-md-6">
            <label for="estado" class="form-label">Estado:</label>
            {!! Form::select('estado', ['pendiente' => 'Pendiente', 'completada' => 'Completada'], $tarea->estado, ['class' => 'form-select', 'required' => 'required']) !!}
        </div>

        <div class="col-md-6">
            <label for="usuario_id" class="form-label">Usuario:</label>
            {!! Form::select('usuario_id', $usuarios->pluck('name', 'id'), $tarea->usuario_id, ['class' => 'form-select', 'required' => 'required']) !!}
        </div>
        
        <div class="col-md-6">
            <label for="imagen" class="form-label">Seleccionar Nueva Imagen:</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <!-- Mostrar la imagen actual -->
        <div class="col-md-6">
            <label for="imagen" class="form-label">Imagen Actual:</label>
            @if($tarea->imagen)
                <img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 10px;" src="{{ asset('imagenes/' . $tarea->imagen) }}" alt="Imagen actual">
            @else
                <p>No hay imagen disponible</p>
            @endif
        </div>



        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection
