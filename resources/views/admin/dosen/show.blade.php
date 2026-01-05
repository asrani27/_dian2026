@extends('layouts.app')

@section('page-title', 'Detail Dosen')
@section('page-description', 'Lihat detail lengkap data dosen')

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
                    <a href="{{ route('admin.dosen.index') }}"
                        class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2">Data Dosen</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-500 ml-1 md:ml-2">Detail Dosen</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Detail Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Detail Dosen</h2>
                    <p class="text-gray-600 mt-1">Informasi lengkap data dosen: <span class="font-medium text-blue-600">{{
                            $dosen->nama }}</span></p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.dosen.edit', $dosen->id) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.dosen.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Profile Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-emerald-500 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">{{ strtoupper(substr($dosen->nama, 0, 1)) }}</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $dosen->nama }}</h3>
                            <p class="text-gray-600">{{ $dosen->jabatan }}</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $dosen->jkel == 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                {{ $dosen->jkel == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Information Section -->
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Informasi Pribadi</h4>
                        <dl class="space-y-2">
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-600">NIK:</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $dosen->nik }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-600">Nama:</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $dosen->nama }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-600">Jenis Kelamin:</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $dosen->jkel == 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-600">Jabatan:</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $dosen->jabatan }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="md:col-span-2">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Informasi Akademik</h4>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-600">Mata Kuliah:</dt>
                                <dd class="text-sm font-medium text-gray-900 mt-1">{{ $dosen->mata_kuliah }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-600">Semester:</dt>
                                <dd class="text-sm font-medium text-gray-900 mt-1">{{ $dosen->semester }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Keterangan -->
                @if($dosen->keterangan)
                <div class="md:col-span-2">
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Keterangan</h4>
                        <p class="text-sm text-gray-700">{{ $dosen->keterangan }}</p>
                    </div>
                </div>
                @endif

                <!-- Timestamp Information -->
                <div class="md:col-span-2">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Informasi Waktu</h4>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-600">Dibuat pada:</dt>
                                <dd class="text-sm font-medium text-gray-900 mt-1">{{ $dosen->created_at->format('d F Y, H:i:s') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-600">Terakhir diubah:</dt>
                                <dd class="text-sm font-medium text-gray-900 mt-1">{{ $dosen->updated_at->format('d F Y, H:i:s') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.dosen.index') }}"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Kembali ke Daftar
                </a>
                <a href="{{ route('admin.dosen.edit', $dosen->id) }}"
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-emerald-600 text-white rounded-lg hover:from-blue-700 hover:to-emerald-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
