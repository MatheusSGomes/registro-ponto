<?php

namespace Database\Seeders;


use App\Models\Funcao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcao::insert([
            [ "titulo" => "Funcao 1" ],
            [ "titulo" => "Funcao 2" ],
            [ "titulo" => "Funcao 3" ],
        ]);
    }
}
