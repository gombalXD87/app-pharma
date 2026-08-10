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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increment('id_cliente');
            $table->string('nombre_empresa',100);
            $table->string('correo_empresarial',10)->uniqid();
            $table->integer('telefono_empresa');
            $table->string('persona_contacto',100);
            $table->string('correo_contacto',10)->uniqid();
            $table->integer('telefono_contacto');
            $table->integer('celular_contacto');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
