<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $user_id = Auth::user()->id;

        return new Siswa([
            'user_id'           => $user_id,
            'tapel'             => $row['tapel'],
            'kelas'             => $row['kelas'],
            'nis'               => $row['nis'],
            'nama_siswa'        => $row['nama_siswa'],
            'password'          => Hash::make($row['password']),
            'tempat_lahir'      => $row['tempat_lahir'],
            'tanggal_lahir'     => $row['tanggal_lahir'],
            'jenis_kelamin'     => $row['jenis_kelamin'],
            'alamat'            => $row['alamat'],
            'nomor_hp'          => $row['nomor_hp'],
        ]);
    }
}