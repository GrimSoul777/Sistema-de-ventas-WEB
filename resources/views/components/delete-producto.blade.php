<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarProducto{{ $producto->id }}"">
  Eliminar
</button>

<div class="modal" id="eliminarProducto{{ $producto->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{route('productos.delete', $producto->id)}}" method="post">
            @csrf
            @method('DELETE')
            <p>Desea eliminar este producto?</p>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </div>
    </form>
    </div>
  </div>
</div>