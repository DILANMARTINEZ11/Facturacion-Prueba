@extends('layouts.app')

@section('title', 'usuarios')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Lista de Clientes</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><a type="button" href="{{ route('clientes.create') }}" class="btn btn-primary"> Crear Cliente </a></th>
                    </tr>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td> {{$cliente->nombre}} </td>
                        <td> {{$cliente->apellido}} </td>
                        <td> {{$cliente->cedula}} </td>
                        <td> {{$cliente->direccion}} </td>
                        <td> {{$cliente->celular}} </td>
                        <td> {{$cliente->correo}} </td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a type="button" href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-success"> Editar </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('clientes.delete',$cliente->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Eliminar </button>
                                    </form>
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