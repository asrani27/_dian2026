<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $pengembalian = Pengembalian::with(['peminjaman.mahasiswa', 'peminjaman.dosen'])
                                      ->whereHas('peminjaman', function($query) use ($search) {
                                          $query->where('kode', 'like', '%' . $search . '%')
                                                ->orWhereHas('mahasiswa', function($q) use ($search) {
                                                    $q->where('nama', 'like', '%' . $search . '%');
                                                })
                                                ->orWhereHas('dosen', function($q) use ($search) {
                                                    $q->where('nama', 'like', '%' . $search . '%');
                                                });
                                      })
                                      ->latest()
                                      ->paginate(10);
        } else {
            $pengembalian = Pengembalian::with(['peminjaman.mahasiswa', 'peminjaman.dosen'])->latest()->paginate(10);
        }
        
        return view('admin.pengembalian.index', compact('pengembalian', 'search'));
    }

    public function create()
    {
        // Get peminjaman that haven't been returned yet
        $peminjaman = Peminjaman::with(['mahasiswa', 'dosen', 'peminjamanDetails.alat'])
                               ->where('status', 'Dipinjam')
                               ->get();
        
        return view('admin.pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'tanggal_dikembalikan' => 'required|date|after_or_equal:today',
            'denda' => 'required|integer|min:0',
            'catatan' => 'nullable|string',
            'kondisi_kembali' => 'required|array',
            'kondisi_kembali.*' => 'required|in:Baik,Rusak Ringan',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        // Check if peminjaman already has pengembalian
        if ($peminjaman->pengembalian) {
            return redirect()->route('admin.pengembalian.index')
                ->with('error', 'Peminjaman ini sudah dikembalikan.');
        }

        // Create pengembalian
        $pengembalian = Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'denda' => $request->denda,
            'catatan' => $request->catatan,
        ]);

        // Update peminjaman details with kondisi_kembali and restore alat quantities
        foreach ($request->kondisi_kembali as $detailId => $kondisi) {
            $detail = PeminjamanDetail::findOrFail($detailId);
            if ($detail->peminjaman_id == $peminjaman->id) {
                $detail->update(['kondisi_kembali' => $kondisi]);
                
                // Restore alat quantity (increase)
                $detail->alat->increment('jumlah', $detail->jumlah);
            }
        }

        // Update peminjaman status
        $peminjaman->update(['status' => 'Dikembalikan']);

        return redirect()->route('admin.pengembalian.index')
            ->with('success', 'Data pengembalian berhasil ditambahkan.');
    }

    public function show(Pengembalian $pengembalian)
    {
        $pengembalian->load(['peminjaman.mahasiswa', 'peminjaman.dosen', 'peminjaman.peminjamanDetails.alat']);
        
        return view('admin.pengembalian.show', compact('pengembalian'));
    }

    public function edit(Pengembalian $pengembalian)
    {
        $pengembalian->load(['peminjaman.mahasiswa', 'peminjaman.dosen', 'peminjaman.peminjamanDetails.alat']);
        
        return view('admin.pengembalian.edit', compact('pengembalian'));
    }

    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'tanggal_dikembalikan' => 'required|date',
            'denda' => 'required|integer|min:0',
            'catatan' => 'nullable|string',
        ]);

        $pengembalian->update($request->only([
            'tanggal_dikembalikan', 'denda', 'catatan'
        ]));

        return redirect()->route('admin.pengembalian.index')
            ->with('success', 'Data pengembalian berhasil diperbarui.');
    }

    public function destroy(Pengembalian $pengembalian)
    {
        // Get the related peminjaman
        $peminjaman = $pengembalian->peminjaman;

        // Decrease alat quantities again (since items are being "borrowed" again)
        foreach ($peminjaman->peminjamanDetails as $detail) {
            $detail->alat->decrement('jumlah', $detail->jumlah);
        }

        // Delete pengembalian
        $pengembalian->delete();

        // Update peminjaman status back to 'Dipinjam'
        $peminjaman->update(['status' => 'Dipinjam']);

        // Clear kondisi_kembali in peminjaman details
        $peminjaman->peminjamanDetails()->update(['kondisi_kembali' => null]);

        return redirect()->route('admin.pengembalian.index')
            ->with('success', 'Data pengembalian berhasil dihapus.');
    }
}
