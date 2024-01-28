<?php

use App\Models\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->string('usuario');
            $table->string('email')->unique();
            $table->integer('tipousuario_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipousuario_id')
                ->references('id')
                ->on('tipo_usuarios')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Usuario::create([
            "usuario" => "admin",
            "email" => "admin@email.com",
            "tipousuario_id" => 1,
            "password" => Hash::make("12345678"),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
