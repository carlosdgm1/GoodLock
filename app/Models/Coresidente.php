<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coresidente extends Model
{
    use HasFactory;

    protected $fillable = [
        'idr',
        'telefono',
        'relacion',
        ];
    
    protected $table = 'coresidente';
}
