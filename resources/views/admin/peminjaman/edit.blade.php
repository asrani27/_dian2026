@extends('layouts.app')

@section('page-title', 'Edit Peminjaman')
@section('page-description', 'Form edit data peminjaman alat laboratorium')

@section('content')
<div class="mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.peminjaman.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Edit Peminjaman</h2>
                <p class="text-gray-600 mt-1">Edit data peminjaman dengan kode: {{ $peminjaman->kode }}</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Data Peminjam -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Data Peminjam
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="mahasiswa_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Mahasiswa <span class="text-red-500">*</span>
                        </label>
                        <select name="mahasiswa_id" id="mahasiswa_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach ($mahasiswa as $mhs)
                            <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $peminjaman->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>
                                {{ $mhs->nim }} - {{ $mhs->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('mahasiswa_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="dosen_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Dosen <span class="text-red-500">*</span>
                        </label>
                        <select name="dosen_id" id="dosen_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosen as $dsn)
                            <option value="{{ $dsn->id }}" {{ old('dosen_id', $peminjaman->dosen_id) == $dsn->id ? 'selected' : '' }}>
                                {{ $dsn->nik }} - {{ $dsn->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('dosen_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Tanggal Peminjaman
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Pinjam <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required
                            value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('tanggal_pinjam')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Kembali <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" required
                            value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('tanggal_kembali')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Alat yang Dipinjam (Readonly) -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Alat yang Dipinjam
                    <span class="ml-2 text-sm text-gray-500">(Tidak dapat diubah)</span>
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
                                @foreach ($peminjaman->peminjamanDetails as $detail)
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

            <!-- Keterangan -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Keterangan
                </h3>
                <div>
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('keterangan', $peminjaman->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.peminjaman.index') }}" 
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
