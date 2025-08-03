<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DirectorController extends Controller
{
    public function index()
    {
       $directores = Director::paginate(10); // solo directores, sin relaciones
       return view('admin.directores.index', compact('directores'));
    }

    public function create()
    {
        $peliculas = Pelicula::all(); // Para el select múltiple
        return view('admin.directores.create', compact('peliculas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'peliculas' => 'nullable|array',
            'peliculas.*' => ['integer', Rule::exists('peliculas', 'id')],
        ]);

        $director = Director::create([
            'nombre' => $request->nombre
        ]);

        if ($request->filled('peliculas')) {
            $peliculasValidas = Pelicula::whereIn('id', $request->peliculas)->pluck('id')->toArray();
            $director->peliculas()->sync($peliculasValidas);
        }

        return redirect()->route('admin.director.index')->with('success', 'Director creado exitosamente.');
    }

    public function edit(Director $director)
    {
        $peliculas = Pelicula::all();
        $peliculasSeleccionadas = $director->peliculas->pluck('id')->toArray();

        return view('admin.directores.edit', compact('director', 'peliculas', 'peliculasSeleccionadas'));
    }

    public function update(Request $request, Director $director)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'peliculas' => 'nullable|array',
            'peliculas.*' => ['integer', Rule::exists('peliculas', 'id')],
        ]);

        $director->update([
            'nombre' => $request->nombre
        ]);

        if ($request->filled('peliculas')) {
            $peliculasValidas = Pelicula::whereIn('id', $request->peliculas)->pluck('id')->toArray();
            $director->peliculas()->sync($peliculasValidas);
        } else {
            $director->peliculas()->sync([]); // elimina todas si no seleccionó ninguna
        }

        return redirect()->route('admin.director.index')->with('success', 'Director actualizado exitosamente.');
    }

    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('admin.director.index')->with('success', 'Director eliminado exitosamente.');
    }
}
