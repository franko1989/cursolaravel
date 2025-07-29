<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';  //indicar el nombre de la tabla
    protected $primaryKey = 'id';  //indicar la PK de la tabla
    protected $fillable = ['titulo',
                           'costo',
                           'resumen',
                           'estreno',
                           'genero_id',
                           'user_id']; //indicar los campos gestionados
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at
}
