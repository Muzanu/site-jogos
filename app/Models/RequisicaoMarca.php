<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisicaoMarca extends Model
{
    protected $table = 'requisicoes_marca';

    protected $fillable = ['nome_marca_solicitada', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
