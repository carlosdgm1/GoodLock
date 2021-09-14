<?php

namespace App\Http\Controllers;

use App\Models\Residentes;
use App\Models\Visita;
use Symfony\Component\HttpFoundation\Request;
class OperacionController extends Controller
{
    public function index()
    {
        $idr = Residentes::all();
        return view('operacion', compact('idr'));
    }

    public function createV(){

        $CV = new Visita();
        $CV->nombre = request('nombre');
        $CV->telefono = request('telefono');
        $CV->ine = request('ine');
        $CV->motivo = request('motivo');
        $CV->placa = request('placa');
        $CV->fecha = request('fecha');
        $CV->idr = request('idr');

        $CV->save();
        return redirect()->route('index-visitante');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
