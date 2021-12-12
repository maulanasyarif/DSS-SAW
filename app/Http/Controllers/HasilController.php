<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Approve;
use App\Models\Kriteria;
use App\Models\Kelas;
use App\Models\Tahunajaran;
use App\Models\Jurusan;
use App\Models\Penilaian;
use App\Models\Penilaian_siswa;
use App\Models\Approve_penilaian;
use App\Models\Hasil;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function indexHasil()
    {   
        $approve        = Approve::get();
        $kriteria       = Kriteria::get();
        $penilaian      = Penilaian::get();
        $ps             = Approve_penilaian::get();

        $kode_krit = [];
        if(count($ps) > 0){
            foreach($kriteria as $k){
                $kode_krit[$k->id] = [];
                foreach($approve as $s){
                    foreach($s->penilaian as $penilaian){
                        if($penilaian->kriteria->id == $k->id){
                            $kode_krit[$k->id][] = $penilaian->bobot;
                        }
                    }
                }
                if ($k->sifat == 'Cost')
                {
                    $kode_krit[$k->id] = min($kode_krit[$k->id]);
                } elseif ($k->sifat == 'Benefit')
                {
                    $kode_krit[$k->id] = max($kode_krit[$k->id]);
                }
            }
        }else {
            return redirect('admin/404');
        }

        return view('/admin/hasil/hasil', [
            'approve'       => $approve,
            'kriteria'      => $kriteria,
            'kode_krit'     => $kode_krit,
        ]);
    }


    public function saveData(Request $request)
    {
        $deleteHasil = DB::table('hasil');
        $deleteHasil->delete();
        $data[] = $request->all();
        foreach ($data as $dt) {
            foreach ($dt['data'] as $d) {
                $array = [];
                $array = json_decode($d, true);
                if ($array['total'] != 0 && $array['total'] >= 0.60) {
                    $save = Hasil::create($array);
                }
            }
        }
        if ($save) {
            return redirect('/dashboard')->with('success', 'Data created successfully!');
        }
    }
}