<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ignore timestamps
        Order::create([
            'user_id' => 1,
            'product_id' => 1,
            'material' => 'HVS',
            'size' => 'A4',
            'file' => 'cert.jpg',
            'pages' => 10,
            'quantity' => 1,
            'price' => 10000,
            'status' => 'pending'
        ]);

        Order::factory(10)->create();
    }
}
