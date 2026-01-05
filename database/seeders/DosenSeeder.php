<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            [
                'nik' => '198001012001121001',
                'nama' => 'Dr. Ir. Bambang Susilo, M.T.',
                'jkel' => 'L',
                'jabatan' => 'Lektor Kepala',
                'mata_kuliah' => 'Elektronika Dasar',
                'semester' => 'Ganjil',
                'keterangan' => 'Kaprodi Teknik Elektro',
            ],
            [
                'nik' => '198203152002123002',
                'nama' => 'Prof. Dr. Sri Rahayu, M.Si.',
                'jkel' => 'P',
                'jabatan' => 'Profesor',
                'mata_kuliah' => 'Kimia Analitik',
                'semester' => 'Genap',
                'keterangan' => 'Kaprodi Teknik Kimia',
            ],
            [
                'nik' => '197507201998031003',
                'nama' => 'Ir. Ahmad Wijaya, M.Eng.',
                'jkel' => 'L',
                'jabatan' => 'Lektor',
                'mata_kuliah' => 'Mekanika Fluida',
                'semester' => 'Ganjil',
                'keterangan' => 'Dosen Tetap',
            ],
            [
                'nik' => '198012152005011004',
                'nama' => 'Dr. Dewi Kartika, S.T., M.Kom.',
                'jkel' => 'P',
                'jabatan' => 'Lektor Kepala',
                'mata_kuliah' => 'Pemrograman Web',
                'semester' => 'Genap',
                'keterangan' => 'Kaprodi Teknik Informatika',
            ],
            [
                'nik' => '197305201998031005',
                'nama' => 'Prof. Ir. Hendro Wibowo, Ph.D.',
                'jkel' => 'L',
                'jabatan' => 'Profesor',
                'mata_kuliah' => 'Struktur Beton',
                'semester' => 'Ganjil',
                'keterangan' => 'Kaprodi Teknik Sipil',
            ],
        ];

        foreach ($dosenData as $data) {
            Dosen::create($data);
        }

        $this->command->info('Sample dosen data created successfully!');
    }
}
