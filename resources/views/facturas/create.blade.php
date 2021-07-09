@extends('layouts.app')

@section('title', 'crear-cliente')

@section('content')

<!--<link rel="stylesheet" href="../../../public/css/jquery-ui.min.css"> -->

<div class="container">
    <form action="{{route('facturas.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4"> Factura FV-21 </label>
                <input type="text" class="form-control" name="fv" value={{$numFactura}} placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">cedula</label>
                <input type="text" class="form-control" id="cliente" name="cedula" placeholder="" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Nombre</label>
                <input type="text" class="form-control" id="clienteNom" name="nombre" placeholder="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputZip">Celular</label>
                <input type="text" class="form-control" id="clienteCel" name="celular" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Correo</label>
                <input type="email" class="form-control" id="clienteCor" name="correo" required>
            </div>
        </div>
        <div class="form-row">
            <div class="container">
                <div class="card">
                    <h5 class="card-header"> Productos </h5>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table id="tabla" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">CODIGO</th>
                                    <th scope="col">NOMBRE PRODUCTO</th>
                                    <th scope="col">DESCRIPCION</th>
                                    <th scope="col">PRECIO UNITARIO</th>
                                    <th scope="col"> CANTIDAD </th>
                                    <th scope="col">SUBTOTAL</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col"> ACCIONES </th>
                                </tr>
                            </thead>
                            <tbody id="registros">

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row" id="formAgregar">
                    <div class="col">
                        <input type="text" class="form-control" id="search" placeholder="Buscar producto">
                    </div>
                    <br>
                    <div class="col">
                        <input type="text" class="form-control" id="cantidad" placeholder="cantidad">
                    </div>
                    <br>
                    <div class="col">
                        <button id="btnAgregar" type="button" class="btn btn-primary"> Agregar </button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label>
                        SUBTOTAL :
                        <input type="text" class="form-control" id="subtotal" name="sub" value=0>
                    </label>
                </div>
                <div class="row">
                    <label>
                        TOTAL :
                        <input type="text" class="form-control" id="total" name="to" value=0>
                    </label>
                </div>
            </div>
        </div>

        <br>
        <input type="text" id="ID" name="productosID" class="form-control" hidden>
        <input type="text" id="c" name="c" class="form-control" hidden>
        <input type="text" id="s" name="s" class="form-control" hidden>
        <input type="text" id="t" name="t" class="form-control" hidden>
        <center><button type="submit" class="btn btn-primary"> Finalizar Factura </button></center>
    </form>
</div>



<!-- <script src="../../../public/js/jquery-3.6.0.min.js"></script>
<script src="../../../public/js/jquery-ui.min.js"></script> -->

<script>
    $('#search').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('facturasProductos.index')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    console.log(response(data));
                }
            });
        }
    });

    $('#cliente').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('facturasProductos.datosClientes')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }

            })
        },
        select: function(event, ui) {
            $('#cliente').val(ui.item.label);
            $('#clienteNom').val(ui.item.nombre); // display the selected text
            $('#clienteCel').val(ui.item.celular);
            $('#clienteCor').val(ui.item.correo);
            return false;
        },
        focus: function(event, ui) {
            $('#cliente').val(ui.item.label);
            $('#clienteNom').val(ui.item.nombre);
            $('#clienteCel').val(ui.item.celular);
            $('#clienteCor').val(ui.item.correo);
            return false;
        },
    });

    //facturasProductos.datosClientes

    $('#btnAgregar').click(async =>{
        let productoNom = document.getElementById("search").value;
        $.ajax({
            url: "{{ route('facturasProductos.data')}}",
            data: {
                nombre: productoNom
            },
            method: 'GET',
            success: function(data) {
                document.getElementById("registros").innerHTML += `
               <tr>
                 <th>${data[0]['id']}</th>              
                 <th>${data[0]['nombre_producto']}</th>
                 <th>${data[0]['descripcion']}</th>
                 <th>${data[0]['precio']}</th>
                 <th>${document.getElementById("cantidad").value}</th>
                 <th>${(parseFloat(document.getElementById("cantidad").value)) * (parseFloat(data[0]['precio']))}</th>
                 <th>${(parseFloat(document.getElementById("cantidad").value)) * (parseFloat(data[0]['precio']))}</th>
                 <th><a id="editar" name="${data[0]['id']}" type="submit" class="btn btn-success"> Editar</a>
                 <th><a id="borrar" name="${data[0]['id']}" type="submit" class="btn btn-danger"> Eliminar</a>
                </tr>
               `;
                document.getElementById("subtotal").value = (parseFloat(document.getElementById("subtotal").value)) + (parseFloat(document.getElementById("cantidad").value)) * (parseFloat(data[0]['precio']));
                document.getElementById("total").value = (parseFloat(document.getElementById("total").value)) + (parseFloat(document.getElementById("cantidad").value)) * (parseFloat(data[0]['precio']));
                console.log(data);

                var table = document.querySelectorAll("#registros");
                let productosID = [];
                let cantidad = [];
                let sub = [];
                let tol = [];
                for (let index = 0; index <= table[0]['children'].length - 1; index++) {
                    productosID[index] = table[0]['children'][index]['cells'][0]['innerText'];
                    cantidad[index] = table[0]['children'][index]['cells'][4]['innerText'];
                    sub[index] = table[0]['children'][index]['cells'][5]['innerText'];
                    tol[index] = table[0]['children'][index]['cells'][6]['innerText'];
                }
                document.getElementById('ID').value = productosID
                document.getElementById('c').value = cantidad
                document.getElementById('s').value = sub
                document.getElementById('t').value = tol

            }
        })
    })

    $(document).on('click', '#borrar', function(event) {
        event.preventDefault();
        let dato = $(this).closest('tr').toArray()
        let totalProducto = parseFloat(dato[0]['cells'][6]['innerHTML'])
        let totalGeneral = parseFloat(document.getElementById('total').value);
        let subtotalGeneral = parseFloat(document.getElementById('subtotal').value);
        document.getElementById('total').value = totalGeneral - totalProducto;
        document.getElementById('subtotal').value = subtotalGeneral - totalProducto;
        $(this).closest('tr').remove();

        var table = document.querySelectorAll("#registros");
                let productosID = [];
                let cantidad = [];
                let sub = [];
                let tol = [];
                for (let index = 0; index <= table[0]['children'].length - 1; index++) {
                    productosID[index] = table[0]['children'][index]['cells'][0]['innerText'];
                    cantidad[index] = table[0]['children'][index]['cells'][4]['innerText'];
                    sub[index] = table[0]['children'][index]['cells'][5]['innerText'];
                    tol[index] = table[0]['children'][index]['cells'][6]['innerText'];
                }
                document.getElementById('ID').value = productosID
                document.getElementById('c').value = cantidad
                document.getElementById('s').value = sub
                document.getElementById('t').value = tol

    });

    $(document).on('click', '#editar', function(event) {
        event.preventDefault();
        let dato = $(this).closest('tr').toArray();

        let nombreProducto = dato[0]['cells'][1]['innerHTML']
        let descripcion = dato[0]['cells'][2]['innerHTML']
        let valorUnitario = parseFloat(dato[0]['cells'][3]['innerHTML'])
        let cantidad = parseFloat(dato[0]['cells'][4]['innerHTML'])
        let subtotal = parseFloat(dato[0]['cells'][5]['innerHTML'])
        let total = parseFloat(dato[0]['cells'][6]['innerHTML'])
        $(this).closest('tr').remove();

        document.getElementById("registros").innerHTML += `
               <tr>
                 <th>${dato[0]['cells'][0]['innerHTML']}</th>             
                 <th>${nombreProducto}</th>
                 <th>${descripcion}</th>
                 <th><input type="text" class="form-control" id="editvalor" value=${valorUnitario}></th>
                 <th><input type="text" class="form-control" id="editcantidad" value=${cantidad}></th>
                 <th>${subtotal}</th>
                 <th>${total}</th>
                 <th><a id="guardarEdit" type="submit" class="btn btn-success">Guardar</a>
                </tr>
               `;
    });

    $(document).on('click', '#guardarEdit', function(event) {
        event.preventDefault();
        let dato = $(this).closest('tr').toArray();

        let antiguosubTotal = parseFloat(document.getElementById("subtotal").value)
        let antiguoTotal = parseFloat(document.getElementById("total").value)

        let nombreProducto = dato[0]['cells'][1]['innerHTML']
        let descripcion = dato[0]['cells'][2]['innerHTML']
        let valorUnitario = parseFloat(document.getElementById('editvalor').value)
        let cantidad = parseFloat(document.getElementById('editcantidad').value)
        let subtotal = valorUnitario * cantidad;
        let total = valorUnitario * cantidad;

        antiguosubTotal = antiguosubTotal - (parseFloat(dato[0]['cells'][5]['innerHTML']))
        antiguoTotal = antiguoTotal - (parseFloat(dato[0]['cells'][6]['innerHTML']))

        $(this).closest('tr').remove();

        document.getElementById("registros").innerHTML += `
               <tr>
                 <th>${dato[0]['cells'][0]['innerHTML']}</th>             
                 <th>${nombreProducto}</th>
                 <th>${descripcion}</th>
                 <th>${valorUnitario}</th>
                 <th>${cantidad}</th>
                 <th>${subtotal}</th>
                 <th>${total}</th>
                 <th><a id="editar"  type="submit" class="btn btn-success">Editar</a>
                 <th><a id="borrar"  type="submit" class="btn btn-danger">Eliminar</a>
                </tr>
               `;

        document.getElementById("subtotal").value = antiguosubTotal + subtotal
        document.getElementById("total").value = antiguoTotal + total

        var table = document.querySelectorAll("#registros");
                let productosID = [];
                let cantidadd = [];
                let sub = [];
                let tol = [];
                for (let index = 0; index <= table[0]['children'].length - 1; index++) {
                    productosID[index] = table[0]['children'][index]['cells'][0]['innerText'];
                    cantidadd[index] = table[0]['children'][index]['cells'][4]['innerText'];
                    sub[index] = table[0]['children'][index]['cells'][5]['innerText'];
                    tol[index] = table[0]['children'][index]['cells'][6]['innerText'];
                }
                document.getElementById('ID').value = productosID
                document.getElementById('c').value = cantidadd
                document.getElementById('s').value = sub
                document.getElementById('t').value = tol

    });
</script>

@endsection