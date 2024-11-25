<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => RoleSeeder::$roleIds[0],
            'name' => 'admin buitenzorg',
            'email' => 'buitenzorg.outdoor@gmail.com',
            'password' => '12345678',
        ]);

        User::create([
            'role_id' => RoleSeeder::$roleIds[0],
            'name' => 'admin buitenzorg',
            'email' => 'buitenzorg2@gmail.com',
            'password' => '12345678',
        ]);

        User::create([
            'role_id' => RoleSeeder::$roleIds[0],
            'name' => 'admin buitenzorg',
            'email' => 'buitenzorg3@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'role_id' => RoleSeeder::$roleIds[0],
            'name' => 'admin buitenzorg',
            'email' => 'buitenzorg4@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'role_id' => RoleSeeder::$roleIds[0],
            'name' => 'admin buitenzorg',
            'email' => 'buitenzorg5@gmail.com',
            'password' => '12345678',
        ]);
    }
}
