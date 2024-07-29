<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gurus')->insert([
            'nama' => 'Bu Ema',
            'nomor_induk' => '10987165',
            'alamat' => 'Jln. Kilo Meter 7',
            'nomor_telephone'    => '089846771563',
        ]);
    }
}
