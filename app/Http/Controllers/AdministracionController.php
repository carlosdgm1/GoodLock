<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Residentes;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion');
    }

    public function indexAP()
    {
        $idr = Residentes::all();
        return view('administracion-personal', compact('idr'));
    }

    public function indexAR()
    {
        return view('administracion-residente');
    }

    //Funciones Personal

    public function createP(){

        $CP = new Personal();
        $CP->nombre = request('nombre');
        $CP->telefono = request('telefono');
        $CP->direccion = request('direccion');
        $CP->tipo = request('tipo');
        $CP->ine = request('ine');
        $CP->servicio = request('servicio');
        $CP->idr = request('idr');

        $CP->save();
        return redirect()->route('index-administracionP');
    }


    //Funciones Residente

    public function createR(){

        $CR = new Residentes();
        $CR->nombre = request('nombre');
        $CR->telefono = request('telefono');
        $CR->direccion = request('direccion');
        $CR->correo = request('correo');
        $CR->tipo = request('tipo');

        $CR->save();
        return redirect()->route('index-administracionR');
    }




}
