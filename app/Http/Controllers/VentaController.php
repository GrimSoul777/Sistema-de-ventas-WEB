<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;

class VentaController extends Controller
{
    public function getVentas(){
        $ventas = Venta::select(
            'ventas.id',
            'clientes.nombre as nombre_cliente',
            'ventas.fecha',
            'ventas.estado',
            'ventas.total'
        )->join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
        ->get();

        return view('ventas', compact('ventas'));
    }

    public function createVenta(Request $request){
        $request->validate([
            "inputCliente_id" => 'required|exists:clientes,id',
            "inputFecha" => 'required|date',
            "inputEstado" => 'required|in:pendiente,confirmada,cancelada',
            "inputTotal" => 'required|numeric|min:0'
        ]);

        Venta::create([
            'cliente_id' => $request->inputCliente_id,
            'fecha' => $request->inputFecha,
            'estado' => $request->inputEstado,
            'total' => $request->inputTotal
        ]);

        return redirect("/ventas")->with([
            "mensaje" => "venta registrada"
        ]);
    }

    public function updateVenta(int $id, Request $request){
        $request->validate([
            "inputCliente_id" => 'required|exists:clientes,id',
            "inputFecha" => 'required|date',
            "inputEstado" => 'required|in:pendiente,confirmada,cancelada',
            "inputTotal" => 'required|numeric|min:0'
        ]);

        $venta = Venta::where("id", "=", $id)->first();

        $venta->update([
            'cliente_id' => $request->inputCliente_id,
            'fecha' => $request->inputFecha,
            'estado' => $request->inputEstado,
            'total' => $request->inputTotal
        ]);

        $venta->save();

        return redirect("/ventas")->with([
            "mensaje" => "venta actualizada"
        ]);
    }

    public function deleteVenta(int $id){
        $venta = Venta::find($id);
        $venta->delete($id);

        return redirect("/ventas")->with([
            "mensaje" => "venta eliminada"
        ]);
    }
}
