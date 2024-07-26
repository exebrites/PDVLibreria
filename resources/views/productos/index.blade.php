@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de productos</h1>
@stop

@section('content')
    {{-- {{ dd($productos) }} --}}
    <div class="card">
        <div class="card-header">

            <a href="{{ route('producto.create') }}" type="button" class="btn btn-primary">Nuevo producto</a>
            <div class="input-busqueda">

                {{-- <label for="" class="form-label">Name</label> --}}
                <input type="text" name="" id="" class="form-control" placeholder="Identificador/nombre"
                    aria-describedby="helpId" />
                <button type="button" class="btn btn-primary">Buscar</button>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio de venta</th>
                        <th>Precio de compra</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precioVenta }}</td>
                            <td>{{ $producto->precioCompra }}</td>
                            <td > <button higth="10px" type="button" class="btn btn-primary btn btn-sm btn-fixed-width" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $producto->id }}">
                                    Ver
                                </button>
                            </td>
                            <td width="10px"><a class="btn btn-warning btn btn-sm btn-fixed-width"
                                    href="{{ route('producto.edit', $producto->id) }}">Modificar</a></td>
                            <td width="20px">
                                <form action="{{ route('producto.destroy', $producto->id) }}" method="post"
                                    class="formulario-eliminar">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn btn-sm btn-fixed-width"
                                        type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $producto->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Imagen de producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img width="250px" height="200px" src="{{ $producto->imgProducto }}"
                                                class="rounded" alt="...">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </tbody>
            </table>
            <!-- Botón que activa el modal -->
            <!-- Paginación -->
            <br>
            {{-- <div class="d-flex justify-content-center mt-4">
                {{ $productos->links('pagination::bootstrap-5') }}
            </div> --}}
        </div>
    </div>
@stop

@section('footer')
    <p>Copyright ©2024 - Todos lo derechos reservados</p>
@stop
@section('css')
    <style>
        p {
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        table tbody tr td {
            text-align: center;
        }

        .input-busqueda {
            width: 300px;
            position: relative;
            margin-left: 1230px;
            margin-top: -50px;
        }

        .input-busqueda button {
            margin-left: 310px;
            margin-top: -100px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@stop
