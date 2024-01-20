<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::insert([
            [ "titulo" => "Cargo 1" ],
            [ "titulo" => "Cargo 2" ],
            [ "titulo" => "Cargo 3" ],
        ]);
    }
}
