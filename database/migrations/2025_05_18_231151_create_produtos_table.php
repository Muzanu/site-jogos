<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        if (!Schema::hasTable('produtos')) {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['videogame', 'jogo']);
            $table->text('descricao');
            $table->enum('condicao', ['novo', 'usado', 'danificado']);
            $table->decimal('preco', 8, 2);
            $table->foreignId('marca_id')->constrained('marcas');
            $table->foreignId('vendedor_id')->constrained('users');
            $table->timestamps();
        });
    }
    }

        /**
         * Reverse the migrations.
         */
    public function down()
        {
          Schema::dropIfExists('produtos');
        }

};
