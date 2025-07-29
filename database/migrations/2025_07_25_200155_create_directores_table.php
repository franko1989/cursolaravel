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
        Schema::create('directores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        //crear la tabla pivot
        Schema::create ('pelicula_director',function(Blueprint $table){
            $table->id();


            //crear columnas fk
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('director_id');

            //creacion de relaciones
            $table->foreign('pelicula_id')
                  ->references('id') //columna PK en la tabla peliculas
                  ->on('peliculas') //tabla referenciada peliculas
                  ->onDelete('cascade'); //comportamiento al eliminar

            $table->foreign('director_id')
                  ->references('id') //columna PK en la tabla directores
                  ->on('directores') //tabla referenciada directores
                  ->onDelete('cascade'); //comportamiento al eliminar

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_director');
        Schema::dropIfExists('directores');

    }
};
