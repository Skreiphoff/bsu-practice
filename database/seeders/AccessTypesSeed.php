<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessTypesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('access_types')->insert([
            ['name' => 'Чтение'],
            ['name' => 'Чтение\Запись'],
            ['name' => 'Запись']
        ]);
    }
}
