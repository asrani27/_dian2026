<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';

    protected $fillable = [
        'peminjaman_id',
        'tanggal_dikembalikan',
        'denda',
        'catatan',
    ];

    protected $casts = [
        'tanggal_dikembalikan' => 'date',
        'denda' => 'integer',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
