<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $peliculas = Pelicula::paginate(10);
        return view('admin.peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = \App\Models\Genero::all();
        return view('admin.peliculas.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'nullable|string',
            'costo' => 'required|numeric',
            'estreno' => 'required|date',
            'genero_id' => 'required|exists:generos,id',
        ]);



        Pelicula::create([
            'titulo' => $request->titulo,
            'resumen' => $request->resumen,
            'costo' => $request->costo,
            'estreno' => $request->estreno,
            'genero_id' => $request->genero_id,
            //'user_id' => auth()->id()

        ]);

        return redirect()->route('admin.pelicula.index')->with('success', 'Película registrada exitosamente.');
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
        $pelicula = Pelicula::findOrFail($id);
        $generos = \App\Models\Genero::all();

        return view('admin.peliculas.edit', compact('pelicula', 'generos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'nullable|string',
            'costo' => 'required|numeric',
            'estreno' => 'required|date',
            'genero_id' => 'required|exists:generos,id',
        ]);

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());

        return redirect()->route('admin.pelicula.index')->with('success', 'Película actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return redirect()->route('admin.pelicula.index')->with('success', 'Película eliminada correctamente.');
    }
}
