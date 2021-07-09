<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = new Clientes();

        $clientes = $clientes::all();
        return view('clientes.index', ["clientes" => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes();

        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->cedula = $request->cedula;
        $clientes->direccion = $request->direccion;
        $clientes->celular = $request->celular;
        $clientes->correo = $request->correo;
        $clientes->ciudad_id = $request->ciudad;
        $clientes->estado = true;



        if ($clientes->save()) {
            $clientes = $clientes::all();
            return view('clientes.index', ["clientes" => $clientes]);
        } else {
            print "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = new Clientes();
        $clientes = $clientes::find($id);
        return view('clientes.edit' ,["cliente" => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clientes $clientes)
    {
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->cedula = $request->cedula;
        $clientes->direccion = $request->direccion;
        $clientes->celular = $request->celular;
        $clientes->correo = $request->correo;
        $clientes->ciudad_id = $request->ciudad;
        $clientes->estado = true;



        if ($clientes->save()) {
            $clientes = $clientes::all();
            return view('clientes.index', ["clientes" => $clientes]);
        } else {
            print "Error";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientes $clientes)
    {
        $clientes = $clientes::whereId($clientes->id)->delete();

        $clientes = new Clientes();
        $clientes = $clientes::all();
        return view('clientes.index', ["clientes" => $clientes]);
    }
}
