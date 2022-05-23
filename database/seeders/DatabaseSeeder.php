<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\StatusKapal;
use App\Models\StatusTrayek;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BenderaSeeder::class);
        $this->call(TerminalSeeder::class);
        $this->call(PelabuhanSeeder::class);
        $this->call(JenisKapalSeeder::class);
        $this->call(StatusKapalSeeder::class);
        $this->call(StatusTrayekSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PengaturanSeeder::class);

        $permission = [
            ['name' => 'form_tersus'],
            ['name' => 'form_bup'],
            ['name' => 'form_pelnas'],
            ['name' => 'form_keagenan_kapal'],
            ['name' => 'form_pbm'],
            ['name' => 'form_jpt'],
            ['name' => 'form_pelra']
        ];

        Permission::insert($permission);
    }
}
