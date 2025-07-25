@extends('admin.layouts.main')

@section('title', 'COMPONENTES BLADE')

@section('content')

    <h2>IMPRIMIR VALORES</h2>
    <?php
    $nombre = 'Diego';
    $edad = 30;
    ?>
    <p>Nombre:{{ $nombre }}</p>

    <p>Edad:{{ $edad }}</p>

    {{-- esto es un comentarios en Blade --}}
    <h2>CONDICIONALES</h2>
    @if ($edad >= 18)
        <p>usted es mayor de edad</p>
    @else
        <p>usted es menor de edad</p>
    @endif

    {{-- esto es unacondicioneal swicht --}}
    <h2>CONDICIONAL SWICH</h2>
    <?php
    $status = 20;
    ?>
    @switch($status)
        @case(1)
            <p>Caso 1</p>
        @break

        @case(2)
            <p>Caso 2</p>
        @break

        @case(3)
            <p>Caso 3</p>
        @break

        @default
            <p>Caso pòr defecto</p>
    @endswitch

    {{-- bucle for --}}
    <h2>Bucle por FOR</h2>
    @for ($i = 0; $i < 10; $i++)
        <p>El valor de i es {{ $i }}</p>
    @endfor

    {{-- bucle while --}}
    <h2>Bucle While</h2>
    @php
        $contador = 0;
    @endphp
    @while ($contador < 20)
        {{ $contador++ }}
    @endwhile

    {{-- bucle foreach --}}
    <h2>Bucle Foreach</h2>
    @php
    $nombre = ['Diego', 'Juan', 'Pedro', 'Maria']; @endphp
    @foreach ($nombre as $nom)
        {{ $nom }}
    @endforeach

@endsection
