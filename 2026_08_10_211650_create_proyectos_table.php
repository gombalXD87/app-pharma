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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id_proyecto');
            $table->string('nombre_proyecto',150);
            $table->text('funcionalidad_producto');
            $table->text('restricciones');
            $table->text('evolucion_previsible_sistema');
            $table->enum('estado', ['Pendiente', 'En análisis', 'En diseño', 'En desarrollo', 'En pruebas', 'Bloqueado', 'En revisión', 'Finalizado', 'Entregado', 'Cancelado']);
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};