<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Modelsiswa;

class Siswa extends Modelsiswa
{
    protected $table = 'siswa';
    protected $guarded = [];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function Hasil()
    {
        return $this->hasOne(Hasil::class, 'siswa_id');
    }

    //untuk pivot
    public function Penilaian()
    {
        return $this->belongsToMany(Penilaian::class);
    }
    //

    //untuk get data
    public function Penilaian_siswa()
    {
        return $this->hasOne(Penilaian_siswa::class);
    }
    //

    public function Approve()
    {
        return $this->hasOne(Approve::class);
    }
}