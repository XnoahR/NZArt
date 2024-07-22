<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Symfony\Component\String\b;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No 1',
            'password' => bcrypt('password'),
        ]);

        

        //Admin
        User::create([
            'name' => 'Admin',
            'email' => 'grafindo@gmail.com ',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No 1',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
    }
}
