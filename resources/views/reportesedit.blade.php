@extends('layouts.app')
@section('title', 'Reporte Edit')
@section('content')
<h1 class="display-6">Editar Reporte</h1>

{!! Form::model($reporte, ['method' => 'PUT', 'route' => ['reportes.update', $reporte->id], 'class' => 'row g-3 needs-validation', 'enctype' => 'multipart/form-data']) !!}

<div class="col-md-6">
    {{ Form::label('fecha_generacion', 'Fecha de Generación:', ['class' => 'form-label']) }}
    {{ Form::date('fecha_generacion', null, ['class' => 'form-control', 'required' => 'required']) }}
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

{{ Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
</form>
@endsection
