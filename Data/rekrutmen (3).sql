-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 08:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutmen`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sf_tampil_siswa_kelas` (`p_kelas` INT) RETURNS INT(11) DETERMINISTIC BEGIN
DECLARE jml INT;
SELECT COUNT(*) AS jml_kelas INTO jml FROM pelamar;
RETURN jml;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_test`
--

CREATE TABLE `jadwal_test` (
  `jadwal_id` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `tgl_test` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_test`
--

INSERT INTO `jadwal_test` (`jadwal_id`, `keterangan`, `tgl_test`) VALUES
(1, 'Test Penerimaan Kandidat IT Programmer', '2021-01-21'),
(2, 'Test Penerimaan Kandidat IT Jaringan', '2021-01-29'),
(3, 'Staff Administrasi', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `klien_id` int(3) NOT NULL,
  `nm_klien` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `no_fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_login` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `no_daftar` varchar(8) NOT NULL,
  `nm_pelamar` varchar(30) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) DEFAULT NULL,
  `status_kawin` varchar(25) DEFAULT NULL,
  `pendidikan` varchar(5) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `universitas` varchar(30) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `pengalaman` text DEFAULT NULL,
  `posisi_id` int(8) NOT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `keterangan_sehat` binary(20) DEFAULT NULL,
  `skck` binary(20) DEFAULT NULL,
  `ktp` binary(20) DEFAULT NULL,
  `user_login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `nilai_tes` int(3) DEFAULT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  `tgl_koreksi` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`no_daftar`, `nm_pelamar`, `alamat`, `no_telp`, `no_ktp`, `email`, `jenis_kelamin`, `status_kawin`, `pendidikan`, `jurusan`, `universitas`, `foto`, `pengalaman`, `posisi_id`, `tmp_lahir`, `tgl_lahir`, `keterangan_sehat`, `skck`, `ktp`, `user_login`, `password`, `status`, `nilai_tes`, `tgl_buat`, `tgl_koreksi`) VALUES
('R2101001', 'Risnandar Arif', 'Jl. H. Subuh No. 103 RT 003 RW 001 Kel. Cilandak Timur Kec. Pasar Minggu', '088293239600', '3175100309760001', 'risnandar.arif@gmail.com', 1, 'Kawin', 'D3', 'Manajemen Informatika', 'BSI', 'SISDM  Pelamar.pdf', '', 1, 'Bogor', '1976-09-03', NULL, NULL, NULL, 'risnandar', '202cb962ac59075b964b07152d234b70', 'Diterima', 40, '2021-01-21 02:53:49', '2021-01-21 02:53:49'),
('R2101002', 'Zaenal Maksum', 'Jl. Ampera Raya', '089888727277', '31750228828828', '', 1, 'Kawin', 'S1', 'Sistem Informasi', '', NULL, '', 1, '', '1994-06-22', NULL, NULL, NULL, 'zaenal', '202cb962ac59075b964b07152d234b70', 'Ditolak', 50, '2021-01-19 13:49:49', '2021-01-19 13:49:49'),
('R2101003', 'Tatiana Dewi', 'Jl. H. Binjay No. 103', '088594782990', '3174200308900003', 'tatiana@gmail.com', 0, 'Lajang', 'D3', 'Komputer Akuntansi', 'Islam Yogyakarta', '023154.pdf', '', 1, 'Yogyakarta', '1994-07-26', NULL, NULL, NULL, 'tatiana', '202cb962ac59075b964b07152d234b70', 'Diterima', 50, '2021-01-20 09:53:30', '2021-01-20 09:53:30'),
('R2101004', 'Alwenda Jakemo Silalahi', 'Jl. Tanah Suci No. 109, Norwegia Bagian Utara', '081278781919', '3177900709780009', 'alwenda.sangpenakluk@gmail.com', 0, 'Lajang', 'S1', 'Teknik Komputer', 'Parahyangan', NULL, '', 2, 'Medan', '1995-12-14', NULL, NULL, NULL, 'alwenda', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2021-01-21 03:02:14', '2021-01-21 03:02:14'),
('R2101005', 'Esterlina', 'Jl Pejaten Barat', '08945678912', '45789908999233', 'esterlina@gmail.com', 0, 'Lajang', 'D3', 'Ekonomi', 'Bina Sarana Informatika', NULL, '', 4, '', '1990-06-12', NULL, NULL, NULL, 'esterlina', '202cb962ac59075b964b07152d234b70', 'Ditolak', 50, '2021-01-21 04:34:46', '2021-01-21 04:34:46'),
('R2101006', 'andi', 'Jl Ampera raya', '089894788888', '0898947888889899', 'andi@gmail.com', 1, 'Lajang', 'D3', '', '', NULL, '', 1, 'Cirebon', '2021-01-13', NULL, NULL, NULL, 'andi', '202cb962ac59075b964b07152d234b70', NULL, 30, '2021-01-21 07:42:03', '2021-01-21 07:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `pengaturan_id` int(11) NOT NULL,
  `nm_pengaturan` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`pengaturan_id`, `nm_pengaturan`, `nilai`) VALUES
(1, 'no_daftar', '6');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `posisi_id` int(3) NOT NULL,
  `nm_posisi` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `klien_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`posisi_id`, `nm_posisi`, `keterangan`, `status`, `klien_id`) VALUES
(1, 'Web Programmer', 'Dibutuhkan S1 Sistem Informasi', 1, 1),
(2, 'Teknisi Jaringan', 'Dibutuhkan S1 Teknik Komputer, Laki-laki maks. umur 35th', 1, 0),
(3, 'Sales Operation', 'Sales', 0, 0),
(4, 'Staff Administrasi ', 'Administrasi', 1, 0),
(5, 'Staff Logistik', 'Logistik', 0, 0),
(6, 'Sekretaris', 'Sekretaris', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawab_a` text NOT NULL,
  `jawab_b` text NOT NULL,
  `jawab_c` text NOT NULL,
  `jawab_d` text NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soal_id`, `pertanyaan`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `jawaban`, `bobot`) VALUES
(1, 'INSOMNIA = ...', 'Cemas', 'Sedih', 'Tidak bisa tidur', 'Kenyataanya', 'C', 10),
(2, 'BONGSOR = &hellip;', 'Menumpuk', 'Kerdil', 'Macet', 'Susut', 'B', 10),
(3, 'Mobil &ndash; Bensin = Pelari &ndash; &hellip;.', 'Makanan', 'Sepatu', 'Lintasan', 'Lelah', 'A', 10),
(4, '1 24 20 16 12 = &hellip;', '6', '8', '4', '2', 'B', 10),
(5, 'September : Agustus = Mei :  ...', 'Bulan', 'Musim', 'April', 'Juli', 'C', 10),
(6, 'Suatu seri : 100-4-90-7-80 seri selanjutnya adalah&hellip;', '8', '9', '10', '11', 'C', 10),
(7, 'Renovasi =', 'Pemagaran', 'Pemugaran', 'Pembongkaran', 'Peningkatan', 'B', 10),
(8, 'Pakar', 'Awam', 'Cendekia', 'Mahir', 'Spesialis', 'A', 10),
(9, 'September : Agustus = Mei : &hellip;&hellip;..', 'Bulan', 'Musim', 'Juli', 'Mei', 'D', 10),
(10, 'PANCING : IKAN = BEDIL : &hellip;&hellip;.', 'Buruan', 'Peluru', 'Umpan', 'Pelatuk', 'A', 10);

-- --------------------------------------------------------

--
-- Table structure for table `table_nilai`
--

CREATE TABLE `table_nilai` (
  `id` int(11) NOT NULL,
  `order` int(1) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_nilai`
--

INSERT INTO `table_nilai` (`id`, `order`, `nama`, `nilai`) VALUES
(2, 1, 'Joko', '30'),
(2, 2, 'Joko', '10'),
(3, 1, 'Soleh', '40'),
(1, 1, 'Udin', '80'),
(3, 2, 'Soleh', '50'),
(1, 2, 'Udin', '40');

-- --------------------------------------------------------

--
-- Table structure for table `test_online`
--

CREATE TABLE `test_online` (
  `no_daftar` varchar(8) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `jadwal_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_online`
--

INSERT INTO `test_online` (`no_daftar`, `soal_id`, `jawaban`, `jadwal_id`) VALUES
('R2101001', 1, 'C', 1),
('R2101001', 2, 'A', 1),
('R2101001', 3, 'A', 1),
('R2101001', 4, 'B', 1),
('R2101001', 5, 'C', 1),
('R2101002', 1, 'C', 1),
('R2101002', 2, 'B', 1),
('R2101002', 3, 'A', 1),
('R2101002', 4, 'B', 1),
('R2101002', 5, 'C', 1),
('R2101003', 1, 'C', 1),
('R2101003', 2, 'B', 1),
('R2101003', 3, 'A', 1),
('R2101003', 4, 'B', 1),
('R2101003', 5, 'C', 1),
('R2101005', 1, '', 3),
('R2101005', 2, 'B', 3),
('R2101005', 3, 'C', 3),
('R2101005', 4, 'B', 3),
('R2101005', 5, 'C', 3),
('R2101005', 6, 'D', 3),
('R2101005', 7, 'B', 3),
('R2101005', 8, 'A', 3),
('R2101005', 9, 'C', 3),
('R2101005', 10, 'B', 3),
('R2101006', 1, 'D', 1),
('R2101006', 2, 'C', 1),
('R2101006', 3, 'C', 1),
('R2101006', 4, 'B', 1),
('R2101006', 5, 'D', 1),
('R2101006', 6, 'D', 1),
('R2101006', 7, 'B', 1),
('R2101006', 8, 'A', 1),
('R2101006', 9, 'B', 1),
('R2101006', 10, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nm_user` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nm_user`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'hakim', 'c96041081de85714712a79319cb2be5f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`pengaturan_id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`posisi_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `pengaturan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `posisi_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
