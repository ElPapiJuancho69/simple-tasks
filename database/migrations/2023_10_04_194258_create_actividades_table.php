<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actividades', function (Blueprint $table) {
            
                $table->id(); // Equivalente a 'actividad_id serial PRIMARY KEY' en PostgreSQL
                $table->string('fecha_actividad');
                $table->string('descripcion_actividad');
                $table->unsignedBigInteger('tarea_id');
                $table->foreign('id')->references('id')->on('tareas');
                $table->timestamps();
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
