<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('/admin/penilaian/penilaian', [
            'penilaian' => Penilaian::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penilaian  = Penilaian::all();
        $kriteria   = Kriteria::get();

        return view('/admin/penilaian/tambahpenilaian', [
            'penilaian' => $penilaian,
            'kriteria'  => $kriteria
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate( [
            'kriteria_id'   => 'required',
            'keterangan'    => 'required',
            'bobot'         => 'required|max:1',
        ]);

        $data   = $request->all();

        Penilaian::create($data);

        return redirect('/admin/penilaian')->with('success', 'Data created successfully!');
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
    public function edit(Penilaian $penilaian)
    {
        $kriteria   = Kriteria::get();

        return view('/admin/penilaian/editpenilaian', [
            'penilaian'    => $penilaian,
            'kriteria'     => $kriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $penilaian->update($request->all());
        return redirect('/admin/penilaian')->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return redirect('/admin/penilaian')->with('error', 'Data has been deleted!');
    }
}
