<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();
        return view('/indexAutores', compact('autores'));
    }

    /**
     * Vista autor
     */
    public function create()
    {
        return view('/layout/crearAutor');
    }

    /**
     * Logica de creacion
     */
    public function store(Request $request)
    {
        $autor = new Autor();
        // valores
        $autor->nombre = $request->nombre;
        $autor->cantidad_libros_asociados = $request->cantidad_libros_asociados;
        $autor->save();

        return redirect()->route('autores.index')->with('succes', 'Libro' . $autor->nombre . 'Creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * vista de editar
     */
    public function edit(string $id)
    {
        $autor = Autor::find($id);
        $autores = Autor::all(); // recordar definirla

        if (!$autor) {
            return view('/layout/editarAutor')->with('Error', 'El id del autor no existe');
        } else {
            return view('/layout/editarAutor', compact('autor', 'autores'));
        }
    }

    /**
     * editar
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);

        if (!$autor) {
            return view('/layout/editarAutor')->with('Error', 'El id del autor no existe');
        } else {
            $autor->nombre = $request->nombre;
            $autor->cantidad_libros_asociados = $request->cantidad_libros_asociados;
            $autor->save();
            // redirigimos vista principal
            return redirect('/autores')->with('succes', 'Autor' . $autor->nombre . 'Añadido con exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return redirect('/autores')->with('Error', 'El autor no existe');
        }else{
            $autor->delete();
            return redirect('/autores')->with('success', 'Autor ' . $autor->nombre . 'Eliminado con exito');
        }
    }
}
