<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reqf_flujos_principales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reqf_id');
            $table->text('nombre_flujo');
            $table->text('descripcion')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('es_principal')->default(true);
            $table->timestamps();
            
            $table->foreign('reqf_id')->references('id')->on('requerimientos_funcionales')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reqf_flujos_principales');
    }
};