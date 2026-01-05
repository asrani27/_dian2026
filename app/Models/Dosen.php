<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $fillable = [
        'nik',
        'nama',
        'jkel',
        'jabatan',
        'mata_kuliah',
        'semester',
        'keterangan',
    ];
}
