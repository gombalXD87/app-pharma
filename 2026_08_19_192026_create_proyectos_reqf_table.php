<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos_reqf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('reqf_id');
            $table->enum('tipo_relacion', ['principal', 'secundario', 'dependiente'])->default('principal');
            $table->timestamps();
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('reqf_id')->references('id')->on('requerimientos_funcionales')->onDelete('cascade');
            
            $table->unique(['proyecto_id', 'reqf_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos_reqf');
    }
};