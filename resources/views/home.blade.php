@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="button-container">
        <a href="{{ route('actividades.index') }}" class="btn btn-primary">Ver Actividades</a>
        <a href="{{ route('tareas.index') }}" class="btn btn-primary">Ver Tareas</a>
        <a href="{{ route('reportes.index') }}" class="btn btn-primary">Ver Reportes</a>
    </div>
</div>
@endsection
