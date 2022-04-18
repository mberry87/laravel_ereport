<?php

namespace Database\Seeders;

use App\Models\Pelabuhan;
use Illuminate\Database\Seeder;

class PelabuhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'PL001', 'nama' => 'Sri Bintan Pura', 'keterangan' => '-'],
        ];
        Pelabuhan::insert($data);
    }
}
