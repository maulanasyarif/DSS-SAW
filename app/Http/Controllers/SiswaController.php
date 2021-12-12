<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\UploadedFile;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Siswa $siswa)
    {
        $siswa      = Siswa::get();
        
        return view('/admin/siswa/siswa', [
            'siswa'     => $siswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Siswa $siswa)
    {
        return view('/admin/siswa/tambahsiswa', [
            'siswa'   => $siswa,
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
    
        // dd($request->all());
        $request->validate([
            'tapel'             => 'required',
            'kelas'             => 'required',
            'password'          => 'required',
            'nis'               => 'required|max:12',
            'nama_siswa'        => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'nomor_hp'          => 'required',
        ]);
        
        $createData = new Siswa;
        $createData->user_id = $request->user_id;
        $createData->tapel = $request->tapel;
        $createData->kelas = $request->kelas;
        $createData->password = $request->password;
        $createData->nis = $request->nis;
        $createData->nama_siswa = $request->nama_siswa;
        $createData->tempat_lahir = $request->tempat_lahir;
        $createData->tanggal_lahir = $request->tanggal_lahir;
        $createData->jenis_kelamin = $request->jenis_kelamin;
        $createData->alamat = $request->alamat;
        $createData->nomor_hp = $request->nomor_hp;
        $createData->save();
        
        return redirect('/admin/siswa')->with('success', 'Data created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {   
        return view('/admin/siswa/detailsiswa', [
            'siswa'         => $siswa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('/admin/siswa/editsiswa',[
            'siswa'         => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {   
        $id                     = (int)$request->id;
        $user_id                = $request->user_id;
        $tapel                  = $request->tapel;
        $kelas                  = $request->kelas;
        $nis                    = $request->nis;
        $nama_siswa             = $request->nama_siswa;
        $tempat_lahir           = $request->tempat_lahir;
        $tanggal_lahir          = $request->tanggal_lahir;
        $jenis_kelamin          = $request->jenis_kelamin;
        $alamat                 = $request->alamat;
        $nomor_hp               = $request->nomor_hp;

        if ($request->password) {
            $password = Hash::make($request->password);
        }

        $rules = $request->validate([
            'tapel'             => 'required',
            'kelas'             => 'required',
            'nis'               => 'required|max:12',
            'nama_siswa'        => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'nomor_hp'          => 'required',
        ]);
        
        if ($rules) {
            $updateData = Siswa::find($id);
            $updateData->user_id = $user_id;
            $updateData->tapel = $tapel;
            $updateData->kelas = $kelas;
            $updateData->nis = $nis;
            $updateData->nama_siswa = $nama_siswa;
            $updateData->tempat_lahir = $tempat_lahir;
            $updateData->tanggal_lahir = $tanggal_lahir;
            $updateData->jenis_kelamin = $jenis_kelamin;
            $updateData->alamat = $alamat;
            if ($request->password) {
                $updateData->password = $password;
            }
            $updateData->save();
        }

        return redirect("/admin/siswa")->with('warning', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect('admin/siswa')->with('error', 'Data has been deleted!');
    }

    public function import(Siswa $siswa)
    {
        return view('/admin/siswa/importexcel',[
            'siswa'         => $siswa,
        ]);
    }
    
    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('siswa/', $nama_file);

        Excel::import(new SiswaImport, public_path('siswa/'.$nama_file));

        return redirect("/admin/siswa")->with('success', 'Data has been Imported!');
    }
    
}