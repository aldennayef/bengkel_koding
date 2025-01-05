-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2025 at 04:42 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `inputmhs`
--

CREATE TABLE `inputmhs` (
  `id` int NOT NULL,
  `namaMhs` varchar(255) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `ipk` float NOT NULL,
  `sks` int NOT NULL,
  `matakuliah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inputmhs`
--

INSERT INTO `inputmhs` (`id`, `namaMhs`, `nim`, `ipk`, `sks`, `matakuliah`) VALUES
(12, 'Muhammad Alden Nayef Anargya', 'A11.2021.13805', 3.85, 4, '-, Algoritma Pemrograman, Dasar Pemrograman, Dasar Dasar Komputasi, Matematika Diskrit, Kalkulus 1, Kalkulus 2');

-- --------------------------------------------------------

--
-- Table structure for table `jwl_matakuliah`
--

CREATE TABLE `jwl_matakuliah` (
  `id` int NOT NULL,
  `matakuliah` varchar(250) NOT NULL,
  `sks` int NOT NULL,
  `kelp` varchar(10) NOT NULL,
  `ruangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jwl_matakuliah`
--

INSERT INTO `jwl_matakuliah` (`id`, `matakuliah`, `sks`, `kelp`, `ruangan`) VALUES
(3, 'Algoritma Pemrograman', 4, 'A11.4113', 'H.3.8'),
(4, 'Dasar Pemrograman', 3, 'A11.4411', 'H.4.6'),
(5, 'Pemrograman Berbasis Web', 2, 'A11.4517', 'D.2.4'),
(6, 'Pengantar Teknologi Informasi', 2, 'A11.4116', 'H.4.4'),
(7, 'Dasar Dasar Komputasi', 2, 'A11.4116', 'H.4.3'),
(8, 'Organisasi dan Arsitektur Komputer', 3, 'A11.4116', 'H.5.3'),
(9, 'Matematika Diskrit', 3, 'A11.4115', 'H.4.6'),
(10, 'Kalkulus 1', 4, 'A11.4344', 'H.3.1'),
(11, 'Pemrograman Web Lanjut', 2, 'A11.4217', 'D.2.3'),
(12, 'Logika Informatika', 3, 'A11.4278', 'H.5.5'),
(13, 'Rekayasa Perangkat Lunak', 3, 'A11.4212', 'H.7.1'),
(14, 'Kalkulus 2', 4, 'A11.4566', 'H.4.7');

-- --------------------------------------------------------

--
-- Table structure for table `jwl_mhs`
--

CREATE TABLE `jwl_mhs` (
  `id` int NOT NULL,
  `mhs_id` int NOT NULL,
  `matakuliah` varchar(255) NOT NULL,
  `sks` int NOT NULL,
  `kelp` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jwl_mhs`
--

INSERT INTO `jwl_mhs` (`id`, `mhs_id`, `matakuliah`, `sks`, `kelp`, `ruangan`) VALUES
(25, 12, 'Algoritma Pemrograman', 4, 'A11.4113', 'H.3.8'),
(26, 12, 'Dasar Pemrograman', 3, 'A11.4411', 'H.4.6'),
(27, 12, 'Dasar Dasar Komputasi', 2, 'A11.4116', 'H.4.3'),
(28, 12, 'Matematika Diskrit', 3, 'A11.4115', 'H.4.6'),
(29, 12, 'Kalkulus 1', 4, 'A11.4344', 'H.3.1'),
(31, 12, 'Kalkulus 2', 4, 'A11.4566', 'H.4.7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inputmhs`
--
ALTER TABLE `inputmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwl_matakuliah`
--
ALTER TABLE `jwl_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jwl_mhs`
--
ALTER TABLE `jwl_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputmhs`
--
ALTER TABLE `inputmhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jwl_matakuliah`
--
ALTER TABLE `jwl_matakuliah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jwl_mhs`
--
ALTER TABLE `jwl_mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jwl_mhs`
--
ALTER TABLE `jwl_mhs`
  ADD CONSTRAINT `jwl_mhs_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `inputmhs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
