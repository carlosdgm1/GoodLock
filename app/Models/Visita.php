<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'ine',
        'motivo',
        'placa',
        'fecha',
        'idr'
        ];
    
    protected $table = 'visitantes';
}
