<?php

namespace App\Http\Controllers;

use App\Models\Arduino as ModelsArduino;
use Illuminate\Http\Request;

class Arduino extends Controller
{
    public function update(Request $request)
    {
        $active = ModelsArduino::where('estatus', 1)->first();
        $active->estatus = "0";
        $active->save();
        $a = ModelsArduino::find($request->relay);
        $a->estatus = "1";
        $a->save();


        return redirect()->back();
    }
}
