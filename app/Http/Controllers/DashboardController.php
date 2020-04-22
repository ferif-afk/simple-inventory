<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;
use App\Fakultas;
use App\Jurusan;

class DashboardController extends Controller
{
    public function index(Request $request){

        $totalfakultas = Fakultas::count();
        $totaljurusan = Jurusan::count();
        $totalruangan = Ruangan::count();
        $totalbarang = Barang::count();

        return view('dashboard.index', compact('totalfakultas', 'totaljurusan', 'totalruangan', 'totalbarang'));
    }
}
