-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jul 2023 pada 15.05
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taeel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basiskasus`
--

CREATE TABLE `basiskasus` (
  `ID_Kasus` int(11) NOT NULL,
  `ID_Kerusakan` int(11) DEFAULT NULL,
  `ID_Gejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basiskasus`
--

INSERT INTO `basiskasus` (`ID_Kasus`, `ID_Kerusakan`, `ID_Gejala`) VALUES
(1, 1, '1'),
(2, 2, '2,3'),
(3, 3, '4,5'),
(4, 4, '6,7'),
(5, 5, '8'),
(6, 6, '9'),
(7, 7, '10,11'),
(8, 8, '12'),
(9, 10, '13,14,15'),
(10, 12, '18,19,20'),
(11, 13, '21'),
(12, 14, '5,22'),
(13, 15, '24,25'),
(14, 16, '26'),
(15, 17, '27'),
(16, 18, '28,29'),
(17, 19, '30'),
(18, 20, '5,31'),
(19, 21, '33,34'),
(20, 22, '35,36'),
(21, 23, '37'),
(22, 24, '38,39'),
(23, 25, '40,41'),
(24, 26, '42'),
(25, 27, '5,43'),
(26, 28, '44'),
(27, 29, '45,46'),
(28, 30, '5,47'),
(29, 31, '48,49,50'),
(30, 32, '51'),
(31, 33, '52'),
(32, 11, '16,17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `ID_Gejala` int(11) NOT NULL,
  `Nama_Gejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`ID_Gejala`, `Nama_Gejala`) VALUES
(1, 'Lampu warning Menyala'),
(2, 'Gangguan pada alat komunikasi'),
(3, 'Pilot tidak konumikasi dengan jelas  kepada ATC'),
(4, 'Pesawat tidak bisa terbang secara  seimbang'),
(5, 'Pesawat sulit dikendalikan'),
(6, 'Hilangnya control pada pesawat'),
(7, 'Terlalu besarnya Drag'),
(8, 'Eror Nose Landing Gear Drag Link  Spring Support Liner '),
(9, 'Eror Nose Landing Gear Drag Link  Bushing'),
(10, 'Terdapat goresan dalam disekitar  fusalage'),
(11, 'Adanya getaran pada fuselage '),
(12, 'Eror Rudder Pedal'),
(13, 'Getaran Berlebihan Terjadi Saat Take off'),
(14, 'Getaran Berlebihan Terjadi Saat  Landing '),
(15, 'Pilot Melaporkan Adanya Getaran  Berlebih Pada body pesawat terbang '),
(16, 'Adanya getaran di sayap'),
(17, 'Terdapat goresan dalam disekitar  sayap'),
(18, 'Adanya getaran di tail'),
(19, 'Adanya retak di tail'),
(20, 'Adanya goresan dalam pada tail'),
(21, 'Eror pada nose '),
(22, 'Sering Terjadi hilang keseimbangan  saat terbang menanjak'),
(24, 'Ruangan cabin panas'),
(25, 'Suhu standar maksimun di kabin  tinggi'),
(26, 'Kebocoran Cairan Hydraulic Pada  Nose'),
(27, 'Getaran pada saat terbang telajah'),
(28, 'Lampu cabin tidak hidup'),
(29, 'Kurangnya Respon indicator pada  cockpit'),
(30, 'Tekanan Hand Brake Low'),
(31, 'Pilot sulit mengubah posisi pesawat  saat terbang'),
(33, 'Udara luar masuk lewat jendela  pesawat'),
(34, 'Tekanan udara di fuselage naik'),
(35, 'Spiker tidak dapat mengeluarkan suara  atau menerima suara'),
(36, 'Tidak adanya komunikasi '),
(37, 'sayap disisi Kanan Tidak Bekerja  Dengan Baik'),
(38, 'Terdapat Cairan Pada indicator yang  bocor'),
(39, 'Penurunan tekanan yang terbaca atau  bahkan penurunan tiba-tiba ke nol'),
(40, 'Terdapat pitot pada cabin yang bocor '),
(41, 'Overheat'),
(42, 'Adanya indicator Mengalami  Keausan'),
(43, 'Kecepatan tidak stabil'),
(44, 'Altimeter tidak membaca ketinggiuan  denga akurat'),
(45, 'Tidak bisa mengendalikan kecepatan  pesawat'),
(46, 'VSI yang tidak berfungsi dengan baik'),
(47, 'Pesawat kesulitan belok'),
(48, 'Artificial pada pesawat eror'),
(49, 'Tidak akurat tentang kondisi cuaca '),
(50, 'Pemanduan yang tidak efisien'),
(51, 'Engine indicator off '),
(52, 'Oil pressure indicator eror');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `ID_Hasil` int(11) NOT NULL,
  `ID_Kerusakan` int(11) DEFAULT NULL,
  `ID_Gejala` varchar(255) DEFAULT NULL,
  `NilaiJ` float DEFAULT NULL,
  `Tanggal_Waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `ID_Kerusakan` int(11) NOT NULL,
  `Nama_Kerusakan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`ID_Kerusakan`, `Nama_Kerusakan`) VALUES
(1, 'Ada bagian dari  pesawat yang rusak'),
(2, 'Instrument ada yang  eror'),
(3, 'Altimeter eror'),
(4, 'Speed indicator eror'),
(5, 'Eror sensor pada  indicator landing gear '),
(6, 'Eror sensor rpm pada  indicator landing gear'),
(7, 'Fuselage retak'),
(8, 'Landing tidak bisa  mendarat '),
(10, 'Fuselage retak dan  beberapa indicator  eror'),
(11, 'Sayap pada fuselage  akan retak dan patah'),
(12, ' Tail akan patah'),
(13, 'Kerusakan pada nose dan indicator'),
(14, 'Altimeter dan airspeed indicator'),
(15, 'Ac eros'),
(16, 'landing gear dan indicator eror'),
(17, ' Altimeter dan fuselage'),
(18, 'Kelistikan pada fuselage eror'),
(19, ' Hand brake eror'),
(20, ' Altimeter eror'),
(21, ' Jendela cabin retak  atau pecah'),
(22, 'Spiker rusak'),
(23, ' Altimeter rusak '),
(24, 'Indicator ada yang bocor '),
(25, ' Fuselage panas'),
(26, ' Indicator eror'),
(27, 'Air speed indicator  eror'),
(28, 'Altimeter'),
(29, ' Vertical speed eror'),
(30, ' Kerusakan pada turn dan bank indicator'),
(31, 'Artificial'),
(32, ' Engine mati'),
(33, 'Indicator bocor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `knn`
--

CREATE TABLE `knn` (
  `ID_knn` int(11) NOT NULL,
  `ID_Kasus` int(11) DEFAULT NULL,
  `ID_Kerusakan` int(11) DEFAULT NULL,
  `Nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `knn`
--

INSERT INTO `knn` (`ID_knn`, `ID_Kasus`, `ID_Kerusakan`, `Nilai`) VALUES
(1, 9, 10, 0.166667),
(2, 18, 20, 0),
(3, 31, 33, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD PRIMARY KEY (`ID_Kasus`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`ID_Gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`ID_Hasil`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`ID_Kerusakan`);

--
-- Indexes for table `knn`
--
ALTER TABLE `knn`
  ADD PRIMARY KEY (`ID_knn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basiskasus`
--
ALTER TABLE `basiskasus`
  MODIFY `ID_Kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `ID_Gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `ID_Hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `ID_Kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `knn`
--
ALTER TABLE `knn`
  MODIFY `ID_knn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
