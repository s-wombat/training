<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('tariffs')->insert([
            [
                'name' => 'Тариф 512',
                'cpu_unit' => 1,
                'ram_mb' => 512,
                'disk_size_gb' => 20,
            ],
            [
                'name' => 'Тариф 1024',
                'cpu_unit' => 2,
                'ram_mb' => 1024,
                'disk_size_gb' => 40,
            ],
            [
                'name' => 'Тариф 1024/80',
                'cpu_unit' => 2,
                'ram_mb' => 1024,
                'disk_size_gb' => 80,
            ],
            [
                'name' => 'Тариф 2048',
                'cpu_unit' => 4,
                'ram_mb' => 2048,
                'disk_size_gb' => 80,
            ],
            [
                'name' => 'Тариф 8192',
                'cpu_unit' => 6,
                'ram_mb' => 8192,
                'disk_size_gb' => 120,
            ],
        ]);
    }
}
