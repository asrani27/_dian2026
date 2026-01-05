@extends('layouts.app')

@section('page-title', 'Edit Pengembalian')
@section('page-description', 'Form edit data pengembalian alat laboratorium')

@section('content')
<div class="mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.pengembalian.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Edit Pengembalian</h2>
                <p class="text-gray-600 mt-1">Edit data pengembalian untuk peminjaman: {{ $pengembalian->peminjaman->kode }}</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.pengembalian.update', $pengembalian->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Informasi Peminjaman (Readonly) -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Informasi Peminjaman
                    <span class="ml-2 text-sm text-gray-500">(Tidak dapat diubah)</span>
                </h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Kode Peminjaman</p>
                            <p class="font-medium text-gray-900">{{ $pengembalian->peminjaman->kode }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Peminjam</p>
                            <p class="font-medium text-gray-900">{{ $pengembalian->peminjaman->mahasiswa->nama ?? $pengembalian->peminjaman->dosen->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Pinjam</p>
                            <p class="font-medium text-gray-900">{{ $pengembalian->peminjaman->tanggal_pinjam->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Alat yang Dipinjam (Readonly) -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Detail Alat yang Dipinjam
                </h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kode Alat</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Alat</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kondisi Awal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($pengembalian->peminjaman->peminjamanDetails as $detail)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $detail->alat->kode }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $detail->alat->nama }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $detail->jumlah }} unit</td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                            @if($detail->kondisi_awal == 'Baik') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $detail->kondisi_awal }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Pengembalian -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Data Pengembalian
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal_dikembalikan" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Dikembalikan <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" required
                            value="{{ old('tanggal_dikembalikan', $pengembalian->tanggal_dikembalikan->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('tanggal_dikembalikan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="denda" class="block text-sm font-medium text-gray-700 mb-2">
                            Denda (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="denda" id="denda" min="0" required
                            value="{{ old('denda', $pengembalian->denda) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('denda')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Kondisi Pengembalian Alat -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Kondisi Pengembalian Alat
                </h3>
                <div class="space-y-4">
                    @foreach ($pengembalian->peminjaman->peminjamanDetails as $detail)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="font-medium text-gray-900">{{ $detail->alat->kode }} - {{ $detail->alat->nama }}</h4>
                            <span class="text-sm text-gray-500">{{ $detail->jumlah }} unit</span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kondisi Kembali <span class="text-red-500">*</span>
                            </label>
                            <select name="kondisi_kembali[{{ $detail->id }}]" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="Baik" {{ old('kondisi_kembali.' . $detail->id, $detail->kondisi_kembali) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi_kembali.' . $detail->id, $detail->kondisi_kembali) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            </select>
                        </div>
                        <input type="hidden" name="detail_ids[]" value="{{ $detail->id }}">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Keterangan
                </h3>
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                    <textarea name="catatan" id="catatan" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('catatan', $pengembalian->catatan) }}</textarea>
                    @error('catatan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.pengembalian.index') }}" 
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-emerald-600 text-white rounded-lg hover:from-blue-700 hover:to-emerald-700 transition-all duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
