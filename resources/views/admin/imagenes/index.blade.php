@extends('admin.layouts.main')

@section('title', 'Imágenes de la Película')

@section('content')
    <h1>Imágenes</h1>

    @foreach ($imagenes as $imagen)
        <div class="mb-3">
            <h5>{{ $imagen->nombre }}</h5>
            <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="{{ $imagen->nombre }}" style="max-width: 200px;">
        </div>
    @endforeach
@endsection
