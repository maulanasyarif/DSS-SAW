<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table    = 'kriteria';
    protected $guarded  = [];

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    //untuk get data
    public function Approve_penilaian()
    {
        return $this->hasOne(Approve_penilaian::class);
    }
    //
}