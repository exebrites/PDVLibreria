<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        // $productos = Producto::paginate(2);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //}
        $proveedores =  Proveedor::all();
        $categorias = Categoria::all();
        // return $categorias;
        return view('productos.create', compact('proveedores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;


        if ($request->file('imgProducto') == null) {
            // sino $url toma el valor que tenia imagen_path cuando no se actualiza la foto

            $url = "";
        } else {
            // si actualiza debe pasar ...
            $imagen =  $request->file('imgProducto')->store('public');
            $url = Storage::url($imagen);
        }
        // dd($url);
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precioVenta' => $request->venta,
            'precioCompra' => $request->costo,
            'cantidadStock' => $request->stock,
            'imgProducto' => $url,
            'idProveedor' => $request->idProveedor,
            'idCategoria' => $request->idCategoria,
        ]);

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $proveedores =  Proveedor::all();
        $categorias = Categoria::all();
        // return $categorias;
        return view('productos.edit', compact('proveedores', 'categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producto = Producto::find($id);
        if ($request->file('imgProducto') == null) {
            // sino $url toma el valor que tenia imagen_path cuando no se actualiza la foto

            $url = $producto->imgProducto;
        } else {
            // si actualiza debe pasar ...
            $imagen =  $request->file('imgProducto')->store('public');
            $url = Storage::url($imagen);
        }


        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precioVenta' => $request->venta,
            'precioCompra' => $request->costo,
            'cantidadStock' => $request->stock,
            'imgProducto' => $url,
            'idProveedor' => $request->idProveedor,
            'idCategoria' => $request->idCategoria,
        ]);

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return $id;
        $producto =  Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
