<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_actividad', 'descripcion_actividad', 'tarea_id'];

    // Definir la relación con la tabla Tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tarea_id');
    }
}
