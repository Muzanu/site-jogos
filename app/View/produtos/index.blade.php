@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
    <h2>Produtos à Venda</h2>

    @auth
        @if(auth()->user()->tipo === 'vendedor')
            <a href="{{ route('produtos.create') }}">Criar Produto</a>
        @elseif(auth()->user()->tipo === 'comprador')
            <a href="{{ route('requisicoes.create') }}">Requisitar Nova Marca</a>
        @endif
    @endauth

    <form method="GET" action="{{ url('produtos/filtro') }}">
        <select name="tipo">
            <option value="">Tipo</option>
            <option value="jogo">Jogo</option>
            <option value="videogame">Videogame</option>
        </select>

        <select name="condicao">
            <option value="">Condição</option>
            <option value="novo">Novo</option>
            <option value="usado">Usado</option>
            <option value="danificado">Danificado</option>
        </select>

        <input type="number" name="preco_min" placeholder="Preço mínimo">
        <input type="number" name="preco_max" placeholder="Preço máximo">
        <button type="submit">Filtrar</button>
    </form>

    <ul>
        @foreach($produtos as $produto)
            <li>
                <strong>{{ $produto->nome }}</strong> -
                {{ $produto->tipo }} -
                R$ {{ $produto->preco }} -
                {{ $produto->condicao }} -
                Marca: {{ $produto->marca->nome }}
            </li>
        @endforeach
    </ul>
@endsection
