@extends('layouts.with-navbar')


@section('body')
<!-- Navbar -->
@parent
<!-- Content -->
<main class="container">
    <div>
        <h1>Bienvenido {{$nombre}} {{$apellido}}</h1>
    </div>
    <div>
        <h2>Tiene {{$dias}} dias de suscripcion y es {{$tipo}}</h2>
    </div>
    <a href="{{ route('turnos.mostrar', ['id'=>$id]) }}">Mis turnos</a>
    <h1>Mis rutinas</h1>

    <table>
        <thead>
            <tr>
                <th>Rutina</th>
                <th>Dia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rutinas as $rutina)
            <tr>
                <td>{{$rutina}}
                    @foreach ($ejercicios as $ejercicio)
                    @if($rutina == $ejercicio->nombre_rutina)
                    {{$ejercicio->nombre_ejercicio}}/{{$ejercicio->dsem}}
                    @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Mis marcas</h1>

    <table>
        <thead>
            <tr>
                <th>Desafio</th>
                <th>Marca</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
            <tr>
                <td>{{$marca->nombre_desafio}}</td>
                <td>{{$marca->marca}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($tipo=='admin')
    <a href="{{ route('clientes.administrar') }}">Modificar clientes</a>
    <a href="{{ route('rutinas.mostrar') }}">Modificar rutinas</a>
    <a href="{{ route('rutinas.marcas') }}">Modificar marcas</a>
    <button href="{{ route('rutinas.desafios')}}" onclick="window.location.href='/tp-fullstack-utn/public/clientes/desafios'">Modificar desafíos</button>
    @endif
</main>
@endsection