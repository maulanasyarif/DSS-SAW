<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Hasil;
use App\Models\Siswa;
use App\Models\JenisPengajuan;
use App\Models\Pengajuan;
use App\Models\Approve;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SiswaHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:siswa');
    }

    public function index()
    {
        $JenisPengajuan = JenisPengajuan::all();
        return view('siswa.siswa', [
            'JenisPengajuan' => $JenisPengajuan,
        ]);
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'nis'               => 'required',
            'nama_siswa'        => 'required',
            'jenispengajuan_id'   => 'required',
            'kelas'             => 'required',
            'filepdf'           => 'required|mimes:pdf',
            'nomor_hp'          => 'required'
        ]);
 
        $save = new Pengajuan;
 
        $save->nis = $request->nis;
        $save->siswa_id = $request->siswa_id;
        $save->kelas = $request->kelas;
        $save->jenispengajuan_id = $request->jenispengajuan_id;
        $save->nama_siswa = $request->nama_siswa;
        $save->nomor_hp = $request->nomor_hp;
        $save->file = time().'.'.$request->filepdf->extension('filepdf');

        $save->save();
        
        $bukti = $request->filepdf;
        $extention = $bukti->getClientOriginalExtension();
        $fileName = time().'.'.$extention;
        $bukti->move(\public_path('file_siswa'), $fileName);
        $bukti = $fileName;

        return redirect('siswa/home')->with('success', 'Data has submited!');
    }
    
    public function cetakPdf()
    {
        $login = Auth::guard('siswa')->user()->nis;
        $hasil = Approve::where('nis', $login)->get();
        
        // foreach($hasil as $a){
        //     if(!empty($a)){
        //         $response = "Berhak";
        //         $total = $a->total;
        //         if($total >= number_format(0.8 ,2) ){
        //             $biaya = '270.000';
        //         }
        //         elseif($total >= number_format(0.7 ,2) && $total <=  number_format(0.8 ,2)){
        //             $biaya = '279.000';
        //         }
        //         elseif($total >= number_format(0.6 ,2) && $total <= number_format(0.7 ,2)){
        //                 $biaya = '285.000';
        //         }
        //     }
        // }

        // if(count($hasil) == 0){
        //     $response = " TIdak Berhak";
        //     $biaya = '300.000';
        // }

        
        
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadview('siswa/hasilspk', ['hasil' => $hasil])->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('beasiswa.pdf');
    }
}