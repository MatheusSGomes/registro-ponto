<?php

use App\Models\Cargo;
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
        Schema::create('cargos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('titulo');
        });

        Cargo::create([ "titulo" => "Cargo 1" ]);
        Cargo::create([ "titulo" => "Cargo 2" ]);
        Cargo::create([ "titulo" => "Cargo 3" ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
