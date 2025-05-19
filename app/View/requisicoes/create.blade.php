@extends('layouts.app')

@section('title', 'Requisitar Marca')

@section('content')
    <h2>Requisitar Nova Marca</h2>

    <form method="POST" action="{{ url('marcas/requisitar') }}">
        @csrf
        <input type="text" name="nome_marca_solicitada" placeholder="Nome da Marca" required>
        <button type="submit">Enviar</button>
    </form>
@endsection
