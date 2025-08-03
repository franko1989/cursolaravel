<?php

use App\Http\Controllers\admin\GeneroController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\PeliculaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\ImagenController;
use App\Http\Controllers\Admin\PeliculaDirectorController;

//crear una ruta para http://127.0.0.1:8000/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//utilizar solo para implementacion de pruebas en la plantilla bootstrap
//Route::get('tmp',function(){
//    return view ('admin.layouts.main');
//});

//rutas paso de parametros http://127.0.0.1:8000/hola
Route::get('hola',function(){
    return 'Hola Mundo';
})->name('practica1');

//rutas paso de parametros http://127.0.0.1:8000/persona/Diego/30
Route::get('persona/{nombre}/{edad}', function ($nombre, $edad) {
    return "Hola $nombre usted tiene $edad años";
})->name('practica2');

//rutas paso de parametros con valores por defecto http://127.0.0.1:8000/estudiante  ,   http://127.0.0.1:8000/estudiante/jose
Route::get('estudiante/{nombre?}',function($nombre='sin nombre'){
    return "Nombre del estudiante: $nombre";

})->name('practica3');

//Rutas validacion de parametros
// http://127.0.0.1:8000/usuarios/34    [ACEPTADO]
//      http://127.0.0.1:8000/usuario/dasd [NO ACEPTADO]
Route::get('usuario/{id}',function($id){
    return 'El id del usuario es: '.$id;
})->where('id','[0-9]+')->name('practica4');//solo acepta numeros


//rutas validacion de parametros
// http://127.0.0.1:8000/categoria/administrador  [ACEPTADO]
// http://127.0.0.1:8000/categoria/545 [NO ACEPTADO]
Route::get('categoria/{slug}',function($slug){
    return 'La categoria es: '.$slug;
})->where('slug','[A-Za-z\-]+')->name('pratica5');//solo acepta letras y caracteres especiales como guion


//rutas para APIs(Json)
Route::get('/post',function(){
    return response()->json([
        ['id'=>1, 'title'=>'Post 1'],
        ['id'=>2, 'title'=>'Post 2'],
        ['id'=>3, 'title'=>'Post 3']
    ]);

})->name('practica6');

//agrupaciones
Route::group(['prefix'=>'saludo'],function(){
    Route::get('dia',function(){
        return "buenos dias";
    })->name('saludo.dia');
    Route::get('tarde',function(){
        return "Buenas tardes";
    })->name('saludo.tarde');
    Route::get('noche',function(){
        return "buenas noches";
    })->name('saludo.noche');

});

//rutas con controlador
// http://127.0.0.1:8000/prueba
Route::get('prueba', [PruebaController::class, 'index']);

//mostrar datos con controlador
//http://127.0.1:8000/prueba/empleado/datos/Diego/1500
//http://127.0.1:8000/prueba/empleado/datos
Route::get('prueba/empleado/datos/{nombre?}/{sueldo?}',[PruebaController::class,'mostrarDatos'])->name('prueba.empleado');//ctrl + CLICK sobre el metodo

//http://127.0.1:8000/prueba/controller
Route::get('prueba/controller',[PruebaController::class,'holaBlade']) ->name('prueba.controlador');

//http:127.0.1:8000/prueba/persona
Route::get('prueba/persona',[PruebaController::class,'datosPersona'])->name('prueba.persona');


//http://127.0.1:8000/prueba/componentes/
Route::get('prueba/componentes',[PruebaController::class,'componentesBlade'])->name('prueba.componentes');

//http://127.0.1:8000/admin/home


Route::get('/principal', function () {
    $user = Auth::user();
    return view('principal', compact('user'));
})->middleware('auth')->name('principal');


Route::get('/dev-login', function () {
    $users = User::all();
    return view('auth.dev-login', compact('users'));
});

Route::post('/dev-login', function (Request $request) {
    Auth::loginUsingId($request->user_id);
    return redirect()->route('principal');
})->name('dev.login');
require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('genero', GeneroController::class);
    Route::resource('pelicula', PeliculaController::class);
});
Route::prefix('admin')->name('admin.')->group(function() {
    // Otras rutas...

    Route::get('imagenes/create', [ImagenController::class, 'create'])->name('imagen.create');
    Route::post('imagenes', [ImagenController::class, 'store'])->name('imagen.store');
});

Route::get('imagenes-por-pelicula', [App\Http\Controllers\admin\ImagenController::class, 'todas'])->name('admin.imagenes.todas');

Route::resource('director', App\Http\Controllers\Admin\DirectorController::class)->names('admin.director');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pelicula_director', PeliculaDirectorController::class);
});
