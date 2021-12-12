<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\Hasil;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $hasil = Hasil::all();

        // // $spp = [];
        // foreach($hasil as $h)
        // {
        //     $total = $h->total;

        //     if($total >= 0.9 )
        //     {
        //         $biaya = '270.000';
        //     }
        //     elseif($total >= 0.7 && $total <=0.8)
        //     {
        //         $biaya = '279.000';
        //     }
        //     elseif($total >= 0.6 && $total <=0.7){
        //         $biaya = '285.000';
        //     }
        //     elseif($total <=0.6){
        //         $biaya = '300.000';
        //     }
        //     // array_push($spp,$biaya);
        // }
        
        return view('admin/index', [
            'hasil' => $hasil,
            // 'spp'   => $spp,
        ]);
    }
    
    public function deleteHasil()
    {
        $deleteHasil = DB::table('hasil');
        $deleteHasil->delete();
        if($deleteHasil){
            return redirect('/dashboard')->with('error', 'Data has been deleted!');
        }
    }

    public function cetakPdf()
    {
        $hasil = Hasil::get();

        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadview('admin/hasilspk', compact('hasil', $hasil))->setPaper('a4')->setOrientation('portrait');
        return $pdf->stream('hasilspkbeasiswa.pdf');
    }
}