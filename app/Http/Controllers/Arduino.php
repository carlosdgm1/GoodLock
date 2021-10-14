<?php

namespace App\Http\Controllers;

use App\Models\Arduino as ModelsArduino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Arduino extends Controller
{
    public function update($id){

       


        $b = ModelsArduino::where('id','<>',$id)->first();
        
        $a = ModelsArduino::find($id);

        $a->estatus = "1";
        $b->estatus = "0";

        
        $a->save();
        $b->save();
        
        return redirect()->back();
    }
}
