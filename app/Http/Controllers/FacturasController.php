<?php

namespace App\Http\Controllers;

use App\Models\facturas;
use App\Models\clientes;
use App\Models\productos;
use App\Models\facturaProductos;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = new Facturas();
        $facturas = $facturas::join("clientes","facturas.cliente_id","=","clientes.id")->select('clientes.*','facturas.*')->get();
        return view('facturas.index' , ["facturas" => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facturas = new Facturas();
        $facturas = $facturas::all()->count();
        $productos = new Productos();
        $productos = $productos::paginate();
        return view('facturas.create', ["numFactura"=> $facturas+1 , "productos" => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facturas = new Facturas();
        $clientes = new Clientes();

        $clientes = $clientes::where('cedula', $request->cedula)->select('id')->get();
        
        $facturas->cliente_id = $clientes[0]['id'];
        $facturas->subTotal = $request->sub;
        $facturas->total = $request->to;

        if ($facturas->save()) {

            $productos = explode(',',$request->productosID);
            $cantidad = explode(',',$request->c);
            $subtotal = explode(',',$request->s);
            $total = explode(',',$request->t);

            for ($i=0; $i < count($productos) ; $i++) { 
               $facturaProductos = new FacturaProductos();
               $facturaProductos->producto_id = $productos[$i];
               $facturaProductos->factura_id = $request->fv;
               $facturaProductos->cantidad = $cantidad[$i];
               $facturaProductos->subTotal = $subtotal[$i];
               $facturaProductos->total = $total[$i];
               $facturaProductos->save();
            }

            
            $facturas = $facturas::join("clientes","facturas.cliente_id","=","clientes.id")->select('clientes.*','facturas.*')->get();
            return view('facturas.index' , ["facturas" => $facturas]);
        } else {
            print "Error";
        }


        #echo $request->productosID;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function show(facturas $facturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function edit(facturas $facturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facturas $facturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function destroy(facturas $facturas)
    {
        //
    }
}
