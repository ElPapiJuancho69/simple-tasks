@extends('layouts.app')
@section('title', 'Tarea Show')
@section('content')
<div class="container">
    <script>
        function confirmDelete(id) {
            console.log('Confirmación de eliminación llamada para la tarea con ID: ' + id);
            if (confirm("¿Estás seguro de que quieres eliminar esta tarea?")) {
                // Si el usuario confirma, redirigir al controlador para eliminar la tarea
                window.location.href = '/tarea/delete/' + id;
            }
        }
    </script>
    
    <h1 class="display-6">Detalles de la tarea</h1>
    <hr style="color: #000000;" />
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tarea
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$tarea->id}}</h5>
                    <br>
                    <p class="card-text">Titulo de la tarea: {{$tarea->titulo}}</p>
                    <p class="card-text">Descripcion: {{$tarea->descripcion}}</p>
                    <p class="card-text">Fecha creacion: {{$tarea->fecha_creacion}}</p>
                    <p class="card-text">Número Total de Tareas Pendientes: {{$tarea->estado}}</p>

                    <!-- Mostrar la imagen -->
                    @if($tarea->imagen)
                        <img style="height: 500px; width: 500px; background-color: #EFEFEF; margin: 20px;" src="{{ asset('imagenes/' . $tarea->imagen) }}" alt="Imagen de la tarea">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif

                    <!-- Botones de editar y eliminar con formato de Bootstrap -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary">Editar</a>
                        
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
            <a href="{{ route('tareas.index') }}" class="btn btn-primary mt-3">Regresar</a>
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
