<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#actualizarCliente{{ $cliente->id }}">
  Actualizar
</button>

<!-- Modal -->
<div class="modal fade" id="actualizarCliente{{ $cliente->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="modal-body">
            <!-- Nombre del cliente -->
            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <input name="inputNombre" class="form-control form-control-sm" type="text" placeholder="Ingresa el nuevo nombre del cliente" value="{{ old('inputNombre') }}">
                @error('inputNombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="inputEmail" class="form-control form-control-sm" type="text" placeholder="Ingresa el nuevo Email" value="{{ old('inputEmail') }}">
                @error('inputEmail')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Direccion -->
            <div class="mb-3">
                <label class="form-label">Direccion</label>
                <input name="inputDireccion" class="form-control form-control-sm" type="text" placeholder="Ingresa la nueva direccion" value="{{ old('inputDireccion') }}">
                @error('inputDireccion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input name="inputTelefono" class="form-control form-control-sm" type="text" placeholder="Ingresa el nuevo telefono" value="{{ old('inputTelefono') }}">
                @error('inputTelefono')
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