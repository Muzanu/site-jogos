<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirectTo() {
    $tipo = auth()->user()->tipo;

    return match($tipo) {
        'administrador' => '/admin/dashboard',
        'vendedor' => '/produtos',
        'comprador' => '/produtos',
        default => '/',
    };
}

}
