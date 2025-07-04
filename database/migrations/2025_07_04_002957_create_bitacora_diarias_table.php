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
        Schema::create('bitacora_diarias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->text('descripcion'); // Qué se trabajó
            $table->text('bloqueos')->nullable(); // Incidencias o impedimentos

            $table->timestamps();

            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora_diarias');
    }
};
