<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengajuan extends Model
{
    use HasFactory;

    protected $table = 'jenispengajuan';
    protected $guarded = [];

    public function Pengajuan()
    {
        return $this->hasOne(Pengajuan::class);
    }

    public function Approve()
    {
        return $this->hasOne(Approve::class);
    }
}