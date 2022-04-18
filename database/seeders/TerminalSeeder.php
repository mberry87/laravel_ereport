<?php

namespace Database\Seeders;

use App\Models\Terminal;
use Illuminate\Database\Seeder;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'PL001001', 'nama' => 'Terminal 1', 'keterangan' => '-'],
            ['kode' => 'PL001002', 'nama' => 'Terminal 2', 'keterangan' => '-'],
            ['kode' => 'PL001003', 'nama' => 'Terminal 3', 'keterangan' => '-'],
            ['kode' => 'PL001004', 'nama' => 'Terminal 4', 'keterangan' => '-'],
            ['kode' => 'PL001005', 'nama' => 'Terminal 5', 'keterangan' => '-'],
        ];
        Terminal::insert($data);
    }
}
