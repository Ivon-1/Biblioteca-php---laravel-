@extends('layout.app')
@section('title', 'Crear genero')
@section('contenidoGenero')

<form action="{{route('generos.store')}}" method="POST">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <label for="cantidad_generos_asociados">Cantidad generos asociados</label>
    <input type="text" name="cantidad_generos_asociados">
    <button type="submit">Crear</button>
</form>

@endsection