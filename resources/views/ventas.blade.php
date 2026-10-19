<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Ventas</title>
</head>
<body>
    <x-navbar/>
    <h1 class="text-center">Ventas</h1>
    <div class="row">
        <div class="col">
            <x-createventa/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-bordered">
                <thead class="table table-info">
                    <tr>
                        <th>id</th>
                        <th>Cliente_id</th>
                        <th>Fecha venta</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Detalle de ventas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ventas as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->cliente_id }}</td>
                            <td>{{ $i->fecha }}</td>
                            <td>{{ $i->estado }}</td>
                            <td>${{ number_format($i->total, 2) }}</td>

                            <td>
                                @forelse ($i->detalles as $detalle)
                                    <div>
                                        {{ $detalle->producto->producto }}
                                        — Cantidad: {{ $detalle->cantidad }}
                                        — Precio unitario:
                                        ${{ number_format($detalle->precio_unitario, 2) }}
                                        — Total: ${{ number_format($detalle->total, 2) }}
                                    </div>
                                @empty
                                    Sin productos registrados
                                @endforelse
                            </td>

                            <td>
                                <x-updateVenta :venta="$i"/>
                                <x-deleteVenta :venta="$i"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No hay ventas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>