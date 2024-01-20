<?php

use App\Models\Funcao;
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
        Schema::create('funcoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
        });

        Funcao::insert([
            [ "titulo" => "Funcao 1" ],
            [ "titulo" => "Funcao 2" ],
            [ "titulo" => "Funcao 3" ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcoes');
    }
};
