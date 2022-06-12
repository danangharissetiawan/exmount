-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 08:36 AM
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
-- Table structure for table `biaya_admin`
--

CREATE TABLE `biaya_admin` (
  `id_bank` int(11) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `tarif_admin` int(11) NOT NULL,
  `pemilik_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_admin`
--

INSERT INTO `biaya_admin` (`id_bank`, `no_rekening`, `nama_bank`, `tarif_admin`, `pemilik_rek`) VALUES
(1, '123456789876540', 'BANK MANDIRI', 12000, 'Syaifun Nadhif'),
(2, '123456229876540', 'BANK BRI', 10000, 'Fitri'),
(3, '908456789876540', 'BANK BCA', 15000, 'Adit'),
(4, '111156229876540', 'BANK BNI', 11000, 'Irfan');

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
(7, 'Gunung Merbabu', 'Kab. Boyolali, Jawa Tengah', 'sunrise-merbabu.jpg', '', '', 30000, 'Gunung Merbabu cukup populer sebagai ajang kegiatan pendakian. Medannya tidak terlalu berat namun potensi bahaya yang harus diperhatikan pendaki adalah udara dingin, kabut tebal, hutan yang lebat namun homogen (hutan tumbuhan runjung, yang tidak cukup mendukung sarana bertahan hidup atau survival), serta ketiadaan sumber air. Penghormatan terhadap tradisi warga setempat juga perlu menjadi pertimbangan. Ketinggian Gunung Merbabu 3.145 mdpl.'),
(8, 'Gunung Rinjani', 'Sembalun, Lombok Timur, NTB', 'rinjani1.jpg', 'rinjani2.jpg', 'rinjani3.jpg', 200000, 'Gunung Rinjani adalah gunung berapi tertinggi ke-2 di Indonesia dengan tinggi 3.726 mdpl dan masuk dalam jajaran 7 summit Indonesia. Gunung Rinjani termasuk gunung favorit para pendaki gunung karena keindahan pemandangannya di sepanjang jalur pendakian. Kaldera yang luas, ditambah danau segara anakan yang melingkar kebiruan membuat siapapun tergiur untuk mendaki gunung tertinggi di Lombok, Nusa Tenggara Barat ini. Gunung Rinjani berada di Lombok, Nusa Tenggara Barat. Gunung Rinjani memang erat kaitannya dengan Legenda Dewi Anjani.');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(46, 1, '2022-06-12', 620000, 'Belum Lunas'),
(47, 1, '2022-06-12', 630000, 'Belum Lunas'),
(48, 1, '2022-06-12', 230000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tiket`
--

CREATE TABLE `pemesanan_tiket` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `gunung` varchar(100) NOT NULL,
  `tiket` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_pendakian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id_pemesanan`, `id_pembelian`, `id_produk`, `jumlah_tiket`, `gunung`, `tiket`, `total`, `tanggal_pendakian`) VALUES
(41, 46, 8, 3, 'Gunung Rinjani', 200000, 600000, '2022-06-18'),
(42, 46, 7, 1, 'Gunung Merbabu', 20000, 20000, '2022-06-30'),
(43, 47, 8, 3, 'Gunung Rinjani', 200000, 600000, '2022-06-20'),
(44, 47, 7, 1, 'Gunung Merbabu', 30000, 30000, '2022-06-27'),
(45, 48, 8, 1, 'Gunung Rinjani', 200000, 200000, '2022-06-17'),
(46, 48, 7, 1, 'Gunung Merbabu', 30000, 30000, '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `pass`, `telepon`) VALUES
(1, 'syaifunnadhif@gmail.com', 'syaifun_nadhif', 'nadhif', '088228659668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mount`
--
ALTER TABLE `admin_mount`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `biaya_admin`
--
ALTER TABLE `biaya_admin`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `mount`
--
ALTER TABLE `mount`
  ADD PRIMARY KEY (`id_mount`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD PRIMARY KEY (`id_pemesanan`);

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
-- AUTO_INCREMENT for table `biaya_admin`
--
ALTER TABLE `biaya_admin`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mount`
--
ALTER TABLE `mount`
  MODIFY `id_mount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
