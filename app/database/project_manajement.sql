-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2020 pada 05.03
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_manajement`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `nama`, `username`, `password`, `id_level`) VALUES
(40, 'admin', 'Admin', '$2y$10$oS/DygpWJ8jKmyWMblNSkeQe2tq94j19uIYpNzJ/2gs/wAK5gu3q2', 3),
(41, 'Wahyu Purnama', 'wahyu', '$2y$10$ODTpxh3fKLPSGIXPANSTiutZLhxjZkiVKXPC6oCCr68MU1gtp1Dxa', 2),
(42, 'Yudha Adistara', 'yudha', '$2y$10$G9erDNqol46r1N1ZrpexL.PdnYN.4xQAGHfWS4x1yaQ0HlfQtDfoe', 2),
(43, 'Prihandana putra', 'prihandana', '$2y$10$WwWdvnPeTyecNrwOxy4XGOLWdaP.sStgdVDFRgnSs1s.VgHOnIfim', 1),
(44, 'Trinity Laksmi', 'trinity', '$2y$10$XwnxL5CaMItZDeaer6dxoeBbNNLoXCnZQalFbghBVWlZEkDDcUKku', 1),
(45, 'Jeni Andini', 'jeni', '$2y$10$Mal6hYkknfSixJB0L5KZqOKZnZ3K9zow2ehEgSu2F6uKuPbBjpOD6', 1),
(46, 'rifki rafi\'i', 'rifki', '$2y$10$K88v14msDawtvWb/xPLJZeYHDqBdZmJI5Fpk3WbGn1rWPENIDhWrK', 1),
(47, 'Nulia Pratiwi', 'nulia', '$2y$10$AFpQKvG/ce0NeGHHmdn/DOFGvGnPk/AAh70Ra7CsmzJ0zZ.egz2vi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_projek`
--

CREATE TABLE `jenis_projek` (
  `id_jenis` int(11) NOT NULL,
  `jenis_projek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_projek`
--

INSERT INTO `jenis_projek` (`id_jenis`, `jenis_projek`) VALUES
(1, 'Web Aplikasi '),
(2, 'Android');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` int(11) NOT NULL,
  `id_auth` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tanggal_awal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_auth`, `id_projek`, `id_jenis`, `tanggal_awal`) VALUES
(48, 44, 40, 1, '2020-03-24 18:56:41'),
(49, 45, 40, 1, '2020-03-24 18:56:53'),
(57, 43, 40, 1, '2020-02-25 16:39:35'),
(58, 47, 40, 1, '2020-02-25 16:40:57'),
(77, 43, 44, 2, '2020-02-25 21:44:54'),
(79, 43, 44, 2, '2020-02-26 07:20:54'),
(80, 43, 44, 2, '2020-02-26 07:21:12'),
(81, 43, 44, 2, '2020-02-26 07:24:39'),
(82, 44, 44, 2, '2020-02-26 07:25:37'),
(83, 43, 44, 2, '2020-02-26 07:45:31'),
(84, 44, 44, 2, '2020-02-26 07:56:03'),
(85, 43, 44, 2, '2020-02-26 08:00:43'),
(86, 43, 44, 2, '2020-02-26 08:06:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_auth` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_auth`, `id_jenis`, `tugas`, `tanggal_input`) VALUES
(39, 43, 1, 'membuat login', '2020-03-24 19:08:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(3, 'admin'),
(2, 'leader'),
(1, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_projek`
--

CREATE TABLE `tb_projek` (
  `id_projek` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_auth` int(11) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `tanggal_awal` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_akhir` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_projek`
--

INSERT INTO `tb_projek` (`id_projek`, `id_jenis`, `id_auth`, `tugas`, `tanggal_awal`, `tanggal_akhir`) VALUES
(40, 2, 41, 'membuat web sekolah smk n 1 denpasar', '2020-03-24', '2020-02-25'),
(41, 1, 41, 'asdas', '2020-02-25', '2020-02-25'),
(42, 1, 41, 'asdas', '2020-02-25', '2020-02-25'),
(43, 2, 41, 'sdasda', '2020-02-25', '2020-02-25'),
(44, 2, 41, 'gfg', '2020-02-25', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `jenis_projek`
--
ALTER TABLE `jenis_projek`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_auth` (`id_auth`),
  ADD KEY `id_projek` (`id_projek`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_auth` (`id_auth`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `level` (`level`),
  ADD KEY `level_2` (`level`);

--
-- Indeks untuk tabel `tb_projek`
--
ALTER TABLE `tb_projek`
  ADD PRIMARY KEY (`id_projek`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_auth` (`id_auth`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `jenis_projek`
--
ALTER TABLE `jenis_projek`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_projek`
--
ALTER TABLE `tb_projek`
  MODIFY `id_projek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`id_projek`) REFERENCES `tb_projek` (`id_projek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_projek` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_projek` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_projek`
--
ALTER TABLE `tb_projek`
  ADD CONSTRAINT `tb_projek_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_projek` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_projek_ibfk_3` FOREIGN KEY (`id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
