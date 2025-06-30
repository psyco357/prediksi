<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisPersembahan;

class JenisPersembahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = ['Persembahan', 'Persepuluhan', 'Diakonia', 'Proyek Nehemia'];

        foreach ($jenis as $j) {
            JenisPersembahan::create(['nama_jenis' => $j]);
        }
    }
}
