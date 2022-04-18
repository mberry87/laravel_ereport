<?php

namespace Database\Seeders;

use App\Models\Bendera;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BenderaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Indonesia', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Malaysia', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Singapura', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Thailand', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama' => 'Filiphina', 'keterangan' => '-', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        Bendera::insert($data);
    }
}
