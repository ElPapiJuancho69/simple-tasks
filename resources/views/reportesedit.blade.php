@extends('layouts.app')
@section('title', 'Reporte Edit')
@section('content')
<h1 class="display-6">Editar Reporte</h1>

<form method="POST" class="row g-3 needs-validation" action="{{ route('reportes.update', $reporte->id) }}">
    @csrf
    @method('PUT') {{-- Usa el método PUT para actualización --}}

    <div class="col-md-6">
        <label  for="fecha_generacion" class="form-label">Fecha Generacion</label>
        <input type="date" name="fecha_generacion"  class="form-control" value="{{$reporte->fecha_generacion}}" required>
    </div>

    <div class="col-md-6">
        <label for="num_total_tareas" class="form-label">Numero total de tareas</label>
        <input name="num_total_tareas" class="form-control" value="{{$reporte->num_total_tareas}}" required>
    </div class="col-md-6">

    <div class="col-md-6">
        <label for="fecha_creacion" class="form-label">Numero total de tareas completadas</label>
        <input type="text" name="num_total_tareas_completadas" class="form-control" value="{{$reporte->num_total_tareas_completadas}}" required>
    </div>    

    <div class="col-md-6">
        <label for="fecha_creacion" class="form-label">Numero total de tareas pendientes</label>
        <input type="text" name="num_tareas_pendientes" class="form-control" value="{{$reporte->num_tareas_pendientes}}" required>
    </div>   

    <div class="col-md-6">
        <label for="usuario_id" class="form-label">Usuario:</label>
        <!-- Aquí puedes agregar un menú desplegable para seleccionar el usuario -->
        <input name="usuario_id"  class="form-control" value="{{$reporte->usuario_id}}" required>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection