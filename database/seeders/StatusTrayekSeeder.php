<?php

namespace Database\Seeders;

use App\Models\StatusTrayek;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['nama' => 'Angkutan Lintas Batas Negara', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Angkutan Antar Kota Antar Provinsi', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Angkutan Antar Kota Dalam Provinsi', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Angkutan Kota', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Angkutan Pedesaan', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        StatusTrayek::insert($data);
    }
}
