<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::all();
        return view('/indexGeneros', compact('generos'));
    }

    /**
     * 
     */
    public function create()
    {
        return view('/layout/crearGenero');
    }

    /**
     * creamos
     */
    public function store(Request $request)
    {
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        $genero->cantidad_generos_asociados = $request->cantidad_generos_asociados;
        $genero->save();

        return redirect()->route('generos.index')->with('succes', 'Genero' . $genero->nombre . 'Creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genero = Genero::find($id);
        $generos = Genero::all();

        if (!$genero) {
            return view('/layout/editarGenero')->with('Error', 'El id del genero no existe');
        }else{
            return view('/layout/editarGenero', compact('genero', 'generos'));
        }
    }

    /**
     * 
     */
    public function update(Request $request, string $id)
    {
        $genero = Genero::find($id);

        if (!$genero) {
            return view('/layout/editarGenero')->with('Error', 'El id del genero no existe');
        } else {
            $genero->nombre = $request->nombre;
            $genero->cantidad_generos_asociados = $request->cantidad_generos_asociados;
            $genero->save();
            return redirect('/generos')->with('succes', 'Genero' . $genero->nombre . 'Añadido con exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genero = Genero::find($id);
        if (!$genero) {
            return redirect('/generos')->with('Error', 'El id del genero no existe');
        }else{
            $genero->delete();
            return redirect()->route('generos.index')->with('success', 'El género "' . $genero->nombre . '" ha sido eliminado con éxito.');
        }
    }
}
