<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->string('nombre_proyecto', 150);
            $table->text('funcionalidad_producto');
            $table->text('restricciones');
            $table->text('evolucion_previsible_sistema');
            $table->enum('estado', [
                'Pendiente', 'En análisis', 'En diseño', 'En desarrollo', 
                'En pruebas', 'Bloqueado', 'En revisión', 'Finalizado', 
                'Entregado', 'Cancelado'
            ])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};