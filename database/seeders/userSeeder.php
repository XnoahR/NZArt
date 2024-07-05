<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'John Doe',
            'email' => 'JD@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No 1',
            'password' => 'password',
        ]);

        //Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@nzart.com',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No 1',
            'password' => 'admin',
            'role' => 'admin',
        ]);
    }
}
