<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'New Student'],
            ['name' => 'IBBC'],
            ['name' => 'HEC'],
            ['name' => 'Renewal Visa'],
            ['name' => 'Trip'],
        ]);
    }
}
