<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class FakultasController extends Controller
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
        $data = Fakultas::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search);
        })->paginate(5);

        return view('fakultas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function import_excel(Request $request) {
        $this->validate($request, [
            'excel' => 'required'
        ]);

        $file = $request->file('excel');

        $filename = rand(100, 999)."-fakultas.".$file->getClientOriginalExtension();

        $file->move('excel',$filename);

        Excel::import(new FakultasImport,public_path('/excel/fakultas/'.$filename));

        return redirect()->route('fakultas.index');
    }


    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fakultas::create(['name' => $request->name]);

        return redirect()->route('fakultas.index');
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
        $data = Fakultas::find($id);
            return view('fakultas.edit', compact('data'));
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
        Fakultas::whereId($id)->update(['name'=>$request->name]);
         return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fakultas::whereId($id)->delete();
            return redirect()->route('fakultas.index');
    }
}
