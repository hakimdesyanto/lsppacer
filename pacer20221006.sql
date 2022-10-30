-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2022 pada 16.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment`
--

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
-- Struktur dari tabel `assignmentd_fieldcode`
--

CREATE TABLE `assignmentd_fieldcode` (
  `assignment_id` int(11) DEFAULT NULL,
  `fieldcode_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignmentd_scope`
--

CREATE TABLE `assignmentd_scope` (
  `assignment_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignmentd_score`
--

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
-- Struktur dari tabel `assignmentd_to`
--

CREATE TABLE `assignmentd_to` (
  `assignment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_experience`
--

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
-- Struktur dari tabel `audit_experienced_role`
--

CREATE TABLE `audit_experienced_role` (
  `audit_experience_id` int(11) DEFAULT NULL,
  `role_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `audit_experienced_scope`
--

CREATE TABLE `audit_experienced_scope` (
  `audit_experience_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `certification`
--

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
-- Struktur dari tabel `certificationd_fieldcode`
--

CREATE TABLE `certificationd_fieldcode` (
  `certification_id` int(11) DEFAULT NULL,
  `fieldcode_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `certificationd_scope`
--

CREATE TABLE `certificationd_scope` (
  `certification_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

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
-- Struktur dari tabel `experience`
--

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
-- Struktur dari tabel `invoice`
--

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
-- Struktur dari tabel `receipt_invoice`
--

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
-- Struktur dari tabel `ref_certification_type`
--

CREATE TABLE `ref_certification_type` (
  `certification_type_id` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_district`
--

CREATE TABLE `ref_district` (
  `district_id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `is_city` tinyint(1) DEFAULT 0,
  `district_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_fieldcode`
--

CREATE TABLE `ref_fieldcode` (
  `fieldcode_id` int(11) NOT NULL,
  `fieldcode_code` varchar(20) DEFAULT NULL,
  `fieldcode_description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_province`
--

CREATE TABLE `ref_province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_scope`
--

CREATE TABLE `ref_scope` (
  `scope_id` int(11) NOT NULL,
  `scope_code` varchar(20) DEFAULT NULL,
  `scope_description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_subdistrict`
--

CREATE TABLE `ref_subdistrict` (
  `subdistrict_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_user_type`
--

CREATE TABLE `ref_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_village`
--

CREATE TABLE `ref_village` (
  `village_id` int(11) NOT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `village_name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

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
-- Struktur dari tabel `user`
--

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
  `user_type_id` int(11) DEFAULT NULL,
  `idcard_number` varchar(16) DEFAULT NULL,
  `doc_idcard_path` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `userd_commitee_scope`
--

CREATE TABLE `userd_commitee_scope` (
  `user_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indeks untuk tabel `audit_experience`
--
ALTER TABLE `audit_experience`
  ADD PRIMARY KEY (`audit_experience_id`);

--
-- Indeks untuk tabel `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`certification_id`);

--
-- Indeks untuk tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indeks untuk tabel `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `receipt_invoice`
--
ALTER TABLE `receipt_invoice`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indeks untuk tabel `ref_certification_type`
--
ALTER TABLE `ref_certification_type`
  ADD PRIMARY KEY (`certification_type_id`);

--
-- Indeks untuk tabel `ref_district`
--
ALTER TABLE `ref_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indeks untuk tabel `ref_fieldcode`
--
ALTER TABLE `ref_fieldcode`
  ADD PRIMARY KEY (`fieldcode_id`);

--
-- Indeks untuk tabel `ref_province`
--
ALTER TABLE `ref_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indeks untuk tabel `ref_scope`
--
ALTER TABLE `ref_scope`
  ADD PRIMARY KEY (`scope_id`);

--
-- Indeks untuk tabel `ref_subdistrict`
--
ALTER TABLE `ref_subdistrict`
  ADD PRIMARY KEY (`subdistrict_id`);

--
-- Indeks untuk tabel `ref_user_type`
--
ALTER TABLE `ref_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indeks untuk tabel `ref_village`
--
ALTER TABLE `ref_village`
  ADD PRIMARY KEY (`village_id`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `audit_experience`
--
ALTER TABLE `audit_experience`
  MODIFY `audit_experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `certification`
--
ALTER TABLE `certification`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `receipt_invoice`
--
ALTER TABLE `receipt_invoice`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_certification_type`
--
ALTER TABLE `ref_certification_type`
  MODIFY `certification_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_district`
--
ALTER TABLE `ref_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_fieldcode`
--
ALTER TABLE `ref_fieldcode`
  MODIFY `fieldcode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_province`
--
ALTER TABLE `ref_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_scope`
--
ALTER TABLE `ref_scope`
  MODIFY `scope_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_subdistrict`
--
ALTER TABLE `ref_subdistrict`
  MODIFY `subdistrict_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_user_type`
--
ALTER TABLE `ref_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_village`
--
ALTER TABLE `ref_village`
  MODIFY `village_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
