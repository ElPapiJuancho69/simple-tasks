<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = tareas::all(); // Obtener todos los registros de tareas
        return view('tareasindex', compact('tareas'));
    }
    
    

    public function create()
    {
        return view('tareascreate');
    }

    public function store(Request $request)
    {    try{
        $tarea = new tareas();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fecha_creacion = now(); // Establecer la fecha actual
        $tarea->estado = $request->input('estado'); // Puedes establecer un valor predeterminado para el estado
        $tarea->usuario_id = $request->input('usuario_id'); // Asegúrate de tener el campo usuario_id en el formulario.
        $tarea->save();
        return redirect()->route('tareas.index');
    } catch (\Illuminate\Database\QueryException $e) {
        // Manejar la excepción de la base de datos (error de llave foránea)
        return redirect("/tareas/create")->with('error', 'No se existe el usuario');
    }
    }
    
    

    public function show($id)
    {
        $tarea = tareas::find($id);

        if ($tarea) {
            return view('tareasshow', compact('tarea'));
        } else {
            return redirect()->route('tareas.index')->with('error', 'tarea no encontrada.');
        }    
    }

    public function edit($id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "patient"
        $tarea = tareas::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('tareasedit', compact('tarea'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_creacion' => 'required',
            'estado' => 'required',
            'usuario_id' => 'required',
        ]);

        // Obtener el cliente a actualizar
        $tarea = tareas::find($id);

        if (!$tarea) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        // Actualizar los datos del cliente
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fecha_creacion = $request->input('fecha_creacion');
        $tarea->estado = $request->input('estado');
        $tarea->usuario_id = $request->input('usuario_id');

        $tarea->save();

        return redirect()->route('tareas.show', $tarea->id)->with('success', 'tarea actualizada con éxito');
}


    public function destroy($id)
    {
        $tarea = tareas::find($id);

        if ($tarea) {
            try {
                $tarea->delete();
                return redirect("/tareas")->with('success', 'tarea eliminada con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/tareas")->with('error', 'No se puede eliminar la tarea. Está siendo utilizada en otra parte del sistema.');
            }
        } else {
            return redirect("/tareas")->with('error', 'tarea no encontrada');
        }
    }
}

