<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\tareas;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\pdf as PDF;


class TareasController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if ($query) {
            $results = tareas::search($query)->get();
            $tareas = tareas::with('usuario')->get(); // Obtener todos los pacientes para mostrar junto con los resultados de búsqueda
            return view('tareasindex', compact('tareas', 'results'));
        } else {
            $tareas = tareas::with('usuario')->get();
            return view('tareasindex', compact('tareas'));
        }
    }
    
    

    public function create()
    {
        $usuarios = User::all(); // Obtén todos los usuarios
        return view('tareascreate', compact('usuarios'));
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
        $usuarios = User::all(); // Obtén todos los usuarios
    
        if ($tarea) {
            return view('tareasshow', compact('tarea', 'usuarios'));
        } else {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada.');
        }
    }
    
    

    public function edit($id)
    {
        $tarea = tareas::find($id);
        $usuarios = User::all(); // Obtén todos los usuarios
        
        if ($tarea) {
            return view('tareasedit', compact('tarea', 'usuarios'));
        } else {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada.');
        }
    }
    public function PDF()
    {
        $tareas = tareas::all();
        $pdf    = PDF::loadView('pdf.listadotareas', compact('tareas'));
        return $pdf->download('listadotareas.pdf');
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
            return redirect("/tareas")->with('success', 'reporte eliminado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar la excepción de la base de datos (error de llave foránea)
            return redirect("/tareas")->with('error', 'No se puede eliminar la reporte. Está siendo utilizada en otra parte del sistema.');
        }
    } else {
        return redirect("/tareas")->with('error', 'reporte no encontrado');
    }
}
}







