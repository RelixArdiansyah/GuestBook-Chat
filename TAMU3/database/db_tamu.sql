-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 23.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `comment_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_users`, `comment_at`) VALUES
(9, 'MAKAN', 4, '2023-01-26 13:33:39'),
(10, 'MAKAN', 4, '2023-01-26 13:34:00'),
(14, 'hallo', 10, '2023-01-26 15:41:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `is_active` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `photo`, `role`, `is_active`, `created_at`) VALUES
(1, 'Riko Ardiansyah', 'admin', '0192023a7bbd73250516f069df18b500', 'clain.jpg', 'admin', 'active', '2023-01-23 22:02:05'),
(4, 'HABIB', 'HABIB', '24e68635baa35179cd6ab0a2e6ca4aee', 'arya_99_1674631849.png', 'user', 'active', '2023-01-25 07:30:51'),
(5, 'RIKO', 'RIKO', '931a79e174fefb76c386520faa2799b5', 'RIKO_1674740282.jpeg', 'user', 'active', '2023-01-26 13:38:02'),
(6, 'Anas Baihaqi', 'anas', '76eb649c047cbecad7c36e71374bc9a5', 'anas_1674740383.png', 'user', 'active', '2023-01-26 13:39:43'),
(7, 'LUTFI', 'AHMAD MUSTOFA LUTFI', '5c14611b49f3d2c879fd1a80dddfe0fb', 'AHMAD MUSTOFA LUTFI_1674742292.jpeg', 'user', 'inactive', '2023-01-26 14:11:32'),
(8, 'lutfi', 'anjass', '56283451d2938d209c3cf4af1238d0a2', 'anjass_1674744993.jpeg', 'user', 'inactive', '2023-01-26 14:56:33'),
(9, 'lutfi', 'lutfi', 'cdb0b6889f4def26f43951b2d5b7a9e3', 'lutfi_1674745163.jpeg', 'user', 'active', '2023-01-26 14:59:23'),
(10, 'tuyos', 'tuyos', '54878c2d9a288e3a2270a8a0b8bd5d6e', 'tuyos_1674747634.jpeg', 'user', 'active', '2023-01-26 15:40:34'),
(11, 'PAPA', 'udin', '6bec9c852847242e384a4d5ac0962ba0', 'udin_1674771675.jpeg', 'user', 'active', '2023-01-26 22:21:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
