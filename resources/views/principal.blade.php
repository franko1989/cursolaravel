@extends('admin.layouts.main')

@section('title', 'Inicio')

@section('content')
    {{-- Botón de logout arriba a la izquierda --}}
    <div class="mb-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </form>
    </div>

    {{-- Contenido principal --}}
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Bienvenido/a, {{ Auth::user()->name }}</h5>
        </div>
        <div class="card-body">
            <p>Has iniciado sesión correctamente.</p>
        </div>
    </div>
@endsection
