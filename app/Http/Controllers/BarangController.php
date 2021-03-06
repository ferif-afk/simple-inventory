<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;
use App\User;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index(Request $request){

        $barang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $ruangan = Ruangan::all();
        $user = User::all();

        return view('Barang.index', compact('ruangan', 'barang', 'user'));
    }

     public function create()
    {
        $ruangan = Ruangan::all();
        $barang = Barang::all();
        return view ('barang.create', compact('barang', 'ruangan'));
    }

    public function add(Request $request){
          $validateData = $request->validate
        ([
            'nama_barang' => 'required|max:255',
            'total' => 'required',
            'broken' => 'required',
            'gambar' => 'required'
        ]);

        $barang = new Barang;
        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->gambar = $request->gambar;
        $barang->created_by = $request->created_by;

        if ($request->hasFile('gambar')){
            $request->file('gambar')->move('uploads/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }
        return redirect('/barang');
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::all();
        return view('Barang.edit', compact('ruangan', 'barang'));
    }

    public function update($id, Request $request){
        $validateData = $request->validate
        ([
            'nama_barang' => 'required|max:255',
            'total' => 'required',
            'broken' => 'required',
            'gambar' => 'required'
        ]);

        $barang = new Barang;
        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->gambar = $request->gambar;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        if ($request->hasFile('gambar')){
            $request->file('gambar')->move('uploads/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }
        return redirect('/barang');
    }
    public function delete($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang');

    }

     public function export_excel(Request $request)
{
        return Excel::download(new BarangExport, 'barang.xlsx');
}

}