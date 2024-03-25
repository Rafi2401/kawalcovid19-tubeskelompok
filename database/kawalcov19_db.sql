-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 04:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawalcov19_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Jeddie', 'admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id` int(11) NOT NULL,
  `terkonfirmasi` int(200) NOT NULL,
  `perawatan` int(200) NOT NULL,
  `sembuh` int(200) NOT NULL,
  `meninggal` int(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `waktu` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id`, `terkonfirmasi`, `perawatan`, `sembuh`, `meninggal`, `provinsi`, `waktu`) VALUES
(1, 555, 520, 41, 56, 'Banten', '2020-04-18'),
(12, 1000, 2, 3, 4, '5', '2020-04-22'),
(13, 500, 500, 500, 500, '500', '2020-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `odp`
--

CREATE TABLE `odp` (
  `id` int(11) NOT NULL,
  `proses` int(200) NOT NULL,
  `selesai` int(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odp`
--

INSERT INTO `odp` (`id`, `proses`, `selesai`, `provinsi`, `waktu`, `total`) VALUES
(1, 2500, 2500, 'Jawa Barat', '2020-04-19', 500),
(5, 6000, 12000, 'Banten', '2020-04-22', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `pdp`
--

CREATE TABLE `pdp` (
  `id` int(11) NOT NULL,
  `proses` int(200) NOT NULL,
  `selesai` int(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdp`
--

INSERT INTO `pdp` (`id`, `proses`, `selesai`, `provinsi`, `waktu`, `total`) VALUES
(1, 1200, 1000, 'Jawa Barat', '2020-04-23', 2200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odp`
--
ALTER TABLE `odp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdp`
--
ALTER TABLE `pdp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `odp`
--
ALTER TABLE `odp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pdp`
--
ALTER TABLE `pdp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
