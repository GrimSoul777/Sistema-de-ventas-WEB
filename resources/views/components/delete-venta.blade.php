@props(['venta'])

@if (in_array($venta->estado, ['pendiente', 'cancelada']))
    <button
        type="button"
        class="btn btn-danger btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#eliminarVenta{{ $venta->id }}"
    >
        Eliminar
    </button>

    <div class="modal fade" id="eliminarVenta{{ $venta->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar venta</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"
                    ></button>
                </div>

                <form action="{{ route('ventas.delete', $venta->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <p>¿Deseas eliminar esta venta?</p>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif