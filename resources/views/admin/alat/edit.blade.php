@extends('layouts.app')

@section('page-title', 'Edit Alat')
@section('page-description', 'Edit data alat laboratorium')

@section('content')
<div class="mx-auto">
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('admin.alat.index') }}"
                        class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2">Data Alat</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-500 ml-1 md:ml-2">Edit Alat</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">Edit Alat</h2>
            <p class="text-gray-600 mt-1">Ubah data alat laboratorium: <span class="font-medium text-blue-600">{{
                    $alat->nama }}</span></p>
        </div>

        <form action="{{ route('admin.alat.update', $alat->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <!-- Error Message -->
            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Terjadi kesalahan:</span>
                </div>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode Alat -->
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Alat <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" id="kode" name="kode" value="{{ old('kode', $alat->kode) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kode') border-red-500 @enderror"
                            placeholder="Contoh: ALT001" required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                    @error('kode')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Alat -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Alat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $alat->nama) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror"
                        placeholder="Contoh: Mikroskop Digital" required>
                    @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Alat -->
                <div>
                    <label for="jenis" class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Alat <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis" name="jenis"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jenis') border-red-500 @enderror"
                        required>
                        <option value="">Pilih Jenis Alat</option>
                        <option value="elektronik" {{ old('jenis', $alat->jenis) == 'elektronik' ? 'selected' : ''
                            }}>Elektronik</option>
                        <option value="mekanik" {{ old('jenis', $alat->jenis) == 'mekanik' ? 'selected' : '' }}>Mekanik
                        </option>
                        <option value="kimia" {{ old('jenis', $alat->jenis) == 'kimia' ? 'selected' : '' }}>Kimia
                        </option>
                        <option value="fisika" {{ old('jenis', $alat->jenis) == 'fisika' ? 'selected' : '' }}>Fisika
                        </option>
                        <option value="biologi" {{ old('jenis', $alat->jenis) == 'biologi' ? 'selected' : '' }}>Biologi
                        </option>
                        <option value="lainnya" {{ old('jenis', $alat->jenis) == 'lainnya' ? 'selected' : '' }}>Lainnya
                        </option>
                    </select>
                    @error('jenis')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bahan -->
                <div>
                    <label for="bahan" class="block text-sm font-medium text-gray-700 mb-2">
                        Bahan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="bahan" name="bahan" value="{{ old('bahan', $alat->bahan) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('bahan') border-red-500 @enderror"
                        placeholder="Contoh: Stainless Steel, Plastik, Kaca" required>
                    @error('bahan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Merk -->
                <div>
                    <label for="merk" class="block text-sm font-medium text-gray-700 mb-2">
                        Merk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="merk" name="merk" value="{{ old('merk', $alat->merk) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('merk') border-red-500 @enderror"
                        placeholder="Contoh: Olympus, Nikon, Sony" required>
                    @error('merk')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">Rp</span>
                        <input type="number" id="harga" name="harga" value="{{ old('harga', $alat->harga) }}"
                            class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('harga') border-red-500 @enderror"
                            placeholder="0" min="0" required>
                    </div>
                    @error('harga')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $alat->jumlah) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jumlah') border-red-500 @enderror"
                            placeholder="1" min="0" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">unit</span>
                    </div>
                    @error('jumlah')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Beli -->
                <div>
                    <label for="tanggal_beli" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Beli <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_beli" name="tanggal_beli"
                        value="{{ old('tanggal_beli', $alat->tanggal_beli->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_beli') border-red-500 @enderror"
                        required>
                    @error('tanggal_beli')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                        Keterangan
                    </label>
                    <textarea id="keterangan" name="keterangan" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('keterangan') border-red-500 @enderror"
                        placeholder="Tambahkan keterangan atau catatan tentang alat ini...">{{ old('keterangan', $alat->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Opsional: Tambahkan informasi tambahan tentang alat</p>
                </div>
            </div>

            <!-- Info Tambahan -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-blue-900">Informasi Alat</h4>
                        <div class="mt-2 text-sm text-blue-700">
                            <p><strong>Dibuat:</strong> {{ $alat->created_at->format('d M Y, H:i') }}</p>
                            <p><strong>Terakhir diubah:</strong> {{ $alat->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.alat.index') }}"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-emerald-600 text-white rounded-lg hover:from-blue-700 hover:to-emerald-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Data Alat
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection