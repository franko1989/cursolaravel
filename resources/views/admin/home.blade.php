@extends('admin.layouts.main')

@section('title','MENU PRINCIPAL')

@section('content')
<a href="{{url('hola')}}">1. Hola Mundo</a>
<br>
<a href="{{route('practica1')}}">2. hola Mundo(NAME)</a>
<br>
<a href="{{route('practica2',['nombre'=>'jesus','edad'=>55])}}">3. Paso de Parametros</a>
<br>
<a href="{{route('practica3')}}">4. Paso de Parametros por Defecto</a>
<br>
<a href="{{route('saludo.dia')}}">5. Buenos Dias</a>
<br>
<a href="{{route('saludo.tarde')}}">6. Buenas Tardes</a>
<br>
<a href="{{route('saludo.noche')}}">7. Buenas Noches</a>
<div class="container">
        <h2>Hola desde la vista con Blade - Home</h2>

        <ul>
            <li><a href="{{ route('prueba.empleado', ['nombre' => 'Diego', 'sueldo' => 1500]) }}">Ver Datos de Empleado</a></li>
            <li><a href="{{ route('prueba.empleado') }}">Empleado sin parámetros</a></li>
            <li><a href="{{ route('prueba.controlador') }}">Ir a HolaBlade (Controlador)</a></li>
            <li><a href="{{ route('prueba.persona') }}">Ver Datos de Persona</a></li>
            <li><a href="{{ route('prueba.componentes') }}">Componentes Blade</a></li>
        </ul>
    </div>
@endsection
