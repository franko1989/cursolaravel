@extends('admin.layouts.main')

@section('title', 'Imágenes por película')

@section('content')
    <h1 class="mb-4">Imágenes por Película</h1>

    @forelse ($peliculas as $pelicula)
        <div class="card mb-4">
            <div class="card-header">
                <strong>{{ $pelicula->titulo }}</strong> — {{ $pelicula->estreno }}
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse ($pelicula->imagenes as $imagen)
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/' . $imagen->ruta) }}" class="img-fluid rounded shadow-sm" alt="{{ $imagen->nombre }}">
                            <p class="mt-2 text-center">{{ $imagen->nombre }}</p>
                        </div>
                    @empty
                        <p class="text-muted">No hay imágenes para esta película.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @empty
        <p>No hay películas registradas.</p>
    @endforelse
@endsection
