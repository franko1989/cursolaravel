<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Pelicula;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeliculaDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $relaciones = DB::table('pelicula_director')
            ->join('peliculas', 'pelicula_director.pelicula_id', '=', 'peliculas.id')
            ->join('directores', 'pelicula_director.director_id', '=', 'directores.id')
            ->select('pelicula_director.id', 'peliculas.titulo as pelicula', 'directores.nombre as director')
            ->get();

        $peliculas = Pelicula::all();
        $directores = Director::all();

        return view('admin.pelicula_director.index', compact('relaciones', 'peliculas', 'directores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelicula_id' => 'required|exists:peliculas,id',
            'director_id' => 'required|exists:directores,id',
        ]);

        DB::table('pelicula_director')->insert([
            'pelicula_id' => $request->pelicula_id,
            'director_id' => $request->director_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Relación creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pelicula_director')->where('id', $id)->delete();
        return back()->with('success', 'Relación eliminada.');
    }
}
