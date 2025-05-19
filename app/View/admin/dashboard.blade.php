@extends('layouts.app')

@section('title', 'Painel do Administrador')

@section('content')
    <h2>Requisições de Marcas</h2>

    <table>
        <thead>
            <tr>
                <th>Marca Solicitada</th>
                <th>Usuário</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requisicoes as $r)
                <tr>
                    <td>{{ $r->nome_marca_solicitada }}</td>
                    <td>{{ $r->user->name }}</td>
                    <td>{{ $r->status }}</td>
                    <td>
                        <form action="/admin/requisicoes/{{ $r->id }}/aprovar" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Aprovar</button>
                        </form>
                        <form action="/admin/requisicoes/{{ $r->id }}/rejeitar" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Rejeitar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
