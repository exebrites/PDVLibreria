<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    use HasFactory;
}
