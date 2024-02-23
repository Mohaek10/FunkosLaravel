<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funko;
use Exception;

class FunkosController extends Controller
{
    public function index(Request $request){
        $funkos = Funko::search($request->search)->orderBy('id', 'desc')->isDeleted()->paginate(10);
        return response()->json($funkos);
    }
}
