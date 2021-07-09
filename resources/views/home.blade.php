@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> Bienvenido </div>

        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2017/07/18/23/40/group-2517459_960_720.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <a type="button" href="{{ route('usuarios.index') }}" class="btn btn-primary"> Usuarios </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2017/07/18/23/40/group-2517459_960_720.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <a type="button" href="{{ route('clientes.index') }}" class="btn btn-primary"> Clientes </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2017/07/18/23/40/group-2517459_960_720.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <a type="button" href="{{ route('facturas.index') }}" class="btn btn-primary"> Facturas </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2017/07/18/23/40/group-2517459_960_720.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <a type="button" href="{{ route('productos.index') }}" class="btn btn-primary"> Productos </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection