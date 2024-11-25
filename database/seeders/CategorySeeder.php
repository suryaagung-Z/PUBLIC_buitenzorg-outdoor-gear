<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public static $categoryIds = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::$categoryIds['tas'] = Category::create([
            'name' => 'Carrier/Backpack',
        ])->id;

        self::$categoryIds['alatTenda'] = Category::create([
            'name' => 'Alat Tenda',
        ])->id;

        self::$categoryIds['alatMasak'] = Category::create([
            'name' => 'Alat Masak',
        ])->id;

        self::$categoryIds['jaket'] = Category::create([
            'name' => 'Jaket',
        ])->id;

        self::$categoryIds['sepatu'] = Category::create([
            'name' => 'Sepatu',
        ])->id;

        self::$categoryIds['lainnya'] = Category::create([
            'name' => 'Lainnya',
        ])->id;
    }
}
