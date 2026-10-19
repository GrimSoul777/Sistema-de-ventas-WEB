<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VentaController extends Controller
{
    public function getVentas()
    {
        $ventas = Venta::with('detalles.producto')
            ->select('id', 'cliente_id', 'fecha', 'estado', 'total')
            ->get();

        return view('ventas', compact('ventas'));
    }

    public function createVenta(Request $request)
    {
        $datos = $request->validate([
            'inputCliente_id' => 'required|exists:clientes,id',
            'inputFecha' => 'required|date',
            'inputEstado' => 'required|in:pendiente,confirmada,cancelada',
            'inputProducto_id' => 'required|exists:productos,id',
            'inputCantidad' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($datos) {
            $producto = Producto::whereKey($datos['inputProducto_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($producto->stock < $datos['inputCantidad']) {
                throw ValidationException::withMessages([
                    'inputCantidad' => 'No hay suficiente stock para esa cantidad.',
                ]);
            }

            $precio = $producto->precio;
            $total = round($precio * $datos['inputCantidad'], 2);

            $venta = Venta::create([
                'cliente_id' => $datos['inputCliente_id'],
                'fecha' => $datos['inputFecha'],
                'estado' => $datos['inputEstado'],
                'total' => $total,
            ]);

            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $datos['inputCantidad'],
                'precio_unitario' => $precio,
                'total' => $total,
            ]);

            if ($datos['inputEstado'] !== 'cancelada') {
                $producto->decrement('stock', $datos['inputCantidad']);
            }
        });

        return redirect('/ventas')->with('mensaje', 'Venta registrada');
    }

    public function updateVenta(int $id, Request $request)
    {
        $datos = $request->validate([
            'inputCliente_id' => 'required|exists:clientes,id',
            'inputFecha' => 'required|date',
            'inputEstado' => 'required|in:pendiente,confirmada,cancelada',
            'inputProducto_id' => 'required|exists:productos,id',
            'inputCantidad' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($id, $datos) {
            $venta = Venta::with('detalles')
                ->lockForUpdate()
                ->findOrFail($id);

            if ($venta->estado !== 'cancelada') {
                foreach ($venta->detalles as $detalleAnterior) {
                    Producto::whereKey($detalleAnterior->producto_id)
                        ->increment('stock', $detalleAnterior->cantidad);
                }
            }

            $producto = Producto::whereKey($datos['inputProducto_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($producto->stock < $datos['inputCantidad']) {
                throw ValidationException::withMessages([
                    'inputCantidad' => 'No hay suficiente stock para esa cantidad.',
                ]);
            }

            $precio = $producto->precio;
            $total = round($precio * $datos['inputCantidad'], 2);

            $venta->update([
                'cliente_id' => $datos['inputCliente_id'],
                'fecha' => $datos['inputFecha'],
                'estado' => $datos['inputEstado'],
                'total' => $total,
            ]);

            $venta->detalles()->delete();

            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $datos['inputCantidad'],
                'precio_unitario' => $precio,
                'total' => $total,
            ]);

            if ($datos['inputEstado'] !== 'cancelada') {
                $producto->decrement('stock', $datos['inputCantidad']);
            }
        });

        return redirect('/ventas')->with('mensaje', 'Venta actualizada');
    }

    public function deleteVenta(int $id)
    {
        DB::transaction(function () use ($id) {
            $venta = Venta::with('detalles')->findOrFail($id);

            if (! in_array($venta->estado, ['pendiente', 'cancelada'])) {
                throw ValidationException::withMessages([
                    'estado' => 'Solo se pueden eliminar ventas pendientes o canceladas.',
                ]);
            }

            if ($venta->estado === 'pendiente') {
                foreach ($venta->detalles as $detalle) {
                    Producto::whereKey($detalle->producto_id)
                        ->increment('stock', $detalle->cantidad);
                }
            }

            $venta->delete();
        });

        return redirect('/ventas')->with('mensaje', 'Venta eliminada');
    }
}