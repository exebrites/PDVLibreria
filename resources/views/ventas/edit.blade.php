@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Nueva venta</h1>

@stop

@section('content')

{{-- {{dd([$venta,$detalleVenta])}} --}}
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
            <form action="{{ route('venta.store') }}" method="post">

                @csrf





                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total:</th>
                            <td id="total-amount"></td>
                            <th></th>
                        </tr>
                    </tfoot>

                </table>



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
                </div>

                <hr>
                <div class="botones">
                    <a href="#" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>
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
            width: 500px;
        }

        .selector-productos button {
            position: relative;
            margin-left: 510px;
            margin-top: -100px
        }
    </style>
@stop

@section('js')



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
        function vuelto(event) {
            // Aquí puedes manejar el evento 'keyup'
            var input = event.target;
            var valor = input.value;
            console.log('Monto recibido:', valor);

            // Aquí puedes añadir la lógica para calcular el vuelto
            // Ejemplo: Calcular vuelto basado en un monto total
            var montoTotal = 50; // Ejemplo de monto total
            var vuelto = valor - montoTotal;
            console.log('Vuelto:', vuelto);
        }

        function agregar() {
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
            let input = document.createElement('input');
            input.type = 'number';
            input.name = "cantidad[" + producto.id + "]";
            input.value = 1
            input.id = producto.id
            input.onkeyup = function() {
                precioSubtotal(this);
            };
            input.min = 1
            // input.required = true
            // input.width = '100px'
            // console.log(tabla);
            // console.log(fila);
            columna.textContent = producto.nombre
            columnaPrecio.textContent = producto.precioVenta
            columnaPrecio.id = 'P' + producto.id
            columnaSubtotal.textContent = producto.precioVenta
            columnaSubtotal.id = 'ST' + producto.id
            // console.log(columna.value);
            columnaEliminar.appendChild(btnEliminar)
            columnaInput.appendChild(input);
            fila.appendChild(columna)
            fila.appendChild(columnaInput)
            fila.appendChild(columnaPrecio)
            fila.appendChild(columnaSubtotal)
            fila.appendChild(columnaEliminar)
            tbody.appendChild(fila)

            total()

        }

        function precioSubtotal(cantidad) {
            // alert('hola')
            // let subtotal = document.getElementById ('8')
            var tabla = document.getElementById('tabla');

            // Obtener todos los elementos <td> dentro de la tabla
            var celdas = tabla.getElementsByTagName('td');

            // Filtrar las celdas por su id
            var idBuscado = 'P' + cantidad.id; // Aquí puedes cambiar el id que estás buscando
            var celdasFiltradas = Array.from(celdas).filter(function(celda) {
                return celda.id === idBuscado;
            });
            let precioSubtotal = parseInt(celdasFiltradas[0].textContent) * cantidad.value
            // console.log(precioSubtotal);
            // console.log(idBuscado);
            // console.log(celdasFiltradas);
            idBuscado = 'ST' + cantidad.id; // Aquí puedes cambiar el id que estás buscando

            var subtotal = Array.from(celdas).filter(function(celda) {
                return celda.id === idBuscado;
            });
            // console.log(idBuscado);
            // console.log(subtotal);
            // Mostrar los resultados en la consola

            subtotal[0].textContent = precioSubtotal

            total()
        }

        function total() {
            // let total = document.getElementById('total-amount')

            // Obtener todas las filas de datos (excluyendo el tfoot)
            var filas = document.querySelectorAll('#tabla tbody tr');

            // Variable para almacenar el total
            var total = 0;

            // Iterar sobre cada fila y sumar los subtotales
            filas.forEach(function(fila) {
                // Obtener el valor del subtotal de la fila actual
                var subtotal = parseFloat(fila.querySelector('td:nth-child(4)').textContent);

                // Sumar al total acumulado
                total += subtotal;
            });

            // console.log(total);
            // Mostrar el total en el elemento td del tfoot
            document.getElementById('total-amount').textContent = total.toFixed(
                2); // Ajusta el número de decimales según necesites

        }
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btnEliminar')) {
                var fila = e.target.closest('tr');
                fila.remove();

                // Actualizar el total después de eliminar la fila
                total();
            }
        });
    </script>
@stop
