@extends('admin.layouts.main')

@section('title', 'Nuevo Director')

@section('content')
<div class="card card-primary card-outline mb-4">
    <div class="card-header">
        <h3 class="card-title">Agregar nuevo Director</h3>
    </div>

    <form action="{{ route('admin.director.store') }}" method="POST">
        @csrf
        <div class="card-body">

            <div class="mb-3">
                <label for="nombre" class="form-label @error('nombre') is-invalid @enderror">Nombre del Director</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar Director</button>
            <a href="{{ route('admin.director.index') }}" class="btn btn-secondary float-end">Cancelar</a>
        </div>
    </form>
</div>
@endsection
