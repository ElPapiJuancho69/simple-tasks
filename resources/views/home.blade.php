@section('title', 'Página Principal')
@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Simple Tasks</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tareas.index') }}">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actividades.index') }}">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reportes.index') }}">Reportes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
        <img src="{{ asset('imagenes/image.jpeg') }}" class="img-fluid" alt="Descripción de la imagen" style="max-width: 1750px; max-height: 820px;">
    </div>
    
<!-- Sección de Tareas -->
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Listado de Tareas</h2>
            <table class="table table-striped">
                <!-- Contenido de la tabla de tareas -->
            </table>
            <div class="text-center">
                <a href="{{ route('tareas.index') }}" class="btn btn-success">Ver Tareas</a>
                <a href="/tareas/create" class="btn btn-success">Agregar tarea</a>
            </div>
        </div>
    </div>
</div>


    <!-- Sección de Actividades -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Listado de Actividades</h2>
                <table class="table table-striped">
                    <!-- Contenido de la tabla de actividades -->
                </table>
                <div class="text-center">
                    <a href="{{ route('actividades.index') }}" class="btn btn-success">Ver Actividades</a>
                    <a href="{{ route('actividades.create') }}" class="btn btn-success">Agregar una Actividad</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Reportes -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Listado de Reportes</h2>
                <table class="table table-striped">
                    <!-- Contenido de la tabla de reportes -->
                </table>
                <div class="text-center">
                    <a href="{{ route('reportes.index') }}" class="btn btn-success">Ver Reportes</a>
                    <a href="{{ route('reportes.create') }}" class="btn btn-success">Crear un Reportes</a>

                </div>
            </div>
        </div>
    </div>
@endsection
