<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas; // Asegúrate de que estés usando el modelo correcto

class ApiSearchController extends Controller
{
    public function search(Request $request)
    {
        $error = ['error' => 'Sin resultados, ingrese otros campos para la búsqueda'];
        
        if ($request->has('text')) {
            $tareas = Tareas::search($request->get('text'))->get(); // Corrige el nombre del modelo
            return $tareas->count() ? $tareas : $error;
        }

        return $error;
    }
}
