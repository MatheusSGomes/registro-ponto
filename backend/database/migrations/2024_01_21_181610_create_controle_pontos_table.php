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

            $table->foreignUuid('colaborador_id')
                ->references('id')
                ->on('colaboradores')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->date('data');
            $table->time('horario');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
