<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'moha',
                'email' => 'elkasmimoha@gmail.com',
                'password' => bcrypt('moha1234'),
                'role' => 'admin',
            ],
            [
                'name' => 'user',
                'email' => 'userMoha@gmail.com',
                'password' => bcrypt('moha1234'),
                'role' => 'user',
            ],
        ]);
    }
}
