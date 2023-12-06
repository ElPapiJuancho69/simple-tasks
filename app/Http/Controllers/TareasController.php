<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\tareas;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;


class TareasController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $tareas = tareas::with('usuario')->get();
    
        if ($query) {
            $results = tareas::search($query)->get();
            
            if ($results->isEmpty()) {
                $error = 'No se encontraron resultados para la búsqueda: ' . $query;
                return redirect()->route('tareas.index')->with('error', $error);
            }
            else{
                return view('tareasindex', compact('tareas', 'results'));
            }
    
            
        } else {
            return view('tareasindex', compact('tareas'));
        }
    }
    
    
    

    public function create()
    {
        $usuarios = User::all(); // Obtén todos los usuarios
        return view('tareascreate', compact('usuarios'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'titulo' => 'required|max:255',
                'descripcion' => 'max:255',
                'estado' => 'in:pendiente,completada',
                'fecha_creacion' => 'required|date|after_or_equal:yesterday',
                'usuario_id' => 'required|exists:users,id',
                'imagen' => '|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ], [
                'fecha_creacion.after_or_equal' => 'La fecha de creación debe ser igual o posterior a hoy.',
            ]);

            $tarea = new Tareas();
            $tarea->titulo = $validatedData['titulo'];
            $tarea->descripcion = $validatedData['descripcion'];
            $tarea->fecha_creacion = $validatedData['fecha_creacion'];
            $tarea->estado = $validatedData['estado'];
            $tarea->usuario_id = $validatedData['usuario_id'];

            if ($request->hasFile('imagen')) {
                $imageName = time() . '.' . $request->imagen->extension();
                $request->imagen->move(public_path('imagenes'), $imageName);
                $tarea->imagen = $imageName;
            }

            $tarea->save();

            return redirect()->route('tareas.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
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
        $pdf    = PDF::loadView('PDF.Listadotareas', compact('tareas'));
        return $pdf->stream('Listadotareas.pdf');
    }

    public function update(Request $request, $id)
    {
        $tarea = tareas::find($id);

        if (!$tarea) {
            return redirect()->route('tareas.index')->with('error', 'Tarea no encontrada');
        }

        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'max:255',
            'estado' => 'in:pendiente,completada',
            'fecha_creacion' => 'required|date|after_or_equal:yesterday',
            'usuario_id' => 'required|exists:users,id',
            'imagen' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fecha_creacion = $request->input('fecha_creacion');
        $tarea->estado = $request->input('estado');
        $tarea->usuario_id = $request->input('usuario_id');

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagenes'), $imageName);

            // Borrar la imagen anterior si existe
            $imagePath = public_path('imagenes/' . $tarea->imagen);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }

            $tarea->imagen = $imageName;
        }

        $tarea->save();

        return redirect()->route('tareas.show', $tarea->id)->with('success', 'Tarea actualizada con éxito');
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







