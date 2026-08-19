<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requerimientos_funcionales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id');
            $table->string('codigo', 50)->unique();
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('prioridad', ['alta', 'media', 'baja'])->default('media');
            $table->enum('estado', ['pendiente', 'en_progreso', 'completado', 'cancelado'])->default('pendiente');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requerimientos_funcionales');
    }
};