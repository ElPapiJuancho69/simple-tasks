<?php

namespace App\Http\Controllers;
use App\Models\Reportes; 
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        $reportes = Reportes::all(); // Obtener todos los reportes
        return view('reportesindex', compact('reportes'));
    }

}
