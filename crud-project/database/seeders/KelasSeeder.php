<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert
        ([
            'nama_kelas' => '10',
            'jurusan'    => 'RPL',
        ]);
        ([
            'nama_kelas' => '10',
            'jurusan'    => 'TKJ',
        ]);
        ([
            'nama_kelas' => '10',
            'jurusan'    => 'TKR',
        ]);
        ([
            'nama_kelas' => '12',
            'jurusan'    => 'RPL',
        ]);
        ([
            'nama_kelas' => '10',
            'jurusan'    => 'TITL',
        ]);
        ([
            'nama_kelas' => '11',
            'jurusan'    => 'TKJ',
        ]);
        ([
            'nama_kelas' => '12',
            'jurusan'    => 'DKV',
        ]);
        ([
            'nama_kelas' => '12',
            'jurusan'    => 'TKR',
        ]);
        ([
            'nama_kelas' => '12',
            'jurusan'    => 'TP',
        ]);
        ([
            'nama_kelas' => '12',
            'jurusan'    => 'TPL',
        ]);
    }
}
