@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
    <h1>Listado de proveedores</h1>
@stop

@section('content')
    {{-- {{ dd($proveedores[0]->id) }} --}}
    <div class="card">
        <div class="card-header">

            <a href="{{ route('proveedor.create') }}" type="button" class="btn btn-primary">Nuevo proveedor</a>
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
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Correo electronico</th>
                        {{-- <th>Imagen</th> --}}
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->apellido }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->correoElectronico }}</td>

                            <td width="10px"><a class="btn btn-warning btn btn-sm btn-fixed-width"
                                    href="{{ route('proveedor.edit', $proveedor->id) }}">Modificar</a></td>
                            <td width="20px">
                                <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="post"
                                    class="formulario-eliminar">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn btn-sm btn-fixed-width"
                                        type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <br>

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
