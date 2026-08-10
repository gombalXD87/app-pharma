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
        Schema::create('requerimientos_nofuncionales', function (Blueprint $table) {
            $table->increments('id_reqnf');
            $table->string('codigo_rnf',10);
            $table->string('nombre',150);
            $table->text('descripcion');
            $table->enum('prioridad', ['Baja', 'Media', 'Alta']);
            $table->enum('categoria', ['Rendimiento', 'Escalabilidad', 'Disponibilidad', 'Confiabilidad', 'Seguridad', 'Usabilidad', 'Mantenibilidad', 'Portabilidad', 'Compatibilidad', 'Regulatorio']);
            $table->text('valor_objetivo');
            $table->text('valor_aceptable');
            $table->text('justificacion');
            $table->text('riesgos');
            $table->text('notas')->nullable();
            $table->integer('id_proyecto');
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimientos_nofuncionales');
    }
};