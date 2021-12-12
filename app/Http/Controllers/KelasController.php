<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/kelas/kelas', [
            'kelas' => Kelas::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jurusan $jurusan)
    {   
        $jurusan = Jurusan::get();
        return view('/admin/kelas/tambahkelas', [
            'jurusan'   => $jurusan
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
            'kelas'         => 'required',
            'jurusan_id'    => 'required',
            'kode_kelas'    => 'required|max:1',
        ]);
        
        $input = $request->all();
        Kelas::create($input);
        
        return redirect('/admin/kelas')->with('success', 'Data creates successfully!');
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
    public function edit(Kelas $kelas)
    {   
        $jurusan = Jurusan::get();

        return view('/admin/kelas/editkelas', [
            'kelas'     => $kelas,
            'jurusan'   => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        // $request->validate( [
        //     'kode kelas'    => 'required',
        // ]);

        $kelas->update($request->all());
        
        return redirect ('/admin/kelas')->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect('/admin/kelas')->with('error', 'Data has been deleted!');
    }
}
