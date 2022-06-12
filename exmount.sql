-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 02:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exmount`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mount`
--

CREATE TABLE `admin_mount` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mount`
--

CREATE TABLE `mount` (
  `id_mount` int(11) NOT NULL,
  `nama_mount` varchar(30) NOT NULL,
  `lokasi_mount` varchar(100) NOT NULL,
  `foto_mount1` varchar(100) NOT NULL,
  `foto_mount2` varchar(100) NOT NULL,
  `foto_mount3` varchar(100) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `desk_mount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mount`
--

INSERT INTO `mount` (`id_mount`, `nama_mount`, `lokasi_mount`, `foto_mount1`, `foto_mount2`, `foto_mount3`, `harga_tiket`, `desk_mount`) VALUES
(1, 'Gunung Semeru', 'Ngampo, Jawa Timur', 'semeru.jpg', 'semeru.jpg', 'semeru.jpg', 150000, 'Gunung Semeru adalah gunung tertinggi di Pulau Jawa dengan ketinggian puncak 3.676 mdpl. Gunung favorit para pendaki ini juga menjadi gunung berapi tertinggi ketiga di Indonesia, setelah Gunung Kerinci (3805 mdpl) dan Rinjani (3726 mdpl).'),
(7, 'Gunung Merbabu', 'Kab. Boyolali, Jawa Tengah', 'sunrise-merbabu.jpg', '', '', 20000, 'Gunung Merbabu cukup populer sebagai ajang kegiatan pendakian. Medannya tidak terlalu berat namun potensi bahaya yang harus diperhatikan pendaki adalah udara dingin, kabut tebal, hutan yang lebat namun homogen (hutan tumbuhan runjung, yang tidak cukup mendukung sarana bertahan hidup atau survival), serta ketiadaan sumber air. Penghormatan terhadap tradisi warga setempat juga perlu menjadi pertimbangan. Ketinggian Gunung Merbabu 3.145 mdpl.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `pass`, `tgl_daftar`) VALUES
(1, 'syaifunnadhif@gmail.com', 'syaifun_nadhif', 'nadhif', '2022-03-21 07:47:47'),
(2, 'admin@gmail.com', 'admin', '$2y$10$N1ELU/mAab55pFMW16BHyuX8xymmXPDz/QptEKTNqnX2O.DeKwEoe', '2022-03-21 07:52:08'),
(3, 'masdic.@gmail.com', 'dicky', '$2y$10$fdZDcS4TfG1B0iKaaLFjCOacXZoyNh02N0W2ih4LNotGUp/ID0jqG', '2022-03-30 10:23:24'),
(4, 'adhi@gmail.com', 'adhi', '$2y$10$nQ3Ebmz0fViPY0qc4HCx.eU3yzDozUAcP8CNExLKtQgwUP7raWrCW', '2022-04-07 06:56:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mount`
--
ALTER TABLE `admin_mount`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mount`
--
ALTER TABLE `mount`
  ADD PRIMARY KEY (`id_mount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mount`
--
ALTER TABLE `admin_mount`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mount`
--
ALTER TABLE `mount`
  MODIFY `id_mount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
