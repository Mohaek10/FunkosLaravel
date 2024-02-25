<?php

namespace Database\Seeders;

use App\Models\Funko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunkosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funko::create([
            'nombre' => 'Iron Man',
            'precio' => 90000,
            'cantidad' => 10,
            'categoria' => 'Sin Categoria',
            'isDeleted' => false,
        ]);
        Funko::create([
            'nombre' => 'Spiderman',
            'precio' => 80000,
            'cantidad' => 10,
            'categoria' => 'Sin Categoria',
            'isDeleted' => false,
        ]);
        Funko::create([
            'nombre' => 'Batman',
            'precio' => 70000,
            'cantidad' => 10,
            'categoria' => 'Sin Categoria',
            'isDeleted' => false,
        ]);
        Funko::create([
            'nombre' => 'Superman',
            'precio' => 60000,
            'cantidad' => 10,
            'categoria' => 'Sin Categoria',
            'isDeleted' => false,
        ]);


    }
}
