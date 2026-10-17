<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function getCategorias() {
        // Lógica para obtener todas las categorías
        //select * from categorias;
        $categoria = Categoria::all();
        return view('categoria', compact('categoria'));
    }

    public function createCategoria(Request $request) {
        //dd($request);
        
        // Lógica para crear una nueva categoría
        $request->validate([
            'categoria' => 'required'
            ]);

            $categoria = Categoria::create([
                'categoria' => $request->categoria
            ]);

            return redirect("/categoria")->with([
                "mensaje" => "categoria registrada"
            ]);
    }

    public function updateCategoria($id, Request $request){
        //select * from categorias where id = 1
        $categoria = Categoria::find($id);
        $categoria->update([
            "categoria" => $request->categoria
        ]);
        $categoria->save();

        return redirect("/categoria")->with(["mensaje" => "categoria actualizada"]);
    }

    public function deleteCategoria($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect("/categoria")->with(["mensaje" => "categoria eliminada"]);
    }

}