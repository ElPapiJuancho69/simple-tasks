@extends('layouts.app')
@section('title', 'Reporte Edit')
@section('content')
<div class="container">
    <h1 class="display-6">Crear Reporte</h1>
    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @elseif(session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
    {!! Form::open(['route' => 'reportes.store', 'class' => 'row g-3 needs-validation']) !!}
    
    <div class="col-md-6">
        {{ Form::label('fecha_generacion', 'Fecha de Generación:', ['class' => 'form-label']) }}
        {{ Form::date('fecha_generacion', null, ['class' => 'form-control']) }}
    </div>
    
    <div class="col-md-6">
        {{ Form::label('num_total_tareas', 'Número Total de Tareas:', ['class' => 'form-label']) }}
        {{ Form::number('num_total_tareas', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    
    <div class="col-md-6">
        {{ Form::label('num_total_tareas_completadas', 'Número Total de Tareas Completadas:', ['class' => 'form-label']) }}
        {{ Form::number('num_total_tareas_completadas', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    
    <div class="col-md-6">
        {{ Form::label('num_tareas_pendientes', 'Número de Tareas Pendientes:', ['class' => 'form-label']) }}
        {{ Form::number('num_tareas_pendientes', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    
    <div class="col-md-6">
        {{ Form::label('usuario_id', 'Usuario:', ['class' => 'form-label']) }}
        {{ Form::select('usuario_id', $usuarios->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required']) }}
    </div>
    
    {{ Form::submit('Crear Reporte', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('reportes.index') }}" class="btn btn-outline-primary">Inicio</a>
    
    {!! Form::close() !!}
</div>
@endsection
