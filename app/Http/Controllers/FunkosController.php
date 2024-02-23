<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funko;
use Exception;

class FunkosController extends Controller
{
    public function index(Request $request)
    {
        $funkos = Funko::search($request->search)->orderBy('id', 'desc')->isDeleted()->paginate(10);
        return response()->json($funkos);
    }

    public function rules()
    {
        return [
            'nombre' => 'min:3|max:100|required',
            'precio' => 'numeric|required',
            'cantidad' => 'integer|required',
            'categoria' => 'min:3|max:100|required',
        ];
    }

    public function store(Request $request)
    {
        $request->validate(
            $this->rules()
        );
        try {
            $funko = new Funko($request->all());
            $funko->save();
            flash('Funko ' . $funko->nombre . ' creado correctamente.')->success()->important();
            return $funko->toJson();
        } catch (Exception $e) {
            flash('Error al crear el funko ' . $e->getMessage())->error()->important();
            return redirect()->back();
        }
    }

    public function create($id)
    {
        return $funko = Funko::find($id);
    }

    public function show($id)
    {
        $funko = Funko::find($id);
        return $funko->toJson();
    }

    public function edit($id)
    {
        $funko = Funko::find($id);
        return $funko->toJson();
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            $this->rules()
        );
        try {
            $funko = Funko::find($id);
            $funko->update($request->all());

            $funko->save();

            flash('Funko ' . $funko->nombre . ' actualizado con éxito.')->warning()->important();
            return $funko->toJson();
        } catch (Exception $e) {
            flash('Error al actualizar el Funko, este es el error :' . $e->getMessage())->error()->important();
            return redirect()->back();
        }

    }

    public function actualizarImagen(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        try {
            $funko = Funko::find($id);
            $funko->isDeleted = true;
            $funko->save();

            flash('El funko' . $funko->nombre . 'se ha borrado con éxito ');
            return $funko->toJson();
        } catch (Exception $e) {
            flash('Error al borrar el funko, este es el error: ' . $e->getMessage())->error()->important();
            return redirect()->back();
        }
    }

}
