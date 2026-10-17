<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getClientes(){
        $clientes = Cliente::select(
            'clientes.id',
            'clientes.nombre',
            'clientes.email',
            'clientes.direccion',
            'clientes.telefono'
        )
        ->get();

        return view ('clientes', compact('clientes'));
    }

    public function createCliente(Request $request){
        $request->validate([
            "inputNombre" => 'required',
            "inputEmail" => 'required',
            "inputDireccion" => 'required',
            "inputTelefono" => 'required'
        ]);

        Cliente::create([
            "nombre" => $request->inputNombre,
            "email" => $request->inputEmail,
            "direccion" => $request->inputDireccion,
            "telefono" => $request->inputTelefono
        ]);

        return redirect("/clientes")->with([
            "mensaje" => "cliente registrado"
        ]);
    }

    public function updateCliente(int $id, Request $request){
        $request->validate([
            "inputNombre" => 'required',
            "inputEmail" => 'required',
            "inputDireccion" => 'required',
            "inputTelefono" => 'required'
        ]);

        $cliente = Cliente::where("id", "=", $id)->first();

        $cliente->update([
            "nombre" => $request->inputNombre,
            "email" => $request->inputEmail,
            "direccion" => $request->inputDireccion,
            "telefono" => $request->inputTelefono
        ]);

        $cliente->save();

        return redirect("/clientes")->with([
            "mensaje" => "cliente actualizado"
        ]);
    }

    public function deleteCliente(int $id){
        $cliente = Cliente::find($id);
        $cliente->delete($id);

        return redirect("/clientes")->with([
            "mensaje" => "cliente eliminado"
        ]);
    }
}
