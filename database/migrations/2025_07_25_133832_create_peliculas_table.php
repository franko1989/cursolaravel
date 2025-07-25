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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 200);
            $table->float('costo');
            $table->text('resumen');
            $table->date('estreno');
            $table->timestamps();


            //añadir la relacion de 1 a N con la tabla generos

            $table->unsignedBigInteger('genero_id');  //no negativos
            $table->foreign('genero_id')              //Identifica columna FK
                  ->references('id')                  //columna PK en la tabla generos
                  ->on('generos')                     //tabla referenciada generos
                  ->onDelete('cascade');              //comportamiento al eliminar


            //añadir la relacion de 1 a N con la tabla user
            $table->unsignedBigInteger('user_id'); //no negativos
            $table->foreign('user_id')             //Identifica columna FK
                  ->references('id')               //columna PK en la tabla users
                  ->on ('users')                   //tabla referenciada users
                  ->onDelete('cascade');         //comportamiento al eliminar

        });

        /**
         * Reverse the migrations.
         */
    }
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
