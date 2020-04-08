<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $data3 = Fakultas::all();
        $data = Jurusan::when($request->search, function($query) use($request){
            $query->join('fakultas', 'jurusan.fakultas_id', '=', 'fakultas.id')
                  ->where('fakultas.name', 'LIKE', '%'.$request->search)
                  ->select('jurusan.*', 'fakultas.name');
        })->paginate(5);

        return view('jurusan.index', compact('data','data3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('jurusan.create',compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jurusan::create([
            'fakultas_id' => $request->fakultas_id,
            'nama_jurusan' => $request->name
        ]);

        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data2 = Fakultas::all();
        $jurusan = Jurusan::find($id);
            return view('jurusan.edit', compact('jurusan','data2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jurusan::whereId($id)->update([
            'fakultas_id' => $request->fakultas_id,
            'nama_jurusan' => $request->name
        ]);
         return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Jurusan::whereId($id)->delete();
            return redirect()->route('jurusan.index');
    }
}
