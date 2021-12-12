<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table    = 'penilaian';
    protected $guarded = [];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class);

    }

    //untuk pivot
    public function Siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
    
    public function Approve()
    {
        return $this->belongsToMany(Approve::class);
    }
    //

    
    //untuk get data
    public function Penilaian_siswa()
    {
        return $this->hasOne(Penilaian_siswa::class);
    }

    public function Approve_penilaian()
    {
        return $this->hasOne(Approve_penilaian::class);
    }
    //
}