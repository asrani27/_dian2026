<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alat;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alatData = [
            [
                'kode' => 'ALT001',
                'nama' => 'Mikroskop Digital',
                'jenis' => 'Optik',
                'bahan' => 'Logam & Kaca',
                'merk' => 'Olympus',
                'harga' => 15000000,
                'jumlah' => 5,
                'tanggal_beli' => '2024-01-15',
                'keterangan' => 'Mikroskop digital dengan pembesaran 1000x',
            ],
            [
                'kode' => 'ALT002',
                'nama' => 'Oscilloscope',
                'jenis' => 'Elektronik',
                'bahan' => 'Plastik & Logam',
                'merk' => 'Tektronix',
                'harga' => 25000000,
                'jumlah' => 3,
                'tanggal_beli' => '2024-02-20',
                'keterangan' => 'Oscilloscope 2 channel digital',
            ],
            [
                'kode' => 'ALT003',
                'nama' => 'Multimeter Digital',
                'jenis' => 'Elektronik',
                'bahan' => 'Plastik',
                'merk' => 'Fluke',
                'harga' => 2500000,
                'jumlah' => 10,
                'tanggal_beli' => '2024-03-10',
                'keterangan' => 'Multimeter digital auto-ranging',
            ],
            [
                'kode' => 'ALT004',
                'nama' => 'Power Supply',
                'jenis' => 'Elektronik',
                'bahan' => 'Logam',
                'merk' => 'Keysight',
                'harga' => 8000000,
                'jumlah' => 4,
                'tanggal_beli' => '2024-01-25',
                'keterangan' => 'Power supply DC 30V 5A',
            ],
            [
                'kode' => 'ALT005',
                'nama' => 'Function Generator',
                'jenis' => 'Elektronik',
                'bahan' => 'Plastik & Logam',
                'merk' => 'Rigol',
                'harga' => 12000000,
                'jumlah' => 2,
                'tanggal_beli' => '2024-04-05',
                'keterangan' => 'Function generator 20MHz',
            ],
            [
                'kode' => 'ALT006',
                'nama' => 'Spectrophotometer',
                'jenis' => 'Optik',
                'bahan' => 'Logam & Kaca',
                'merk' => 'Shimadzu',
                'harga' => 45000000,
                'jumlah' => 2,
                'tanggal_beli' => '2024-02-15',
                'keterangan' => 'UV-Vis Spectrophotometer',
            ],
            [
                'kode' => 'ALT007',
                'nama' => 'Centrifuge',
                'jenis' => 'Mekanik',
                'bahan' => 'Logam & Plastik',
                'merk' => 'Eppendorf',
                'harga' => 35000000,
                'jumlah' => 3,
                'tanggal_beli' => '2024-03-20',
                'keterangan' => 'Centrifuge 15000 rpm',
            ],
            [
                'kode' => 'ALT008',
                'nama' => 'pH Meter',
                'jenis' => 'Elektronik',
                'bahan' => 'Plastik',
                'merk' => 'Hanna',
                'harga' => 3000000,
                'jumlah' => 8,
                'tanggal_beli' => '2024-04-10',
                'keterangan' => 'pH meter digital portable',
            ],
        ];

        foreach ($alatData as $data) {
            Alat::create($data);
        }

        $this->command->info('Sample alat data created successfully!');
    }
}
