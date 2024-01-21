<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            $table->boolean('ativo');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->date('data_admissao');
            $table->string('email')->unique();
            $table->integer('cargo_id');
            $table->integer('funcao_id');
            $table->date('data_recisao');
            $table->string('usuario')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
