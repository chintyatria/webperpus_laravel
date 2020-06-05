-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 12:38 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_kota`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `stok_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `tahun_terbit`, `gambar`, `id_genre`, `stok_buku`) VALUES
(15, 'Sebuah Seni Untuk Bersikap Bodoamat', 'Mark Manson', 2016, 'Sebuah Seni Untuk Bersikap Bodoamat.jpg', 1, 12),
(16, 'Be The New You', 'Wirda Mansur', 2018, 'Be The New You.jpg', 1, 19),
(17, '99 Cahaya Di Langit Eropa', 'Hanum Salsabiela Rais', 2011, '99 Cahaya Dilangit Eropa.jpg', 3, 81),
(18, 'Kisah Perjuangan B.J Habibie', 'Wada S. Atma', 2017, 'Kisah Perjuangan B.J Habibie.jpg', 6, 55),
(19, 'Koala Kumal', 'Raditya Dika', 2015, 'Koala Kumal.jpg', 2, 57),
(20, 'Kun Anta', 'Ngeri Akhirat', 2015, 'Kun Anta.jpg', 1, 39),
(21, 'Negeri 5 Menara', 'A. Fuadi', 2009, 'Negeri 5 Menara.jpg', 3, 4),
(22, 'Sang Pemimpi', 'Andrea Hirata', 2006, 'Sang Pemimpi.jpg', 3, 8),
(23, 'Udah Putusin Aja', 'Felix Siauw', 2013, 'Udah Putusin Aja.jpg', 1, 59),
(24, 'Hello Salma', 'Erisca Febriani', 2018, 'Hello Salma.jpg', 3, 74),
(25, 'Bupena Matematika Untuk SMA/MA Kelas X', 'Wono Setya Budhi, Ph.D.', 2013, 'Bupena Matematika Untuk SMA Kelas X.jpg', 5, 30);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Motivasi'),
(2, 'Komedi'),
(3, 'Fiksi'),
(4, 'Horor'),
(5, 'Pelajaran'),
(6, 'Biografi'),
(7, 'Sejarah'),
(11, 'Misteri'),
(13, 'Fakta'),
(14, 'Dunia');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('chintya@gmail.com', '$2y$10$/7MhemtnsAPoMB4oUvKcPOB8uyySXEoWKOXF1bqZ1FGk7tzdRMEmW', '2019-07-16 00:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_buku` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `stok_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `nama`, `no_telp`, `tgl_pinjam`, `tgl_kembali`, `id_buku`, `status`, `denda`, `stok_buku`) VALUES
(21, 'Elgi', '081234567890', '2019-07-30', NULL, 21, 'belum kembali', NULL, 10),
(22, 'Chintya', '082245656274', '2019-08-05', '2019-08-19', 15, 'sudah kembali', 10000, 3),
(23, 'chintyado', '0897654321', '2019-11-12', NULL, 15, 'belum kembali', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chintya', 'Chintya', 'chintya@gmail.com', '$2y$10$HWNoQQtVIkFtCMc/x9/DJOAHbmxnm9qPlRJaJMhtatolJYD8zNrsm', 'USER', '6WV8HkRxL2gJ9mDw9CQmV4bvWOftFNNtCLgXafr7VLyQIARQ5gVbSrKbFfVF', '2019-07-15 21:53:20', '2019-07-15 21:53:20'),
(2, 'admin', 'admin1', 'admin@laravel.com', '$2y$10$y4Xjvtt2miFDky19T5/KU.bV6fJTXRidCNReN8lLo1wop57G7iZyO', 'ADMIN', 'aVJS0w8qsFRplDlWCeoFOYMZ3Ez9iFQVUgeOcMjCFH8CAaMi9cjrhQ7A66lb', '2019-07-15 22:36:57', '2019-07-15 22:36:57'),
(4, 'admin2', 'admin2', 'admin2@a.com', '$2y$10$i3Zie2SXCU7QTE0nBy/Keeh6E.YTg.qXwaKWUJsxCsYDcJNGqWOFO', 'ADMIN', 'KvCuJ64UXc4TpPB5QwKB2SYCuAKlAW3DiNfEuqwGb8EzIpfbjT1lsoaohMYh', '2019-07-16 00:12:01', '2019-07-16 00:12:01'),
(5, 'lala', 'lala', 'lala@a.com', '$2y$10$RslMpyk.oGtLNyylG18ATuIGVL7Rb/oG.GGv6AKFFmYZydHQ7XOvy', 'ADMIN', 'glddm114PIeXKwkWTsLBXs1GwGWgfhJzCBrjONyZo4p8MYnLgGrkXgkpjZQE', '2019-07-17 20:34:37', '2019-07-17 20:34:37'),
(6, 'aku admin', 'admin123', 'admin123@gmail.com', '$2y$10$TER20YUYGnVormL3B8L6deXvB0HeFvO/yzS.PXggJQMVCRGkvl/ta', 'ADMIN', '1hbl0u0pLrEbSQHoL6crehU6OJD1zbulPK4NqaGV5kRvDNqU4J1wwax82FKz', '2019-07-21 22:58:37', '2019-07-21 22:58:37'),
(7, 'Bertha', 'Bertha', 'bertha@gmail.com', '$2y$10$niZmonSIEcF4DCTj24PJV.UGqRtUPPjw4tsX1ny.hppru3/9JZzOy', 'USER', '3JJ63Yz1aKDDDo4zdR8O1Iq6tZfLB3p2oxxAcyYK22YCEXNubiCQo1okv8Eh', '2019-07-27 03:19:23', '2019-07-27 03:19:23'),
(8, 'Lili', 'Lililala', 'lili@gmail.com', '$2y$10$EtvR4Y7VWdWOnNyNCBJ1VON0ErTcO93tVzA8ywlbfUuJtQZ4jeXpm', 'USER', 'OVll0SYlZLJjluOqL14Nh1uNjmcVm3jL5FuecWQLZREjsOtzC0iq7f26oYrv', '2019-07-29 00:32:57', '2019-07-29 00:32:57'),
(9, 'Elgi', 'Elgi', 'elgi@gmail.com', '$2y$10$JYN.q7GDCUG1C3ABAHh.OulDonhjJv7O2nGmdSbd6DbiGHak5lFh.', 'USER', '0Yml6X7A3fB6BIWyaRqLksBxPYHtHNT8l0vklsMgq9EDJxiZu1YVPdeLY34G', '2019-07-29 18:04:18', '2019-07-29 18:04:18'),
(10, 'chintya', 'chintya1', 'chintya1@gmail.com', '$2y$10$MgGLzzZdb3zSyqC1w/0Y7uaY8H0pOOF1WyWgHCPfB2jPqw78URFze', 'USER', NULL, '2019-10-30 18:26:59', '2019-10-30 18:26:59'),
(11, 'chintyado', 'chintyado', 'chintyado@gmail.com', '$2y$10$h9guSiOF4IV1QmESSrFRDehTlgTbIFn.B9aHrXEJ44sDNJcR/NIcy', 'USER', NULL, '2019-11-11 20:34:29', '2019-11-11 20:34:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
