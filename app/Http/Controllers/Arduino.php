<?php

namespace App\Http\Controllers;

use App\Models\Arduino as ModelsArduino;
use Illuminate\Http\Request;

class Arduino extends Controller
{
    public function update($id){

        $a = ModelsArduino::find($id);
        $a->estatus = "1";
        $a->save();

         
        return redirect()->back();
    }
}
