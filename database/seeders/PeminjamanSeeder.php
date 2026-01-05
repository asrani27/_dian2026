<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Alat;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing data
        $alat = Alat::pluck('id')->toArray();
        $mahasiswa = Mahasiswa::pluck('id')->toArray();
        $dosen = Dosen::pluck('id')->toArray();

        if (empty($alat) || empty($mahasiswa)) {
            $this->command->warn('Please seed alat and mahasiswa data first!');
            return;
        }

        // Create sample peminjaman data
        for ($i = 1; $i <= 10; $i++) {
            $peminjamanData = [
                'kode' => 'PMJ' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'mahasiswa_id' => $mahasiswa[array_rand($mahasiswa)],
                'tanggal_pinjam' => Carbon::now()->subDays(rand(1, 30)),
                'tanggal_kembali' => Carbon::now()->addDays(rand(1, 14)),
                'status' => ['Dipinjam', 'Dikembalikan'][array_rand(['Dipinjam', 'Dikembalikan'])],
                'keterangan' => 'Peminjaman untuk praktikum ' . ['Fisika', 'Kimia', 'Biologi'][array_rand(['Fisika', 'Kimia', 'Biologi'])],
            ];
            
            // Only add dosen_id if it exists
            if ($i % 3 == 0 && !empty($dosen)) {
                $peminjamanData['dosen_id'] = $dosen[array_rand($dosen)];
            }
            
            $peminjaman = Peminjaman::create($peminjamanData);

            // Create peminjaman details
            $numAlat = min(count($alat), rand(1, 3));
            $selectedAlat = array_rand($alat, $numAlat);
            if (!is_array($selectedAlat)) {
                $selectedAlat = [$selectedAlat];
            }

            foreach ($selectedAlat as $alatId) {
                PeminjamanDetail::create([
                    'peminjaman_id' => $peminjaman->id,
                    'alat_id' => $alat[$alatId],
                    'jumlah' => rand(1, 5),
                    'kondisi_awal' => ['Baik', 'Rusak Ringan'][array_rand(['Baik', 'Rusak Ringan'])],
                    'kondisi_kembali' => $peminjaman->status == 'Dikembalikan' ? 
                        ['Baik', 'Rusak Ringan'][array_rand(['Baik', 'Rusak Ringan'])] : null,
                ]);
            }
        }

        $this->command->info('Sample peminjaman data created successfully!');
    }
}
