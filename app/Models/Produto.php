<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'tipo', 'descricao', 'condicao', 'preco', 'marca_id', 'vendedor_id'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
