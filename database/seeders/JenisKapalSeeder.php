<?php

namespace Database\Seeders;

use App\Models\JenisKapal;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['kode' => '001', 'nama' => 'Kapal Feri', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '002', 'nama' => 'Kapal Barang', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '003', 'nama' => 'Kapal Pesiar', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '004', 'nama' => 'Kapal Tanker', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        JenisKapal::insert($data);
    }
}
