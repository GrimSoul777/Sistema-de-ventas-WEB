<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaVenta">
  Nueva Venta
</button>

<!-- Modal -->
<div class="modal fade" id="nuevaVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="{{ route('ventas.create') }}" method="POST">
        @csrf 
        <div class="modal-body">
            <!-- Cliente id -->
            <div class="mb-3">
                <label class="form-label">Cliente ID</label>
                <input name="inputCliente_id" class="form-control form-control-sm" type="text" min="1" placeholder="Ingresa el ID del cliente" value="{{ old('inputCliente_id') }}">
                @error('inputCliente_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label class="form-label">Fecha de venta</label>
                <input name="inputFecha" class="form-control form-control-sm" type="date" required placeholder="Ingresa la fecha de la venta" value="{{ old('inputFecha') }}">
                @error('inputFecha')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Estado -->
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select name="inputEstado" class="form-control form-control-sm" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmada">Confirmada</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>

             <!-- Producto -->
            <div class="mb-3">
                <label for="inputProducto_id" class="form-label">ID del producto</label>
                <input id="inputProducto_id" name="inputProducto_id" class="form-control form-control-sm" type="number" min="1" required value="{{ old('inputProducto_id') }}">
                    @error('inputProducto_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

             <!-- Cantidad -->
            <div class="mb-3">
                <label for="inputCantidad" class="form-label">Cantidad</label>
                <input id="inputCantidad" name="inputCantidad" class="form-control form-control-sm" type="number" min="1" required value="{{ old('inputCantidad') }}">
                @error('inputCantidad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>