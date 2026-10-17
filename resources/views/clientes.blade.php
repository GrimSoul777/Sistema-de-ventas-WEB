<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Clientes</title>
</head>
<body>
    <x-navbar/>
    <h1 class="text-center">Clientes</h1>
    <div class="row">
        <div class="col">
            <x-createcliente/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-bordered">
                <thead class="table table-info">
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $i)
                    <tr>
                        <td>{{$i->id}}</td>
                        <td>{{$i->nombre}}</td>
                        <td>{{$i->email}}</td>
                        <td>{{$i->direccion}}</td>
                        <td>{{$i->telefono}}</td>
                        <td>
                            <x-updateCliente :cliente="$i"/>
                            <x-deleteCliente :cliente="$i"/>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>