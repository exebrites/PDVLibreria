@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Modificar producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="floatingTextarea">
                        <label for="">Descripcion</label>

                        <textarea class="form-control" placeholder="Ingrese una descripcion del producto" id="floatingTextarea"
                            name="descripcion">{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">(*)Nombre</label>
                        <input type="text" name="nombre" id="input_nombre" class="form-control"
                            placeholder="Ingrese el nombre del producto" aria-describedby="helpId" required
                            value="{{ $producto->nombre }}" />
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">(*)Categoría</label>
                        <select class="form-select" id="categoria" name="idCategoria" required>
                            <option value="" disabled>Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="mb-3">
                        <label for="formFile" class="form-label">Subir imagen</label>
                        <input class="form-control" type="file" id="formFile" name="imgProducto" accept="image/png">
                    </div>

                </div>
                <hr>
                <div class="contenedor-flex">
                    <div class="costo mb-3">
                        <label for="" class="form-label">Precio de costo</label>
                        <input type="number" name="costo" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $producto->precioCosto }}" />
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                    </div>
                    <div class="venta mb-3">
                        <label for="" class="form-label">(*)Precio de venta</label>
                        <input type="number" name="venta" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" required value="{{ $producto->precioVenta }}" />
                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                    </div>


                </div>
                <div class="stock mb-3">
                    <label for="" class="form-label">(*)Cantidad en stock </label>
                    <input type="number" name="stock" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" required value="{{ $producto->cantidadStock }}" />
                </div>
                <hr>

                <div>
                    <div class="proveedor mb-3">
                        <label for="" class="form-label">Proveedor</label>

                        <select class="form-select" id="selector-proveedor" data-placeholder="Seleccione un proveedor"
                            name="idProveedor">
                            <option></option>



                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}"
                                    {{ $producto->idProveedor == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }} {{ $proveedor->apellido }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                </div>
                <div class="botones">
                    <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
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
