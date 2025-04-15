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
        // tabla libros
        Schema::create('autor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cantidad_libros_asociados');
        });

        // tabla de generos
        Schema::create('generos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cantidad_generos_asociados');
        });

        // tabla libros
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('genero');
            $table->string('imagen');
            // foraneas
            $table->unsignedBigInteger('autor_id');
            $table->unsignedBigInteger('genero_id');
            // enlazo foraneas
            $table->foreign('autor_id')->references('id')->on('autor');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  borrar si existe
        Schema::dropIfExists('generos');
        Schema::dropIfExists('autor');
        Schema::dropIfExists('libro');
    }
};
