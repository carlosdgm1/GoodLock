<?php

namespace App\Http\Controllers;

use App\Models\Arduino;
use App\Models\Visita;
use App\Models\Camaras;
use App\Models\Personal;
use App\Models\Residentes;
use Illuminate\Support\Str;
use lepiaf\SerialPort\SerialPort;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;

class OperacionController extends Controller
{
    public function index()
    {
        $idr = Residentes::all();
        $cam = Camaras::all();
        $BV = Visita::all()->where('estatus', 'abierta');
        return view('operacion', compact('idr', 'BV', 'cam'));
    }

    public function createV()
    {
        $CV = new Visita();
        $CV->nombre = request('nombre');
        $CV->telefono = request('telefono');
        $CV->ine = request('ine');
        $CV->motivo = request('motivo');
        $CV->placa = request('placa');
        $CV->fecha = request('fecha');
        $CV->idr = request('idr');
        $CV->estatus = 'abierta';

        $CV->save();
        return redirect()->route('index-visitante');
    }

    public function openGate()
    {
        $open = Arduino::where('estatus', 1)->first();
        $configure = new TTYConfigure();
        $configure->setOption("9600");
        $serialPort = new SerialPort(new SeparatorParser("\n"), $configure);
        $serialPort->open("COM4");
        sleep(2);
        $serialPort->write($open->abrir);
        $serialPort->close();
        return response()->json('abierto');
    }
    public function closeGate()
    {
        $close = Arduino::where('estatus', 1)->first();
        $configure = new TTYConfigure();
        $configure->setOption("9600");
        $serialPort = new SerialPort(new SeparatorParser("\n"), $configure);
        $serialPort->open("COM4");
        sleep(2);
        $serialPort->write($close->cerrar);
        $serialPort->close();
        return response()->json($close->cerrar);
    }

    public function store(Request $request)
    {
        $image_64 = $request->ine_foto; //your base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.' . $extension;
        Storage::disk('ine')->put($imageName, base64_decode($image));
        $request->ine_foto = $imageName;

        $image_64 = $request->cara_foto; //your base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.' . $extension;
        Storage::disk('cara')->put($imageName, base64_decode($image));
        $request->cara_foto = $imageName;

        $image_64 = $request->placa_foto; //your base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.' . $extension;
        Storage::disk('placa')->put($imageName, base64_decode($image));
        $request->placa_foto = $imageName;
        $visita = new Visita();
        $visita->saveVisita($request);
    }


    public function estatus($id)
    {

        $idr = Residentes::all();
        $BV = Visita::all()->where('estatus', 'abierta');

        $estatus = Visita::find($id);
        $estatus->estatus = ('cerrada');
        $estatus->save();


        return back();
    }
}
