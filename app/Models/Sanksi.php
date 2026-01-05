<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    protected $table = 'sanksi';
    
    protected $fillable = [
        'kode',
        'nama_sanksi',
        'penanggung_jawab',
        'keterangan',
    ];
}
