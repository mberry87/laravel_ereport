<?php

namespace Database\Seeders;

use App\Models\Pelabuhan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['kode' => 'PL001', 'nama' => 'Sri Bintan Pura', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        Pelabuhan::insert($data);
    }
}
