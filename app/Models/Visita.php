<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

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

    public static function saveVisita(Request $request){
        dd($request->ine);
        $this->fill($request);
    }
}
