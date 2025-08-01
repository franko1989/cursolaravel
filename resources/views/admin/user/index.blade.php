@extends('admin.layouts.main')
@section('title', 'Usuarios')

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
            <div class=" d-flex justify-content-between align-items-center">
                <div class="card-title">Listado de usuarios</div>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo usuario</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Tipo</th>
                        <th style="width: 180px">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 'admin')
                                    <span class="badge bg-danger">{{ $user->role }}</span>
                                @elseif($user->role == 'member')
                                    <span class="badge bg-warning">{{ $user->role }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                    Editar
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           {{ $users->links('pagination::bootstrap-5') }}
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
                        title: '¿Estás seguro de eliminar el registro?',
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
