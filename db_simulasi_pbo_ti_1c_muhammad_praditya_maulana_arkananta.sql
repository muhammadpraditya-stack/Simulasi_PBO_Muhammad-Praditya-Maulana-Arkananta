-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti 1c_muhammad praditya maulana arkananta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(150) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMA Negeri 1 Cilacap', '85.50', '300000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Rina Lestari', 'SMK Negeri 2 Purwokerto', '78.40', '300000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Budi Setiawan', 'SMA Negeri 3 Yogyakarta', '82.10', '300000.00', 'Reguler', 'Teknik Elektro', 'Kampus Kota', NULL, NULL, NULL, NULL),
(4, 'Dewi Utami', 'MAN 1 Banyumas', '88.00', '300000.00', 'Reguler', 'Akuntansi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Fajar Nugroho', 'SMA Negeri 1 Purbalingga', '75.90', '300000.00', 'Reguler', 'Manajemen', 'Kampus Kota', NULL, NULL, NULL, NULL),
(6, 'Siti Aminah', 'SMA Muhammadiyah 1', '80.25', '300000.00', 'Reguler', 'Teknik Sipil', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Hendra Wijaya', 'SMK Kebon Jeruk', '83.70', '300000.00', 'Reguler', 'Ilmu Komunikasi', 'Kampus Kota', NULL, NULL, NULL, NULL),
(8, 'Gilang Permana', 'SMA Negeri 1 Cilacap', '92.00', '200000.00', 'Prestasi', NULL, NULL, 'Juara 1 Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Clarissa Putri', 'SMA Kristen 1', '94.50', '200000.00', 'Prestasi', NULL, NULL, 'Juara 2 Lomba Karya Ilmiah', 'Provinsi', NULL, NULL),
(10, 'Eko Prasetyo', 'SMA Negeri 5 Semarang', '89.10', '200000.00', 'Prestasi', NULL, NULL, 'Medali Emas Pencak Silat Popda', 'Provinsi', NULL, NULL),
(11, 'Nadia Safitri', 'SMK Negeri 1 Yogyakarta', '91.30', '200000.00', 'Prestasi', NULL, NULL, 'Juara 1 LKS Web Technologies', 'Nasional', NULL, NULL),
(12, 'Rizky Ramadhan', 'SMA Negeri 2 Surabaya', '95.00', '200000.00', 'Prestasi', NULL, NULL, 'Juara 3 Olimpiade Fisika', 'Internasional', NULL, NULL),
(13, 'Amanda Citra', 'MAN 2 Jakarta', '90.80', '200000.00', 'Prestasi', NULL, NULL, 'Juara 1 Hafiz Qur’an 20 Juz', 'Nasional', NULL, NULL),
(14, 'Dimas Saputra', 'SMA Negeri 1 Solo', '88.50', '200000.00', 'Prestasi', NULL, NULL, 'Juara 1 Pemilihan Pelajar Pelopor', 'Kabupaten', NULL, NULL),
(15, 'Aditya Pratama', 'SMA Taruna Nusantara', '86.50', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-001', 'Kementerian Perhubungan'),
(16, 'Putri Rahayu', 'SMA Negeri 1 Cilacap', '89.20', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-002', 'Badan Siber dan Sandi Negara'),
(17, 'Rian Hidayat', 'SMA Negeri 3 Semarang', '84.80', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-003', 'Dinas Kominfo Provinsi'),
(18, 'Sania Mirza', 'MAN 1 Yogyakarta', '87.30', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-004', 'Kementerian Dalam Negeri'),
(19, 'Yusuf Bahtiar', 'SMK Negeri 1 Purwokerto', '83.15', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-005', 'PT Kereta Api Indonesia'),
(20, 'Fitriani', 'SMA Negeri 1 Kebumen', '90.10', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-006', 'Kementerian Keuangan'),
(21, 'Bambang Pamungkas', 'SMA Krida Nusantara', '85.00', '400000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS-2026-007', 'Kementerian Pertahanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
