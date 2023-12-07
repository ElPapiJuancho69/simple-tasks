<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Actividades;
use Illuminate\Http\Request;
use App\Models\tareas;
use PDF;


class ActividadesController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $results = Actividades::search($query)->get();
        $actividades = Actividades::with('tareas')->get(); 
      
        return view('actividadesindex', compact('actividades', 'results'));
    } else {
        $actividades = Actividades::with('tareas')->get();
        return view('actividadesindex', compact('actividades'));
    }
}

    
    public function create()
    {
        $tarea = tareas::all(); 
    
        return view('actividadescreate', compact('tarea'));
    }
    

    public function store(Request $request)
    {
        try{
        $actividad = new Actividades();

        $actividad->fecha_actividad = $request->input('fecha_actividad');
        $actividad->descripcion_actividad = $request->input('descripcion_actividad');
        $actividad->tarea_id = $request->input('tarea_id');

        $actividad->save();
        
    
        return redirect()->route('actividades.index');
        
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect("/actividades/create")->with('error', 'La tarea no existe');
    }
    }
    
    public function show($id)
    {
        $actividad = actividades::find($id);

        if ($actividad) {
            return view('actividadesshow', compact('actividad'));
        } else {
            return redirect()->route('actividades.index')->with('error', 'actividad no encontrada.');
        }        
    }
    public function PDF()
    {
        $tareas = tareas::all();
        $pdf    = PDF::loadView('PDF.listadoactividades', compact('actividades'));
        return $pdf->stream('listadoactividades.pdf');
    }

    public function edit($id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "patient"
        $actividad = actividades::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('actividadesedit', compact('actividades'));    }

    public function update(Request $request, $id)
    {
       // Validación de datos
       $this->validate($request, [
        'fecha_actividad' => 'required',
        'descripcion_actividad' => 'required',
        'tarea_id' => 'required',
    ]);

    // Obtener el cliente a actualizar
    $actividad = actividades::find($id);

    if (!$actividad) {
        // Manejar el caso en que el cliente no se encuentra
        return redirect()->route('tareas.index')->with('error', 'Paciente no encontrado');
    }

    // Actualizar los datos del cliente
    $actividad->fecha_creacion = $request->input('titulo');
    $actividad->descripcion_actividad = $request->input('descripcion');
    $actividad->tarea_id = $request->input('fecha_creacion');

    $actividad->save();

    return redirect()->route('actividades.show', $actividad->id)->with('success', 'tarea actualizada con éxito');    }

    public function destroy($id)
    {
        {
            $actividad = actividades::find($id);
    
            if ($actividad) {
                try {
                    $actividad->delete();
                    return redirect("/actividades")->with('success', 'tarea eliminada con éxito');
                } catch (\Illuminate\Database\QueryException $e) {
                    // Manejar la excepción de la base de datos (error de llave foránea)
                    return redirect("/actividades")->with('error', 'No se puede eliminar la tarea. Está siendo utilizada en otra parte del sistema.');
                }
            } else {
                return redirect("/actividades")->with('error', 'tarea no encontrada');
            }
        }
    }
    public function showTareas($id)
    {
        $actividad = actividades::find($id);

        if (!$actividad) {
            return redirect()->route('actividades.index')->with('error', 'actividad no encontrado.');
        }

        $tareas = tareas::where('tarea_id', $id)->get();

        return view('actividadesindex', compact('tareas', 'actividad'));
    }
}
