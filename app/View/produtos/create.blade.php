@extends('layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')
    <h2>Cadastro de Produto</h2>

    <form method="POST" action="{{ route('produtos.store') }}">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <select name="tipo" required>
            <option value="jogo">Jogo</option>
            <option value="videogame">Videogame</option>
        </select>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <select name="condicao" required>
            <option value="novo">Novo</option>
            <option value="usado">Usado</option>
            <option value="danificado">Danificado</option>
        </select>
        <input type="number" name="preco" placeholder="Preço" step="0.01" required>
        <select name="marca_id" required>
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
            @endforeach
        </select>
        <button type="submit">Salvar</button>
    </form>
@endsection
