@extends('layout.app')

@section('title', 'Añadir libros')
@section('contenido')
<form action="{{route('libros.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Introducir titulo</label>
    <input type="text" name="titulo" required>

    <label for="autor_id">Introducir autor</label>
    <select name="autor_id" required>
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
    <input type="file" name="imagen" accept="image/*" required>
    
    <button type="submit">Crear</button>
</form>
@endsection