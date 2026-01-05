<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        @page {
            margin: 40px;
            size: A4 landscape;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100px;
            height: 120px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            max-height: 120px;
        }

        .header-content {
            margin-left: 10px;
        }

        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 18px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header p {
            font-size: 12px;
            margin: 3px 0;
        }

        .divider {
            border-top: 2px solid #000;
            padding: 0px 0;
            margin: 0px 0;
        }

        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .table-container {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .no-column {
            width: 5%;
            text-align: center;
        }

        .id-jadwal-column {
            width: 10%;
            text-align: center;
        }

        .nama-instansi-column {
            width: 25%;
        }

        .alamat-column {
            width: 20%;
        }

        .id-tim-column {
            width: 10%;
            text-align: center;
        }

        .tanggal-column {
            width: 12%;
            text-align: center;
        }

        .status-column {
            width: 10%;
            text-align: center;
        }

        .keterangan-column {
            width: 13%;
        }

        .anggota-list {
            margin: 0;
            padding-left: 15px;
        }

        .anggota-list li {
            margin: 2px 0;
        }

        .footer {
            margin-top: 10px;
            text-align: right;
        }

        .signature {
            margin-top: 0px;
            text-align: left;
            width: 200px;
            float: right;
        }

        .signature p {
            margin: 0px 0;
            font-size: 14px;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            height: 30px;
            margin: 10px 0;
        }

        .clear {
            clear: both;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Header Institution Information -->
    <div class="header">
        <div class="logo-container">
            <img src="{{ public_path('logo/stikes.jpg') }}" width="120px">
        </div>
        <div class="header-content">
            <h1>SEKOLAH TINGGI ILMU KESEHATAN</h1>
            <h2>(STIKES) INTAN MARTAPURA</h2>
            <p>Jalan Samadi No 1. Kelurahan Jawa Kecamatan Martapura Kota, Kabupaten Banjar</p>
            <p>Kalimantan Selatan 71213, Telp (0511) 471812</p>
        </div>
    </div>

    <div class="divider"></div>

    <!-- Report Title -->
    <div class="title">
        LAPORAN PEMINJAMAN ALAT
        <p>Periode: {{ $bulanNama }} {{ $tahun }}</p>
    </div>

    <!-- Data Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Kode Peminjaman</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Peminjam</th>
                    <th>Dosen Pembimbing</th>
                    <th>Alat yang Dipinjam</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($peminjaman as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->tanggal_pinjam)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->tanggal_kembali)) }}</td>
                    <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                    <td>{{ $item->dosen->nama ?? '-' }}</td>
                    <td>
                        @foreach ($item->peminjamanDetails as $detail)
                        <div class="alat-item">
                            • {{ $detail->alat->nama }} ({{ $detail->jumlah }} unit)
                        </div>
                        @endforeach
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data peminjaman pada periode ini</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <!-- Footer with Date and Signature -->
    <div class="footer">
        <div class="signature">
            <p>Martapura, {{ isset($tanggal) ? $tanggal : \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y')
                }}</p>
            <p>Kepala Laboratorium</p>
            <br /><br /><br />
            <p><strong>(Muhammad Riduan)</strong></p>
            <hr>
            <p>NIK. 99.034.0316</p>
        </div>
        <div class="clear"></div>
    </div>
</body>

</html>