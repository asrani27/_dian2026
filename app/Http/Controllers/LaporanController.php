<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Alat;
use App\Models\Sanksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function peminjaman(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2030',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Get peminjaman data for selected month and year
        $peminjaman = Peminjaman::with(['mahasiswa', 'dosen', 'peminjamanDetails.alat'])
            ->whereYear('tanggal_pinjam', $tahun)
            ->whereMonth('tanggal_pinjam', $bulan)
            ->orderBy('tanggal_pinjam', 'asc')
            ->get();

        $bulanNama = $this->getBulanNama($bulan);
        $totalPeminjaman = $peminjaman->count();

        $pdf = PDF::loadView('admin.laporan.peminjaman_pdf', compact(
            'peminjaman',
            'bulan',
            'tahun',
            'bulanNama',
            'totalPeminjaman'
        ));

        return $pdf->stream('laporan-peminjaman-' . $bulan . '-' . $tahun . '.pdf');
    }

    public function pengembalian(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2030',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Get pengembalian data for selected month and year
        $pengembalian = Pengembalian::with(['peminjaman.mahasiswa', 'peminjaman.dosen', 'peminjaman.peminjamanDetails.alat'])
            ->whereYear('tanggal_dikembalikan', $tahun)
            ->whereMonth('tanggal_dikembalikan', $bulan)
            ->orderBy('tanggal_dikembalikan', 'asc')
            ->get();

        $bulanNama = $this->getBulanNama($bulan);
        $totalPengembalian = $pengembalian->count();

        $pdf = PDF::loadView('admin.laporan.pengembalian_pdf', compact(
            'pengembalian',
            'bulan',
            'tahun',
            'bulanNama',
            'totalPengembalian'
        ));

        return $pdf->stream('laporan-pengembalian-' . $bulan . '-' . $tahun . '.pdf');
    }

    public function alat()
    {
        // Get all alat data
        $alat = Alat::orderBy('nama', 'asc')->get();
        $totalAlat = $alat->count();
        $totalJumlah = $alat->sum('jumlah');

        $pdf = PDF::loadView('admin.laporan.alat_pdf', compact(
            'alat',
            'totalAlat',
            'totalJumlah'
        ));

        return $pdf->stream('laporan-data-alat-' . date('Y-m-d') . '.pdf');
    }

    public function sanksi()
    {
        // Get all sanksi data with relationships
        $sanksi = Sanksi::orderBy('created_at', 'desc')
            ->get();
        $totalSanksi = $sanksi->count();

        $pdf = PDF::loadView('admin.laporan.sanksi_pdf', compact(
            'sanksi',
            'totalSanksi'
        ));

        return $pdf->stream('laporan-data-sanksi-' . date('Y-m-d') . '.pdf');
    }

    private function getBulanNama($bulan)
    {
        $bulanNama = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $bulanNama[$bulan] ?? '';
    }
}
