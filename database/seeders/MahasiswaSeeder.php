<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = [
            [
                'nim' => '2021001',
                'nama' => 'Ahmad Sugiarto',
                'jkel' => 'L',
                'program_studi' => 'Teknik Elektro',
                'telp' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            ],
            [
                'nim' => '2021002',
                'nama' => 'Siti Nurhaliza',
                'jkel' => 'P',
                'program_studi' => 'Teknik Kimia',
                'telp' => '082234567891',
                'alamat' => 'Jl. Sudirman No. 456, Bandung',
            ],
            [
                'nim' => '2021003',
                'nama' => 'Budi Santoso',
                'jkel' => 'L',
                'program_studi' => 'Teknik Mesin',
                'telp' => '083334567892',
                'alamat' => 'Jl. Gatot Subroto No. 789, Surabaya',
            ],
            [
                'nim' => '2021004',
                'nama' => 'Dewi Lestari',
                'jkel' => 'P',
                'program_studi' => 'Teknik Informatika',
                'telp' => '084434567893',
                'alamat' => 'Jl. Thamrin No. 321, Medan',
            ],
            [
                'nim' => '2021005',
                'nama' => 'Rudi Hermawan',
                'jkel' => 'L',
                'program_studi' => 'Teknik Sipil',
                'telp' => '085534567894',
                'alamat' => 'Jl. Ahmad Yani No. 654, Semarang',
            ],
            [
                'nim' => '2021006',
                'nama' => 'Intan Permata',
                'jkel' => 'P',
                'program_studi' => 'Teknik Elektro',
                'telp' => '086634567895',
                'alamat' => 'Jl. Diponegoro No. 987, Yogyakarta',
            ],
            [
                'nim' => '2021007',
                'nama' => 'Fajar Nugroho',
                'jkel' => 'L',
                'program_studi' => 'Teknik Kimia',
                'telp' => '087734567896',
                'alamat' => 'Jl. Pahlawan No. 246, Malang',
            ],
            [
                'nim' => '2021008',
                'nama' => 'Maya Sari',
                'jkel' => 'P',
                'program_studi' => 'Teknik Mesin',
                'telp' => '088834567897',
                'alamat' => 'Jl. Sudirman No. 135, Palembang',
            ],
        ];

        foreach ($mahasiswaData as $data) {
            Mahasiswa::create($data);
        }

        $this->command->info('Sample mahasiswa data created successfully!');
    }
}
