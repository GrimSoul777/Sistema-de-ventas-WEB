<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#actualizarProducto{{ $producto->id }}">
  Actualizar
</button>

<!-- Modal -->
<div class="modal fade" id="actualizarProducto{{ $producto->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="modal-body">
            <!-- Nombre del Producto -->
            <div class="mb-3">
                <label class="form-label">Producto</label>
                <input name="inputProducto" class="form-control form-control-sm" type="text" placeholder="Ingresa el nuevo nombre del producto" value="{{ old('inputProducto') }}">
                @error('inputProducto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input name="inputPrecio" class="form-control form-control-sm" type="number" step="0.01" placeholder="Ingresa el nuevo precio" value="{{ old('inputPrecio') }}">
                @error('inputPrecio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Stock -->
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input name="inputStock" class="form-control form-control-sm" type="number" placeholder="Ingresa la nueva cantidad en stock" value="{{ old('inputStock') }}">
                @error('inputStock')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Categoría ID -->
            <div class="mb-3">
                <label class="form-label">ID de Categoría</label>
                <input name="inputCategoria_id" class="form-control form-control-sm" type="number" placeholder="Ingresa el nuevo ID de la categoría" value="{{ old('inputCategoria_id') }}">
                @error('inputCategoria_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-warning btn-sm">Actualizar</button>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>