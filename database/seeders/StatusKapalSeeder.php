<?php

namespace Database\Seeders;

use App\Models\StatusKapal;
use Illuminate\Database\Seeder;

class StatusKapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => '001', 'nama' => 'A', 'keterangan' => '-'],
            ['kode' => '002', 'nama' => 'B', 'keterangan' => '-'],
            ['kode' => '003', 'nama' => 'C', 'keterangan' => '-'],
            ['kode' => '004', 'nama' => 'D', 'keterangan' => '-'],
        ];
        StatusKapal::insert($data);
    }
}
