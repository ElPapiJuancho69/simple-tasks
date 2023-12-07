<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\reportes;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Validator;


class ReportesController extends Controller
{
    public function index()
    {
        $reportes = reportes::all(); // Obtener todos los registros de tareas
        return view('reportesindex', compact('reportes'));
    }
    
    

    public function create()
    {
        $usuarios = User::all(); // Obtén todos los usuarios
        return view('reportescreate', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'num_total_tareas' => 'required|numeric', // Reemplaza 'numeric' por el tipo de dato correcto
            'num_total_tareas_completadas' => 'required|numeric', // Reemplaza 'numeric' por el tipo de dato correcto
            'num_tareas_pendientes' => 'required|numeric', // Reemplaza 'numeric' por el tipo de dato correcto
            'usuario_id' => 'required|exists:users,id', // Asegura que el usuario exista en la tabla "users"
        ]);
    
        $reporte = new reportes();
        $reporte->fecha_generacion = now();
        $reporte->num_total_tareas = $request->input('num_total_tareas');
        $reporte->num_total_tareas_completadas = $request->input('num_total_tareas_completadas');
        $reporte->num_tareas_pendientes = $request->input('num_tareas_pendientes');
        $reporte->usuario_id = $request->input('usuario_id');
    
        $reporte->save();
    
        return redirect()->route('reportes.index');
    }
    
    
    
    
    public function PDF()
    {
        $reportes = reportes::all();
        $pdf    = PDF::loadView('PDF.listadoreportes', compact('reportes'));
        return $pdf->stream('listadoreportes.pdf');
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
     $reporte = reportes::find($id);
    
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

