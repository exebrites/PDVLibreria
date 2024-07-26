<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DetalleVenta;
use App\Models\Producto;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('ventas.create', compact('productos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // return $request;
        // Verificar que la solicitud tenga el encabezado Accept: application/json
        // return $request->productos[0]['cantidad'];

        // Objetivo :
        //     realizar el registro de la venta asociando los detalles a la misma 

        // tareas: 
        // 1. conocer que productos y cantidad tengo que almacenar en la base de datos.
        $listaProductos  = $request->productos;
        // dd($listaProductos);

        $medioPago = $listaProductos[count($listaProductos) - 1];
        array_pop($listaProductos);
        
       
     
        $detalleVenta = [];
        foreach ($listaProductos as $key => $value) {
            // $producto = Producto::find($key);
            $detalleVenta[] = [
                'id' => $value['id'],
                'cantidad' => $value['cantidad'],
                'subtotal' => $value['precioSubtotal'],

            ];
        }
        // sumar el total de venta 

        $total = array_reduce($detalleVenta, function ($suma, $item) {
            return $suma + $item['subtotal'];
        }, 0);

     
        $venta = Venta::create([
            'montoTotal' => $total,
            'medioPago' => $medioPago['medio_pago'],
        ]);
        // dd($venta);
        foreach ($detalleVenta as $key => $value) {
            DetalleVenta::create([
                // cantidad', 'precioSubtotal', 'idVenta', 'idProducto'
                'cantidad' => $value['cantidad'],
                'precioSubtotal' => $value['subtotal'],
                'idProducto' => $value['id'],
                'idVenta' => $venta->id
            ]);
        }


        // return redirect()->route('ventas.create');
       return response()->json($venta);
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
        $venta = Venta::find($id);
    
    return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);
        $detalleVenta = DetalleVenta::where('idVenta', $id)->get();
        return view('ventas.edit', compact('venta', 'detalleVenta'));
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
    }
}
