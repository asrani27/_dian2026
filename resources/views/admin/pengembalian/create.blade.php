@extends('layouts.app')

@section('page-title', 'Tambah Pengembalian')
@section('page-description', 'Form tambah data pengembalian alat laboratorium')

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
                <h2 class="text-xl font-semibold text-gray-900">Tambah Pengembalian Baru</h2>
                <p class="text-gray-600 mt-1">Isi form untuk menambahkan data pengembalian alat</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <form action="{{ route('admin.pengembalian.store') }}" method="POST">
            @csrf
            
            <!-- Pilih Peminjaman -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pilih Data Peminjaman
                </h3>
                <div>
                    <label for="peminjaman_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Peminjaman <span class="text-red-500">*</span>
                    </label>
                    <select name="peminjaman_id" id="peminjaman_id" required onchange="loadPeminjamanDetails(this.value)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Peminjaman --</option>
                        @foreach ($peminjaman as $pinjam)
                        <option value="{{ $pinjam->id }}" {{ old('peminjaman_id') == $pinjam->id ? 'selected' : '' }}>
                            {{ $pinjam->kode }} - {{ $pinjam->mahasiswa->nama ?? $pinjam->dosen->nama }} ({{ $pinjam->tanggal_pinjam->format('d/m/Y') }})
                        </option>
                        @endforeach
                    </select>
                    @error('peminjaman_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Detail Peminjaman (Hidden, akan dimuat via JavaScript) -->
            <div id="peminjaman-details" class="hidden mb-8">
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
                            <tbody id="alat-details-tbody">
                                <!-- akan dimuat via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Pengembalian -->
            <div id="pengembalian-form" class="hidden mb-8">
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
                            value="{{ old('tanggal_dikembalikan', date('Y-m-d')) }}"
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
                            value="{{ old('denda', 0) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('denda')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Kondisi Pengembalian Alat -->
            <div id="kondisi-form" class="hidden mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Kondisi Pengembalian Alat
                </h3>
                <div id="kondisi-container" class="space-y-4">
                    <!-- akan dimuat via JavaScript -->
                </div>
            </div>

            <!-- Keterangan -->
            <div id="keterangan-form" class="hidden mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Keterangan
                </h3>
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                    <textarea name="catatan" id="catatan" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('catatan') }}</textarea>
                    @error('catatan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div id="action-buttons" class="hidden flex justify-end space-x-4">
                <a href="{{ route('admin.pengembalian.index') }}" 
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-emerald-600 text-white rounded-lg hover:from-blue-700 hover:to-emerald-700 transition-all duration-200">
                    Simpan Pengembalian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const peminjamanData = @json($peminjaman->load(['mahasiswa', 'dosen', 'peminjamanDetails.alat']));

function loadPeminjamanDetails(peminjamanId) {
    if (!peminjamanId) {
        hideAllForms();
        return;
    }

    const peminjaman = peminjamanData.find(p => p.id == peminjamanId);
    if (!peminjaman) return;

    // Show peminjaman details
    showPeminjamanDetails(peminjaman);
    
    // Show forms
    document.getElementById('pengembalian-form').classList.remove('hidden');
    document.getElementById('kondisi-form').classList.remove('hidden');
    document.getElementById('keterangan-form').classList.remove('hidden');
    document.getElementById('action-buttons').classList.remove('hidden');

    // Load kondisi form
    loadKondisiForm(peminjaman.peminjaman_details);
}

function showPeminjamanDetails(peminjaman) {
    const detailsDiv = document.getElementById('peminjaman-details');
    detailsDiv.classList.remove('hidden');
    
    const tbody = document.getElementById('alat-details-tbody');
    tbody.innerHTML = '';

    peminjaman.peminjaman_details.forEach(detail => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-4 py-2 whitespace-nowrap">
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    ${detail.alat.kode}
                </span>
            </td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">${detail.alat.nama}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">${detail.jumlah} unit</td>
            <td class="px-4 py-2 whitespace-nowrap">
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                    ${detail.kondisi_awal === 'Baik' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                    ${detail.kondisi_awal}
                </span>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function loadKondisiForm(details) {
    const container = document.getElementById('kondisi-container');
    container.innerHTML = '';

    details.forEach(detail => {
        const kondisiItem = document.createElement('div');
        kondisiItem.className = 'border border-gray-200 rounded-lg p-4';
        kondisiItem.innerHTML = `
            <div class="flex items-center justify-between mb-3">
                <h4 class="font-medium text-gray-900">${detail.alat.kode} - ${detail.alat.nama}</h4>
                <span class="text-sm text-gray-500">${detail.jumlah} unit</span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kondisi Kembali <span class="text-red-500">*</span>
                </label>
                <select name="kondisi_kembali[${detail.id}]" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                </select>
            </div>
            <input type="hidden" name="detail_ids[]" value="${detail.id}">
        `;
        container.appendChild(kondisiItem);
    });
}

function hideAllForms() {
    document.getElementById('peminjaman-details').classList.add('hidden');
    document.getElementById('pengembalian-form').classList.add('hidden');
    document.getElementById('kondisi-form').classList.add('hidden');
    document.getElementById('keterangan-form').classList.add('hidden');
    document.getElementById('action-buttons').classList.add('hidden');
}

// Load initial data if editing
document.addEventListener('DOMContentLoaded', function() {
    const selectedId = document.getElementById('peminjaman_id').value;
    if (selectedId) {
        loadPeminjamanDetails(selectedId);
    }
});
</script>
@endsection
