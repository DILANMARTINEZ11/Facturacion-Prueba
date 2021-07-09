@extends('layouts.app')

@section('title', 'usuarios')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Lista de Usuarios</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">CORREO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td> {{$usuario->nombre}} </td>
                        <td> {{$usuario->cedula}} </td>
                        <td> {{$usuario->correo}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <center> <a type="button" href="{{ route('login.dashboard') }}" class="btn btn-primary"> Regresar </a> </center>
        </div>
    </div>
</div>



@endsection