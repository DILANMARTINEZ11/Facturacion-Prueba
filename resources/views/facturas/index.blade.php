@extends('layouts.app')

@section('title', 'facturas')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Lista de Facturas</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><a type="button" href="{{ route('facturas.create') }}" class="btn btn-primary"> Crear Factura </a></th>
                    </tr>
                    <tr>
                        <th scope="col">FACTURA FV-21</th>
                        <th scope="col">NOMBRE CLIENTE</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                    <tr>
                        <td> {{$factura->id}} </td>
                        <td> {{$factura->nombre}} </td>
                        <td> {{$factura->cedula}} </td>
                        <td> {{$factura->direccion}} </td>
                        <td> {{$factura->celular}} </td>
                        <td> {{$factura->correo}} </td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a type="button" href="{{ route('clientes.edit', $factura->id) }}" class="btn btn-success"> Editar </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <center> <a type="button" href="{{ route('login.dashboard') }}" class="btn btn-primary"> Regresar </a> </center>
        </div>
    </div>
</div>



@endsection