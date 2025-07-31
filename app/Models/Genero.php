<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';  //indicar el nombre de la tabla
    protected $primaryKey = 'id';  //indicar la PK de la tabla
    protected $fillable = ['genero']; //indicar los campos gestionados
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at
     /*
    relacion de un genero con muchas peliculas
    */
    public function peliculas()
        {
            //Relacion de 1 a N con Pelicula
            return $this->hasMany(
                Pelicula::class,      //nombre de la clases a la cual se relaciona
                'genero_id',            //Nombre dl Fk dentro del campo Pelicula
                'id');                //Nombre del campo PK de la clase actual Genero

        }

}
