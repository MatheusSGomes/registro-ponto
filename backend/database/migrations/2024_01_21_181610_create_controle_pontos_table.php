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
        Schema::create('controle_pontos', function (Blueprint $table) {
            $table->id();
            $table->integer('colaborador_id');
            $table->date('data');
            $table->time('horario');
            $table->string('localizacao')->nullable();

            $table->foreign('colaborador_id')
                ->references('id')
                ->on('colaboradores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controle_pontos');
    }
};
