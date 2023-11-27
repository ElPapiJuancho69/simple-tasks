@extends('layouts.app')
@section('title', 'Tareas Create')
@section('content')
    <h1 class="display-6">Crear una Tarea</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @elseif(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>

    {!! Form::open(['route' => 'tareas.store', 'class' => 'row g-3 needs-validation', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    <div class="col-md-6">
        {{ Form::label('titulo', 'Título:', ['class' => 'form-label']) }}
        {{ Form::text('titulo', null, ['class' => 'form-control']) }}
    </div>

    <div class="col-md-6">
        {{ Form::label('descripcion', 'Descripción:', ['class' => 'form-label']) }}
        {{ Form::text('descripcion', null, ['class' => 'form-control']) }}
    </div>

    <div class="col-md-6">
        {{ Form::label('fecha_creacion', 'Fecha de Creación:', ['class' => 'form-label']) }}
        {{ Form::date('fecha_creacion', null, ['class' => 'form-control']) }}

        @error('fecha_creacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        {{ Form::label('estado', 'Estado:', ['class' => 'form-label']) }}
        {{ Form::select('estado', ['pendiente' => 'Pendiente', 'completada' => 'Completada'], null, ['class' => 'form-select']) }}
    </div>

    <div class="col-md-6">
        {{ Form::label('usuario_id', 'Usuario:', ['class' => 'form-label']) }}
        {{ Form::select('usuario_id', $usuarios->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required']) }}
    </div>

    <div class="col-md-6">
        {{ Form::label('imagen', 'Imagen:', ['class' => 'form-label']) }}
        {{ Form::file('imagen', ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Crear Tarea', ['class' => 'btn btn-primary']) }}
    <a href="/tareas" class="btn btn-outline-primary">Inicio</a>

    {!! Form::close() !!}
@endsection
