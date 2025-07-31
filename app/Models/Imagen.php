<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';  //indicar el nombre de la tabla
    protected $primaryKey = 'id';  //indicar la PK de la tabla
    protected $fillable = ['nombre',
                           'pelicula_id']; //indicar los campos gestionados
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at

    //una imagen pertenecea a una pelicula
    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }
}


