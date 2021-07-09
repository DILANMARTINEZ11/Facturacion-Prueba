<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;

class UsuariosController extends Controller
{
    //
    public function index(){
        $usuarios = new Usuarios();

        $usuarios = $usuarios::all();
        return view('usuarios.index', ["usuarios" => $usuarios]);

    }
}
