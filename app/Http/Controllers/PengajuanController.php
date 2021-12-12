<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Siswa;
use App\Models\Approve;
use App\Models\JenisPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{

    public function indexJenisPengajuan()
    {
        $i=1;
        return view('/admin/pengajuan/jenispengajuan', [
            'jenispengajuan' => JenisPengajuan::get(),
            ])->with('i', $i);
    }

    public function createJenisPengajuan(JenisPengajuan $JenisPengajuan)
    {
        return view('/admin/pengajuan/tambahJenisPengajuan');
    }

    public function storeJenisPengajuan(Request $request, JenisPengajuan $JenisPengajuan)
    {
        $request->validate( [
            'keterangan' => 'required',
            'biaya'      => 'required',
        ]);
        
        $data   = $request->all();

        JenisPengajuan::create($data);

        return redirect('/admin/jenispengajuan')->with('success', 'Data created successfully!');
    }

    public function editJenisPengajuan(JenisPengajuan $JenisPengajuan)
    {
        return view('/admin/pengajuan/editJenisPengajuan', [
            'JenisPengajuan' => $JenisPengajuan,
        ]);
    }

    public function updateJenisPengajuan(JenisPengajuan $JenisPengajuan, Request $request)
    {
        $JenisPengajuan->update($request->all());
        return redirect('/admin/jenispengajuan')->with('warning', 'Data has been updated!');
    }

    public function destroyJenisPengajuan(JenisPengajuan $JenisPengajuan)
    {
        $JenisPengajuan->delete();
        return redirect('/admin/jenispengajuan')->with('error', 'Data has been deleted!');
    }

    public function index()
    {
        $i=1;
        $JenisPengajuan = JenisPengajuan::all();
        $pengajuan = Pengajuan::get();
        
        return view('/admin/pengajuan/pengajuan', [
            'pengajuan' => $pengajuan,
            'JenisPengajuan' => $JenisPengajuan,
            ])->with('i', $i);
    }

    public function approvesiswa(Request $request)
    {
        $data = Pengajuan::where($request->id)->get();

        foreach($data as $d)
        {
            $id = $d->id;
            $nis = $d->nis;
            $siswa_id = $d->siswa_id;
            $nama = $d->nama_siswa;
            $jenispengajuan_id = $d->jenispengajuan_id;
            $file = $d->file;
            $kelas = $d->kelas;
            $nomor_hp = $d->nomor_hp;
        }
            $id;
            $nis;
            $siswa_id;
            $nama;
            $jenispengajuan_id;
            $file;
            $kelas;
            $nomor_hp;
        
            DB::table('approve')
                ->where('id',$request->nis)
                ->insert([
                    'nis' => $nis,
                    'siswa_id' => $siswa_id,
                    'nama_siswa' => $nama,
                    'kelas' => $kelas,
                    'jenispengajuan_id' => $jenispengajuan_id,
                    'file'  => $file,
                    'nomor_hp' => $nomor_hp,
     
            ]);
            $deleteHasil = Pengajuan::find($id, 'id')->delete();
            return redirect('/admin/pengajuan')->with('success', 'Data has been approved!');
    }

    public function destroy(Request $request)
    {
        $data = Pengajuan::where($request->id)->get();
        
        foreach($data as $d)
        {
            $id = $d->id;
        }
        $id;
        
        $deleteHasil = Pengajuan::find($id, 'id')->delete();
        return redirect('admin/pengajuan')->with('error', 'Data has been deleted!');
    }

    public function indexApprove()
    {
        $JenisPengajuan = JenisPengajuan::all();
        
        $i=1;
        return view('/admin/pengajuan/approve', [
            'approve' => Approve::get(),
            'JenisPengajuan' => $JenisPengajuan,
            ])->with('i', $i);
    }

    public function deleteApprove(Request $request)
    {
        $data = Approve::where($request->id)->get();
        
        foreach($data as $d)
        {
            $id = $d->id;
        }
        $id;
        
        $deleteHasil = Approve::find($id, 'id')->delete();
        return redirect('admin/pengajuan/approve')->with('error', 'Data has been deleted!');
    }
}