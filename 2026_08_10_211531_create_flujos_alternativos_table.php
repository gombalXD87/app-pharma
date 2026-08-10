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
        Schema::create('flujos_alternativos', function (Blueprint $table) {
            $table->increments('id_flujo_alt');
            $table->string('codigo_flujo',10);
            $table->text('descripcion_flujo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flujos_alternativos');
    }
};