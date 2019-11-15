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
-- Database: `import_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemagang`
--

CREATE TABLE `pemagang` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `kota_asal` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemagang`
--

INSERT INTO `pemagang` (`id`, `nama`, `no_hp`, `email`, `kota_asal`) VALUES
(1, 'yani', '08923847283', 'apa@x.com', 'pekalongan'),
(2, 'yono', '0893476387232', 'asd@asd.com', 'kebumen'),
(3, 'yosa', '08923847222', 'apakah@x.com', 'jogja'),
(4, 'zainal', '08934764444', 'asdf@asd.com', 'bantul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemagang`
--
ALTER TABLE `pemagang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemagang`
--
ALTER TABLE `pemagang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
