@extends('layouts.app')

@section('title', 'Tambah Sanksi')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.sanksi.index') }}" class="text-gray-600 hover:text-gray-900 mr-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Tambah Sanksi</h1>
            <p class="text-gray-600 mt-1">Tambahkan data sanksi baru ke sistem</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-900">Form Data Sanksi</h2>
        </div>
        
        <form action="{{ route('admin.sanksi.store') }}" method="POST" class="p-6">
            @csrf
            
            <!-- Error Message -->
            @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan!</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode -->
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">
                        Kode Sanksi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="kode" 
                           name="kode" 
                           value="{{ old('kode') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Contoh: SK001"
                           required>
                    @error('kode')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Sanksi -->
                <div>
                    <label for="nama_sanksi" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Sanksi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="nama_sanksi" 
                           name="nama_sanksi" 
                           value="{{ old('nama_sanksi') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Contoh: Denda 50% dari nilai alat"
                           required>
                    @error('nama_sanksi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Penanggung Jawab -->
                <div>
                    <label for="penanggung_jawab" class="block text-sm font-medium text-gray-700 mb-1">
                        Penanggung Jawab <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="penanggung_jawab" 
                           name="penanggung_jawab" 
                           value="{{ old('penanggung_jawab') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           placeholder="Contoh: Kepala Lab"
                           required>
                    @error('penanggung_jawab')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                        Keterangan
                    </label>
                    <textarea id="keterangan" 
                              name="keterangan" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                              placeholder="Tambahkan keterangan atau deskripsi sanksi...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.sanksi.index') }}" 
                   class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span>Batal</span>
                </a>
                <button type="submit" 
                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
