<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function store(Request $request)
    {
        Marca::create($request->validate(['nome' => 'required|unique:marcas']));

        return back()->with('success', 'Marca adicionada!');
    }
}
