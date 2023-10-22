@extends('layouts.app')
@section('title', 'Reporte Edit')
@section('content')
    <div class="container">
        <h1 class="display-6">Crear Reporte</h1>

        <form method="POST" class="row g-3 needs-validation" action="/reportes">
            @csrf

            <div class="col-md-6">
                <label for="fecha_generacion" class="form-label">Fecha de Creación:</label>
                <input type="date" name="fecha_generacion" id="fecha_generacion" class="form-control">
            </div>   

            <div class="form-group" class="col-md-6">
                <label for="num_total_tareas">Número Total de Tareas:</label>
                <input type="text" name="num_total_tareas" id="num_total_tareas" class="form-control" required>
            </div>

            <div class="form-group" class="col-md-6">
                <label for="num_total_tareas_completadas">Número Total de Tareas Completadas:</label>
                <input type="text" name="num_total_tareas_completadas" id="num_total_tareas_completadas" class="form-control" required>
            </div>

            <div class="form-group" class="col-md-6">
                <label for="num_tareas_pendientes">Número de Tareas Pendientes:</label>
                <input type="text" name="num_tareas_pendientes" id="num_tareas_pendientes" class="form-control" required>
            </div>

            <div class="form-group" class="col-md-6">
                <label for="usuario_id">Usuario:</label>
                <!-- Aquí puedes agregar un menú desplegable para seleccionar el usuario -->
                <input type="text" name="usuario_id" id="usuario_id" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Reporte</button>
        </form>
    </div>
@endsection
