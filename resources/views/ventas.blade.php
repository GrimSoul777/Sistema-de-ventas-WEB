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
            <!--<x-createcliente/>-->
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $i)
                    <tr>
                        <td>{{$i->id}}</td>
                        <td>{{$i->cliente_id}}</td>
                        <td>{{$i->fecha}}</td>
                        <td>{{$i->estado}}</td>
                        <td>{{$i->total}}</td>
                        <td>
                            <!--<x-updateCliente :cliente="$i"/>-->
                            <!--<x-deleteCliente :cliente="$i"/>-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>