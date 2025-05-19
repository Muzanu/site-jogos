<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
        {
            Schema::create('requisicoes_marca', function (Blueprint $table) {
                $table->id();
                $table->string('nome_marca_solicitada');
                $table->foreignId('user_id')->constrained('users');
                $table->enum('status', ['pendente', 'aceita', 'rejeitada'])->default('pendente');
                $table->timestamps();
            });
        }

    public function down()
        {
            Schema::dropIfExists('requisicoes_marca');
        }
};
