@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
    <h1>Nuevo proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('proveedor.store') }}" method="post" enctype="multipart/form-data">
                @csrf

<div class="form-group">
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" id="first_name" name="nombre" required
                        placeholder="Ingrese el nombre del proveedor" autofocus>
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="apellido" required
                        placeholder="Ingrese el apellido del proveedor">
                    @error('apellido')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" class="form-control" id="phone" name="telefono" required
                        placeholder="Ingrese el telefono del proveedor">
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="correoElectronico" required
                        placeholder="Ingrese el correo electronico  del proveedor">
                    @error('correoElectronico')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
