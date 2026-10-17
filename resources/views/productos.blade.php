<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Productos</title>
</head>
<body>
    <x-navbar/>
    <h1 class="text-center">Productos</h1>
    <div class="row">
        <div class="col">
            <x-createproducto/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-bordered">
                <thead class="table table-info">
                    <tr>
                        <th>id</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $i)
                    <tr>
                        <td>{{$i->id}}</td>
                        <td>{{$i->producto}}</td>
                        <td>{{$i->precio}}</td>
                        <td>{{$i->stock}}</td>
                        <td>{{$i->nombre_categoria}}</td>
                        <td>
                            <x-updateProducto :producto="$i"/>
                            <x-deleteProducto :producto="$i"/>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>