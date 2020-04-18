<?php

use Illuminate\Database\Seeder;
use App\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = ['HKM_666','MNJ_121',
                        'PTR_1298','ARS_0012','GZI_532',
                        'BTK_201','HIN_111','PDH_69','SI_46',
 						'FKG_324','S2NTR_237','TI_307'];
        $jurusan = 1;

        foreach ($listRuangan as $ruangan) {
        	Ruangan::create([
                'id_jurusan' => $jurusan,
                'nama_ruangan' => $ruangan
                ]);
        }
    }
}
