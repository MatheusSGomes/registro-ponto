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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->integer('colaborador_id')->unique();

            $table->string('seg_p1_entrada')->nullable();
            $table->string('seg_p1_saida')->nullable();
            $table->string('seg_p2_entrada')->nullable();
            $table->string('seg_p2_saida')->nullable();

            $table->string('ter_p1_entrada')->nullable();
            $table->string('ter_p1_saida')->nullable();
            $table->string('ter_p2_entrada')->nullable();
            $table->string('ter_p2_saida')->nullable();

            $table->string('qua_p1_entrada')->nullable();
            $table->string('qua_p1_saida')->nullable();
            $table->string('qua_p2_entrada')->nullable();
            $table->string('qua_p2_saida')->nullable();

            $table->string('qui_p1_entrada')->nullable();
            $table->string('qui_p1_saida')->nullable();
            $table->string('qui_p2_entrada')->nullable();
            $table->string('qui_p2_saida')->nullable();

            $table->string('sex_p1_entrada')->nullable();
            $table->string('sex_p1_saida')->nullable();
            $table->string('sex_p2_entrada')->nullable();
            $table->string('sex_p2_saida')->nullable();

            $table->string('sab_p1_entrada')->nullable();
            $table->string('sab_p1_saida')->nullable();
            $table->string('sab_p2_entrada')->nullable();
            $table->string('sab_p2_saida')->nullable();

            $table->string('dom_p1_entrada')->nullable();
            $table->string('dom_p1_saida')->nullable();
            $table->string('dom_p2_entrada')->nullable();
            $table->string('dom_p2_saida')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
