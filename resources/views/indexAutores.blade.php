@extends('layout.app')

@section('title', 'Lista autores')
@section('contenidoAutores')

<nav>
    <a href="/libros">Libros</a>
    <a href="/autores">Autores</a>
    <a href="/generos">Generos</a>
</nav>

<div style="text-align: center">
    <a href="{{route('autores.create')}}"><button>Agregar autor</button></a>
</div>

<table>
    <tr>
        <th>Nombre</th>
        <th>Cantidad de libros asociados</th>
    </tr>
    @foreach ($autores as $autor)
    <tr>
        <td>{{$autor->nombre}}</td>
        <td>{{$autor->cantidad_libros_asociados}}</td>
        <td><button><a href="{{route('autores.edit', $autor->id)}}">Editar</a></button></td>
        <td>
            <!-- meto formulario aqui pa no crear otra vista -->
            <form action="{{route('autores.destroy', $autor->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection