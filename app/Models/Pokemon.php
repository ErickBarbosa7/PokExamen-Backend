<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemones';

    protected $fillable = [
        'nombre', 'tipo', 'nivel', 'puntos_de_salud', 'ataque', 'defensa', 'velocidad', 'url'
    ];
}
