<?php

namespace App\Http\Controllers;

use App\Models\Camaras;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $camara = Camaras::all();
        return view('configuracion',compact('camara'));
    }

    public function update($id){

        $Cam = Camaras::find($id);
        $Cam->frente = request('frente');
        $Cam->placa = request('placa');
        $Cam->save();
        
        return redirect()->back();
    }
}