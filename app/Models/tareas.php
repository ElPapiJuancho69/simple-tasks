<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Tareas extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['titulo', 'descripcion', 'imagen'];
    public function usuario()
{
    return $this->belongsTo(User::class, 'usuario_id');
}
}
