<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\Approve_penilaian;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
use App\Models\Penilaian_siswa;
use Illuminate\Http\Request;

class Penilaian_siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kriteria $kriteria, Siswa $siswa)
    {   
        $siswa      = Siswa::get();
        $kriteria   = Kriteria::get();
        $ps         = Approve_penilaian::all();
        // dd($siswa);

        return view('/admin/nilai/nilai', [
            'siswa'     => $siswa,
            'kriteria'  => $kriteria,
            'ps'        => $ps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kriteria $kriteria, approve $approve, Penilaian $penilaian)
    {
        $approve    = Approve::get();
        $kriteria   = Kriteria::get();
        
        $data = Kriteria::pluck('id');

        $test = [];
        $penilaian = '';
        
        foreach ($data as $dt){
            $penilaian  = Penilaian::where('kriteria_id', $dt)->get()->toArray();
            array_push($test, $penilaian);
        }
        
        $peni = $test;
        
        return view('/admin/nilai/tambahnilai', [
            'approve'         => $approve,
            'kriteria'      => $kriteria,
            'peni'          => $peni,
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
          
        // $kriteria_id = $request->input('kriteria_id');
        $nilai = $request->input('penilaian_id');

        foreach ($nilai as $answer) {
            $siswa_id[] = $request->approve_id;    
        }

        $siswa_id;

        $allData = array();
           for($x=0; $x<count($nilai); $x++){
                $row = array(
                'approve_id'      => $siswa_id[$x],
                'penilaian_id'  => $nilai[$x],
                );
                array_push($allData,$row);
        }

        Approve_penilaian::insert($allData);

        return redirect('/admin/nilai')->with('success', 'Data creates successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian_siswa $penilaian_siswa)
    {
        
        // $siswa      = Siswa::get();
        // $kriteria   = Kriteria::get();
        
        // $data = Kriteria::pluck('id');

        // $test = [];
        // $penilaian = '';
        
        // foreach ($data as $dt){
        //     $penilaian  = Penilaian::where('kriteria_id', $dt)->get()->toArray();
        //     array_push($test, $penilaian);
        // }
        
        // $peni = $test;

        // return view('/admin/nilai/editnilai', [
        //     'siswa'         => $siswa,
        //     'kriteria'      => $kriteria,
        //     'penilaian_siswa'            => $penilaian_siswa,
        //     'peni'          => $peni,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian_siswa $penilaian_siswa)
    {
        // $penilaian_siswa = new Penilaian_siswa;
        // $id = $request->id;
        // $ps = $request->input('penilaian_id');

        // foreach ($ps as $answer) {
        //     $siswa_id[] = $request->input('siswa_id');    
        // }

        // $siswa_id;

        // for ($i=0; $i<count($ps); $i++) {

        //     DB::table('penilaian_siswa')
        //         ->where('id',$request->penilaian_id[$i])
        //         ->update([
        //             'siswa_id' => $siswa_id[$i],
        //             'penilaian_id' => $ps[$i],
     
        //     ]);
    
        // } 
        // return redirect('/admin/nilai')->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $penilaian_siswa->delete();

        $data = Approve_penilaian::where($request->id)->get();
        
        foreach($data as $d)
        {
            $id = $d->id;
        }
        $id;
        
        $deleteHasil = Approve_penilaian::find($id, 'id')->delete();
        return redirect('/admin/nilai')->with('error', 'Data has been deleted!');
    }
}