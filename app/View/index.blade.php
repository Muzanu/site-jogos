@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <h1>Bem-vindo à Revenda de Jogos Antigos!</h1>
    @guest
        <a href="{{ route('login') }}">Entrar</a>
    @endguest
@endsection
