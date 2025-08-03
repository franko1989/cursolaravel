@extends('admin.layouts.main')

@section('title', 'Listado de Directores')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Directores</h3>
        <a href="{{ route('admin.director.create') }}" class="btn btn-primary float-end">Nuevo Director</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($directores as $director)
                    <tr>
                        <td>{{ $director->id }}</td>
                        <td>{{ $director->nombre }}</td>
                        <td>
                            <a href="{{ route('admin.director.edit', $director) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('admin.director.destroy', $director) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este director?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay directores registrados.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $directores->links() }}
    </div>
</div>
@endsection



