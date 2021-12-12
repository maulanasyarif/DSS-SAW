<?php

namespace App\Http\Controllers;

use App\Models\Tahunajaran;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/tahunajaran/tahunajaran',[
            'tahunajaran'  => Tahunajaran::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tahunajaran/tambahtahun');
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
            'thn_ajaran'  => 'required|max:9',
        ]);

        $data = $request->all();

        Tahunajaran::create($data);

        return redirect('admin/tahunajaran')->with('success','Data created successfully!');;
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
        $tahunajaran = Tahunajaran::findOrFail($id);
        return view('admin/tahunajaran/edittahun', [
            'tahunajaran' => $tahunajaran
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tahunajaran $tahunajaran, Request $request)
    {        
        $request->validate( [
            'thn_ajaran'  => 'required|max:9',
        ]);
        
        $tahunajaran->update($request->all());

        return redirect('admin/tahunajaran')->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahunajaran $tahunajaran)
    {
        $tahunajaran->delete();
        return redirect('admin/tahunajaran')->with('error', 'Data has been deleted!');
    }
}
