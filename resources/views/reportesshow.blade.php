@extends('layouts.app')
@section('title', 'Reporte Show')
@section('content')
<div class="container">
    <script>
        function confirmDelete(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este reporte?")) {
                // Si el usuario confirma, redirigir al controlador para eliminar el paciente
                window.location.href = '/reporte/delete/' + id;
            }
        }
    </script>
    <h1 class="display-6">Detalles de Reporte</h1>
    <hr style="color: #000000;" />
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Reporte
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$reporte->id}}</h5>
                    <br>
                    <p class="card-text">Fecha Generación: {{$reporte->fecha_generacion}}</p>
                    <p class="card-text">Numero Total de Tareas: {{$reporte->num_total_tareas}}</p>
                    <p class="card-text">Numero Total de Tareas Completadas: {{$reporte->num_total_tareas_completadas}}</p>
                    <p class="card-text">Numero Total de Tareas Pendientes: {{$reporte->num_tareas_pendientes}}</p>

                    <!-- Botones de editar y eliminar con formato de Bootstrap -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        <!-- Botón de eliminación -->
                        <form method="POST" action="{{ route('reportes.destroy', $reporte->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button" onclick="confirmDelete({{ $reporte->id }})">Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$reporte->id}}
                </div>
            </div>
            <a href="/reportes" class="btn btn-primary mt-3">Regresar</a>
        </div>
    </div>
    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @elseif(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
</div>

@endsection