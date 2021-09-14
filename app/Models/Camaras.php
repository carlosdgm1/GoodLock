<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camaras extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'frente',
        'placa',
        ];
    
    protected $table = 'camaras';
}
