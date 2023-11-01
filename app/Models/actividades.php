<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tareas;
use Laravel\Scout\Searchable;
class Actividades extends Model
{
    use HasFactory;
    use Searchable;

    // Definir la relación con la tabla Tarea
    public function tareas()
    {
        return $this->belongsTo(tareas::class, 'tarea_id');
    }
}
