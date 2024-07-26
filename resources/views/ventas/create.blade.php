@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Nueva venta</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-primary">Volver atras</a>
        </div>
        <div class="card-body">

            <div class="selector-productos">
                <select class="form-select" id="basic-usage" data-placeholder="Seleccione un producto">
                    <option></option>

                    @foreach ($productos as $producto)
                        <option id="{{ $producto }}" value="{{ $producto }}">{{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-primary" onclick="agregar();">Agregar</button>
            </div>
            <div class="botones-categoria">
                <button type="button" class="btn btn-primary" onclick="filtrar(0);">Todas las categorias </button>
                @foreach ($categorias as $categoria)
                    <button type="button" class="btn btn-primary"
                        onclick="filtrar({{ $categoria->id }});">{{ $categoria->nombre }}</button>
                @endforeach
            </div>
            <br>

            <table class="table" id="tabla">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">Subtotal compra:</th>
                        <td id="subtotal"></td>
                        <th></th>
                    </tr>

                    <tr>
                        <th colspan="4">Descuento total:</th>
                        <td id="descuento"></td>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="4">Total:</th>
                        <td id="total"></td>
                        <th></th>
                    </tr>
                </tfoot>

            </table>


            {{--
                <hr>

                <div class="mb-3">
                    <label for="" class="form-label">Medio de pago</label>
                    <input type="text" name="medio_pago" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="monto-recibido" class="form-label">Monto recibido</label>
                    <input type="text" name="monto-recibido" id="monto-recibido" class="form-control" placeholder=""
                        aria-describedby="helpId" onkeyup="vuelto(event);" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Vuelto</label>
                    <input type="text" name="vuelto" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" readonly />
                </div> --}}

            {{-- <hr>
                <div class="botones">
                    <a href="#" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div> --}}


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="montoPagar();">
                Pagar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pagar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Medio de pago</label>
                                <select class="form-select" name="medio_pago" id="medio_pago"
                                    aria-label="Default select example">
                                    <option selected>Efectivo</option>
                                    <option value="TC">Tarjeta de credito</option>
                                    <option value="TD">Tarjeta debito</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Monto total a pagar</label>
                                <input type="text" name="monto_total" id="monto_total" class="form-control"
                                    placeholder="" aria-describedby="helpId" readonly value="" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Monto recibido</label>
                                <input type="text" name="monto_recibido" id="monto_recibido" class="form-control"
                                    placeholder="" aria-describedby="helpId" onchange="montoDevolver(event)" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Vuelto</label>
                                <input type="text" name="vuelto" id="vuelto" class="form-control" placeholder=""
                                    aria-describedby="helpId" readonly />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" onclick="registrarVenta();">Finalizar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('footer')
    <p>Copyright ©2024 - Todos lo derechos reservados</p>
@stop
@section('css')

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <style>
        .div-inferior {
            margin-right: 100px;
        }

        .mb-3 {

            display: inline-block;
            /* Agrega espacio horizontal entre los elementos (opcional) */
            margin-right: 50px;
            /* margin-left: 100px; */
        }

        .mb-3:last-child {
            /* Elimina el margen del último elemento para evitar espacio extra */
            margin-right: 0;
        }




        p {
            text-align: center;
        }

        h1 {
            text-align: center;
        }


        .botones {
            text-align: center;


        }

        .selector-productos {
            width: 50%;
        }

        .selector-productos button {
            position: relative;
            margin-left: 1000px;
            margin-top: -100px
        }


        .botones-categoria {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }
    </style>
@stop

@section('js')

    <script>
        let listaProductos = Array.from(document.getElementById('basic-usage').options);
        listaProductos.shift();

        function filtrar(idCategoria) {


            //     objetivo: cuando el usuario haga click en un elemento de la lista de categorias mostrar
            //     solo los productos que tengan esa categoria en el combo box de productos

            //     1. conocer que btn hizo click y la categoria seleccionada
            //     2. obtener el id de la categoria seleccionada
            //     3. obtener todos los productos del combo box
            //     4. filtrar los productos que tengan esa categoria
            //     5. mostrar los productos filtrados en el combo box de productos
            if (idCategoria != 0) {
                let productosFiltrados = listaProductos.filter(producto => JSON.parse(producto.value).idCategoria ==
                    idCategoria);
                $('#basic-usage').empty();
                productosFiltrados.forEach(producto => {
                    $('#basic-usage').append(producto);
                });
            } else {
                $('#basic-usage').empty();
                listaProductos.forEach(producto => {
                    $('#basic-usage').append(producto);
                });
            }

        }
    </script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#basic-usage').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>

    <script>
        function registrarVenta() {

            console.log("antes del enviar");


            // objetivo 
            //     armar un json con los productos que se tienen en el carrito 
            //     pasando el id del producto,cantidad,preciosubtotal 


            // 1. tener un listado de los productos con las cantidades y precio subtotal
            var tabla = document.getElementById('tabla');
            var filas = tabla.getElementsByTagName('tr');
            var listaProductos = [];
            for (var i = 1; i < filas.length - 3; i++) { // Omitir la fila de encabezado
                var inputCantidad = filas[i].cells[1].querySelector('input');
                var cantidad = parseFloat(inputCantidad.value);

                var precioSubtotal = parseFloat(filas[i].cells[4].textContent);


                listaProductos.push({
                    id: inputCantidad.id[1],
                    cantidad: cantidad,
                    precioSubtotal: precioSubtotal
                });
            }

            listaProductos.push({
                medio_pago: document.getElementById('medio_pago').value
            })
            var jsonData = listaProductos;

            // 2. convertir el listado a un json
            // 3. enviar al backend 






            let url = "{{ route('venta.store') }}";
            let csrfToken = "{{ csrf_token() }}";
            let data = {
                _token: csrfToken,
                productos: jsonData
            };
            fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": csrfToken
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al enviar los datos');
                    }
                
                    setTimeout(() => {
                        window.location.reload(); // Refrescar la página
                    }, 1500);
                    alert("¡Venta creada con éxito!"); // Mostrar un mensaje de éxito
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });

            console.log("despues del enviar");
        }

        function montoPagar() {
            let total = document.getElementById('total').textContent;
            let montoPagar = document.getElementById('monto_total');
            montoPagar.value = total
            document.getElementById('monto_recibido').value = 0
            document.getElementById('vuelto').value = 0

        }

        function montoDevolver(event) {
            document.getElementById('vuelto').value = 0
            let montoPagar = parseFloat(document.getElementById('monto_total').value);
            // console.log(montoPagar);
            let montoRecibido = parseFloat(document.getElementById('monto_recibido').value);
            // console.log(montoRecibido);
            let vuelto = montoRecibido - montoPagar;
            // console.log(vuelto);
            document.getElementById('vuelto').value = vuelto
        }

        function agregar() {


            // observacion : 
            //     cuando se agrega un producto que ya esta cargado en el carrito de compras,
            //     incrementar la cantidad del mismo en 1

            let select = document.getElementById("basic-usage")
            let producto = JSON.parse(select.value);
            let tbody = document.querySelector('#tabla tbody');
            let fila = document.createElement('tr')
            let columna = document.createElement('td')
            let columnaInput = document.createElement('td')
            let columnaPrecio = document.createElement('td')
            let columnaSubtotal = document.createElement('td')
            // let btnModificar = document.createElement('td')
            let columnaEliminar = document.createElement('td')
            let btnEliminar = document.createElement('button')
            // .class = ""
            btnEliminar.classList.add('btnEliminar');
            // btnEliminar.classList.add('btn btn-danger');

            btnEliminar.textContent = "Borrar"
            btnEliminar.style.backgroundColor = 'red';
            let inputCantidad = document.createElement('input');
            inputCantidad.type = 'number';
            inputCantidad.name = "cantidad[" + producto.id + "]";
            inputCantidad.value = 1
            inputCantidad.id = 'C' + producto.id
            // inputCantidad.onkeyup = function() {
            //     precioSubtotal(this);
            // };
            inputCantidad.min = 1
            // input.required = true
            // input.width = '100px'
            // console.log(tabla);
            // console.log(fila);
            // ----------
            let inputPrecio = document.createElement('input');
            inputPrecio.type = 'number';
            inputPrecio.value = producto.precioVenta
            inputPrecio.id = 'P' + producto.id
            // ------------
            let inputDescuento = document.createElement('input');
            inputDescuento.type = 'number';
            inputDescuento.value = 0
            inputDescuento.id = 'D' + producto.id
            // --------------
            let columnaDescuento = document.createElement('td');
            columnaDescuento.appendChild(inputDescuento)
            // ---------

            // EVENTOS
            inputCantidad.addEventListener('change', function() {
                mostrarSubtotal(inputCantidad.id);
            });
            inputPrecio.addEventListener('change', function() {
                mostrarSubtotal(inputPrecio.id);
            });
            inputDescuento.addEventListener('change', function() {
                mostrarSubtotal(inputDescuento.id);
            });

            // -------------------------
            columna.textContent = producto.nombre.toUpperCase();
            columnaPrecio.appendChild(inputPrecio)
            columnaPrecio.id = 'P' + producto.id
            columnaSubtotal.textContent = producto.precioVenta
            columnaSubtotal.id = 'ST' + producto.id
            // console.log(columna.value);
            columnaEliminar.appendChild(btnEliminar)
            columnaInput.appendChild(inputCantidad);
            fila.appendChild(columna)
            fila.appendChild(columnaInput)
            fila.appendChild(columnaPrecio)
            fila.appendChild(columnaDescuento)

            fila.appendChild(columnaSubtotal)
            fila.appendChild(columnaEliminar)
            tbody.appendChild(fila)

            // total()
            subtotalCompra()
            descuentoTotalCompra()
            totalCompra()
        }

        // objetivo : 
        //     calcular el precio subtotal por producto teniendo encuenta la cantidad del producto, el precio del producto 
        //     y el descuento /% cada vez que se cambie alguna de los valores necesarios cambiar el subtotal

        // 1. conocer el valor de la cantidad del producto obteniendo el input cantidad
        // 2. conocer el valor del precio unitario del producto obteniendo el input precio
        // 3. conocer el valor del descuento % para ese producto obteniendo el input descuento por defecto es 0
        // 4. calcular el subtotal
        // 5. mostrar el subtotal en la tabla


        function mostrarSubtotal(id) {
            //   console.log(id[1]);
            idProducto = id[1]
            // console.log(idProducto);
            idCantidad = 'C' + idProducto
            idPrecio = 'P' + idProducto
            idDescuento = 'D' + idProducto
            idSubtotal = 'ST' + idProducto

            var cantidad = document.getElementById(idCantidad).value

            var precio = document.getElementById(idPrecio).querySelector('input').value;

            var descuentoPorcentual = document.getElementById(idDescuento).value

            // console.log(cantidad, precio, descuentoPorcentual);
            var subtotal = calcularSubtotal(cantidad, precio, descuentoPorcentual)
            document.getElementById(idSubtotal).textContent = subtotal.toFixed(2)
            subtotalCompra()
            descuentoTotalCompra()
            totalCompra()
        }

        function calcularSubtotal(cantidad, precio, descuentoPorcentual) {

            subtotal = 0
            subtotal = precio * cantidad
            subtotal = subtotal - (subtotal * descuentoPorcentual / 100)

            return subtotal
        }



        // function precioSubtotal(cantidad) {
        //     var tabla = document.getElementById('tabla');
        //     var celdas = tabla.getElementsByTagName('td');
        //     var idBuscado = 'P' + cantidad.id; // Aquí puedes cambiar el id que estás buscando
        //     var celdasFiltradas = Array.from(celdas).filter(function(celda) {
        //         return celda.id === idBuscado;
        //     });
        //     let precioSubtotal = parseInt(celdasFiltradas[0].querySelector('input').value) * cantidad.value
        //     idBuscado = 'ST' + cantidad.id; // Aquí puedes cambiar el id que estás buscando
        //     var subtotal = Array.from(celdas).filter(function(celda) {
        //         return celda.id === idBuscado;
        //     });
        //     subtotal[0].textContent = precioSubtotal
        //     // total()
        // }

        function subtotalCompra() {
            // Objetivo:
            //     realizar la suma de subtotal por producto en la tabla y mostrarlos en subtotal compra

            // 1. obtener una lista de subtotales de la tabla 
            // 2. sumar los subtotales y mostrarlos en subtotal compra
            var tabla = document.getElementById('tabla');
            var subtotales = [];
            var filas = tabla.getElementsByTagName('tr');
            // console.log(filas[1].cells[4].textContent);
            // console.log(filas.length);
            for (var i = 1; i < filas.length - 3; i++) { // Omitir la fila de encabezado
                // var subtotal = parseFloat(filas[i].cells[4].textContent);
                var inputCantidad = filas[i].cells[1].querySelector('input');
                var cantidad = parseFloat(inputCantidad.value);

                var inputPrecio = filas[i].cells[2].querySelector('input');
                var precio = parseFloat(inputPrecio.value);
                var subtotal = precio * cantidad;
                subtotales.push(subtotal);
            }
            // console.log(subtotales);
            var sumaSubtotales = subtotales.reduce(function(suma, subtotal) {
                return suma + subtotal;
            }, 0);
            // console.log(sumaSubtotales);
            document.getElementById('subtotal').textContent = sumaSubtotales.toFixed(2);
            return sumaSubtotales
        }

        function descuentoTotalCompra() {
            // objetivo : 
            //     calcular el descuento total de todos los producto y mostrarlos en la tabla
            var tabla = document.getElementById('tabla');
            var filas = tabla.getElementsByTagName('tr');
            // -  por cada producto 
            // 1. conocer la cantidad del producto

            // 2. conocer el precio unitario del producto
            // 3. conocer el descuento aplicado al producto
            var descuentos = [];
            for (var i = 1; i < filas.length - 3; i++) { // Omitir la fila de encabezado
                var inputCantidad = filas[i].cells[1].querySelector('input');
                var cantidad = parseFloat(inputCantidad.value);

                var inputPrecio = filas[i].cells[2].querySelector('input');
                var precio = parseFloat(inputPrecio.value);

                var inputDescuento = filas[i].cells[3].querySelector('input');
                var descuento = parseFloat(inputDescuento.value);

                // descuentos.push({cantidad: cantidad, precio: precio, descuento: descuento});

                // 4. calcular el subtotal sin descuento
                var subtotalSinDescuento = cantidad * precio;

                // 5. calcular el descuento por producto
                var descuentoProducto = (subtotalSinDescuento * descuento) / 100;
                // console.log(descuentoProducto);
                // 6. guardar el descuento por producto 
                descuentos.push({
                    descuento: descuentoProducto
                });

            }
            //    console.log(descuentos);
            // 7. calcular el descuento total
            var descuentoTotal = descuentos.reduce(function(suma, descuento) {
                return suma + descuento.descuento;
            }, 0);
            // console.log(descuentoTotal);
            // 8. mostrar el descuento total en la tabla 

            document.getElementById('descuento').textContent = descuentoTotal.toFixed(2);
            return descuentoTotal
        }

        function totalCompra() {
            // Objetivo:
            //     realizar la suma de todos los totales de la tabla y mostrarlos en total de compra
            var total = subtotalCompra() - descuentoTotalCompra();
            document.getElementById('total').textContent = total.toFixed(2);
        }
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btnEliminar')) {
                var fila = e.target.closest('tr');
                fila.remove();

                // Actualizar el total después de eliminar la fila
                subtotalCompra()
                descuentoTotalCompra()
                totalCompra()

            }
        });
    </script>
@stop
