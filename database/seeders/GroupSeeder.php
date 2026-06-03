<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data untuk Desa Jayanti (4 Kelompok)
        \App\Models\Group::create(['nama_desa' => 'Jayanti', 'nama_kelompok' => 'Adiyasa']);
        \App\Models\Group::create(['nama_desa' => 'Jayanti', 'nama_kelompok' => 'Kirana']);
        \App\Models\Group::create(['nama_desa' => 'Jayanti', 'nama_kelompok' => 'Argo']);
        \App\Models\Group::create(['nama_desa' => 'Jayanti', 'nama_kelompok' => 'Cisoka']);

        // Data untuk Desa Cangkudu (2 Kelompok)
        \App\Models\Group::create(['nama_desa' => 'Cangkudu', 'nama_kelompok' => 'Balaraja']);
        \App\Models\Group::create(['nama_desa' => 'Cangkudu', 'nama_kelompok' => 'Sempur']);
    }
}
