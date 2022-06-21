-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2022 pada 07.56
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
-- Struktur dari tabel `admin_mount`
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
  `desk_mount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mount`
--

INSERT INTO `mount` (`id_mount`, `nama_mount`, `lokasi_mount`, `foto_mount1`, `foto_mount2`, `foto_mount3`, `harga_tiket`, `desk_mount`) VALUES
(1, 'Gunung Semeru', 'Ngampo, Jawa Timur', 'semeru1.jpg', 'semeru2.jpg', 'semeru3.jpg', 310000, 'Gunung Semeru adalah gunung tertinggi di Pulau Jawa dengan ketinggian puncak 3.676 mdpl. Gunung favorit para pendaki ini juga menjadi gunung berapi tertinggi ketiga di Indonesia, setelah Gunung Kerinci (3805 mdpl) dan Rinjani (3726 mdpl).'),
(7, 'Gunung Merbabu', 'Kab. Boyolali, Jawa Tengah', 'merbabu1.jpg', 'merbabu2.jpg', 'merbabu3.jpg', 7500, 'Gunung Merbabu cukup populer sebagai ajang kegiatan pendakian. Medannya tidak terlalu berat namun potensi bahaya yang harus diperhatikan pendaki adalah udara dingin, kabut tebal, hutan yang lebat namun homogen (hutan tumbuhan runjung, yang tidak cukup mendukung sarana bertahan hidup atau survival), serta ketiadaan sumber air. Penghormatan terhadap tradisi warga setempat juga perlu menjadi pertimbangan. Ketinggian Gunung Merbabu 3.145 mdpl.'),
(8, 'Gunung Merapi', 'Kab. Sleman, Jawa Tengah', 'merapi1.jpg', 'merapi2.jpg', 'merapi3.jpg', 16000, 'Gunung Merapi adalah gunung yang wilayahnya berada di dua provinsi yaitu Jawa Tengah, dan Daerah Istimewa Yogyakarta. Gunung Merapi mempunyai ketinggian 2.930 mdpl (meter diatas permukaan laut). Gunung ini adalah salah satu gunung berapi paling aktif di Indonesia.'),
(9, 'Gunung Andong', 'Kab. Magelang, Jawa Tengah', 'andong1.jpg', 'andong2.jpg', 'andong3.jpg', 20000, 'Gunung Andong merupakan destinasi pendakian yang letaknya berada di antara Desa Ngablak dan Desa Tlogorejo, Grabag, Kabupaten Magelang, Provinsi Jawa Tengah. Pesona Gunung Andong sangat menawan sehingga banyak pendaki yang menjadi lokasi untuk menghabiskan waktu di akhir pekan dan menikmati pemandangan matahari terbit. Gunung Andong yang memiliki ketinggian 1.726 mdpl ini merupakan gunung yang ramah untuk pendaki pemula.'),
(10, 'Gunung Rinjani', 'Lombok, Nusa Tenggara Barat', 'rinjani1.jpg', 'rinjani2.jpg', 'rinjani3.jpg', 10000, 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl. Gunung ini merupakan salah satu gunung terfavorit bagi pendaki Indonesia karena keindahan pemandangannya.'),
(11, 'Gunung Ijen', 'Kab. Bondowoso, Jawa Timur', 'ijen1.jpg', 'ijen2.jpg', 'ijen3.jpg', 30000, 'Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.386 mdpl dan terletak berdampingan dengan Gunung Merapi. Salah satu fenomena alam yang paling terkenal dari Gunung Ijen adalah blue fire (api biru) di dalam kawah yang terletak di puncak gunung tersebut. Pendakian gunung ini bisa dimulai dari dua tempat, yakni dari Banyuwangi atau dari Bondowoso.'),
(12, 'Gunung Bromo', 'Jawa Timur', 'bromo1.jpg', 'bromo2.jpg', 'bromo3.jpg', 34000, 'Gunung Bromo adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 mdpl dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif.'),
(13, 'Gunung Sibayak', 'Kab. Karo, Sumatera Utara', 'sibayak1.jpg', 'sibayak2.jpg', 'sibayak3.jpg', 4000, 'Gunung Berapi Sibayak dalam keadaaan aktif berlokasi di atas ketinggian 2.172 mdpl. Pendakiannya melewati hutan belantara tropis dan tebing yang penuh tantangan serta di puncak gunung terdapat hamparan dataran tempat berkemah. Dari puncak gunung terlihat kawah yang masih aktif mengeluarkan magma dan pemandangan yang indah dan menawan. Lama pendakian diperkirakan lebih kurang 2 sampai dengan 3 jam.'),
(14, 'Gunung Prau', 'Kab. Wonosobo, Jawa Tengah', 'prau1.jpg', 'prau2.jpg', 'prau3.jpg', 15000, 'Gunung Prau adalah salah satu gunung di Dataran Tinggi Dieng, Jawa Tengah, Indonesia. Gunung Prau memiliki ketinggian 2.590 mdpl. Gunung ini merupakan tapal batas antara empat kabupaten yaitu Kabupaten Batang, Kabupaten Kendal, Kabupaten Temanggung dan Kabupaten Wonosobo. Puncak dari Gunung Prau merupakan padang rumput luas yang memanjang dari barat ke timur. Bukit-bukit dan sabana dengan sedikit pepohonan dapat dijumpai pada puncaknya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--


--
-- Dumping data untuk tabel `users`
--


-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_mount`
--

-- Indeks untuk tabel `mount`
--
ALTER TABLE `mount`
  ADD PRIMARY KEY (`id_mount`);

--
-- Indeks untuk tabel `users`
--

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_mount`

--
-- AUTO_INCREMENT untuk tabel `mount`
--
ALTER TABLE `mount`
  MODIFY `id_mount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
