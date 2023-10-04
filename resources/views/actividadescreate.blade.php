@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<form class="form-group" method="POST" action="/trainers">
    @csrf
    <h1>Crear Actividad</h1>
    <div class="form-group">
        <label for="">Descripción Actividad</label>
        <input type="text" name="descripcion_actividad" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Fecha de actividad</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection