<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'kode',
        'mahasiswa_id',
        'dosen_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function peminjamanDetails()
    {
        return $this->hasMany(PeminjamanDetail::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }

    public function alats()
    {
        return $this->belongsToMany(Alat::class, 'peminjaman_detail')
            ->withPivot('jumlah', 'kondisi_awal', 'kondisi_kembali');
    }
}
