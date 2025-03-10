@extends('layout.app')

@section('title', 'Editar libros')
@section('contenido')

<form action="{{route('libros.update', $libro->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="titulo">Introducir titulo</label>
    <input type="text" name="titulo" value="{{$libro->titulo}}">

    <label for="autor_id">Introducir autor</label>
    <select name="autor_id">
        @foreach($autores as $autor)
        <option value="{{$autor->id}}">{{$autor->nombre}}</option>
        @endforeach
    </select>

    <label for="genero_id">Introducir genero</label>
    <select name="genero_id">
        @foreach($generos as $genero)
        <option value="{{$genero->id}}">{{$genero->nombre}}</option>
        @endforeach
    </select>

    <label for="imagen">Introducir imagen</label>
    <input type="file" name="imagen" value="{{$libro->imagen}}">
    
    <button type="submit">Editar</button>
</form>
@endsection