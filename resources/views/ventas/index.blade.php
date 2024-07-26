@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Listado de ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <a href="{{ route('venta.create') }}" type="button" class="btn btn-primary">Nueva venta</a>
            <div class="input-busqueda">

                {{-- <label for="" class="form-label">Name</label> --}}
                <input type="text" name="" id="" class="form-control" placeholder="Identificador"
                    aria-describedby="helpId" />
                <button type="button" class="btn btn-primary">Buscar</button>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}

                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
            <div class="fecha">
                <input type="date" name="" id="" class="form-control fecha-desde"
                    placeholder="Identificador" aria-describedby="helpId" />
                <input type="date" name="" id="" class="form-control fecha-hasta"
                    placeholder="Identificador" aria-describedby="helpId" />
                <button type="button" class="btn btn-primary">Buscar</button>

            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Monto total</th>
                        <th>Fecha creacion </th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->montoTotal }}</td>
                            <td>{{ $venta->created_at->format('d-m-Y') }}</td>
                            <td width="10px"><a class="btn btn-primary btn btn-sm btn-fixed-width"
                                href="{{ route('venta.show', $venta->id) }}">Ver</a></td>
                            <td width="10px"><a class="btn btn-warning btn btn-sm btn-fixed-width"
                                    href="{{ route('venta.edit', $venta->id) }}">Modificar</a></td>
                            <td width="20px">
                                <form action="{{ route('venta.destroy', $venta->id) }}" method="post"
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

        .fecha {
            width: 300px;
            position: relative;
            margin-left: 1043px;
            /* margin-top: -50px;  */
            /* text-align: center; */
        }

        .fecha-desde {
            margin-left: -150px
        }

        .fecha-hasta {
            position: relative;
            margin-left: 180px;
            margin-top: -55px
        }

        .fecha button {
            margin-left: 500px;
            margin-top: -100px
        }
    </style>
@stop

@section('js')

@stop
