@extends('admin.layouts.main')

@section('title', 'Películas')

@section('styles')
    <style>
        .pagination .page-link {
            border-radius: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="card-title">Listado de películas</div>
                <a href="{{ route('admin.pelicula.create') }}" class="btn btn-primary">Nueva película</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Género</th>
                        <th>Costo</th>
                        <th>Estreno</th>
                        <th style="width: 180px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peliculas as $pelicula)
                        <tr>
                            <td>{{ $pelicula->id }}</td>
                            <td>{{ $pelicula->titulo }}</td>
                            <td>{{ $pelicula->genero->genero ?? 'Sin género' }}</td>
                            <td>{{ $pelicula->costo }}</td>
                            <td>{{ $pelicula->estreno }}</td>
                            <td>
                                <a href="{{ route('admin.pelicula.edit', $pelicula->id) }}" class="btn btn-sm btn-primary"
                                    title="Editar">
                                    Edit
                                </a>
                                <a href="{{ route('admin.imagen.create', ['pelicula_id' => $pelicula->id]) }}"
                                    class="btn btn-sm btn-success" title="Agregar Imágenes">
                                    Img
                                </a>
                                <form action="{{ route('admin.pelicula.destroy', $pelicula->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-eliminar">Delt</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $peliculas->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains('btn-eliminar')) {
                    e.preventDefault();
                    const form = e.target.closest('form');
                    Swal.fire({
                        title: '¿Estás seguro de eliminar la película?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>
@endsection
