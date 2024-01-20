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
            $table->string('cpf');
            $table->boolean('ativo');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->date('data_admissao');
            $table->string('email');
            $table->string('cargo_id');
            $table->string('funcao_id');
            $table->date('data_recisao');
            $table->string('usuario');

            $table->timestamps();

            $table->unique(['cpf']);
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
