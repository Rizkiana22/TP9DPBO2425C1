-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2025 pada 16.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembalap`
--

CREATE TABLE `pembalap` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `poinMusim` int(11) DEFAULT 0,
  `jumlahMenang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembalap`
--

INSERT INTO `pembalap` (`id`, `nama`, `tim`, `negara`, `poinMusim`, `jumlahMenang`) VALUES
(1, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 340, 10),
(3, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
(4, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
(5, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
(6, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
(7, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
(8, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
(9, 'Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
(10, 'Fernando Alonso', 'Alpine', 'Spain', 65, 0),
(11, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
(12, 'Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
(13, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
(14, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
(15, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
(16, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
(17, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
(18, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
(19, 'Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
(20, 'Fernando Alonso', 'Alpine', 'Spain', 65, 0),
(22, 'Anton', 'Bangton', 'Rancekek', 34, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `namaTim` varchar(100) NOT NULL,
  `negaraAsal` varchar(100) DEFAULT NULL,
  `tahunBerdiri` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id`, `namaTim`, `negaraAsal`, `tahunBerdiri`) VALUES
(1, 'Bangton Repsol', 'Indonesia', '2000'),
(2, 'Esemka', 'Indonesia', '2002'),
(3, 'Esemka Gacor', 'Solo', '2067');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
