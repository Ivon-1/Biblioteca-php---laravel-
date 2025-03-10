<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'genero'])->get();
        return view('index', compact('libros'));
    }

    /**
     * Solo para mostrar el blade de crear
     */
    public function create()
    {
        $autores = Autor::all();
        $generos = Genero::all();
        return view('/layout/crearLibro', compact('autores', 'generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // guardamos imagen
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('libros', 'public');
        }

        $libro = new Libro();
        // valores
        $libro->titulo = $request->titulo;
        $libro->autor_id = $request->autor_id;
        $libro->genero_id = $request->genero_id;
        $libro->imagen = $path; // imagen va a ser path
        // guardamos
        $libro->save();
        return redirect()->route('libros.index')->with('success', 'Libro ' . $libro->titulo . ' creado con exito');
    }

    /**
     * Mostrar por id
     */
    public function show(string $id)
    {
        //
    }

    /**
     * devolvemos la vista correspondiente
     */
    public function edit(string $id)
    {
        $libro = Libro::find($id);
        $autores = Autor::all();
        $generos = Genero::all();

        if (!$libro) {
            return view('/layout/editarLibro')->with('error', 'El id no existe');
        } else {
            return view('/layout/editarLibro', compact('libro', 'autores', 'generos'));
        }
    }

    /**
     * Actualizar por id
     */
    public function update(Request $request, string $id)
    {

        $libro = Libro::find($id);

        if (!$libro) {
            return redirect('/layout/editarLibro')->with('error', 'El id no existe');
        }

        $request->validate([
            'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // opcional de nullable
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('libros', 'public');
            $libro->imagen = $path; // asignamos path a base de datos solo si se ha subido imagen
        }
        
        // actualizamos datos de productos
        $libro->titulo = $request->titulo;
        $libro->autor_id = $request->autor_id;
        $libro->genero_id = $request->genero_id;

        $libro->save();
        // redirigimos vista principal
        return redirect('/libros')->with('success', 'Libro' . $libro->titulo . 'Actualizado con exito');
    }

    /**
     * Eliminar por id
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);

        if ($libro->imagen) {
            $imagePath = $libro->imagen;
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath); // eliminamos imagen
            }
        }

        if (!$libro) {
            return redirect('/libros')->with('error', 'Libro no encontrado');
        } else {
            $libro->delete();
            return redirect('/libros')->with('success', 'Libro ' . $libro->titulo . 'Eliminado con exito');
        }
    }
}
