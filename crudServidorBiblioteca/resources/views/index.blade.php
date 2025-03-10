@extends('layout.app')

@section('title', 'Lista de elementos')
    
@section('contenido')
<nav>
    <a href="/libros">Libros</a>
    <a href="/autores">Autores</a>
    <a href="/generos">Generos</a>
</nav>

<div style="text-align: center">
    <a href="{{route('libros.create')}}"><button>Agregar Libro</button></a>
</div>

<table>
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Genero</th>
        <th>Imagen</th>
    </tr>
    @foreach ($libros as $libro)
    <tr>
        <td>{{$libro->titulo}}</td>
        <!-- IMPORTANTE 
        PONEMOS NOMBRES DE LAS FUNCIONES(LAS QUE PASAMOS EN WITH)
        SI QUEREMOS ENTRAR EN NOMBRE
        NO PONEMOS EL CAMPO ID
        -->
        <td>{{$libro->autor->nombre}}</td>
        <td>{{$libro->genero->nombre}}</td>
        <td>
            <img src="{{ asset('storage/' . $libro->imagen) }}" alt="{{ $libro->titulo }}" style="width: 100px">
        </td>

        <td><button><a href="{{route('libros.edit', $libro->id)}}">Editar</a></button></td>
        <td>
            <form action="{{route('libros.destroy', $libro->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection