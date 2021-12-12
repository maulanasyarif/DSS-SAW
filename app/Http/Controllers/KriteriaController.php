<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/kriteria/kriteria', [
            'kriteria'   => Kriteria::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kriteria $kriteria)
    {   
        Kriteria::get();

        return view('/admin/kriteria/tambahkriteria', [
            'kriteria'  => $kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kriteria $kriteria)
    {
        $request->validate( [
            'nama_kriteria' => 'required',
            'bobot'         => 'required',
        ]);
        
        $data   = $request->all();

        Kriteria::create($data);

        return redirect('/admin/kriteria')->with('success', 'Data created successfully!');
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
    public function edit(Kriteria $kriteria)
    {
        return view('/admin/kriteria/editkriteria', [
            'kriteria'  => $kriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Kriteria $kriteria, Request $request)
    {
        $kriteria->update($request->all());
        return redirect('/admin/kriteria')->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect('/admin/kriteria')->with('error', 'Data has been deleted!');
    }
}