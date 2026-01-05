<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'bahan',
        'merk',
        'harga',
        'jumlah',
        'tanggal_beli',
        'keterangan',
    ];

    protected $casts = [
        'harga' => 'integer',
        'jumlah' => 'integer',
        'tanggal_beli' => 'date',
    ];
}
