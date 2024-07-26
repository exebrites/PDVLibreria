<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;
class DetalleVenta extends Model
{
    protected $table = "detalle_ventas";
    protected $fillable = ['cantidad', 'precioSubtotal', 'idVenta', 'idProducto'];

    // $table->integer('cantidad');
    // $table->double('precioSubtotal');
    
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto', 'id');
    }
    use HasFactory;
}
