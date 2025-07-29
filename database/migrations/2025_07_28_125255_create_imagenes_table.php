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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            //relacion de 1 a N con peliculas
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign ('pelicula_id')
                  ->references('id') //columna PK en la tabla peliculas
                  ->on('peliculas') //tabla referenciada peliculas
                  ->onDelete('cascade'); //comportamiento al eliminar

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
