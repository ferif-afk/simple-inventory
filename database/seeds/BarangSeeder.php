<?php

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = [ 'Meja','Papan Tulis','Remote AC'];
        $listTotal = [ '25','1','1' ];
        $listRusak = [ '2' ,'0','0' ];
        $isi = 0;
        $ruangan = 1;

        foreach ($listBarang as $barang) {
        	Barang::create([
                'id_ruangan' => $ruangan++,
                'nama_barang' => $barang,
                'total' => $listTotal[$isi],
                'broken' => $listRusak[$isi],
                'created_by' => 1,
                'updated_by' => rand(1,2)
                ]);
        }
    }
}