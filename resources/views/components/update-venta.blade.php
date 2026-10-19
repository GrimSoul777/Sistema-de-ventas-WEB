@props(['venta'])

@php
    $detalle = $venta->detalles->first();
@endphp

<!-- Botón para abrir el modal -->
<button
    type="button"
    class="btn btn-warning btn-sm"
    data-bs-toggle="modal"
    data-bs-target="#actualizarVenta{{ $venta->id }}"
>
    Actualizar
</button>

<!-- Modal -->
<div
    class="modal fade"
    id="actualizarVenta{{ $venta->id }}"
    tabindex="-1"
    aria-labelledby="actualizarVentaLabel{{ $venta->id }}"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1
                    class="modal-title fs-5"
                    id="actualizarVentaLabel{{ $venta->id }}"
                >
                    Actualizar venta
                </h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Cerrar"
                ></button>
            </div>

            <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <!-- Cliente -->
                    <div class="mb-3">
                        <label class="form-label">ID del cliente</label>
                        <input
                            name="inputCliente_id"
                            class="form-control form-control-sm"
                            type="number"
                            min="1"
                            required
                            value="{{ old('inputCliente_id', $venta->cliente_id) }}"
                        >
                        @error('inputCliente_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Fecha -->
                    <div class="mb-3">
                        <label class="form-label">Fecha de venta</label>
                        <input
                            name="inputFecha"
                            class="form-control form-control-sm"
                            type="date"
                            required
                            value="{{ old('inputFecha', \Illuminate\Support\Carbon::parse($venta->fecha)->format('Y-m-d')) }}"
                        >
                        @error('inputFecha')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select
                            name="inputEstado"
                            class="form-control form-control-sm"
                            required
                        >
                            <option value="pendiente"
                                {{ old('inputEstado', $venta->estado) === 'pendiente' ? 'selected' : '' }}>
                                Pendiente
                            </option>
                            <option value="confirmada"
                                {{ old('inputEstado', $venta->estado) === 'confirmada' ? 'selected' : '' }}>
                                Confirmada
                            </option>
                            <option value="cancelada"
                                {{ old('inputEstado', $venta->estado) === 'cancelada' ? 'selected' : '' }}>
                                Cancelada
                            </option>
                        </select>
                        @error('inputEstado')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Producto -->
                    <div class="mb-3">
                        <label class="form-label">ID del producto</label>
                        <input
                            name="inputProducto_id"
                            class="form-control form-control-sm"
                            type="number"
                            min="1"
                            required
                            value="{{ old('inputProducto_id', $detalle?->producto_id) }}"
                        >
                        @error('inputProducto_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Cantidad -->
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input
                            name="inputCantidad"
                            class="form-control form-control-sm"
                            type="number"
                            min="1"
                            required
                            value="{{ old('inputCantidad', $detalle?->cantidad) }}"
                        >
                        @error('inputCantidad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-warning btn-sm">
                        Actualizar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>