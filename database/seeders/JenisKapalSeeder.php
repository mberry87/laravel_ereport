<?php

namespace Database\Seeders;

use App\Models\JenisKapal;
use Illuminate\Database\Seeder;

class JenisKapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => '001', 'nama' => 'Kapal Feri', 'keterangan' => '-'],
            ['kode' => '002', 'nama' => 'Kapal Barang', 'keterangan' => '-'],
            ['kode' => '003', 'nama' => 'Kapal Pesiar', 'keterangan' => '-'],
            ['kode' => '004', 'nama' => 'Kapal Tanker', 'keterangan' => '-'],
        ];
        JenisKapal::insert($data);
    }
}
