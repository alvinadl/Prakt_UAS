<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
         Order::create([
            'nama_pelanggan' => 'Andi',
            'alamat' => 'Jl. Merdeka No.1',
            'no_hp' => '081234567890',
            'berat' => 5,
            'jenis_layanan' => 'Cuci Lipat',
            'total_harga' => 25000
        ]);

        Order::create([
            'nama_pelanggan' => 'Budi',
            'alamat' => 'Jl. Sudirman No.2',
            'no_hp' => '082345678901',
            'berat' => 7,
            'jenis_layanan' => 'Cuci Setrika',
            'total_harga' => 49000
        ]);
    }
}
