<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::isDeleted()->paginate(10);
        return view('categorias.index')->with('categorias', $categorias);
    }

    public function show($id)
    {
        //Validamos el id
        if (!is_numeric($id)) {
            flash('El id no es válido')->error()->important();
            return redirect()->back();
        }
        //Buscar todos los funkos de la categoria


        $categoria = Categoria::find($id);
        return view('categorias.show')->with('categoria', $categoria);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:3|max:100|required',
        ]);
        try {
            //comprobar que el nombre no exista
            $categoria = Categoria::where('nombre', $request->nombre)->first();
            if ($categoria) {
                flash('La categoria ' . $request->nombre . ' ya existe.')->error()->important();
                return redirect()->back();
            }
            $categoria = new Categoria($request->all());
            $categoria->save();
            flash('Categoria ' . $categoria->nombre . ' creada correctamente.')->success()->important();
            return redirect()->route('categorias.index');
        } catch (Exception $e) {
            flash('Error al crear la categoria ' . $e->getMessage())->error()->important();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //Validamos el id
        if (!is_numeric($id)) {
            flash('El id no es válido')->error()->important();
            return redirect()->back();
        }
        $categoria = Categoria::find($id);
        $categoria->isDeleted = true;
        $categoria->save();
        flash('Categoria ' . $categoria->nombre . ' eliminada correctamente.')->success()->important();
        return redirect()->route('categorias.index');
    }
}
