@extends('layouts.app')
@section('title', 'Lista de Tareas')
@section('content')
    <div class="container mt-4 text-center">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="display-10">Listado de Tareas</h1>
            </div>
            <form action="/search" method="GET" class="d-flex" role="search">
                <input type="search" name="query" placeholder="Buscar..." class="form-control me-2">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </nav>
        @if(session('error'))
        <div id="alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div id="alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @if(isset($error))
            <p class="text-center mt-4">{{ $error }}</p>
        @elseif(isset($results) && count($results) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Estado</th>
                        <th>Acciones</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $tarea)
                        <tr>
                            <td>
                                @if ($tarea->estado === 'completado')
                                    <span class="completed-title">{{ $tarea->titulo }}</span>
                                @else
                                    {{ $tarea->titulo }}
                                @endif
                            </td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->fecha_creacion }}</td>
                            <td>{{ $tarea->estado }}</td>
                            <td>
                                <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-4">
                <a href="{{ url('/tareas') }}" class="btn btn-primary">Mostrar Todos</a>
            </div>
        @else
            @if(isset($tareas) && count($tareas) > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha de Creación</th>
                            <th>Estado</th>
                            <th>Acciones</th> <!-- Nueva columna para acciones -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tareas as $tarea)
                            <tr>
                                <td>
                                    @if ($tarea->estado === 'completado')
                                        <span class="completed-title">{{ $tarea->titulo }}</span>
                                    @else
                                        {{ $tarea->titulo }}
                                    @endif
                                </td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>{{ $tarea->fecha_creacion }}</td>
                                <td>{{ $tarea->estado }}</td>
                                <td>
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary">Ver Detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>   
            @else
                <p class="text-center mt-4">No hay resultados para mostrar.</p>
            @endif
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('Listadotareas.pdf') }}" class="btn btn-primary">PDF</a>
            <a href="/tareas/create" class="btn btn-outline-primary mr-3">Agregar Tarea</a>
            <a href="/home" class="btn btn-outline-primary">Inicio</a>
        </div>
    </div>
@endsection

