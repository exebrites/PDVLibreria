<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Categoria extends Model
{
    protected $table = 'categorias';

    // campos de categoria

    // nombre * y unico 
    // descripcion
    // url imagen
    // estado : activar o desactivar la categorias
    protected $fillable = ['nombre', 'descripcion', 'url_imagen', 'estado'];


    // public function productos()
    // {
    //     return $this->hasMany(Producto::class);
    // }
    use HasFactory;
}
