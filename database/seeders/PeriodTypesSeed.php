<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodTypesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('period_types')->insert([
            ['name' => 'Секунда'],
            ['name' => 'Минута'],
            ['name' => 'Час'],
            ['name' => 'День'],
            ['name' => 'Неделя'],
            ['name' => 'Месяц']
        ]);
    }
}
