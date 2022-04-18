<?php

namespace Database\Seeders;

use App\Models\StatusTrayek;
use Illuminate\Database\Seeder;

class StatusTrayekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Angkutan Lintas Batas Negara', 'keterangan' => '-'],
            ['nama' => 'Angkutan Antar Kota Antar Provinsi', 'keterangan' => '-'],
            ['nama' => 'Angkutan Antar Kota Dalam Provinsi', 'keterangan' => '-'],
            ['nama' => 'Angkutan Kota', 'keterangan' => '-'],
            ['nama' => 'Angkutan Pedesaan', 'keterangan' => '-'],
        ];
        StatusTrayek::insert($data);
    }
}
