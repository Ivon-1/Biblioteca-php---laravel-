@extends('layout.app')
@section('title', 'Editar Autor')
@section('contenidoAutores')

<form action="{{route('autores.update', $autor->id)}}" method="POST">
    @csrf
    @method('put')

    <label for="nombre">Titulos disponibles</label>
    <select name="nombre" >
        @foreach($autores as $autor)
            <option value="{{$autor->nombre}}">{{$autor->nombre}}</option>
        @endforeach
    </select>
    <label for="cantidad">Cantidad de libros asociados</label>
    <select name="cantidad_libros_asociados">
        @foreach($autores as $autor)
            <option value="{{$autor->cantidad_libros_asociados}}">{{$autor->cantidad_libros_asociados}}</option>
        @endforeach
    </select>

    <button type="submit">Editar autor</button>
</form>

@endsection