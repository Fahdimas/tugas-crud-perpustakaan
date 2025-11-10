-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Waktu pembuatan: 10 Nov 2025 pada 02.36
-- Versi server: 11.4.7-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40378065_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `tahun_terbit`, `cover_image`) VALUES
(5, 'Laskar Pelangi', 'Andrea Hirata', 2005, '1762755557_laskar.jpg'),
(6, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1979, '1762755603_Bumi manusia.jpg'),
(7, 'Harry Potter dan Batu Bertuah', 'J.K. Rowling', 1997, '1762755685_Harry potter dan batu.jpg'),
(8, 'Negeri 5 Menara', 'Ahmad Fuadi', 2009, '1762755739_Negeri 5 menara.jpg'),
(9, 'Filosofi Teras', 'Henry Manampiring', 2018, '1762755798_filosofi teras.jpg'),
(10, 'Dilan 1990', 'Pidi Baiq', 2014, '1762755867_Dilan.jpg'),
(11, 'Atomic Habits', 'James Clear', 2018, '1762755952_atomic.jpg'),
(12, 'Laut Bercerita', 'Leila S. Chudori', 2017, '1762756005_laut bercerita.jpg'),
(13, 'Cantik Itu Luka', 'Eka Kurniawan', 2002, '1762756050_cinta itu luka.jpg'),
(14, 'Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari', 2011, '1762756099_sapiens.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
