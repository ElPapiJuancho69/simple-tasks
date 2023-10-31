@extends('layouts.app')

@section('title', 'Crear Actividad')

@section('content')
<div class="container">
    <h1>Crear Actividad</h1>
    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @elseif(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
    <form method="POST" action="{{ route('actividades.store') }}">
        @csrf

        <div class="form-group">
            <label for="fecha_actividad">Fecha de Actividad:</label>
            <input type="date" name="fecha_actividad" class="form-control" id="fecha_actividad">
        </div>

        <div class="form-group">
            <label for="descripcion_actividad">Descripción de Actividad:</label>
            <input type="text" name="descripcion_actividad" class="form-control" id="descripcion_actividad">
        </div>

        <div class="col-md-6">
            <label for="tarea_id" class="form-label">Tarea:</label>
            <select name="tarea_id" id="tarea_id" class="form-select" required>
                @foreach($tarea as $tarea)
                    <option value="{{ $tarea->id }}">{{ $tarea->titulo }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('actividades.index') }}" class="btn btn-outline-primary">Inicio</a>
    </form>
</div>
@endsection
