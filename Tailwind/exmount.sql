-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 03.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

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
-- Struktur dari tabel `mount`
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
  `stok_mount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mount`
--

INSERT INTO `mount` (`id_mount`, `nama_mount`, `lokasi_mount`, `foto_mount1`, `foto_mount2`, `foto_mount3`, `harga_tiket`, `desk_mount`, `stok_mount`) VALUES
(1, 'Gunung Semeru', 'Ngampo, Jawa Timur', 'semeru1.jpg', 'semeru2.jpg', 'semeru3.jpg', 310000, 'Gunung Semeru adalah gunung tertinggi di Pulau Jawa dengan ketinggian puncak 3.676 mdpl. Gunung favorit para pendaki ini juga menjadi gunung berapi tertinggi ketiga di Indonesia, setelah Gunung Kerinci (3805 mdpl) dan Rinjani (3726 mdpl).', 25),
(7, 'Gunung Merbabu', 'Kab. Boyolali, Jawa Tengah', 'merbabu1.jpg', 'merbabu2.jpg', 'merbabu3.jpg', 7500, 'Gunung Merbabu cukup populer sebagai ajang kegiatan pendakian. Medannya tidak terlalu berat namun potensi bahaya yang harus diperhatikan pendaki adalah udara dingin, kabut tebal, hutan yang lebat namun homogen (hutan tumbuhan runjung, yang tidak cukup mendukung sarana bertahan hidup atau survival), serta ketiadaan sumber air. Penghormatan terhadap tradisi warga setempat juga perlu menjadi pertimbangan. Ketinggian Gunung Merbabu 3.145 mdpl.', 25),
(8, 'Gunung Merapi', 'Kab. Sleman, Jawa Tengah', 'merapi1.jpg', 'merapi2.jpg', 'merapi3.jpg', 16000, 'Gunung Merapi adalah gunung yang wilayahnya berada di dua provinsi yaitu Jawa Tengah, dan Daerah Istimewa Yogyakarta. Gunung Merapi mempunyai ketinggian 2.930 mdpl (meter diatas permukaan laut). Gunung ini adalah salah satu gunung berapi paling aktif di Indonesia.', 5),
(9, 'Gunung Andong', 'Kab. Magelang, Jawa Tengah', 'andong1.jpg', 'andong2.jpg', 'andong3.jpg', 20000, 'Gunung Andong merupakan destinasi pendakian yang letaknya berada di antara Desa Ngablak dan Desa Tlogorejo, Grabag, Kabupaten Magelang, Provinsi Jawa Tengah. Pesona Gunung Andong sangat menawan sehingga banyak pendaki yang menjadi lokasi untuk menghabiskan waktu di akhir pekan dan menikmati pemandangan matahari terbit. Gunung Andong yang memiliki ketinggian 1.726 mdpl ini merupakan gunung yang ramah untuk pendaki pemula.', 5),
(10, 'Gunung Rinjani', 'Lombok, Nusa Tenggara Barat', 'rinjani1.jpg', 'rinjani2.jpg', 'rinjani3.jpg', 10000, 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl. Gunung ini merupakan salah satu gunung terfavorit bagi pendaki Indonesia karena keindahan pemandangannya.', 25),
(11, 'Gunung Ijen', 'Kab. Bondowoso, Jawa Timur', 'ijen1.jpg', 'ijen2.jpg', 'ijen3.jpg', 30000, 'Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.386 mdpl dan terletak berdampingan dengan Gunung Merapi. Salah satu fenomena alam yang paling terkenal dari Gunung Ijen adalah blue fire (api biru) di dalam kawah yang terletak di puncak gunung tersebut. Pendakian gunung ini bisa dimulai dari dua tempat, yakni dari Banyuwangi atau dari Bondowoso.', 0),
(12, 'Gunung Bromo', 'Jawa Timur', 'bromo1.jpg', 'bromo2.jpg', 'bromo3.jpg', 34000, 'Gunung Bromo adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 mdpl dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif.', 25),
(13, 'Gunung Sibayak', 'Kab. Karo, Sumatera Utara', 'sibayak1.jpg', 'sibayak2.jpg', 'sibayak3.jpg', 4000, 'Gunung Berapi Sibayak dalam keadaaan aktif berlokasi di atas ketinggian 2.172 mdpl. Pendakiannya melewati hutan belantara tropis dan tebing yang penuh tantangan serta di puncak gunung terdapat hamparan dataran tempat berkemah. Dari puncak gunung terlihat kawah yang masih aktif mengeluarkan magma dan pemandangan yang indah dan menawan. Lama pendakian diperkirakan lebih kurang 2 sampai dengan 3 jam.', 0),
(14, 'Gunung Prau', 'Kab. Wonosobo, Jawa Tengah', 'prau1.jpg', 'prau2.jpg', 'prau3.jpg', 15000, 'Gunung Prau adalah salah satu gunung di Dataran Tinggi Dieng, Jawa Tengah, Indonesia. Gunung Prau memiliki ketinggian 2.590 mdpl. Gunung ini merupakan tapal batas antara empat kabupaten yaitu Kabupaten Batang, Kabupaten Kendal, Kabupaten Temanggung dan Kabupaten Wonosobo. Puncak dari Gunung Prau merupakan padang rumput luas yang memanjang dari barat ke timur. Bukit-bukit dan sabana dengan sedikit pepohonan dapat dijumpai pada puncaknya.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_mount` varchar(30) NOT NULL,
  `nama_mount` varchar(100) NOT NULL,
  `harga_tiket` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_pendakian` varchar(100) NOT NULL,
  `total` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `username`, `email`, `id_mount`, `nama_mount`, `harga_tiket`, `qty`, `waktu_transaksi`, `waktu_pendakian`, `total`, `status`) VALUES
(4, 4, 'adhi', 'adhi@gmail.com', '1, 10', 'Gunung Semeru, Gunung Rinjani', '310000, 10000', '2, 1', '2022-06-08 16:06:33', '2022-06-14 03:46:00, 2022-06-15 03:46:00', '630000', 'Belum Bayar'),
(5, 4, 'adhi', 'adhi@gmail.com', '12, 8, 1, 10', 'Gunung Bromo, Gunung Merapi, Gunung Semeru, Gunung Rinjani', '34000, 16000, 310000, 10000', '1, 1, 2, 1', '2022-06-08 16:23:52', '2022-06-17 07:25:00, 2022-06-16 07:25:00, 2022-06-21 08:27:00, 2022-06-28 09:29:00', '680000', 'Belum Bayar'),
(6, 4, 'adhi', 'adhi@gmail.com', '12, 8', 'Gunung Bromo, Gunung Merapi', '34000, 16000', '2, 2', '2022-06-08 19:58:51', '2022-06-15 09:57:00, 2022-06-21 10:58:00', '100000', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `peran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `telepon`, `pass`, `tgl_daftar`, `peran`) VALUES
(1, 'syaifunnadhif@gmail.com', 'syaifun_nadhif', '0', 'nadhif', '2022-03-21 07:47:47', ''),
(2, 'admin@gmail.com', 'admin', '0', '$2y$10$N1ELU/mAab55pFMW16BHyuX8xymmXPDz/QptEKTNqnX2O.DeKwEoe', '2022-06-05 23:19:03', 'admin'),
(3, 'masdic.@gmail.com', 'dicky', '0', '$2y$10$fdZDcS4TfG1B0iKaaLFjCOacXZoyNh02N0W2ih4LNotGUp/ID0jqG', '2022-06-05 23:19:14', 'pengelola'),
(4, 'adhi@gmail.com', 'adhi', '081327309987', '$2y$10$nQ3Ebmz0fViPY0qc4HCx.eU3yzDozUAcP8CNExLKtQgwUP7raWrCW', '2022-06-08 19:39:31', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mount`
--
ALTER TABLE `mount`
  ADD PRIMARY KEY (`id_mount`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mount`
--
ALTER TABLE `mount`
  MODIFY `id_mount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
