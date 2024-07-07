<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Payment::create([
            'order_id' => 1,
            'payment_method' => 'Bank Transfer',
            'total' => 50000,
            'proof' => 'proof.jpg',
            'paid_at' => date('Y-m-d H:i:s'),
            'status' => 'paid'
        ]);
    }
}
