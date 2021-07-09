<?php

namespace App\Http\Controllers;

use App\Models\facturaProductos;
use App\Models\productos;
use App\Models\clientes;
use Illuminate\Http\Request;

class FacturaProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Request $request){
        $productos = new Productos();
        $nombreProducto = $request->nombre;
        $productos = $productos::where('nombre_producto','LIKE',  $nombreProducto)->get();
        return $productos;
    }

    public function datosClientes(Request $request){
        $term = $request->get('term');
        
        $clientes = new Clientes();
        $clientes = $clientes::where('cedula','LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach($clientes as $cliente){
           $data[] = [
               'label' => $cliente->cedula,
               'id' =>$cliente->id,
               'nombre' =>$cliente->nombre,
               'celular' =>$cliente->celular,
               'correo' => $cliente->correo
            ];
        }

        return $data;
    }

    public function index(Request $request)
    {
        $term = $request->get('term');
        
        $productos = new Productos();
        $productos = $productos::where('nombre_producto','LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach($productos as $producto){
           $data[] = [
               'label' => $producto->nombre_producto,
               'descripcion' =>$producto->descripcion,
               'precio' =>$producto->precio,
            ];
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facturaProductos  $facturaProductos
     * @return \Illuminate\Http\Response
     */
    public function show(facturaProductos $facturaProductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facturaProductos  $facturaProductos
     * @return \Illuminate\Http\Response
     */
    public function edit(facturaProductos $facturaProductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facturaProductos  $facturaProductos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facturaProductos $facturaProductos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facturaProductos  $facturaProductos
     * @return \Illuminate\Http\Response
     */
    public function destroy(facturaProductos $facturaProductos)
    {
        //
    }
}
