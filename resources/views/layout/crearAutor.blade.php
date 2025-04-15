@extends('layout.app')
@section('title', 'Crear autor')
@section('contenidoAutores')

<form action="{{route('autores.store')}}" method="POST">
    @csrf
    <label for="nombre">Introducir titulo</label>
    <input type="text" name="nombre" required>

    <label for="cantidad">Cantidad de libros asociados</label>
    <input type="text" name="cantidad_libros_asociados">

    <button type="submit">Crear autor</button>
</form>

@endsection