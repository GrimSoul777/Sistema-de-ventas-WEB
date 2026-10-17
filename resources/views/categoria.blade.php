<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Categorías</title>
</head>
<body>
    <x-navbar/>
    <h1 class="text-center">Categorias</h1>
    <div class="row">
        <div class="col">
            <x-createCategoria/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-bordered">
                <thead class="table table-info">
                    <tr>
                        <th>id</th>
                        <th>categorias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoria as $i)
                    <tr>
                        <td>{{$i->id}}</td>
                        <td>{{$i->categoria}}</td>
                        <td>
                            <!--actualizar-->
                            <form action="{{ route('categoria.update', $i->id) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="categoria" value="{{ $i->categoria }}" class="form-control form-control-sm" required>
                            <button type="submit" class="btn btn-warning btn-sm">Actualizar</button>
                            </form>
                            <!--eliminar-->
                            <form action="{{ route('categoria.delete', $i->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--<form action="{{route('categoria.create')}}" method="POST">
        @csrf
        <input type="text" name="categoria" placeholder="ingresa una categoria">
        @error("categoria")
            <small>{{$message}}</small>
        @enderror
        <button class="btn btn-primary" type="submit">guardar</button>
    </form> -->
</body>
</html>
