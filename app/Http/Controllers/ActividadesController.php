<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function index()
    {
        $actividades = Actividades::all(); // Cambié $actividaddes a $actividades
        return view('ActividadesIndex', compact('actividades'));
    }
    
    public function create()
    {
        return view('actividadescreate');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'fecha_actividad' => 'required',
            'descripcion_actividad' => 'required',
            'tarea_id' => 'required', // Asegúrate de que este campo esté presente en el formulario
        ]);
    
        // Crea una nueva instancia de Actividades con los datos del formulario
        Actividades::create([
            'fecha_actividad' => $request->input('fecha_actividad'),
            'descripcion_actividad' => $request->input('descripcion_actividad'),
            'tarea_id' => $request->input('tarea_id'),
        ]);
    
        // Redirecciona a la página de inicio de actividades o a donde desees
        return redirect()->route('actividades.index')->with('success', 'Actividad creada exitosamente.');
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
