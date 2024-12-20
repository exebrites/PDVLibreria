<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleVenta;
class Venta extends Model
{

    protected $table = "ventas";
    protected $fillable = ['montoTotal', 'medioPago'];
    use HasFactory;
    
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'idVenta');
    }
}
