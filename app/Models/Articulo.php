<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    protected $fillable = [
        'foto',
        'nombre',
        'artista',
        'stock',
        'categoria',
        'precio'
    ];
    protected $hidden = [];
}
