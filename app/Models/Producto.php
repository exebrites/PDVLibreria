<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precioVenta',
        'precioCompra',
        'cantidadStock',
        'imgProducto',
        'idProveedor',
        'idCategoria',
    ];



    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'idProveedor', '');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', '');
    }
    use HasFactory;
}
