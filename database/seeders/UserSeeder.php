<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'password' => '$2y$12$fpDpGnbMDSBJqjI7kxeEzOSQYNj6ITHnjJNbvi7YbHzhuRCbxPKru'

            ],
            [
                'name' => 'user',
                'email' => 'user@email.com',
                'role' => 'user',
                'password' => '$2y$12$fpDpGnbMDSBJqjI7kxeEzOSQYNj6ITHnjJNbvi7YbHzhuRCbxPKru'
            ]
        ]);
    }
}
