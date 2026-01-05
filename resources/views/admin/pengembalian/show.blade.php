@extends('layouts.app')

@section('page-title', 'Detail Pengembalian')
@section('page-description', 'Detail data pengembalian alat laboratorium')

@section('content')
<div class="mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.pengembalian.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Detail Pengembalian</h2>
                    <p class="text-gray-600 mt-1">Informasi lengkap data pengembalian</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.pengembalian.edit', $pengembalian->id) }}" 
                    class="inline-flex items-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.pengembalian.destroy', $pengembalian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengembalian ini?')">
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
        </div>
    </div>

    <!-- Informasi Utama -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Informasi Peminjaman -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Peminjaman</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Kode Peminjaman</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $pengembalian->peminjaman->kode }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal Pinjam</p>
                    <p class="text-sm font-medium text-gray-900">{{ $pengembalian->peminjaman->tanggal_pinjam->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal Kembali</p>
                    <p class="text-sm font-medium text-gray-900">{{ $pengembalian->peminjaman->tanggal_kembali->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Data Peminjam -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Peminjam</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500">Mahasiswa</p>
                    @if ($pengembalian->peminjaman->mahasiswa)
                    <p class="text-sm font-medium text-gray-900">{{ $pengembalian->peminjaman->mahasiswa->nim }}</p>
                    <p class="text-sm text-gray-900">{{ $pengembalian->peminjaman->mahasiswa->nama }}</p>
                    @else
                    <p class="text-sm text-gray-400">-</p>
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-500">Dosen</p>
                    @if ($pengembalian->peminjaman->dosen)
                    <p class="text-sm font-medium text-gray-900">{{ $pengembalian->peminjaman->dosen->nik }}</p>
                    <p class="text-sm text-gray-900">{{ $pengembalian->peminjaman->dosen->nama }}</p>
                    @else
                    <p class="text-sm text-gray-400">-</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Informasi Pengembalian -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengembalian</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Tanggal Dikembalikan</p>
                    <p class="text-sm font-medium text-gray-900">{{ $pengembalian->tanggal_dikembalikan->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Denda</p>
                    <p class="text-sm font-medium text-gray-900">Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Catatan</p>
                    <p class="text-sm text-gray-900">{{ $pengembalian->catatan ?: '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Alat yang Dikembalikan -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Alat yang Dikembalikan</h3>
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
                    @foreach ($pengembalian->peminjaman->peminjamanDetails as $detail)
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
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                @if($detail->kondisi_kembali == 'Baik') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $detail->kondisi_kembali }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Catatan Pengembalian -->
    @if ($pengembalian->catatan)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Catatan Pengembalian</h3>
        <p class="text-sm text-gray-900">{{ $pengembalian->catatan }}</p>
    </div>
    @endif
</div>
@endsection
