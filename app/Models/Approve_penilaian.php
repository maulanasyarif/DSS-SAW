<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve_penilaian extends Model
{
    use HasFactory;
    protected $table = 'approve_penilaian';
    protected $guarded = [];

    //untuk get data
    public function Approve()
    {
        return $this->belongsTo(Approve::class);
    }
    //

      //untuk get data
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    //

    //untuk get data
    public function Penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
    //

    //untuk get data
    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    //
}