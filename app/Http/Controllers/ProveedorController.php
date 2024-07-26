<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::all();
        // dd($proveedores);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correoElectronico' => 'required|email|unique:proveedores',
        ]);

        Proveedor::create(
            [
                'nombre' => strtoupper($request->nombre),
                'apellido' => strtoupper($request->apellido),
                'telefono' => $request->telefono,
                'correoElectronico' => $request->correoElectronico
            ]
        );

        return redirect()->route('proveedor.index')->with('success', 'Proveedor created successfully.');
    }

    public function show(Proveedor $supplier)
    {
        return view('proveedores.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Proveedor $supplier The provider to be edited.
     * @return \Illuminate\View\View
     */
    public function edit(Proveedor $proveedor)
    {
        // Show the form for editing the specified provider.
        //
        // @param Proveedor $supplier The provider to be edited.
        // @return \Illuminate\View\View
        // return $request;
        // return $proveedor;
        // $proveedor = Proveedor::find($proveedor->id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correoElectronico' => 'required|email|unique:proveedores,correoElectronico,' . $proveedor->id, 
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedor.index')->with('success', 'Proveedor updated successfully.');
    }

    public function destroy(Proveedor $Proveedor)
    {
        // return $proveedor;
        // return $Proveedor;
        $Proveedor->delete();
        return redirect()->route('proveedor.index')->with('success', 'Proveedor deleted successfully.');
    }
}
