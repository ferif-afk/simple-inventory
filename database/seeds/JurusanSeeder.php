<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJurusan = ['Perbankan',
                        'Manajemen',
                        'Administrasi Pendidikan',
                        'Agribisnis',
                        'Peternakan',
                        'Pertanian',
                        'Film Dan Visual',
                        'Arsitektur',
                        'Sistem Informasi',
                        'Kedokteran Gigi',
                        'S2 Kenotariatan',
                        'Teknik Informatika'];
        $fakultas = 1;

        foreach ($listJurusan as $jurusan) {
        	Jurusan::create(['fakultas_id' => $fakultas,'nama_jurusan' => $jurusan]);
        }
    }
}
