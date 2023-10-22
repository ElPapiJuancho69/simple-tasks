@extends('layouts.app')
@section('title', 'Tareas Edit')
@section('content')
<h1 class="display-6">Editar Tarea</h1>

<form method="POST" class="row g-3 needs-validation" action="{{ route('tareas.update', $tarea->id) }}">
    @csrf
    @method('PUT') {{-- Usa el método PUT para actualización --}}

    <div class="col-md-6">
        <label  for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo"  class="form-control" value="{{$tarea->titulo}}" required>
    </div>

    <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripción:</label>
        <input name="descripcion" class="form-control" value="{{$tarea->descripcion}}" required>
    </div class="col-md-6">

    <div class="col-md-6">
        <label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
        <input type="date" name="fecha_creacion" class="form-control" value="{{$tarea->fecha_creacion}}" required>
    </div>    

    <div class="col-md-6">
        <label for="estado" class="form-label">Estado:</label>
        <select name="estado"  class="form-select" value="{{$tarea->estado}}" required>
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="usuario_id" class="form-label">Usuario:</label>
        <!-- Aquí puedes agregar un menú desplegable para seleccionar el usuario -->
        <input name="usuario_id"  class="form-control" value="{{$tarea->usuario_id}}" required>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection