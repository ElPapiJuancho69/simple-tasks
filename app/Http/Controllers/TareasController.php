<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tareas::all();
        return view('tareasindex', compact('tareas'));
    }
    
    
    public function create()
    {
        return view('tareascreate');
    }

    public function store(Request $request)
    {
         //return $request->all();
    }

    public function show($id)
    {
        // Lógica para mostrar un registro específico del modelo en la vista
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un registro específico en la base de datos
    }

    public function destroy($id)
    {
        // Lógica para eliminar un registro específico de la base de datos
    }
}

