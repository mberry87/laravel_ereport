<?php

namespace Database\Seeders;

use App\Models\StatusKapal;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['kode' => '001', 'nama' => 'A', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '002', 'nama' => 'B', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '003', 'nama' => 'C', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['kode' => '004', 'nama' => 'D', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        StatusKapal::insert($data);
    }
}
