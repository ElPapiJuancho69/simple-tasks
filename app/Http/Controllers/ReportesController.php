<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\reportes;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        $reportes = Reportes::all(); // Obtener todos los registros de tareas
        return view('reportesindex', compact('reportes'));
    }
    
    

    public function create()
    {
        return view('reportescreate');
    }

    public function store(Request $request)
    {    
        $reporte = new Reportes();
        $reporte->fecha_generacion = $request->input('fecha_generacion');
        $reporte->num_total_tareas = $request->input('num_total_tareas');
        $reporte->num_total_tareas_completadas = $request->input('num_total_tareas_completadas'); // Puedes establecer un valor predeterminado para el estado
        $reporte->num_tareas_pendientes = $request->input('num_total_tareas_completadas'); // Puedes establecer un valor predeterminado para el estado
        $reporte->usuario_id = $request->input('usuario_id'); // Asegúrate de tener el campo usuario_id en el formulario.

        $reporte->save();
    
        return view('reportesindex');
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

