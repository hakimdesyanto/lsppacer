-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 09:27 AM
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
-- Database: `lsppacer`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `certification_id` int(11) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `assignment_date` date DEFAULT NULL,
  `fisnish_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentd_fieldcode`
--

DROP TABLE IF EXISTS `assignmentd_fieldcode`;
CREATE TABLE `assignmentd_fieldcode` (
  `assignment_id` int(11) DEFAULT NULL,
  `fieldcode_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentd_scope`
--

DROP TABLE IF EXISTS `assignmentd_scope`;
CREATE TABLE `assignmentd_scope` (
  `assignment_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentd_score`
--

DROP TABLE IF EXISTS `assignmentd_score`;
CREATE TABLE `assignmentd_score` (
  `assignment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `education_score` double DEFAULT NULL,
  `training_score` double DEFAULT NULL,
  `audit_experience_score` double DEFAULT NULL,
  `experience_score` double DEFAULT NULL,
  `written_exam_score` double DEFAULT NULL,
  `pratical_exam_score` double DEFAULT NULL,
  `note` text DEFAULT NULL,
  `committee_score` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentd_to`
--

DROP TABLE IF EXISTS `assignmentd_to`;
CREATE TABLE `assignmentd_to` (
  `assignment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audit_experience`
--

DROP TABLE IF EXISTS `audit_experience`;
CREATE TABLE `audit_experience` (
  `audit_experience_id` int(11) NOT NULL,
  `certification_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_addres` text DEFAULT NULL,
  `company_phone` varchar(20) DEFAULT NULL,
  `contact_person` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `doc_audit_plan_path` varchar(100) DEFAULT NULL,
  `doc_work_order_path` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audit_experienced_role`
--

DROP TABLE IF EXISTS `audit_experienced_role`;
CREATE TABLE `audit_experienced_role` (
  `audit_experience_id` int(11) DEFAULT NULL,
  `role_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audit_experienced_scope`
--

DROP TABLE IF EXISTS `audit_experienced_scope`;
CREATE TABLE `audit_experienced_scope` (
  `audit_experience_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

DROP TABLE IF EXISTS `certification`;
CREATE TABLE `certification` (
  `certification_id` int(11) NOT NULL,
  `certification_number` varchar(20) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `certification_type_id` int(11) DEFAULT NULL,
  `level_auditor` varchar(20) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificationd_fieldcode`
--

DROP TABLE IF EXISTS `certificationd_fieldcode`;
CREATE TABLE `certificationd_fieldcode` (
  `certification_id` int(11) DEFAULT NULL,
  `fieldcode_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificationd_scope`
--

DROP TABLE IF EXISTS `certificationd_scope`;
CREATE TABLE `certificationd_scope` (
  `certification_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `certification_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `university` varchar(20) DEFAULT NULL,
  `major` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `certificate_number` varchar(30) DEFAULT NULL,
  `accreditation_status` varchar(5) DEFAULT NULL,
  `doc_path` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `certifation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `doc_path` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(20) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `certification_id` int(11) DEFAULT NULL,
  `discount_percentage` decimal(4,2) DEFAULT NULL,
  `discount_nominal` decimal(4,2) DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `taxnum` varchar(20) DEFAULT NULL,
  `vat` decimal(4,2) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_test`
--

DROP TABLE IF EXISTS `jadwal_test`;
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

DROP TABLE IF EXISTS `klien`;
CREATE TABLE `klien` (
  `klien_id` int(3) NOT NULL,
  `nm_klien` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `no_fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_login` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lsp_menu`
--

DROP TABLE IF EXISTS `lsp_menu`;
CREATE TABLE `lsp_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `menu_title` varchar(50) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_type` int(11) DEFAULT NULL,
  `menu_icon_parent` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lsp_menu`
--

INSERT INTO `lsp_menu` (`menu_id`, `menu_parent`, `menu_title`, `menu_url`, `menu_type`, `menu_icon_parent`, `position`) VALUES
(1, 0, 'Dashboard', '/beranda', 0, 'bx bx-home-circle', 1),
(2, 0, 'Users', '/user', 0, '', 3),
(3, 0, 'Setting', 'Setting', 0, '', 4),
(4, 3, 'Menu Setup', '/MenuSetup/main', 0, '', 1),
(5, 3, 'Role Setup', '/RoleSetup/main', 0, '', 2),
(10, 0, 'Master', 'Master', 0, '', 2),
(11, 10, 'Certification Type', '/CertificationType/main', 0, '', 1),
(12, 10, 'Field Code', '/FieldCode/main', 0, '', 2),
(13, 10, 'Scope', '/Scope/main', 0, '', 3),
(15, 0, 'Certification', 'Certification/main', 0, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lsp_user_nav`
--

DROP TABLE IF EXISTS `lsp_user_nav`;
CREATE TABLE `lsp_user_nav` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lsp_user_nav`
--

INSERT INTO `lsp_user_nav` (`role_id`, `menu_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 15),
(3, 1),
(3, 3),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lsp_user_role`
--

DROP TABLE IF EXISTS `lsp_user_role`;
CREATE TABLE `lsp_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `role_desc` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lsp_user_role`
--

INSERT INTO `lsp_user_role` (`role_id`, `role_name`, `role_desc`, `created_by`, `created_stamp`) VALUES
(1, 'Admin', 'Administrator', 1, '2022-11-01 00:59:12'),
(3, 'stafkeu', 'Staff Keuangan', 1, '2022-11-01 12:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

DROP TABLE IF EXISTS `pelamar`;
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

DROP TABLE IF EXISTS `pengaturan`;
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

DROP TABLE IF EXISTS `posisi`;
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
-- Table structure for table `receipt_invoice`
--

DROP TABLE IF EXISTS `receipt_invoice`;
CREATE TABLE `receipt_invoice` (
  `receipt_id` int(11) NOT NULL,
  `receipt_date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_certification_type`
--

DROP TABLE IF EXISTS `ref_certification_type`;
CREATE TABLE `ref_certification_type` (
  `certification_type_id` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_certification_type`
--

INSERT INTO `ref_certification_type` (`certification_type_id`, `description`, `cost`) VALUES
(1, 'Awal', '2000000.00'),
(2, 'Perpanjangan', '500000.00'),
(3, 'Kenaikan Level', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `ref_district`
--

DROP TABLE IF EXISTS `ref_district`;
CREATE TABLE `ref_district` (
  `district_id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `is_city` tinyint(1) DEFAULT 0,
  `district_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_district`
--

INSERT INTO `ref_district` (`district_id`, `province_id`, `is_city`, `district_name`) VALUES
(1, 1, 0, 'ACEH BARAT'),
(2, 1, 0, 'ACEH BARAT DAYA'),
(3, 1, 0, 'ACEH BESAR'),
(4, 1, 0, 'ACEH JAYA'),
(5, 1, 0, 'ACEH SELATAN'),
(6, 1, 0, 'ACEH SINGKIL'),
(7, 1, 0, 'ACEH TAMIANG'),
(8, 1, 0, 'ACEH TENGAH'),
(9, 1, 0, 'ACEH TENGGARA'),
(10, 1, 0, 'ACEH TIMUR'),
(11, 1, 0, 'ACEH UTARA'),
(12, 3, 0, 'AGAM'),
(13, 19, 0, 'ALOR'),
(14, 30, 0, 'AMBON'),
(15, 2, 0, 'ASAHAN'),
(16, 33, 0, 'ASMAT'),
(17, 17, 0, 'BADUNG'),
(18, 22, 0, 'BALANGAN'),
(19, 23, 0, 'BALIKPAPAN'),
(20, 1, 0, 'BANDA ACEH'),
(21, 8, 0, 'BANDAR LAMPUNG'),
(22, 12, 0, 'BANDUNG'),
(23, 12, 0, 'BANDUNG BARAT'),
(24, 25, 0, 'BANGGAI'),
(25, 25, 0, 'BANGGAI KEPULAUAN'),
(26, 9, 0, 'BANGKA'),
(27, 9, 0, 'BANGKA BARAT'),
(28, 9, 0, 'BANGKA SELATAN'),
(29, 9, 0, 'BANGKA TENGAH'),
(30, 15, 0, 'BANGKALAN'),
(31, 17, 0, 'BANGLI'),
(32, 22, 0, 'BANJAR'),
(33, 22, 0, 'BANJARBARU'),
(34, 22, 0, 'BANJARMASIN'),
(35, 13, 0, 'BANJARNEGARA'),
(36, 26, 0, 'BANTAENG'),
(37, 14, 0, 'BANTUL'),
(38, 6, 0, 'BANYUASIN'),
(39, 13, 0, 'BANYUMAS'),
(40, 15, 0, 'BANYUWANGI'),
(41, 22, 0, 'BARITO KUALA'),
(42, 21, 0, 'BARITO SELATAN'),
(43, 21, 0, 'BARITO TIMUR'),
(44, 21, 0, 'BARITO UTARA'),
(45, 26, 0, 'BARRU'),
(46, 10, 0, 'BATAM'),
(47, 13, 0, 'BATANG'),
(48, 5, 0, 'BATANGHARI'),
(49, 15, 0, 'BATU'),
(50, 2, 0, 'BATUBARA'),
(51, 27, 0, 'BAU-BAU'),
(52, 12, 0, 'BEKASI'),
(53, 9, 0, 'BELITUNG'),
(54, 9, 0, 'BELITUNG TIMUR'),
(55, 19, 0, 'BELU'),
(56, 1, 0, 'BENER MERIAH'),
(57, 4, 0, 'BENGKALIS'),
(58, 20, 0, 'BENGKAYANG'),
(59, 7, 0, 'BENGKULU'),
(60, 7, 0, 'BENGKULU SELATAN'),
(61, 7, 0, 'BENGKULU TENGAH'),
(62, 7, 0, 'BENGKULU UTARA'),
(63, 23, 0, 'BERAU'),
(64, 33, 0, 'BIAK NUMFOR'),
(65, 18, 0, 'BIMA'),
(66, 2, 0, 'BINJAI'),
(67, 10, 0, 'BINTAN'),
(68, 1, 0, 'BIREUEN'),
(69, 24, 0, 'BITUNG'),
(70, 15, 0, 'BLITAR'),
(71, 13, 0, 'BLORA'),
(72, 28, 0, 'BOALEMO'),
(73, 12, 0, 'BOGOR'),
(74, 15, 0, 'BOJONEGORO'),
(75, 24, 0, 'BOLAANG MONGONDOW'),
(76, 24, 0, 'BOLAANG MONGONDOW SELATAN'),
(77, 24, 0, 'BOLAANG MONGONDOW TIMUR'),
(78, 24, 0, 'BOLAANG MONGONDOW UTARA'),
(79, 27, 0, 'BOMBANA'),
(80, 15, 0, 'BONDOWOSO'),
(81, 26, 0, 'BONE'),
(82, 28, 0, 'BONE BOLANGO'),
(83, 23, 0, 'BONTANG'),
(84, 33, 0, 'BOVEN DIGOEL'),
(85, 13, 0, 'BOYOLALI'),
(86, 13, 0, 'BREBES'),
(87, 3, 0, 'BUKITTINGGI'),
(88, 17, 0, 'BULELENG'),
(89, 26, 0, 'BULUKUMBA'),
(90, 23, 0, 'BULUNGAN'),
(91, 5, 0, 'BUNGO'),
(92, 25, 0, 'BUOL'),
(93, 30, 0, 'BURU'),
(94, 30, 0, 'BURU SELATAN'),
(95, 27, 0, 'BUTON'),
(96, 27, 0, 'BUTON UTARA'),
(97, 12, 0, 'CIAMIS'),
(98, 12, 0, 'CIANJUR'),
(99, 13, 0, 'CILACAP'),
(100, 16, 0, 'CILEGON'),
(101, 12, 0, 'CIMAHI'),
(102, 12, 0, 'CIREBON'),
(103, 2, 0, 'DAIRI'),
(104, 33, 0, 'DEIYAI'),
(105, 2, 0, 'DELI SERDANG'),
(106, 13, 0, 'DEMAK'),
(107, 17, 0, 'DENPASAR'),
(108, 12, 0, 'DEPOK'),
(109, 3, 0, 'DHARMASRAYA'),
(110, 33, 0, 'DOGIYAI'),
(111, 18, 0, 'DOMPU'),
(112, 25, 0, 'DONGGALA'),
(113, 4, 0, 'DUMAI'),
(114, 6, 0, 'EMPAT LAWANG'),
(115, 19, 0, 'ENDE'),
(116, 26, 0, 'ENREKANG'),
(117, 32, 0, 'FAKFAK'),
(118, 19, 0, 'FLORES TIMUR'),
(119, 12, 0, 'GARUT'),
(120, 1, 0, 'GAYO LUES'),
(121, 17, 0, 'GIANYAR'),
(122, 28, 0, 'GORONTALO'),
(123, 28, 0, 'GORONTALO UTARA'),
(124, 26, 0, 'GOWA'),
(125, 15, 0, 'GRESIK'),
(126, 13, 0, 'GROBOGAN'),
(127, 14, 0, 'GUNUNG KIDUL'),
(128, 21, 0, 'GUNUNG MAS'),
(129, 2, 0, 'GUNUNGSITOLI'),
(130, 31, 0, 'HALMAHERA BARAT'),
(131, 31, 0, 'HALMAHERA SELATAN'),
(132, 31, 0, 'HALMAHERA TENGAH'),
(133, 31, 0, 'HALMAHERA TIMUR'),
(134, 31, 0, 'HALMAHERA UTARA'),
(135, 22, 0, 'HULU SUNGAI SELATAN'),
(136, 22, 0, 'HULU SUNGAI TENGAH'),
(137, 22, 0, 'HULU SUNGAI UTARA'),
(138, 2, 0, 'HUMBANG HASUNDUTAN'),
(139, 4, 0, 'INDRAGIRI HILIR'),
(140, 4, 0, 'INDRAGIRI HULU'),
(141, 12, 0, 'INDRAMAYU'),
(142, 33, 0, 'INTAN JAYA'),
(143, 11, 0, 'JAKARTA BARAT'),
(144, 11, 0, 'JAKARTA PUSAT'),
(145, 11, 0, 'JAKARTA SELATAN'),
(146, 11, 0, 'JAKARTA TIMUR'),
(147, 11, 0, 'JAKARTA UTARA'),
(148, 5, 0, 'JAMBI'),
(149, 33, 0, 'JAYAPURA'),
(150, 33, 0, 'JAYAPURA'),
(151, 33, 0, 'JAYAWIJAYA'),
(152, 15, 0, 'JEMBER'),
(153, 17, 0, 'JEMBRANA'),
(154, 26, 0, 'JENEPONTO'),
(155, 13, 0, 'JEPARA'),
(156, 15, 0, 'JOMBANG'),
(157, 32, 0, 'KAIMANA'),
(158, 4, 0, 'KAMPAR'),
(159, 21, 0, 'KAPUAS'),
(160, 20, 0, 'KAPUAS HULU'),
(161, 13, 0, 'KARANGANYAR'),
(162, 17, 0, 'KARANGASEM'),
(163, 12, 0, 'KARAWANG'),
(164, 10, 0, 'KARIMUN'),
(165, 2, 0, 'KARO'),
(166, 21, 0, 'KATINGAN'),
(167, 7, 0, 'KAUR'),
(168, 20, 0, 'KAYONG UTARA'),
(169, 13, 0, 'KEBUMEN'),
(170, 15, 0, 'KEDIRI'),
(171, 33, 0, 'KEEROM'),
(172, 13, 0, 'KENDAL'),
(173, 27, 0, 'KENDARI'),
(174, 7, 0, 'KEPAHIANG'),
(175, 10, 0, 'KEPULAUAN ANAMBAS'),
(176, 30, 0, 'KEPULAUAN ARU'),
(177, 3, 0, 'KEPULAUAN MENTAWAI'),
(178, 4, 0, 'KEPULAUAN MERANTI'),
(179, 24, 0, 'KEPULAUAN SANGIHE'),
(180, 26, 0, 'KEPULAUAN SELAYAR'),
(181, 11, 0, 'KEPULAUAN SERIBU'),
(182, 24, 0, 'KEPULAUAN SIAU TAGULANDANG BIARO'),
(183, 31, 0, 'KEPULAUAN SULA'),
(184, 24, 0, 'KEPULAUAN TALAUD'),
(185, 33, 0, 'KEPULAUAN YAPEN'),
(186, 5, 0, 'KERINCI'),
(187, 20, 0, 'KETAPANG'),
(188, 13, 0, 'KLATEN'),
(189, 17, 0, 'KLUNGKUNG'),
(190, 27, 0, 'KOLAKA'),
(191, 27, 0, 'KOLAKA UTARA'),
(192, 27, 0, 'KONAWE'),
(193, 27, 0, 'KONAWE SELATAN'),
(194, 27, 0, 'KONAWE UTARA'),
(195, 22, 0, 'KOTABARU'),
(196, 24, 0, 'KOTAMOBAGU'),
(197, 21, 0, 'KOTAWARINGIN BARAT'),
(198, 21, 0, 'KOTAWARINGIN TIMUR'),
(199, 4, 0, 'KUANTAN SINGINGI'),
(200, 20, 0, 'KUBU RAYA'),
(201, 13, 0, 'KUDUS'),
(202, 14, 0, 'KULON PROGO'),
(203, 12, 0, 'KUNINGAN'),
(204, 19, 0, 'KUPANG'),
(205, 23, 0, 'KUTAI BARAT'),
(206, 23, 0, 'KUTAI KARTANEGARA'),
(207, 23, 0, 'KUTAI TIMUR'),
(208, 2, 0, 'LABUHANBATU'),
(209, 2, 0, 'LABUHANBATU SELATAN'),
(210, 2, 0, 'LABUHANBATU UTARA'),
(211, 6, 0, 'LAHAT'),
(212, 21, 0, 'LAMANDAU'),
(213, 15, 0, 'LAMONGAN'),
(214, 8, 0, 'LAMPUNG BARAT'),
(215, 8, 0, 'LAMPUNG SELATAN'),
(216, 8, 0, 'LAMPUNG TENGAH'),
(217, 8, 0, 'LAMPUNG TIMUR'),
(218, 8, 0, 'LAMPUNG UTARA'),
(219, 20, 0, 'LANDAK'),
(220, 2, 0, 'LANGKAT'),
(221, 1, 0, 'LANGSA'),
(222, 33, 0, 'LANNY JAYA'),
(223, 16, 0, 'LEBAK'),
(224, 7, 0, 'LEBONG'),
(225, 19, 0, 'LEMBATA'),
(226, 1, 0, 'LHOKSEUMAWE'),
(227, 3, 0, 'LIMA PULUH KOTA'),
(228, 10, 0, 'LINGGA'),
(229, 18, 0, 'LOMBOK BARAT'),
(230, 18, 0, 'LOMBOK TENGAH'),
(231, 18, 0, 'LOMBOK TIMUR'),
(232, 18, 0, 'LOMBOK UTARA'),
(233, 6, 0, 'LUBUKLINGGAU'),
(234, 15, 0, 'LUMAJANG'),
(235, 26, 0, 'LUWU'),
(236, 26, 0, 'LUWU TIMUR'),
(237, 26, 0, 'LUWU UTARA'),
(238, 15, 0, 'MADIUN'),
(239, 13, 0, 'MAGELANG'),
(240, 15, 0, 'MAGETAN'),
(241, 12, 0, 'MAJALENGKA'),
(242, 29, 0, 'MAJENE'),
(243, 26, 0, 'MAKASSAR'),
(244, 15, 0, 'MALANG'),
(245, 23, 0, 'MALINAU'),
(246, 30, 0, 'MALUKU BARAT DAYA'),
(247, 30, 0, 'MALUKU TENGAH'),
(248, 30, 0, 'MALUKU TENGGARA'),
(249, 30, 0, 'MALUKU TENGGARA BARAT'),
(250, 29, 0, 'MAMASA'),
(251, 33, 0, 'MAMBERAMO RAYA'),
(252, 33, 0, 'MAMBERAMO TENGAH'),
(253, 29, 0, 'MAMUJU'),
(254, 29, 0, 'MAMUJU UTARA'),
(255, 24, 0, 'MANADO'),
(256, 2, 0, 'MANDAILING NATAL'),
(257, 19, 0, 'MANGGARAI'),
(258, 19, 0, 'MANGGARAI BARAT'),
(259, 19, 0, 'MANGGARAI TIMUR'),
(260, 32, 0, 'MANOKWARI'),
(261, 33, 0, 'MAPPI'),
(262, 26, 0, 'MAROS'),
(263, 18, 0, 'MATARAM'),
(264, 32, 0, 'MAYBRAT'),
(265, 2, 0, 'MEDAN'),
(266, 20, 0, 'MELAWI'),
(267, 5, 0, 'MERANGIN'),
(268, 33, 0, 'MERAUKE'),
(269, 8, 0, 'MESUJI'),
(270, 8, 0, 'METRO'),
(271, 33, 0, 'MIMIKA'),
(272, 24, 0, 'MINAHASA'),
(273, 24, 0, 'MINAHASA SELATAN'),
(274, 24, 0, 'MINAHASA TENGGARA'),
(275, 24, 0, 'MINAHASA UTARA'),
(276, 15, 0, 'MOJOKERTO'),
(277, 25, 0, 'MOROWALI'),
(278, 6, 0, 'MUARA ENIM'),
(279, 5, 0, 'MUARO JAMBI'),
(280, 7, 0, 'MUKOMUKO'),
(281, 27, 0, 'MUNA'),
(282, 21, 0, 'MURUNG RAYA'),
(283, 6, 0, 'MUSI BANYUASIN'),
(284, 6, 0, 'MUSI RAWAS'),
(285, 33, 0, 'NABIRE'),
(286, 1, 0, 'NAGAN RAYA'),
(287, 19, 0, 'NAGEKEO'),
(288, 10, 0, 'NATUNA'),
(289, 33, 0, 'NDUGA'),
(290, 19, 0, 'NGADA'),
(291, 15, 0, 'NGANJUK'),
(292, 15, 0, 'NGAWI'),
(293, 2, 0, 'NIAS'),
(294, 2, 0, 'NIAS BARAT'),
(295, 2, 0, 'NIAS SELATAN'),
(296, 2, 0, 'NIAS UTARA'),
(297, 23, 0, 'NUNUKAN'),
(298, 6, 0, 'OGAN ILIR'),
(299, 6, 0, 'OGAN KOMERING ILIR'),
(300, 6, 0, 'OGAN KOMERING ULU'),
(301, 6, 0, 'OGAN KOMERING ULU SELATAN'),
(302, 6, 0, 'OGAN KOMERING ULU TIMUR'),
(303, 15, 0, 'PACITAN'),
(304, 3, 0, 'PADANG'),
(305, 2, 0, 'PADANG LAWAS'),
(306, 2, 0, 'PADANG LAWAS UTARA'),
(307, 3, 0, 'PADANG PARIAMAN'),
(308, 3, 0, 'PADANGPANJANG'),
(309, 2, 0, 'PADANGSIDEMPUAN'),
(310, 6, 0, 'PAGAR ALAM'),
(311, 2, 0, 'PAKPAK BHARAT'),
(312, 21, 0, 'PALANGKA RAYA'),
(313, 6, 0, 'PALEMBANG'),
(314, 26, 0, 'PALOPO'),
(315, 25, 0, 'PALU'),
(316, 15, 0, 'PAMEKASAN'),
(317, 16, 0, 'PANDEGLANG'),
(318, 26, 0, 'PANGKAJENE DAN KEPULAUAN'),
(319, 9, 0, 'PANGKAL PINANG'),
(320, 33, 0, 'PANIAI'),
(321, 26, 0, 'PAREPARE'),
(322, 3, 0, 'PARIAMAN'),
(323, 25, 0, 'PARIGI MOUTONG'),
(324, 3, 0, 'PASAMAN'),
(325, 3, 0, 'PASAMAN BARAT'),
(326, 23, 0, 'PASER'),
(327, 15, 0, 'PASURUAN'),
(328, 13, 0, 'PATI'),
(329, 3, 0, 'PAYAKUMBUH'),
(330, 33, 0, 'PEGUNUNGAN BINTANG'),
(331, 13, 0, 'PEKALONGAN'),
(332, 4, 0, 'PEKANBARU'),
(333, 4, 0, 'PELALAWAN'),
(334, 13, 0, 'PEMALANG'),
(335, 2, 0, 'PEMATANGSIANTAR'),
(336, 23, 0, 'PENAJAM PASER UTARA'),
(337, 8, 0, 'PESAWARAN'),
(338, 3, 0, 'PESISIR SELATAN'),
(339, 1, 0, 'PIDIE'),
(340, 1, 0, 'PIDIE JAYA'),
(341, 26, 0, 'PINRANG'),
(342, 28, 0, 'POHUWATO'),
(343, 29, 0, 'POLEWALI MANDAR'),
(344, 15, 0, 'PONOROGO'),
(345, 20, 0, 'PONTIANAK'),
(346, 25, 0, 'POSO'),
(347, 6, 0, 'PRABUMULIH'),
(348, 8, 0, 'PRINGSEWU'),
(349, 15, 0, 'PROBOLINGGO'),
(350, 15, 0, 'PROBOLINGGO'),
(351, 21, 0, 'PULANG PISAU'),
(352, 31, 0, 'PULAU MOROTAI'),
(353, 33, 0, 'PUNCAK'),
(354, 33, 0, 'PUNCAK JAYA'),
(355, 13, 0, 'PURBALINGGA'),
(356, 12, 0, 'PURWAKARTA'),
(357, 13, 0, 'PURWOREJO'),
(358, 32, 0, 'RAJA AMPAT'),
(359, 7, 0, 'REJANG LEBONG'),
(360, 13, 0, 'REMBANG'),
(361, 4, 0, 'ROKAN HILIR'),
(362, 4, 0, 'ROKAN HULU'),
(363, 19, 0, 'ROTE NDAO'),
(364, 1, 0, 'SABANG'),
(365, 19, 0, 'SABU RAIJUA'),
(366, 13, 0, 'SALATIGA'),
(367, 23, 0, 'SAMARINDA'),
(368, 20, 0, 'SAMBAS'),
(369, 2, 0, 'SAMOSIR'),
(370, 15, 0, 'SAMPANG'),
(371, 20, 0, 'SANGGAU'),
(372, 33, 0, 'SARMI'),
(373, 5, 0, 'SAROLANGUN'),
(374, 3, 0, 'SAWAHLUNTO'),
(375, 20, 0, 'SEKADAU'),
(376, 7, 0, 'SELUMA'),
(377, 13, 0, 'SEMARANG'),
(378, 30, 0, 'SERAM BAGIAN BARAT'),
(379, 30, 0, 'SERAM BAGIAN TIMUR'),
(380, 16, 0, 'SERANG'),
(381, 2, 0, 'SERDANG BEDAGAI'),
(382, 21, 0, 'SERUYAN'),
(383, 4, 0, 'SIAK'),
(384, 2, 0, 'SIBOLGA'),
(385, 26, 0, 'SIDENRENG RAPPANG'),
(386, 15, 0, 'SIDOARJO'),
(387, 25, 0, 'SIGI'),
(388, 3, 0, 'SIJUNJUNG'),
(389, 19, 0, 'SIKKA'),
(390, 2, 0, 'SIMALUNGUN'),
(391, 1, 0, 'SIMEULUE'),
(392, 20, 0, 'SINGKAWANG'),
(393, 26, 0, 'SINJAI'),
(394, 20, 0, 'SINTANG'),
(395, 15, 0, 'SITUBONDO'),
(396, 14, 0, 'SLEMAN'),
(397, 3, 0, 'SOLOK'),
(398, 3, 0, 'SOLOK SELATAN'),
(399, 26, 0, 'SOPPENG'),
(400, 32, 0, 'SORONG'),
(401, 32, 0, 'SORONG SELATAN'),
(402, 13, 0, 'SRAGEN'),
(403, 12, 0, 'SUBANG'),
(404, 1, 0, 'SUBULUSSALAM'),
(405, 12, 0, 'SUKABUMI'),
(406, 21, 0, 'SUKAMARA'),
(407, 13, 0, 'SUKOHARJO'),
(408, 19, 0, 'SUMBA BARAT'),
(409, 19, 0, 'SUMBA BARAT DAYA'),
(410, 19, 0, 'SUMBA TENGAH'),
(411, 19, 0, 'SUMBA TIMUR'),
(412, 18, 0, 'SUMBAWA'),
(413, 18, 0, 'SUMBAWA BARAT'),
(414, 12, 0, 'SUMEDANG'),
(415, 15, 0, 'SUMENEP'),
(416, 5, 0, 'SUNGAI PENUH'),
(417, 33, 0, 'SUPIORI'),
(418, 15, 0, 'SURABAYA'),
(419, 13, 0, 'SURAKARTA'),
(420, 22, 0, 'TABALONG'),
(421, 17, 0, 'TABANAN'),
(422, 26, 0, 'TAKALAR'),
(423, 32, 0, 'TAMBRAUW'),
(424, 23, 0, 'TANA TIDUNG'),
(425, 26, 0, 'TANA TORAJA'),
(426, 22, 0, 'TANAH BUMBU'),
(427, 3, 0, 'TANAH DATAR'),
(428, 22, 0, 'TANAH LAUT'),
(429, 16, 0, 'TANGERANG'),
(430, 16, 0, 'TANGERANG SELATAN'),
(431, 8, 0, 'TANGGAMUS'),
(432, 5, 0, 'TANJUNG JABUNG BARAT'),
(433, 5, 0, 'TANJUNG JABUNG TIMUR'),
(434, 10, 0, 'TANJUNG PINANG'),
(435, 2, 0, 'TANJUNGBALAI'),
(436, 2, 0, 'TAPANULI SELATAN'),
(437, 2, 0, 'TAPANULI TENGAH'),
(438, 2, 0, 'TAPANULI UTARA'),
(439, 22, 0, 'TAPIN'),
(440, 23, 0, 'TARAKAN'),
(441, 12, 0, 'TASIKMALAYA'),
(442, 2, 0, 'TEBING TINGGI'),
(443, 5, 0, 'TEBO'),
(444, 13, 0, 'TEGAL'),
(445, 32, 0, 'TELUK BINTUNI'),
(446, 32, 0, 'TELUK WONDAMA'),
(447, 13, 0, 'TEMANGGUNG'),
(448, 31, 0, 'TERNATE'),
(449, 31, 0, 'TIDORE KEPULAUAN'),
(450, 19, 0, 'TIMOR TENGAH SELATAN'),
(451, 19, 0, 'TIMOR TENGAH UTARA'),
(452, 2, 0, 'TOBA SAMOSIR'),
(453, 25, 0, 'TOJO UNA-UNA'),
(454, 33, 0, 'TOLIKARA'),
(455, 25, 0, 'TOLI-TOLI'),
(456, 24, 0, 'TOMOHON'),
(457, 26, 0, 'TORAJA UTARA'),
(458, 15, 0, 'TRENGGALEK'),
(459, 30, 0, 'TUAL'),
(460, 15, 0, 'TUBAN'),
(461, 8, 0, 'TULANG BAWANG'),
(462, 8, 0, 'TULANG BAWANG BARAT'),
(463, 15, 0, 'TULUNGAGUNG'),
(464, 26, 0, 'WAJO'),
(465, 27, 0, 'WAKATOBI'),
(466, 33, 0, 'WAROPEN'),
(467, 8, 0, 'WAY KANAN'),
(468, 13, 0, 'WONOGIRI'),
(469, 13, 0, 'WONOSOBO'),
(470, 33, 0, 'YAHUKIMO'),
(471, 33, 0, 'YALIMO'),
(472, 14, 0, 'YOGYAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `ref_fieldcode`
--

DROP TABLE IF EXISTS `ref_fieldcode`;
CREATE TABLE `ref_fieldcode` (
  `fieldcode_id` int(11) NOT NULL,
  `fieldcode_code` varchar(20) DEFAULT NULL,
  `fieldcode_description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_fieldcode`
--

INSERT INTO `ref_fieldcode` (`fieldcode_id`, `fieldcode_code`, `fieldcode_description`) VALUES
(1, 'A01', 'Produksi tanaman dan hewan, perburuan dan kegiatan'),
(2, 'A02', 'Kehutanan dan penebangan'),
(3, 'B05', 'Penambangan batubara dan lignit'),
(4, 'B06', 'Ekstraksi minyak bumi dan gas alam'),
(5, 'B07', 'Penambangan bijih logam'),
(6, 'B08', 'Penambangan dan penggalian lainnya'),
(7, 'B09', 'Kegiatan layanan pendukung pertambangan'),
(8, 'C10', 'Pembuatan produk makanan'),
(9, 'C11', 'Industri minuman'),
(10, 'C12', 'Industri produk tembakau'),
(11, 'C13', 'Pembuatan tekstil'),
(12, 'C14', 'Pembuatan pakaian jadi'),
(13, 'C15', 'Pembuatan kulit dan produk terkait'),
(14, 'C16', 'Pembuatan kayu dan produk dari kayu dan gabus, kecuali furnitur; pembuatan barang dari jerami dan bahan anyaman'),
(15, 'C17', 'Pembuatan kertas dan produk kertas'),
(16, 'C18', 'Pencetakan dan reproduksi media rekaman'),
(17, 'C19', 'Industri kokas dan produk minyak sulingan'),
(18, 'C20', 'Industri bahan kimia dan produk kimia'),
(19, 'C21', 'Pembuatan produk farmasi dasar dan sediaan farmasi'),
(20, 'C22', 'Industri karet dan produk plastik'),
(21, 'C23', 'Pembuatan produk mineral bukan logam lainnya'),
(22, 'C24', 'Industri logam dasar'),
(23, 'C25', 'Pembuatan produk logam fabrikasi, kecuali mesin dan peralatan'),
(24, 'C26', 'Industri komputer, produk elektronik dan optik'),
(25, 'C27', 'Pembuatan peralatan listrik'),
(26, 'C28', 'Pembuatan mesin dan peralatan n.e.c.'),
(27, 'C29', 'Pembuatan kendaraan bermotor, trailer dan semi-trailer'),
(28, 'C30', 'Pembuatan peralatan transportasi lainnya'),
(29, 'C31', 'Pembuatan furnitur'),
(30, 'C32', 'Manufaktur lainnya'),
(31, 'C33', 'Perbaikan dan pemasangan mesin dan peralatan'),
(32, 'D35', 'Pasokan listrik, gas, uap dan pendingin udara'),
(33, 'E36', 'Pengumpulan, pengolahan dan pasokan air'),
(34, 'E37', 'Pembuangan Limbah'),
(35, 'E38', 'Kegiatan pengumpulan, pengolahan dan pembuangan limbah; pemulihan material'),
(36, 'E39', 'Kegiatan remediasi dan layanan pengelolaan limbah lainnya'),
(37, 'F41', 'Pembangunan gedung'),
(38, 'F42', 'Teknik Sipil'),
(39, 'F43', 'Kegiatan konstruksi khusus'),
(40, 'G45', 'Perdagangan grosir dan eceran kendaraan bermotor dan motor'),
(41, 'G46', 'Perdagangan grosir, kecuali kendaraan bermotor dan motor'),
(42, 'G47', 'Perdagangan eceran, kecuali kendaraan bermotor dan motor'),
(43, 'H49', 'Transportasi darat dan transportasi melalui pipa'),
(44, 'H50', 'Transportasi air'),
(45, 'H51', 'Transportasi udara'),
(46, 'H52', 'Pergudangan dan aktivitas pendukung untuk transportasi'),
(47, 'H53', 'Kegiatan pos dan kurir'),
(48, 'I55', 'Akomodasi'),
(49, 'I56', 'Kegiatan pelayanan makanan dan minuman'),
(50, 'J58', 'Kegiatan penerbitan'),
(51, 'J59', 'Produksi film, video dan program televisi, rekaman suara dan penerbitan musik'),
(52, 'J60', 'Kegiatan pemrograman dan penyiaran'),
(53, 'J61', 'Telekomunikasi'),
(54, 'J62 ', 'Pemrograman komputer, konsultasi dan kegiatan terkait'),
(55, 'J63', 'Kegiatan layanan informasi'),
(56, 'K64', 'Kegiatan jasa keuangan, kecuali asuransi dan dana pensiun'),
(57, 'K65', 'Asuransi, reasuransi dan pendanaan pensiun, kecuali jaminan sosial wajib'),
(58, 'K66', 'Kegiatan tambahan untuk jasa keuangan dan kegiatan asuransi'),
(59, 'Kode', 'Deskripsi'),
(60, 'L68', 'Kegiatan real estat'),
(61, 'M69', 'Kegiatan hukum dan akuntansi'),
(62, 'M70', 'Kegiatan kantor pusat; kegiatan konsultasi manajemen'),
(63, 'M71', 'Kegiatan arsitektur dan teknik; pengujian dan analisis teknis'),
(64, 'M72', 'Penelitian dan pengembangan ilmiah'),
(65, 'M73', 'Periklanan dan riset pasar'),
(66, 'M74', 'Kegiatan profesional, ilmiah dan teknis lainnya'),
(67, 'M75', 'Kegiatan kedokteran hewan'),
(68, 'N77', 'Aktivitas persewaan dan persewaan'),
(69, 'N78', 'Aktivitas ketenagakerjaan'),
(70, 'N79', 'Agen perjalanan, operator tur dan layanan reservasi lainnya dan aktivitas terkait'),
(71, 'N80', 'Aktivitas keamanan dan investigasi'),
(72, 'N81', 'Layanan untuk bangunan dan aktivitas lanskap'),
(73, 'N82', 'Administrasi kantor, dukungan kantor, dan aktivitas dukungan bisnis lainnya'),
(74, 'O84', 'Administrasi dan pertahanan publik; jaminan sosial wajib'),
(75, 'P85', 'Pendidikan'),
(76, 'Q88', 'Kegiatan kerja sosial tanpa akomodasi'),
(77, 'R90', 'Kegiatan kreatif, seni dan hiburan'),
(78, 'R91', 'Perpustakaan, arsip, museum dan kegiatan budaya lainnya'),
(79, 'R92', 'Aktivitas perjudian dan taruhan'),
(80, 'R93', 'Kegiatan olah raga dan kegiatan hiburan dan rekreasi'),
(81, 'S94', 'Kegiatan organisasi keanggotaan'),
(82, 'S95', 'Perbaikan komputer dan barang-barang pribadi dan rumah tangga'),
(83, 'S96', 'Lainnya'),
(84, 'T86', 'Aktivitas kesehatan manusia'),
(85, 'T87', 'Kegiatan perawatan residensial'),
(86, 'ISO 9001', 'Sistem Manajemen Kualitas');

-- --------------------------------------------------------

--
-- Table structure for table `ref_province`
--

DROP TABLE IF EXISTS `ref_province`;
CREATE TABLE `ref_province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_province`
--

INSERT INTO `ref_province` (`province_id`, `province_name`) VALUES
(1, 'NANGROE ACEH DARUSSALAM'),
(2, 'SUMATERA UTARA'),
(3, 'SUMATERA BARAT'),
(4, 'RIAU'),
(5, 'JAMBI'),
(6, 'SUMATERA SELATAN'),
(7, 'BENGKULU'),
(8, 'LAMPUNG'),
(9, 'KEPULAUAN BANGKA BELITUNG'),
(10, 'KEPULAUAN RIAU'),
(11, 'DKI JAKARTA'),
(12, 'JAWA BARAT'),
(13, 'JAWA TENGAH'),
(14, 'DI YOGYAKARTA'),
(15, 'JAWA TIMUR'),
(16, 'BANTEN'),
(17, 'BALI'),
(18, 'NUSA TENGGARA BARAT'),
(19, 'NUSA TENGGARA TIMUR'),
(20, 'KALIMANTAN BARAT'),
(21, 'KALIMANTAN TENGAH'),
(22, 'KALIMANTAN SELATAN'),
(23, 'KALIMANTAN TIMUR'),
(24, 'SULAWESI UTARA'),
(25, 'SULAWESI TENGAH'),
(26, 'SULAWESI SELATAN'),
(27, 'SULAWESI TENGGARA'),
(28, 'GORONTALO'),
(29, 'SULAWESI BARAT'),
(30, 'MALUKU'),
(31, 'MALUKU UTARA'),
(32, 'PAPUA BARAT'),
(33, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `ref_scope`
--

DROP TABLE IF EXISTS `ref_scope`;
CREATE TABLE `ref_scope` (
  `scope_id` int(11) NOT NULL,
  `scope_code` varchar(20) DEFAULT NULL,
  `scope_description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_subdistrict`
--

DROP TABLE IF EXISTS `ref_subdistrict`;
CREATE TABLE `ref_subdistrict` (
  `subdistrict_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_user_type`
--

DROP TABLE IF EXISTS `ref_user_type`;
CREATE TABLE `ref_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_user_type`
--

INSERT INTO `ref_user_type` (`user_type_id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Sekretariat'),
(3, 'Commitee'),
(4, 'commitee Certificati'),
(5, 'Certificant');

-- --------------------------------------------------------

--
-- Table structure for table `ref_village`
--

DROP TABLE IF EXISTS `ref_village`;
CREATE TABLE `ref_village` (
  `village_id` int(11) NOT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `village_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
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
-- Table structure for table `test_online`
--

DROP TABLE IF EXISTS `test_online`;
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
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `certification_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_name` varchar(30) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `training_topic` varchar(100) DEFAULT NULL,
  `relation_status` tinyint(1) DEFAULT 0,
  `doc_path` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `village_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT 5,
  `idcard_number` varchar(16) DEFAULT NULL,
  `doc_idcard_path` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `birth_place`, `birth_date`, `gender`, `address`, `province_id`, `district_id`, `subdistrict_id`, `village_id`, `email`, `mobile_phone`, `phone`, `user_type_id`, `idcard_number`, `doc_idcard_path`, `user_name`, `user_password`, `role_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Administrator', 'Jakarta', '2022-10-13', 1, 'Jl Gereja', 11, 145, 1, 1, 'admin@gmail.com', '0812202020', '02850925', 1, '2504280943258', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, '2022-10-29 20:44:07'),
(2, 'Hakim Desyanto', 'Lampung', '2022-10-04', 1, 'Jl KIrai', 12, 108, 108, 108, 'hakim.lampung@gmail.com', '081220209943', '0217502470', 1, '2452345', '', 'hakim', 'c96041081de85714712a79319cb2be5f', 3, NULL, '2022-10-29 20:46:50'),
(7, 'Hakim', 'Lampung', '2022-10-28', 1, 'Jl. Jalan aja gak usah ngajak-ngajak', 2, 1, 1, 1, 'hakim.desyanto@gmail.com', '081220209943', '0217502470', 1, '34234', 'hkahfjkashdfk', 'hakim7', '2fea6c02a98d6318d44cdf150775f07a', 3, '2022-10-28 15:54:48', NULL),
(12, 'mantapp dah', 'jiganamah', '2022-10-27', 0, '', 2, 1, 1, 1, '', '', '', 1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-10-28 16:12:33', NULL),
(13, 'kadklfjalsfd', 'dsafadsf', '2022-10-06', 0, '', 2, 1, 1, 1, '', '', '', 1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-10-28 16:13:01', NULL),
(14, 'asdfsadf', 'asdfasdf', '2022-10-13', 0, '', 2, 1, 1, 1, '', '', '', 1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-10-28 16:14:07', NULL),
(15, 'asdfasdf', 'asdfsdaf', '2022-10-14', 0, '', 2, 1, 1, 1, '', '', '', 1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-10-28 16:14:55', NULL),
(17, 'Muhammad Alwin Muammar', 'Jakarta', '2011-01-28', 1, 'Jl Kirai I', 11, 1, 1, 1, 'alwin@gmail.com', '0812202099999', '02188575', 5, '23849u4974', '', 'alwin', '69f50a8fa8200560db52e968572e2542', 1, '2022-10-29 19:53:29', '2022-10-29 20:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `userd_commitee_scope`
--

DROP TABLE IF EXISTS `userd_commitee_scope`;
CREATE TABLE `userd_commitee_scope` (
  `user_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `audit_experience`
--
ALTER TABLE `audit_experience`
  ADD PRIMARY KEY (`audit_experience_id`);

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`certification_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `lsp_menu`
--
ALTER TABLE `lsp_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `lsp_user_nav`
--
ALTER TABLE `lsp_user_nav`
  ADD PRIMARY KEY (`role_id`,`menu_id`);

--
-- Indexes for table `lsp_user_role`
--
ALTER TABLE `lsp_user_role`
  ADD PRIMARY KEY (`role_id`);

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
-- Indexes for table `receipt_invoice`
--
ALTER TABLE `receipt_invoice`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `ref_certification_type`
--
ALTER TABLE `ref_certification_type`
  ADD PRIMARY KEY (`certification_type_id`);

--
-- Indexes for table `ref_district`
--
ALTER TABLE `ref_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `ref_fieldcode`
--
ALTER TABLE `ref_fieldcode`
  ADD PRIMARY KEY (`fieldcode_id`);

--
-- Indexes for table `ref_province`
--
ALTER TABLE `ref_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `ref_scope`
--
ALTER TABLE `ref_scope`
  ADD PRIMARY KEY (`scope_id`);

--
-- Indexes for table `ref_subdistrict`
--
ALTER TABLE `ref_subdistrict`
  ADD PRIMARY KEY (`subdistrict_id`);

--
-- Indexes for table `ref_user_type`
--
ALTER TABLE `ref_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `ref_village`
--
ALTER TABLE `ref_village`
  ADD PRIMARY KEY (`village_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_experience`
--
ALTER TABLE `audit_experience`
  MODIFY `audit_experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lsp_menu`
--
ALTER TABLE `lsp_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lsp_user_role`
--
ALTER TABLE `lsp_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `receipt_invoice`
--
ALTER TABLE `receipt_invoice`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_certification_type`
--
ALTER TABLE `ref_certification_type`
  MODIFY `certification_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_district`
--
ALTER TABLE `ref_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `ref_fieldcode`
--
ALTER TABLE `ref_fieldcode`
  MODIFY `fieldcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `ref_province`
--
ALTER TABLE `ref_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ref_scope`
--
ALTER TABLE `ref_scope`
  MODIFY `scope_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_subdistrict`
--
ALTER TABLE `ref_subdistrict`
  MODIFY `subdistrict_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_user_type`
--
ALTER TABLE `ref_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_village`
--
ALTER TABLE `ref_village`
  MODIFY `village_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lsp_user_nav`
--
ALTER TABLE `lsp_user_nav`
  ADD CONSTRAINT `lsp_user_nav_role_id_fkey` FOREIGN KEY (`role_id`) REFERENCES `lsp_user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
