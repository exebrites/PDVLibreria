<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        // return $request->estado;
        $request->validate([
            'nombre' => 'required|unique:categorias|max:250',
            'estado' => 'required',
        ]);

        if ($request->file('url_imagen') == null) {
            // sino $url toma el valor que tenia imagen_path cuando no se actualiza la foto

            $url = "";
        } else {
            // si actualiza debe pasar ...
            $imagen =  $request->file('url_imagen')->store('public');
            $url = Storage::url($imagen);
        }
        Categoria::create([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => $request->descripcion,
            'url_imagen' => $url,
            'estado' => $request->estado
        ]);

        return redirect()->route('categoria.index')->with('success', 'Categoria created successfully.');
    }

    public function show(Categoria $Categoria)
    {
        return view('categorias.show', compact('Categoria'));
    }

    public function edit(Categoria $categoria)
    {
        // return $categoria;
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {// {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $categoria->id . '|max:250',
        ]);

        if ($request->file('url_imagen') == null) {
            // sino $url toma el valor que tenia imagen_path cuando no se actualiza la foto

            $url = "";
        } else {
            // si actualiza debe pasar ...
            $imagen =  $request->file('url_imagen')->store('public');
            $url = Storage::url($imagen);
        }
        $categoria->update([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => $request->descripcion,
            'url_imagen' => $url,
            'estado' => $request->estado
        ]);
        return redirect()->route('categoria.index')->with('success', 'Categoria updated successfully.');
    }

    public function destroy(Categoria $Categoria)
    {
        // return $Categoria;
        $Categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoria deleted successfully.');
    }
}
