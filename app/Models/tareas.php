<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion'];
    public function usuario()
{
    return $this->belongsTo(User::class, 'usuario_id');
}

}
