@extends('admin.layouts.main')

@section('title', 'Agregar Imagen')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Agregar Imagen a la película: <strong>{{ $pelicula->titulo ?? 'N/A' }}</strong></h2>

    <form action="{{ route('admin.imagen.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <input type="hidden" name="pelicula_id" value="{{ $pelicula->id ?? '' }}">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Imagen</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Selecciona archivo de imagen</label>
            <input class="form-control @error('archivo') is-invalid @enderror" type="file" id="archivo" name="archivo" accept="image/*" required>
            @error('archivo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar Imagen</button>
        <a href="{{ route('admin.pelicula.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script>
// Ejemplo de validación con Bootstrap 5
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
@endsection
