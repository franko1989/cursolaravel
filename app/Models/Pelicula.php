<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo',
                           'costo',
                           'resumen',
                           'estreno',
                           'genero_id',
                           'user_id'];
    protected $casts = ['estreno' => 'date',];
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at

    //una pelicula pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    //una pelicula pertenece a un genero
    public function genero(){
        return $this->belongsTo(Genero::class,'genero_id','id');
    }
    //una pelicula puede tener muchas imagenes
    public function imagenes(){
        return $this->hasMany(Imagen::class,'pelicula_id','id');
    }
    //una pelicula puede tener muchos directores
    public function directores(){
        return $this->belongsToMany(Director::class,         //Modelo relacionado
                                    'pelicula_director',     //tabla pivote
                                    'pelicula_id',           //FK del modelo actual(Pelicula)
                                    'director_id'            //FK del modelo relacionado
        )->withTimestamps();                                 //gestion automatica de created_at y updated_at
    }

}
