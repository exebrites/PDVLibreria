@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Modificar proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('proveedor.update', $proveedor->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="nombre" value="{{ $proveedor->nombre }}"
                        placeholder="Ingrese su nombre">
                    @if ($errors->has('nombre'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('nombre') }}</p>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="apellido"
                        value="{{ $proveedor->apellido }}" placeholder="Ingrese su apellido">

                    @if ($errors->has('apellido'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('apellido') }}</p>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="telefono"
                        value="{{ $proveedor->telefono }}" placeholder="Ingrese su teléfono">

                    @if ($errors->has('telefono'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('telefono') }}</p>
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="correoElectronico"
                        value="{{ $proveedor->correoElectronico }}" placeholder="Ingrese su correo electrónico">


                    @if ($errors->has('correoElectronico'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('correoElectronico') }}</p>
                        </div>
                    @endif
                </div>
                <div class="botones">
                    <a href="{{ route('proveedor.index') }}" class="btn btn-danger">Cancelar</a>
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
    <style>
        p {
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        .botones {
            text-align: center;


        }


        #input_nombre {
            width: 500px;
        }

        .categoria {
            width: 500px;
        }

        .floatingTextarea {
            width: 800px;
            margin-left: 800px;
            margin-bottom: -150px;
            /* margin-top: 100px; */
        }

        .contenedor-flex {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .costo {
            width: 500px;
        }

        .venta {
            width: 500px;
            margin-right: 350px;

        }

        .stock {
            width: 500px;
        }

        .proveedor {
            width: 500px;
        }
    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $('#selector-categoria').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
        $('#selector-proveedor').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@stop
