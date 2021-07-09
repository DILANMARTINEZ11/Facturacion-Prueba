@extends('layouts.app')

@section('title', 'productos')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Lista de Productos</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NOMBRE PRODUCTO</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">STOCK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td> {{$producto->nombre_producto}} </td>
                        <td> {{$producto->descripcion}} </td>
                        <td> {{$producto->precio}} </td>
                        <td> {{$producto->stock}} </td>                
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $productos->links() }}
    <center> <a type="button" href="{{ route('login.dashboard') }}" class="btn btn-primary"> Regresar </a> </center>
</div>



@endsection