<?php

namespace Database\Seeders;

use App\Models\Bendera;
use Illuminate\Database\Seeder;

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
            ['nama' => 'Indonesia', 'keterangan' => '-'],
            ['nama' => 'Malaysia', 'keterangan' => '-'],
            ['nama' => 'Singapura', 'keterangan' => '-'],
            ['nama' => 'Thailand', 'keterangan' => '-'],
            ['nama' => 'Filiphina', 'keterangan' => '-'],
        ];
        Bendera::insert($data);
    }
}
