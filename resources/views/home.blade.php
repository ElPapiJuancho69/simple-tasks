@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
    font-size: 48px;
    margin-top: 50px;
    font-family: "Arial", sans-serif; /* Cambia la fuente a Arial o a tu elección */
    font-weight: bold; /* Hace la fuente más gruesa (bold) */
}

.menu {
    display: flex;
    justify-content: center;
    list-style: none;
    margin-top: 20px;
    background-color: #f0f0f0; /* Agrega el color de fondo a tu elección */
    padding: 10px; /* Añade un espacio interno para mejorar el aspecto */
    border-radius: 20px; /* Añade esquinas redondeadas para la caja */
}

.menu .dropdown {
    margin: 0 100px; /* Añade margen izquierdo y derecho para separar los títulos */
}


        .menu a {
            text-decoration: none;
            color: #333;
            margin: 0 20px; /* Aumenté el espacio entre los enlaces */
            font-size: 18px; /* Reduje el tamaño de la letra de los enlaces */
        }

        .menu a:hover {
            color: #007bff;
        }

        img {
    margin-top: 20px;
    max-width: 50%; /* Reducido al 50% del ancho máximo */
    max-height: 50%; /* Reducido al 50% de la altura máxima */
    height: auto;
}


        .dropdown {
            position: relative;
            display: inline-block;
            margin: 0 20px;
        }

        .dropdown button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 18px; /* Reduje el tamaño de la letra del botón */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .box {
    background: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    border-radius: 5px;
    background-color: #f1f0f0; /* Cambia el color de fondo a tu elección */
}
    </style>

    <body>
        <h1>Simple Tasks</h1>

        <div class="menu">
            <div class="dropdown">
                <button>Tareas</button>
                <div class="dropdown-content box"> <!-- Agregamos la clase "box" para la caja -->
                    <a href="{{ route('tareas.index') }}">Ver Tareas</a>
                    <a href="{{ route('tareas.create') }}">Agregar Tareas</a>
                </div>
            </div>
        <img src="{{ asset('img.jpeg') }}" class="img-fluid">
    </body>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection