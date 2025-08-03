@extends('admin.layouts.main')

@section('title', 'Relación Películas - Directores')

@section('content')
<div class="card card-primary card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Relaciones entre Directores y Películas</div>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.pelicula_director.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label>Película</label>
                    <select name="pelicula_id" class="form-select">
                        @foreach($peliculas as $p)
                            <option value="{{ $p->id }}">{{ $p->titulo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label>Director</label>
                    <select name="director_id" class="form-select">
                        @foreach($directores as $d)
                            <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">Agregar Relación</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Película</th>
                    <th>Director</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($relaciones as $rel)
                    <tr>
                        <td>{{ $rel->id }}</td>
                        <td>{{ $rel->pelicula }}</td>
                        <td>{{ $rel->director }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.pelicula_director.destroy', $rel->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar relación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
