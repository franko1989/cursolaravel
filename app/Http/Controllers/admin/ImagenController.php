<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($pelicula_id)
    {
        $imagenes = Imagen::where('pelicula_id', $pelicula_id)->get();
        return view('admin.imagenes.index', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pelicula_id = $request->pelicula_id;

        // Opcional: buscar la película para mostrar su título en la vista
        $pelicula = null;
        if ($pelicula_id) {
            $pelicula = Pelicula::find($pelicula_id);
        }

        return view('admin.imagenes.create', compact('pelicula'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'pelicula_id' => 'required|exists:peliculas,id',
            'archivo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('archivo')) {
            $ruta = $request->file('archivo')->store('imagenes', 'public'); // Guarda en storage/app/public/imagenes
        } else {
            return back()->withErrors(['archivo' => 'Debe subir una imagen.']);
        }

        $imagen = Imagen::create([
            'nombre' => $validated['nombre'],
            'pelicula_id' => $validated['pelicula_id'],
            'ruta' => $ruta,
        ]);

        return redirect()->route('admin.pelicula.index')->with('success', 'Imagen cargada correctamente');
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
        //
    }
    public function todas()
    {
        $peliculas = \App\Models\Pelicula::with('imagenes')->get();

        return view('admin.imagenes.todas', compact('peliculas'));
    }
}
