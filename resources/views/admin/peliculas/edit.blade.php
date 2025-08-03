@extends('admin.layouts.main')

@section('title', 'Editar Película')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Formulario para editar película</div>
        </div>

        <form action="{{ route('admin.pelicula.update', $pelicula->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label for="titulo" class="form-label @error('titulo') is-invalid @enderror">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo"
                        value="{{ old('titulo', $pelicula->titulo) }}" required>
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="resumen" class="form-label @error('resumen') is-invalid @enderror">Resumen</label>
                    <textarea class="form-control" name="resumen" id="resumen" rows="3">{{ old('resumen', $pelicula->resumen) }}</textarea>
                    @error('resumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label @error('costo') is-invalid @enderror">Costo</label>
                    <input type="number" class="form-control" name="costo" id="costo" step="0.01"
                        value="{{ old('costo', $pelicula->costo) }}" required>
                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="estreno" class="form-label @error('estreno') is-invalid @enderror">Fecha de estreno</label>
                    <input type="date" class="form-control" name="estreno" id="estreno"
                        value="{{ old('estreno', \Carbon\Carbon::parse($pelicula->estreno)->format('Y-m-d')) }}" required>
                    @error('estreno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genero_id" class="form-label @error('genero_id') is-invalid @enderror">Género</label>
                    <select name="genero_id" class="form-select" id="genero_id" required>
                        <option value="" disabled hidden>Seleccione un género</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}" @selected(old('genero_id', $pelicula->genero_id) == $genero->id)>
                                {{ $genero->genero }}
                            </option>
                        @endforeach
                    </select>
                    @error('genero_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('admin.pelicula.index') }}" class="btn float-end"><i class="fa fa-times"></i> Cancelar</a>
            </div>
        </form>
    </div>
@endsection
