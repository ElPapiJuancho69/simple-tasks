@extends('layouts.app')
@section('title', 'Tareas Edit')
@section('content')
<h1 class="display-6">Crear una Tarea</h1>
<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @elseif(session('error'))
        alert("{{ session('error') }}");
    @endif
</script>
<form method="POST" class="row g-3 needs-validation" action="{{ route('tareas.store') }}">
    @csrf

    <div class="col-md-6">
        <label  for="titulo" class="form-label">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripción:</label>
        <input name="descripcion" id="descripcion" class="form-control">
    </div class="col-md-6">

    <div class="col-md-6">
        <label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
        <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control">
    </div>    

    <div class="col-md-6">
        <label for="estado" class="form-label">Estado:</label>
        <select name="estado" id="estado" class="form-select">
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="usuario_id" class="form-label">Usuario:</label>
        <!-- Aquí puedes agregar un menú desplegable para seleccionar el usuario -->
        <input name="usuario_id" id="usuario_id" class="form-control">
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear Tarea</button>
    <a href="/tareas" class="btn btn-outline-primary">Inicio</a>
</form>
@endsection