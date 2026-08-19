<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reqf_criterios_aceptacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reqf_id');
            $table->unsignedBigInteger('criterio_id');
            $table->enum('tipo', ['obligatorio', 'opcional'])->default('obligatorio');
            $table->timestamps();
            
            $table->foreign('reqf_id')->references('id')->on('requerimientos_funcionales')->onDelete('cascade');
            $table->foreign('criterio_id')->references('id')->on('criterios_aceptacion')->onDelete('cascade');
            
            $table->unique(['reqf_id', 'criterio_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reqf_criterios_aceptacion');
    }
};