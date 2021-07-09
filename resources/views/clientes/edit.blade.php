@extends('layouts.app')

@section('title', 'editar-cliente')
@section('content')

<div class="container">
    <form action="{{route('clientes.update',$cliente->id)}}" method="POST">
      @csrf
      @method('put')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" value="{{$cliente->nombre}}" name="nombre" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Apellido</label>
                <input type="text" class="form-control" value="{{$cliente->apellido}}" name="apellido" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Cedula</label>
            <input type="text" class="form-control" value="{{$cliente->cedula}}" name="cedula" placeholder="">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Direccion</label>
            <input type="text" class="form-control" value="{{$cliente->direccion}}" name="direccion" placeholder="">
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputState">Ciudad</label>
                <select name="ciudad" value="{{$cliente->ciudad}}" class="form-control">
                    <option value=1 selected>Eligé</option>
                    <option value=1> Bogotá D.C </option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Celular</label>
                <input type="text" class="form-control" value="{{$cliente->celular}}" name="celular">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Correo</label>
                <input type="email" class="form-control" value="{{$cliente->correo}}" name="correo">
            </div>
        </div>
      
        <button type="submit" class="btn btn-primary"> Editar </button>
    </form>
</div>

@endsection