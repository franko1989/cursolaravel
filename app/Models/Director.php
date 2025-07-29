<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';  //indicar el nombre de la tabla
    protected $primaryKey = 'id';  //indicar la PK de la tabla
    protected $fillable = ['nombre']; //indicar los campos gestionados
    public $timestamps = true; //indicar si se gestionan los campos created_at y updated_at
}
