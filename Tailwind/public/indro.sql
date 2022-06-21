-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 09:32 AM
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

--
-- Dumping data for table `admin_mount`
--

INSERT INTO `admin_mount` (`id_admin`, `nama`, `username`, `pass`) VALUES
(1, 'admin', 'admin', 'admin');

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
(4, '111156229876540', 'BANK BNI', 13000, 'Irfan');

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
  `desk_mount` text NOT NULL,
  `basecamp` varchar(30) NOT NULL,
  `ketinggain` int(11) NOT NULL,
  `penjamin` varchar(20) NOT NULL,
  `telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mount`
--

INSERT INTO `mount` (`id_mount`, `nama_mount`, `lokasi_mount`, `foto_mount1`, `foto_mount2`, `foto_mount3`, `harga_tiket`, `desk_mount`, `basecamp`, `ketinggain`, `penjamin`, `telepon`) VALUES
(1, 'Gunung Semeru', 'Ngampo, Jawa Timur', 'semeru1.jpg', 'semeru2.jpg', 'semeru3.jpg', 310000, 'Gunung Semeru adalah gunung tertinggi di Pulau Jawa dengan ketinggian puncak 3.676 mdpl. Gunung favorit para pendaki ini juga menjadi gunung berapi tertinggi ketiga di Indonesia, setelah Gunung Kerinci (3805 mdpl) dan Rinjani (3726 mdpl).', '', 0, '', 0),
(7, 'Gunung Merbabu', 'Kab. Boyolali, Jawa Tengah', 'merbabu1.jpg', 'merbabu2.jpg', 'merbabu3.jpg', 7500, 'Gunung Merbabu cukup populer sebagai ajang kegiatan pendakian. Medannya tidak terlalu berat namun potensi bahaya yang harus diperhatikan pendaki adalah udara dingin, kabut tebal, hutan yang lebat namun homogen (hutan tumbuhan runjung, yang tidak cukup mendukung sarana bertahan hidup atau survival), serta ketiadaan sumber air. Penghormatan terhadap tradisi warga setempat juga perlu menjadi pertimbangan. Ketinggian Gunung Merbabu 3.145 mdpl.', '', 0, '', 0),
(8, 'Gunung Merapi', 'Kab. Sleman, Jawa Tengah', 'merapi1.jpg', 'merapi2.jpg', 'merapi3.jpg', 16000, 'Gunung Merapi adalah gunung yang wilayahnya berada di dua provinsi yaitu Jawa Tengah, dan Daerah Istimewa Yogyakarta. Gunung Merapi mempunyai ketinggian 2.930 mdpl (meter diatas permukaan laut). Gunung ini adalah salah satu gunung berapi paling aktif di Indonesia.', '', 0, '', 0),
(9, 'Gunung Andong', 'Kab. Magelang, Jawa Tengah', 'andong1.jpg', 'andong2.jpg', 'andong3.jpg', 20000, 'Gunung Andong merupakan destinasi pendakian yang letaknya berada di antara Desa Ngablak dan Desa Tlogorejo, Grabag, Kabupaten Magelang, Provinsi Jawa Tengah. Pesona Gunung Andong sangat menawan sehingga banyak pendaki yang menjadi lokasi untuk menghabiskan waktu di akhir pekan dan menikmati pemandangan matahari terbit. Gunung Andong yang memiliki ketinggian 1.726 mdpl ini merupakan gunung yang ramah untuk pendaki pemula.', '', 0, '', 0),
(10, 'Gunung Rinjani', 'Lombok, Nusa Tenggara Barat', 'rinjani1.jpg', 'rinjani2.jpg', 'rinjani3.jpg', 10000, 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl. Gunung ini merupakan salah satu gunung terfavorit bagi pendaki Indonesia karena keindahan pemandangannya.', '', 0, '', 0),
(11, 'Gunung Ijen', 'Kab. Bondowoso, Jawa Timur', 'ijen1.jpg', 'ijen2.jpg', 'ijen3.jpg', 30000, 'Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.386 mdpl dan terletak berdampingan dengan Gunung Merapi. Salah satu fenomena alam yang paling terkenal dari Gunung Ijen adalah blue fire (api biru) di dalam kawah yang terletak di puncak gunung tersebut. Pendakian gunung ini bisa dimulai dari dua tempat, yakni dari Banyuwangi atau dari Bondowoso.', '', 0, '', 0),
(12, 'Gunung Bromo', 'Jawa Timur', 'bromo1.jpg', 'bromo2.jpg', 'bromo3.jpg', 34000, 'Gunung Bromo adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 mdpl dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif.', '', 0, '', 0),
(14, 'Gunung Prau', 'Kab. Wonosobo, Jawa Tengah', 'prau1.jpg', 'prau2.jpg', 'prau3.jpg', 15000, 'Gunung Prau adalah salah satu gunung di Dataran Tinggi Dieng, Jawa Tengah, Indonesia. Gunung Prau memiliki ketinggian 2.590 mdpl. Gunung ini merupakan tapal batas antara empat kabupaten yaitu Kabupaten Batang, Kabupaten Kendal, Kabupaten Temanggung dan Kabupaten Wonosobo. Puncak dari Gunung Prau merupakan padang rumput luas yang memanjang dari barat ke timur. Bukit-bukit dan sabana dengan sedikit pepohonan dapat dijumpai pada puncaknya.', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `penyetor` varchar(50) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `penyetor`, `bank`, `total`, `bukti`, `tanggal`) VALUES
(11, 60, 'Nadhif', 'Bank Mandiri', 225000, 0, '2022-06-21'),
(12, 62, 'Adit', 'Bank BRI', 460000, 0, '2022-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `id_bank`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(60, 1, 1, '2022-06-21', 225000, 'Lunas'),
(61, 1, 3, '2022-06-21', 3500000, 'Belum Lunas'),
(62, 5, 2, '2022-06-21', 460000, 'Lunas'),
(63, 5, 1, '2022-06-21', 2170000, 'Belum Lunas'),
(64, 5, 0, '2022-06-21', 16000, 'Belum Lunas'),
(65, 5, 2, '2022-06-21', 10230000, 'Belum Lunas'),
(66, 5, 4, '2022-06-21', 7500, 'Belum Lunas'),
(67, 1, 2, '2022-06-21', 16000, 'Belum Lunas');

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
(61, 60, 7, 10, 'Gunung Merbabu', 7500, 75000, '2022-06-24'),
(62, 60, 14, 10, 'Gunung Prau', 15000, 150000, '2022-07-08'),
(63, 61, 1, 10, 'Gunung Semeru', 310000, 3100000, '2022-07-02'),
(64, 61, 9, 20, 'Gunung Andong', 20000, 400000, '2022-07-30'),
(65, 62, 11, 10, 'Gunung Ijen', 30000, 300000, '2022-06-25'),
(66, 62, 8, 10, 'Gunung Merapi', 16000, 160000, '2022-06-30'),
(67, 63, 1, 7, 'Gunung Semeru', 310000, 2170000, '2022-07-02'),
(68, 64, 8, 1, 'Gunung Merapi', 16000, 16000, '2022-06-29'),
(69, 65, 1, 33, 'Gunung Semeru', 310000, 10230000, '0000-00-00'),
(70, 66, 7, 1, 'Gunung Merbabu', 7500, 7500, '0000-00-00'),
(71, 67, 8, 1, 'Gunung Merapi', 16000, 16000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sewajasa`
--

CREATE TABLE `sewajasa` (
  `id_sewa` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewajasa`
--

INSERT INTO `sewajasa` (`id_sewa`, `nama_produk`, `harga`, `foto_produk`) VALUES
(1, 'Carrier 60 L', 10000, 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/11/18/63100352-b2da-4604-988b-eddca494fea7.jpg'),
(2, 'Sleeping Bag', 8000, 'https://images.tokopedia.net/img/cache/500-square/product-1/2020/3/12/40948063/40948063_8a82b8ac-c2d9-4bb6-bd96-48448e9ac8cb_1000_1000'),
(3, 'Porter Gunung', 150000, 'https://img.celebrities.id/okz/900/2w21oK/master_0JeY32JN91_1210_porter.jpg');

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
(1, 'syaifunnadhif@gmail.com', 'syaifun_nadhif', 'nadhif', '088228659668'),
(5, 'Aditya@gmail.com', 'adit', 'adit', '089675432897'),
(6, 'Latlatul@gmail.com', 'fitri', 'fitri', '089675432111'),
(7, 'Irfan@gmail.com', 'Irfan ', 'Irfan ', '089675432444');

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
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `sewajasa`
--
ALTER TABLE `sewajasa`
  ADD PRIMARY KEY (`id_sewa`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biaya_admin`
--
ALTER TABLE `biaya_admin`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mount`
--
ALTER TABLE `mount`
  MODIFY `id_mount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sewajasa`
--
ALTER TABLE `sewajasa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD CONSTRAINT `pemesanan_tiket_ibfk_2` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
