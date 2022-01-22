-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 10:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `id_project` varchar(500) NOT NULL,
  `nama_project` varchar(500) NOT NULL,
  `nama_client` varchar(500) NOT NULL,
  `id_leader` varchar(500) NOT NULL,
  `project_start` varchar(1000) NOT NULL,
  `project_end` varchar(1000) NOT NULL,
  `project_progress` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`id_project`, `nama_project`, `nama_client`, `id_leader`, `project_start`, `project_end`, `project_progress`) VALUES
('PRJ001', 'Searching index Ruang Guru', 'Ruang Guru', 'LDR001', '2022-01-19', '2022-02-25', 50),
('PRJ002', 'SI Wisata Kulon progo', 'Pemkot Kulon progo', 'LDR002', '2022-01-20', '2022-04-28', 80),
('PRJ003', 'Kuliner Sleman', 'Pemkot Sleman', 'LDR001', '2022-01-11', '2022-03-09', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_project_leader`
--

CREATE TABLE `tb_project_leader` (
  `id_leader` varchar(500) NOT NULL,
  `nama_leader` varchar(500) NOT NULL,
  `email_leader` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project_leader`
--

INSERT INTO `tb_project_leader` (`id_leader`, `nama_leader`, `email_leader`) VALUES
('LDR001', 'arrio', 'arrio@gmail.com'),
('LDR002', 'nizar', 'nizar@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_leader` (`id_leader`);

--
-- Indexes for table `tb_project_leader`
--
ALTER TABLE `tb_project_leader`
  ADD PRIMARY KEY (`id_leader`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD CONSTRAINT `tb_project_ibfk_1` FOREIGN KEY (`id_leader`) REFERENCES `tb_project_leader` (`id_leader`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
