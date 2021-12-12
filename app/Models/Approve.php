<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    use HasFactory;

    protected $table = 'approve';
    protected $guarded = [];

    public function Penilaian()
    {
        return $this->belongsToMany(Penilaian::class);
    }

    public function Approve_penilaian()
    {
        return $this->hasOne(Approve_penilaian::class);
    }

    public function Jenispengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class);
    }

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}