<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $user = User::all();
        return view('usuarios', compact('user'));
    }

}
