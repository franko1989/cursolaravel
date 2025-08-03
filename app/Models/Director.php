<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';  //indicar el nombre de la tabla
    protected $primaryKey = 'id';  //indicar la PK de la tabla
    protected $fillable = ['nombre']; //indicar los campos gestionados
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at


    // un director puede tener muchas peliculas
    public function peliculas()
    {
        return $this->belongsToMany(
            Pelicula::class,         //Modelo relacionado
            'pelicula_director',
            'director_id',     //tabla pivote
            'pelicula_id',           //FK del modelo actual(Director)
            //FK del modelo relacionado(Pelicula)
        )->withTimestamps();                                 //gestion automatica de created_at y updated_at
    }
}
