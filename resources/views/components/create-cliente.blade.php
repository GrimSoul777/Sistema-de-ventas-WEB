<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminarCliente">
  Nuevo Cliente
</button>

<!-- Modal -->
<div class="modal fade" id="eliminarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="{{ route('clientes.create') }}" method="POST">
        @csrf 
        <div class="modal-body">
            <!-- Nombre del cliente -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input name="inputNombre" class="form-control form-control-sm" type="text" placeholder="Ingresa el nombre del cliente" value="{{ old('inputNombre') }}">
                @error('inputNombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="inputEmail" class="form-control form-control-sm" type="email" placeholder="Ingresa el email del cliente" value="{{ old('inputEmail') }}">
                @error('inputEmail')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Direccion -->
            <div class="mb-3">
                <label class="form-label">Direccion</label>
                <input name="inputDireccion" class="form-control form-control-sm" type="text" placeholder="Ingresa la direccion del cliente" value="{{ old('inputDireccion') }}">
                @error('inputDireccion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input name="inputTelefono" class="form-control form-control-sm" type="numeric" placeholder="Ingresa el telefono del cliente" value="{{ old('inputTelefono') }}">
                @error('inputTelefono')
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