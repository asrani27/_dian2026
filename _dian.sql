/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80043 (8.0.43)
 Source Host           : localhost:3306
 Source Schema         : _dian

 Target Server Type    : MySQL
 Target Server Version : 80043 (8.0.43)
 File Encoding         : 65001

 Date: 05/01/2026 15:20:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alat
-- ----------------------------
DROP TABLE IF EXISTS `alat`;
CREATE TABLE `alat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal_beli` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alat_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alat
-- ----------------------------
BEGIN;
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'ALT001', 'Mikroskop Digital', 'Optik', 'Logam & Kaca', 'Olympus', 15000000, 5, '2024-01-15', 'Mikroskop digital dengan pembesaran 1000x', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'ALT002', 'Oscilloscope', 'Elektronik', 'Plastik & Logam', 'Tektronix', 25000000, 3, '2024-02-20', 'Oscilloscope 2 channel digital', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'ALT003', 'Multimeter Digital', 'Elektronik', 'Plastik', 'Fluke', 2500000, 10, '2024-03-10', 'Multimeter digital auto-ranging', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'ALT004', 'Power Supply', 'Elektronik', 'Logam', 'Keysight', 8000000, 4, '2024-01-25', 'Power supply DC 30V 5A', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'ALT005', 'Function Generator', 'Elektronik', 'Plastik & Logam', 'Rigol', 12000000, 2, '2024-04-05', 'Function generator 20MHz', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'ALT006', 'Spectrophotometer', 'Optik', 'Logam & Kaca', 'Shimadzu', 45000000, 2, '2024-02-15', 'UV-Vis Spectrophotometer', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (7, 'ALT007', 'Centrifuge', 'Mekanik', 'Logam & Plastik', 'Eppendorf', 35000000, 5, '2024-03-20', 'Centrifuge 15000 rpm', '2026-01-05 06:58:02', '2026-01-05 07:11:51');
INSERT INTO `alat` (`id`, `kode`, `nama`, `jenis`, `bahan`, `merk`, `harga`, `jumlah`, `tanggal_beli`, `keterangan`, `created_at`, `updated_at`) VALUES (8, 'ALT008', 'pH Meter', 'Elektronik', 'Plastik', 'Hanna', 3000000, 8, '2024-04-10', 'pH meter digital portable', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_kuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of dosen
-- ----------------------------
BEGIN;
INSERT INTO `dosen` (`id`, `nik`, `nama`, `jkel`, `jabatan`, `mata_kuliah`, `semester`, `keterangan`, `created_at`, `updated_at`) VALUES (1, '198001012001121001', 'Dr. Ir. Bambang Susilo, M.T.', 'L', 'Lektor Kepala', 'Elektronika Dasar', 'Ganjil', 'Kaprodi Teknik Elektro', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `dosen` (`id`, `nik`, `nama`, `jkel`, `jabatan`, `mata_kuliah`, `semester`, `keterangan`, `created_at`, `updated_at`) VALUES (2, '198203152002123002', 'Prof. Dr. Sri Rahayu, M.Si.', 'P', 'Profesor', 'Kimia Analitik', 'Genap', 'Kaprodi Teknik Kimia', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `dosen` (`id`, `nik`, `nama`, `jkel`, `jabatan`, `mata_kuliah`, `semester`, `keterangan`, `created_at`, `updated_at`) VALUES (3, '197507201998031003', 'Ir. Ahmad Wijaya, M.Eng.', 'L', 'Lektor', 'Mekanika Fluida', 'Ganjil', 'Dosen Tetap', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `dosen` (`id`, `nik`, `nama`, `jkel`, `jabatan`, `mata_kuliah`, `semester`, `keterangan`, `created_at`, `updated_at`) VALUES (4, '198012152005011004', 'Dr. Dewi Kartika, S.T., M.Kom.', 'P', 'Lektor Kepala', 'Pemrograman Web', 'Genap', 'Kaprodi Teknik Informatika', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `dosen` (`id`, `nik`, `nama`, `jkel`, `jabatan`, `mata_kuliah`, `semester`, `keterangan`, `created_at`, `updated_at`) VALUES (5, '197305201998031005', 'Prof. Ir. Hendro Wibowo, Ph.D.', 'L', 'Profesor', 'Struktur Beton', 'Ganjil', 'Kaprodi Teknik Sipil', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
BEGIN;
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (1, '2021001', 'Ahmad Sugiarto', 'L', 'Teknik Elektro', '081234567890', 'Jl. Merdeka No. 123, Jakarta', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (2, '2021002', 'Siti Nurhaliza', 'P', 'Teknik Kimia', '082234567891', 'Jl. Sudirman No. 456, Bandung', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (3, '2021003', 'Budi Santoso', 'L', 'Teknik Mesin', '083334567892', 'Jl. Gatot Subroto No. 789, Surabaya', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (4, '2021004', 'Dewi Lestari', 'P', 'Teknik Informatika', '084434567893', 'Jl. Thamrin No. 321, Medan', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (5, '2021005', 'Rudi Hermawan', 'L', 'Teknik Sipil', '085534567894', 'Jl. Ahmad Yani No. 654, Semarang', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (6, '2021006', 'Intan Permata', 'P', 'Teknik Elektro', '086634567895', 'Jl. Diponegoro No. 987, Yogyakarta', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (7, '2021007', 'Fajar Nugroho', 'L', 'Teknik Kimia', '087734567896', 'Jl. Pahlawan No. 246, Malang', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jkel`, `program_studi`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (8, '2021008', 'Maya Sari', 'P', 'Teknik Mesin', '088834567897', 'Jl. Sudirman No. 135, Palembang', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2026_01_05_013457_create_alat_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2026_01_05_015252_create_dosen_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2026_01_05_041941_create_mahasiswa_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2026_01_05_042908_create_sanksi_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2026_01_05_045232_create_peminjaman_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2026_01_05_045253_create_peminjaman_detail_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2026_01_05_045259_create_pengembalian_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2026_01_05_051021_make_dosen_id_nullable_in_peminjaman_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` bigint unsigned NOT NULL,
  `dosen_id` bigint unsigned DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('Dipinjam','Dikembalikan','Terlambat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dipinjam',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peminjaman_kode_unique` (`kode`),
  KEY `peminjaman_mahasiswa_id_foreign` (`mahasiswa_id`),
  KEY `peminjaman_dosen_id_foreign` (`dosen_id`),
  CONSTRAINT `peminjaman_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE SET NULL,
  CONSTRAINT `peminjaman_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of peminjaman
-- ----------------------------
BEGIN;
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'PMJ0001', 7, NULL, '2025-12-29', '2026-01-13', 'Dikembalikan', 'Peminjaman untuk praktikum Fisika', '2026-01-05 06:58:02', '2026-01-05 07:11:51');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'PMJ0002', 5, NULL, '2025-12-18', '2026-01-08', 'Dikembalikan', 'Peminjaman untuk praktikum Fisika', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'PMJ0003', 4, 4, '2025-12-14', '2026-01-16', 'Dikembalikan', 'Peminjaman untuk praktikum Biologi', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'PMJ0004', 3, 1, '2026-01-01', '2026-01-18', 'Dipinjam', 'Peminjaman untuk praktikum Biologi', '2026-01-05 06:58:02', '2026-01-05 07:17:20');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'PMJ0005', 8, NULL, '2025-12-25', '2026-01-18', 'Dipinjam', 'Peminjaman untuk praktikum Kimia', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'PMJ0006', 6, 4, '2025-12-28', '2026-01-17', 'Dipinjam', 'Peminjaman untuk praktikum Biologi', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (7, 'PMJ0007', 2, NULL, '2025-12-27', '2026-01-10', 'Dipinjam', 'Peminjaman untuk praktikum Kimia', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (8, 'PMJ0008', 7, NULL, '2025-12-09', '2026-01-18', 'Dipinjam', 'Peminjaman untuk praktikum Fisika', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (9, 'PMJ0009', 4, 1, '2025-12-07', '2026-01-15', 'Dipinjam', 'Peminjaman untuk praktikum Biologi', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman` (`id`, `kode`, `mahasiswa_id`, `dosen_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (10, 'PMJ0010', 8, NULL, '2025-12-12', '2026-01-15', 'Dipinjam', 'Peminjaman untuk praktikum Kimia', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

-- ----------------------------
-- Table structure for peminjaman_detail
-- ----------------------------
DROP TABLE IF EXISTS `peminjaman_detail`;
CREATE TABLE `peminjaman_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned NOT NULL,
  `alat_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi_awal` enum('Baik','Rusak Ringan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Baik',
  `kondisi_kembali` enum('Baik','Rusak Ringan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_detail_peminjaman_id_foreign` (`peminjaman_id`),
  KEY `peminjaman_detail_alat_id_foreign` (`alat_id`),
  CONSTRAINT `peminjaman_detail_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjaman_detail_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of peminjaman_detail
-- ----------------------------
BEGIN;
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (1, 1, 7, 2, 'Baik', 'Baik', '2026-01-05 06:58:02', '2026-01-05 07:11:51');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (2, 2, 6, 4, 'Baik', 'Baik', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (3, 3, 4, 5, 'Rusak Ringan', 'Rusak Ringan', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (4, 3, 5, 4, 'Baik', 'Baik', '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (5, 4, 2, 2, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (6, 4, 3, 4, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (7, 4, 5, 2, 'Rusak Ringan', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (8, 5, 7, 1, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (9, 6, 4, 3, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (10, 6, 7, 1, 'Rusak Ringan', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (11, 7, 5, 2, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (12, 8, 5, 1, 'Rusak Ringan', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (13, 9, 1, 3, 'Rusak Ringan', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (14, 9, 6, 4, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (15, 9, 7, 4, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (16, 10, 1, 3, 'Rusak Ringan', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (17, 10, 2, 1, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `peminjaman_detail` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `kondisi_awal`, `kondisi_kembali`, `created_at`, `updated_at`) VALUES (18, 10, 6, 3, 'Baik', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

-- ----------------------------
-- Table structure for pengembalian
-- ----------------------------
DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE `pengembalian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `denda` int NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengembalian_peminjaman_id_foreign` (`peminjaman_id`),
  CONSTRAINT `pengembalian_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengembalian
-- ----------------------------
BEGIN;
INSERT INTO `pengembalian` (`id`, `peminjaman_id`, `tanggal_dikembalikan`, `denda`, `catatan`, `created_at`, `updated_at`) VALUES (1, 1, '2026-01-05', 0, NULL, '2026-01-05 07:11:51', '2026-01-05 07:11:51');
COMMIT;

-- ----------------------------
-- Table structure for sanksi
-- ----------------------------
DROP TABLE IF EXISTS `sanksi`;
CREATE TABLE `sanksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sanksi_kode_unique` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sanksi
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Administrator', 'admin', '$2y$12$vo01vBeuvRTNN2M8fy0CnO0CCJiSQKf7j6FenXgj6xIZqTIgw19aG', 'admin', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Lab Manager', 'manager', '$2y$12$M7GSVBgWpgqaZbjUXxTpmuSjCYX6onV5UUmi8DwbRB469NGtOmMiS', 'manager', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Student User', 'student', '$2y$12$478Fdrk/YdLBboEVNlgJMu/eTOgOkcLeaxNwqs6XnmGg7ERHIAMKW', 'user', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'Staff User', 'staff', '$2y$12$42zACkmSsKkG.mbEx8ELX.1Yj4zRqmh1Blb2/3H2Sr512NIeFo6uW', 'user', NULL, '2026-01-05 06:58:02', '2026-01-05 06:58:02');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
