<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public static $roleIds = [];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::$roleIds[0] = Role::create(['name' => 'admin'])->id;
    }
}
