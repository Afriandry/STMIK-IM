-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `trx_thr`
--

CREATE TABLE `trx_thr` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_masuk` varchar(255) NOT NULL,
  `lama_kerja` varchar(25) NOT NULL,
  `golongan` varchar(25) NOT NULL,
  `thr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_thr`
--

INSERT INTO `trx_thr` (`id`, `nama`, `tgl_masuk`, `lama_kerja`, `golongan`, `thr`) VALUES
(17, 'Afriandry', '01-01-2017', '5', 'Manajerial', '5000000'),
(18, 'Fian', '01-02-2022', '0', 'Guru', '2000000'),
(19, 'Firman', '01-01-2020', '2', 'Pelaksana', '2250000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trx_thr`
--
ALTER TABLE `trx_thr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trx_thr`
--
ALTER TABLE `trx_thr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
