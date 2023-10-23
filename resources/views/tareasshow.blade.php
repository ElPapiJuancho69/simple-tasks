@extends('layouts.app')
@section('title', 'Tarea Show')
@section('content')
<div class="container">
    <script>
        function confirmDelete(id) {
            if (confirm("¿Estás seguro de que quieres eliminar esta tarea?")) {
                // Si el usuario confirma, redirigir al controlador para eliminar la tarea
                window.location.href = '/tareas/delete/' + id;
            }
        }
    </script>
    <h1 class="display-6">Detalles de Tarea</h1>
    <hr style="color: #000000;" />
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tarea
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$tarea->titulo}}</h5>
                    <br>
                    <p class="card-text">Descripcion: {{$tarea->descripcion}}</p>
                    <p class="card-text">Estado: {{$tarea->estado}}</p>
                    <p class="card-text">Usuario: {{$tarea->usuario_id}}</p>
                    <!-- Botones de editar y eliminar con formato de Bootstrap -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <!-- Botón para editar el cliente -->
                        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-success" role="button">Editar</a>

                        <!-- Botón de eliminación -->
                        <form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" role="button" onclick="confirmDelete({{ $tarea->id }})">Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$tarea->id}}
                </div>
            </div>
            <a href="/tareas" class="btn btn-primary mt-3">Regresar</a>
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