@extends('layouts.app')

@section('title', 'crear-cliente')
@section('content')

<div class="container">
    <form action="{{route('clientes.store')}}" method="POST">
      @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Apellido</label>
                <input type="text" class="form-control" name="apellido" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Cedula</label>
            <input type="text" class="form-control" name="cedula" placeholder="">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Direccion</label>
            <input type="text" class="form-control" name="direccion" placeholder="">
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputState">Ciudad</label>
                <select name="ciudad" class="form-control">
                    <option selected>Eligé</option>
                    <option value=1> Bogotá D.C </option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Celular</label>
                <input type="text" class="form-control" name="celular">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Correo</label>
                <input type="email" class="form-control" name="correo">
            </div>
        </div>
      
        <button type="submit" class="btn btn-primary"> Crear</button>
    </form>
</div>

@endsection