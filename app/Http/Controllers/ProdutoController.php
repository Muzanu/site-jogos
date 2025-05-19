<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        return view('produtos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        Produto::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'condicao' => $request->condicao,
            'preco' => $request->preco,
            'marca_id' => $request->marca_id,
            'vendedor_id' => Auth::id(),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado!');
    }

    public function filtro(Request $request)
    {
        $query = Produto::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
        if ($request->filled('marca_id')) {
            $query->where('marca_id', $request->marca_id);
        }
        if ($request->filled('condicao')) {
            $query->where('condicao', $request->condicao);
        }
        if ($request->filled('preco_min') && $request->filled('preco_max')) {
            $query->whereBetween('preco', [$request->preco_min, $request->preco_max]);
        }

        $produtos = $query->get();
        return view('produtos.index', compact('produtos'));
    }
}
