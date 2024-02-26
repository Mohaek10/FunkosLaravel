<?php

namespace Database\Seeders;

use App\Models\Funko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class FunkosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funkos')->insert([
            [
                'nombre' => 'Spider Man',
                'precio' => 1000,
                'cantidad' => 10,
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Batman',
                'precio' => 657857,
                'cantidad' => 30,
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Superman',
                'precio' => 583838,
                'cantidad' => 20,
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Iron Man',
                'precio' => 1000,
                'cantidad' => 20,
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Capitán América',
                'precio' => 1000,
                'cantidad' => 20,
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'Hulk',
                'precio' => 1000,
                'cantidad' => 20,
                'categoria_id' => 2,
            ]
        ]);


    }
}
