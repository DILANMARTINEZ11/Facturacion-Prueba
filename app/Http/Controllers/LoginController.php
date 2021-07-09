<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\usuarios;


class LoginController extends Controller
{
    public function login()
    {

        return view('login.login', ['error' => null , 'style' => "style="."display:"."none"]);
    }

    public function home(){
        return view('home');
    }

    public function validar(Request $request)
    {
        $correo = $request->correo;
        $contraseña = $request->psw;

        $usuarios = new Usuarios();
        $usuarios = $usuarios::where("correo", "=", $correo)->where("contrasena", "=", $contraseña)->get();

        if (count($usuarios) >= 1) {
           return view('home');
        } else {
            return view('login.login', ['error' => "Contraseña o Correo Incorrecto", 'style' => "style="."display:"."block"]);
        }
    }
}
