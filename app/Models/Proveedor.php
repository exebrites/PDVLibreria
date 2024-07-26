<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'apellido', 'telefono', 'correoElectronico'];


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    use HasFactory; 
}
