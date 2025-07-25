<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index(){
        return 'hola desde prueba controller';

    }
    //paso de parametros
    public function mostrarDatos($nombre='Ana',$sueldo=1200){
        return 'Nombre: '.$nombre.'<br> Sueldo: '.$sueldo;
    }

    public function holaBlade(){
        return view('prueba.hola'); //resources/views/prueba/hola.Blade.php
    }
    //enviar datos a la vista
    public function datosPersona(){
        $nombre ='Juan';
        $edad = 12;

        //dd($nombre);
        //envio de datos a la vista mediante with
        //return view('prueba.datos')  //resources/views/prueba/datos.Blade.php
        //    ->with('nombre',$nombre)
        //    ->with('edad',$edad);



        //envio de datos mediante un array asociativa
        //$data['nombre']= $nombre;
        //$data['edad']= $edad;
        //return view('prueba.datos',$data);



        //envio de datos mediante un array asociativa con compact
        return view ('prueba.datos',compact('nombre','edad'));
    }

    public function componentesBlade(){
        return view('prueba.componentes');
    }

}
