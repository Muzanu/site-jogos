<?php

namespace App\Http\Controllers;

use App\Models\RequisicaoMarca;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisicaoMarcaController extends Controller
{
    public function index()
    {
        $requisicoes = RequisicaoMarca::where('status', 'pendente')->get();
        return view('admin.requisicoes', compact('requisicoes'));
    }

    public function store(Request $request)
    {
        RequisicaoMarca::create([
            'nome_marca_solicitada' => $request->nome_marca_solicitada,
            'user_id' => Auth::id(),
            'status' => 'pendente',
        ]);

        return back()->with('success', 'Requisição enviada!');
    }

    public function aprovar($id)
    {
        $requisicao = RequisicaoMarca::findOrFail($id);
        $requisicao->update(['status' => 'aceita']);

        Marca::create(['nome' => $requisicao->nome_marca_solicitada]);

        return back()->with('success', 'Marca aprovada e adicionada!');
    }

    public function rejeitar($id)
    {
        $requisicao = RequisicaoMarca::findOrFail($id);
        $requisicao->update(['status' => 'rejeitada']);

        return back()->with('success', 'Requisição rejeitada.');
    }
}
