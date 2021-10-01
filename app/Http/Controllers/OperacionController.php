<?php

namespace App\Http\Controllers;

use App\Models\Residentes;
use App\Models\Visita;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;

class OperacionController extends Controller
{
    public function index()
    {
        $idr = Residentes::all();
        return view('operacion', compact('idr'));
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

        $CV->save();
        return redirect()->route('index-visitante');
    }

    public function openGate()
    {
        $configure = new TTYConfigure();
        $configure->setOption("9600");
        $serialPort = new SerialPort(new SeparatorParser("\n"), $configure);
        $serialPort->open("COM1");
        // $serialPort->write("P");
        // $serialPort->write("Q");
        $serialPort->write(pack("H", 0x50));

        $serialPort->close();
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
}
