<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tareas::all(); // Obtener todos los registros de tareas
        return view('tareasindex', compact('tareas'));
    }
    
    

    public function create()
    {
        return view('tareascreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
    
        $tarea = new Tareas();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fecha_creacion = now(); // Establecer la fecha actual
        $tarea->estado = 'pendiente'; // Puedes establecer un valor predeterminado para el estado
        $tarea->usuario_id = $request->input('usuario_id'); // Asegúrate de tener el campo usuario_id en el formulario.
    
        $tarea->save();
    
        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
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

