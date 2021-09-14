<?php

namespace App\Http\Controllers;

use App\Models\Coresidente;
use App\Models\Personal;
use App\Models\Residentes;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function index()
    {
        return view('busqueda');
    }

    public function indexP()
    {
        $BP = Personal::all();
        return view('busqueda-personal', compact('BP'));
    }

    public function indexR()
    {
        $BR = Residentes::all();
        return view('busqueda-residente',  compact('BR'));
    }
    
    public function indexV()
    {
        $BV = Visita::all();
        return view('busqueda-visita', compact('BV'));
    }


    //Funciones Personal

    public function updateP($id){

        $BP = Personal::find($id);

        $BP->nombre = request('nombre');
        $BP->telefono = request('telefono');
        $BP->direccion = request('direccion');
        $BP->tipo = request('tipo');
        $BP->ine = request('ine');
        $BP->servicio = request('servicio');

        $BP->save();
        return redirect()->back();
    }

    public function deleteP($id)
    {
         $BP = Personal::find($id); 
         $BP->delete();
         return redirect()->back();
    }

    //Funciones Residente

    public function updateR($id){

       

        $BR = Residentes::find($id);
        $BR->nombre = request('nombre');
        $BR->telefono = request('telefono');
        $BR->direccion = request('direccion');
        $BR->correo = request('correo');
        $BR->tipo = request('tipo');

        $BR->save();
        return redirect()->back();
    }

    public function deleteR($id)
    {
         $BR = Residentes::find($id); 
         $BR->delete();
         return redirect()->back();
    }

    //Visitantes

    public function updateV(){

        $CV = new Visita();
        $CV->nombre = request('nombre');
        $CV->telefono = request('telefono');
        $CV->ine = request('ine');
        $CV->motivo = request('motivo');
        $CV->placa = request('placa');
        $CV->fecha = request('fecha');
        $CV->idr = request('idr');

        $CV->save();
        return redirect()->back();
    }

    //Coresidentes

    public function indexCR($id)
    {
        $diag = $id;
        $meca = Coresidente::all()->where('idr', $id);
        return view('coresidentes', compact('diag','meca'));
    }

    public function createCR(){

        $CCR = new Coresidente();
        $CCR->idr = request('idr');
        $CCR->nombre = request('nombre');
        $CCR->relacion = request('relacion');

        $CCR->save();
        return redirect()->back();
    }

}
