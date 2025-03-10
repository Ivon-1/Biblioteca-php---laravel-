@extends('layout.app')
@section('title', 'Editar Genero')
@section('contenidoGenero')

<form action="{{route('generos.update', $genero->id)}}" method="POST">
    @csrf
    @method('put')

    <label for="nombre">Titulos disponibles</label>
    <select name="nombre" >
        @foreach($generos as $genero)
            <option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
        @endforeach
    </select>
    <label for="cantidad">Cantidad de generos asociados</label>
    <select name="cantidad_generos_asociados">
        @foreach($generos as $genero)
            <option value="{{$genero->cantidad_generos_asociados}}">{{$genero->cantidad_generos_asociados}}</option>
        @endforeach
    </select>

    <button type="submit">Editar genero</button>
</form>

@endsection