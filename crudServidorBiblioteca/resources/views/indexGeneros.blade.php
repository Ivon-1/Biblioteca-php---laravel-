@extends('layout.app')

@section('title', 'Lista de generos')
@section('contenidoGenero')

<nav>
    <a href="/libros">Libros</a>
    <a href="/autores">Autores</a>
    <a href="/generos">Generos</a>
</nav>

<div style="text-align: center">
    <button><a href="{{route('generos.create')}}">Crear genero</a></button>
</div>

<table>
    <tr>
        <th>Nombre</th>
        <th>Cantidad de libros asociados</th>
    </tr>
    @foreach ($generos as $genero)
    <tr>
        <td>{{$genero->nombre}}</td>
        <td>{{$genero->cantidad_generos_asociados}}</td>
        <td><button><a href="{{route('generos.edit', $genero->id)}}">Editar</a></button></td>
        <td>
            <!-- meto formulario aqui pa no crear otra vista -->
            <form action="{{route('generos.destroy', $genero->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection