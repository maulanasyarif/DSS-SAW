<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian_siswa extends Model
{
    use HasFactory;
    protected $table = 'penilaian_siswa';
    protected $guarded = [];

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