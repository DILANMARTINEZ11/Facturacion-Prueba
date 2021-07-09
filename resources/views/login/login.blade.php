@extends('layouts.app')

@section('title', 'Login')
@section('content')

<div class="card text-center">
    <div class="card-header">
        Iniciar Sesión
    </div>
    <div class="card-body">
        <form action="{{route('login.validar')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                
                <input type="email" class="form-control" name="correo"  placeholder="correo">
                </div>
            </div>
            <div class="row">
            <div class="col">
                
                <input type="password" class="form-control" name="psw" placeholder="contraseña">
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-primary"> Iniciar sesión </button>
            <div class="alert alert-danger" role="alert" {{$style}}>
                {{$error}}
            </div>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

@endsection