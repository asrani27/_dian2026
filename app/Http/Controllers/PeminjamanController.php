<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Alat;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $peminjaman = Peminjaman::with(['mahasiswa', 'dosen'])
                                  ->where('kode', 'like', '%' . $search . '%')
                                  ->orWhereHas('mahasiswa', function($query) use ($search) {
                                      $query->where('nama', 'like', '%' . $search . '%');
                                  })
                                  ->orWhereHas('dosen', function($query) use ($search) {
                                      $query->where('nama', 'like', '%' . $search . '%');
                                  })
                                  ->orWhere('status', 'like', '%' . $search . '%')
                                  ->latest()
                                  ->paginate(10);
        } else {
            $peminjaman = Peminjaman::with(['mahasiswa', 'dosen'])->latest()->paginate(10);
        }
        
        return view('admin.peminjaman.index', compact('peminjaman', 'search'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $alat = Alat::all();
        
        return view('admin.peminjaman.create', compact('mahasiswa', 'dosen', 'alat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'dosen_id' => 'required|exists:dosen,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'keterangan' => 'nullable|string',
            'alat_id' => 'required|array',
            'alat_id.*' => 'required|exists:alat,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
            'kondisi_awal' => 'required|array',
            'kondisi_awal.*' => 'required|in:Baik,Rusak Ringan',
        ]);

        // Generate unique kode
        $kode = 'PJ' . date('Ymd') . sprintf('%03d', Peminjaman::count() + 1);

        $peminjaman = Peminjaman::create([
            'kode' => $kode,
            'mahasiswa_id' => $request->mahasiswa_id,
            'dosen_id' => $request->dosen_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'keterangan' => $request->keterangan,
            'status' => 'Dipinjam',
        ]);

        // Save peminjaman details and update alat quantity
        foreach ($request->alat_id as $index => $alatId) {
            $jumlahDipinjam = $request->jumlah[$index];
            
            // Check if enough quantity is available
            $alat = Alat::findOrFail($alatId);
            if ($alat->jumlah < $jumlahDipinjam) {
                // Rollback the peminjaman creation
                $peminjaman->delete();
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Jumlah {$alat->nama} tidak mencukupi. Tersedia: {$alat->jumlah}, Diminta: {$jumlahDipinjam}");
            }
            
            // Create peminjaman detail
            PeminjamanDetail::create([
                'peminjaman_id' => $peminjaman->id,
                'alat_id' => $alatId,
                'jumlah' => $jumlahDipinjam,
                'kondisi_awal' => $request->kondisi_awal[$index],
            ]);
            
            // Update alat quantity (decrease)
            $alat->decrement('jumlah', $jumlahDipinjam);
        }

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['mahasiswa', 'dosen', 'peminjamanDetails.alat', 'pengembalian']);
        
        return view('admin.peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        // Only allow editing if status is 'Dipinjam'
        if ($peminjaman->status !== 'Dipinjam') {
            return redirect()->route('admin.peminjaman.index')
                ->with('error', 'Peminjaman yang sudah dikembalikan tidak dapat diedit.');
        }

        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $alat = Alat::all();
        
        $peminjaman->load('peminjamanDetails.alat');
        
        return view('admin.peminjaman.edit', compact('peminjaman', 'mahasiswa', 'dosen', 'alat'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        if ($peminjaman->status !== 'Dipinjam') {
            return redirect()->route('admin.peminjaman.index')
                ->with('error', 'Peminjaman yang sudah dikembalikan tidak dapat diedit.');
        }

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'dosen_id' => 'required|exists:dosen,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'keterangan' => 'nullable|string',
        ]);

        $peminjaman->update($request->only([
            'mahasiswa_id', 'dosen_id', 'tanggal_pinjam', 'tanggal_kembali', 'keterangan'
        ]));

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        // Only allow deletion if status is 'Dipinjam'
        if ($peminjaman->status !== 'Dipinjam') {
            return redirect()->route('admin.peminjaman.index')
                ->with('error', 'Peminjaman yang sudah dikembalikan tidak dapat dihapus.');
        }

        // Restore alat quantities before deleting
        foreach ($peminjaman->peminjamanDetails as $detail) {
            $detail->alat->increment('jumlah', $detail->jumlah);
        }

        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
