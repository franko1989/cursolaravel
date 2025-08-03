@extends('admin.layouts.main')

@section('title', 'Nueva Película')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Completar el formulario para añadir una nueva película</div>
        </div>

        <form action="{{ route('admin.pelicula.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="mb-3">
                    <label for="titulo" class="form-label @error('titulo') is-invalid @enderror">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}"
                        placeholder="Ej: Jurassic Park" required />
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="resumen" class="form-label @error('resumen') is-invalid @enderror">Resumen</label>
                    <textarea class="form-control" id="resumen" name="resumen" rows="3" placeholder="Sinopsis breve...">{{ old('resumen') }}</textarea>
                    @error('resumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label @error('costo') is-invalid @enderror">Costo</label>
                    <input type="number" step="0.01" class="form-control" id="costo" name="costo" value="{{ old('costo') }}"
                        placeholder="1000000.00" required />
                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="estreno" class="form-label @error('estreno') is-invalid @enderror">Fecha de estreno</label>
                    <input type="date" class="form-control" id="estreno" name="estreno" value="{{ old('estreno') }}"
                        required />
                    @error('estreno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genero_id" class="form-label @error('genero_id') is-invalid @enderror">Género</label>
                    <select name="genero_id" class="form-select" id="genero_id" required>
                        <option value="" disabled selected hidden>Seleccione un género</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}" @selected(old('genero_id') == $genero->id)>
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
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
                <a href="{{ route('admin.pelicula.index') }}" class="btn float-end">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
