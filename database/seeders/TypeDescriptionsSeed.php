<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDescriptionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('period_types')->insert([
            ['name' => 'Boolean'],
            ['name' => 'Word'],
            ['name' => 'Dword'],
            ['name' => 'Int16'],
            ['name' => 'Int32'],
            ['name' => 'Float'],
            ['name' => 'Double'],
            ['name' => 'String']
        ]);

    }
}
