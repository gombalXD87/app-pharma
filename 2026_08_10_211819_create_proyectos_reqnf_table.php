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
        Schema::create('proyectos_reqnf', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto');
            $table->integer('id_reqnf');
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
            $table->foreign('id_reqnf')->references('id_reqnf')->on('requerimientos_nofuncionales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_reqnf');
    }
};