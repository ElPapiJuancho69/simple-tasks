<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\reportes;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        $reportes = reportes::all(); // Obtener todos los registros de tareas
        return view('reportesindex', compact('reportes'));
    }
    
    

    public function create()
    {
        return view('reportescreate');
    }

    public function store(Request $request)
    {    try{
        $reporte = new reportes();
        $reporte->fecha_generacion = now();
        $reporte->num_total_tareas = $request->input('num_total_tareas');
        $reporte->num_total_tareas_completadas = $request->input('num_total_tareas_completadas'); // Puedes establecer un valor predeterminado para el estado
        $reporte->num_tareas_pendientes = $request->input('num_total_tareas_completadas'); // Puedes establecer un valor predeterminado para el estado
        $reporte->usuario_id = $request->input('usuario_id'); // Asegúrate de tener el campo usuario_id en el formulario.

        $reporte->save();
    
        return redirect()->route('reportes.index');
    } catch (\Illuminate\Database\QueryException $e) {
        // Manejar la excepción de la base de datos (error de llave foránea)
        return redirect("/reportes/create")->with('error', 'No existe el usuario');
    }
    }
    
    

    public function show($id)
    {
        $reporte = reportes::find($id);

        if ($reporte) {
            return view('reportesshow', compact('reporte'));
        } else {
            return redirect()->route('reportes.index')->with('error', 'reporte no encontrado.');
        }    
    }

    public function edit($id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "patient"
     $reporte = reportes::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('reportesedit', compact('reporte'));    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'fecha_generacion' => 'required',
            'num_total_tareas' => 'required',
            'num_total_tareas_completadas' => 'required',
            'num_total_tareas_pendientes' => 'required',
            'usuario_id' => 'required',
        ]);

        // Obtener el cliente a actualizar
        $reporte = reportes::find($id);

        if (!$reporte) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('reportes.index')->with('error', 'Reporte no encontrado');
        }

        // Actualizar los datos del cliente
        $reporte->fecha_generacion = $request->input('fecha_generacion');
        $reporte->num_total_tareas = $request->input('num_total_tareas');
        $reporte->num_total_tareas_completadas = $request->input('num_total_tareas_completadas');
        $reporte->num_total_tareas_pendientes = $request->input('num_total_tareas_pendientes');
        $reporte->usuario_id = $request->input('usuario_id');
        $reporte->save();

        return redirect()->route('reportes.show', $reporte->id)->with('success', 'reporte actualizado con éxito');
}

    public function destroy($id)
    {
        $reporte = Reportes::find($id);

        if ($reporte) {
            try {
                $reporte->delete();
                return redirect("/reportes")->with('success', 'reporte eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/reportes")->with('error', 'No se puede eliminar la reporte. Está siendo utilizada en otra parte del sistema.');
            }
        } else {
            return redirect("/reportes")->with('error', 'reporte no encontrado');
        }
    }
}

