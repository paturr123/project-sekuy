<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('murids')->insert([
            'nis' => '20224385',
            'nama_murid' => 'Fathur',
            'nama_kelas' => 'Kelas 12',
            'jurusan'    => 'RPL',
        ]);
    }
}
