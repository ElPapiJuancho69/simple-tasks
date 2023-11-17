@section('title', 'Página Principal')
@extends('layouts.app')
@section('content')
    <div class="text-center mt-5">
        <img src="{{ asset('imagenes/image.jpeg') }}" class="img-fluid" alt="Descripción de la imagen" style="max-width: 1750px; max-height: 820px;">
    </div>
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
<script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/65443f285055a50032ff278e/65443f2a5055a50032ff2791.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
@endsection