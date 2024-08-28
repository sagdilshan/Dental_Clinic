<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //manager
            [
                'name' => 'Main Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('Manager'),
                'role' => 'manager',
                'status' => 'active',
            ],
            //guest
            [
                'name' => 'Main Guest',
                'username' => 'guest',
                'email' => 'guest@gmail.com',
                'password' => Hash::make('Guest'),
                'role' => 'guest',
                'status' => 'active',
            ],

        ]);
    }
}
