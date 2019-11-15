-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 03:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `import_sample_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kota`
--

CREATE TABLE `data_kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kota`
--

INSERT INTO `data_kota` (`id`, `nama`) VALUES
(1, 'pekalongan'),
(2, 'kebumen'),
(3, 'jogja'),
(4, 'bantul');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemagang`
--

CREATE TABLE `data_pemagang` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `kota_asal` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `no_wa` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemagang`
--

INSERT INTO `data_pemagang` (`id`, `nama_lengkap`, `kota_asal`, `email`, `no_wa`) VALUES
(1, 'yani', 0, 'apa@x.com', '08923847283'),
(2, 'yono', 0, 'asd@asd.com', '0893476387232'),
(3, 'yosa', 0, 'apakah@x.com', '08923847222'),
(4, 'zainal', 0, 'asdf@asd.com', '08934764444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kota`
--
ALTER TABLE `data_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pemagang`
--
ALTER TABLE `data_pemagang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kota`
--
ALTER TABLE `data_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pemagang`
--
ALTER TABLE `data_pemagang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
