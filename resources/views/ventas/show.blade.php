@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Ver venta</h1>

@stop

@section('content')
{{-- {{dd($venta->detalles)}} --}}
    <div class="card">
        <div class="card-header">
            <a href="{{ route('venta.index') }}" class="btn btn-primary">Volver atras</a>
        </div>
        <div class="card-body">
            <ul>
                <li>ID: {{ $venta->id }}</li>
                <li>Monto total: {{ $venta->montoTotal }}</li>
                <li>Medio de pago: {{ $venta->medioPago }}</li>
                <li>Fecha de creacion: {{ $venta->created_at->format('d-m-Y') }}</li>
            </ul>
            <hr>
            @foreach($venta->detalles as $detalle)
                <ul>
                    <li>nombre del producto: {{ $detalle->producto->nombre }}</li>
                    <li>Cantidad: {{ $detalle->cantidad }}</li>
                    <li>Precio subtotal: {{ $detalle->precioSubtotal }}</li>
                    {{-- <li>ID venta: {{ $detalle->idVenta }}</li> --}}
                    
                </ul>
            @endforeach
        </div>
    </div>
@stop

@section('footer')
    <p>Copyright ©2024 - Todos lo derechos reservados</p>
@stop
