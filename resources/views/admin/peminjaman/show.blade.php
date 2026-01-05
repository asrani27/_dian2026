@extends('layouts.app')

@section('page-title', 'Detail Peminjaman')
@section('page-description', 'Detail data peminjaman alat laboratorium')

@section('content')
<div class="mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.peminjaman.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Detail Peminjaman</h2>
                    <p class="text-gray-600 mt-1">Informasi lengkap data peminjaman</p>
                </div>
            </div>
            @if ($peminjaman->status == 'Dipinjam')
            <div class="flex space-x-2">
                <a href="{{ route('admin.peminjaman.edit', $peminjaman->id) }}" 
                    class="inline-flex items-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    <!-- Informasi Utama -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Kode dan Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Informasi Peminjaman</h3>
                @if ($peminjaman->status == 'Dipinjam')
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Dipinjam
                </span>
                @else
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Dikembalikan
                </span>
                @endif
            </div>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Kode Peminjaman</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $peminjaman->kode }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal Pinjam</p>
                    <p class="text-sm font-medium text-gray-900">{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal Kembali</p>
                    <p class="text-sm font-medium text-gray-900">{{ $peminjaman->tanggal_kembali->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Data Peminjam -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Peminjam</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500">Mahasiswa</p>
                    @if ($peminjaman->mahasiswa)
                    <p class="text-sm font-medium text-gray-900">{{ $peminjaman->mahasiswa->nim }}</p>
                    <p class="text-sm text-gray-900">{{ $peminjaman->mahasiswa->nama }}</p>
                    @else
                    <p class="text-sm text-gray-400">-</p>
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-500">Dosen</p>
                    @if ($peminjaman->dosen)
                    <p class="text-sm font-medium text-gray-900">{{ $peminjaman->dosen->nik }}</p>
                    <p class="text-sm text-gray-900">{{ $peminjaman->dosen->nama }}</p>
                    @else
                    <p class="text-sm text-gray-400">-</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Informasi Pengembalian -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengembalian</h3>
            @if ($peminjaman->pengembalian)
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Tanggal Dikembalikan</p>
                    <p class="text-sm font-medium text-gray-900">{{ $peminjaman->pengembalian->tanggal_dikembalikan->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Denda</p>
                    <p class="text-sm font-medium text-gray-900">Rp {{ number_format($peminjaman->pengembalian->denda, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Catatan</p>
                    <p class="text-sm text-gray-900">{{ $peminjaman->pengembalian->catatan ?: '-' }}</p>
                </div>
            </div>
            @else
            <div class="text-center py-8">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-gray-500">Belum ada data pengembalian</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Daftar Alat yang Dipinjam -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Alat yang Dipinjam</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Alat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Alat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kondisi Awal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kondisi Kembali</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($peminjaman->peminjamanDetails as $detail)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $detail->alat->kode }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $detail->alat->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $detail->jumlah }}</span>
                                <span class="text-sm text-gray-500 ml-1">unit</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                @if($detail->kondisi_awal == 'Baik') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $detail->kondisi_awal }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($detail->kondisi_kembali)
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                @if($detail->kondisi_kembali == 'Baik') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $detail->kondisi_kembali }}
                            </span>
                            @else
                            <span class="text-sm text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Keterangan -->
    @if ($peminjaman->keterangan)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Keterangan</h3>
        <p class="text-sm text-gray-900">{{ $peminjaman->keterangan }}</p>
    </div>
    @endif
</div>
@endsection
