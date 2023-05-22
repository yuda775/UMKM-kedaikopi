-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 12:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kedaikopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `updated_at` varchar(10) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `updated_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kategori`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(24, 'Makanan ', '19-05-23', '2023-05-19', '', 'blabla'),
(27, 'Minuman', '2023-05-19', '', '', ''),
(30, 'pizza', '2023-05-19', '', '1', ''),
(31, 'Cemilan', '2023-05-19', '', 'yuda', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'settings'),
(2, 'mail'),
(3, 'products');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  `updated_at` varchar(11) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `updated_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `id_kategori`, `gambar_produk`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(17, 'Kopi', 27, 'top-view-coffee-cup-coffee-beans-dark-table.jpg', '2023-05-19', '2023-05-19', '', 'blabla'),
(19, 'Teh', 27, 'grabfood.png', '2023-05-19', '2023-05-19', '', 'blabla');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permission`
--

CREATE TABLE `role_has_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `send_mail`
--

CREATE TABLE `send_mail` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `read_status` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`, `updated_at`) VALUES
('', 'Harga terjangkau', '2023-05-16 07:52:06'),
('about_umkm', 'Kami adalah sebuah UMKM yang menyajikan kopi berkualitas tinggi. Kami hanya menggunakan biji kopi terbaik dari petani lokal yang mengikuti praktik pertanian berkelanjutan dan adil. Kami menawarkan kopi single origin, blend, dan organik. Di samping itu, kami juga menyediakan makanan ringan dan roti buatan sendiri. Kami ingin menjadikan kedai kopi kami sebagai tempat berkumpul yang nyaman bagi semua orang. Terima kasih telah berkunjung ke kedai kopi kami.', '2023-05-16 07:52:06'),
('envelope', 'kedaikopi@gmail.com', '2023-05-16 07:52:06'),
('facebook', 'kedai kopi', '2023-05-16 07:52:06'),
('facebook_profile', 'https://www.facebook.com/dicoding/?locale=id_ID', '2023-05-16 07:52:06'),
('img_rekomendasi_1', 'card-coffe.jpg', '2023-05-16 07:52:06'),
('img_rekomendasi_2', 'kopi.jpg', '2023-05-16 07:52:06'),
('img_rekomendasi_3', 'card-pasta.jpg', '2023-05-16 07:52:06'),
('img_rekomendasi_4', 'card-bread.jpg', '2023-05-16 07:52:06'),
('img_rekomendasi_5', 'card-pie.jpg', '2023-05-16 07:52:06'),
('img_rekomendasi_6', 'card-next.jpg', '2023-05-16 07:52:06'),
('instagram', '@kedaikopi_braga', '2023-05-16 07:52:06'),
('instagram_profile', 'https://www.instagram.com/dicoding/?hl=en', '2023-05-16 07:52:06'),
('jam_buka', 'Buka setiap Weekday (08.00 - 10.00)', '2023-05-16 07:52:06'),
('jumbotron_image', 'card-pie.jpg', '2023-05-16 07:52:06'),
('linkedin', '', '2023-05-16 07:52:06'),
('linkedin_profile', '', '2023-05-16 07:52:06'),
('lokasi', 'Jl. Braga No. 27 Kota Bandung', '2023-05-16 07:52:06'),
('lokasi_link', '-6.922567965849744, 107.60713763700969', '2023-05-16 07:52:06'),
('nama_rekomendasi_1', 'Kopi', '2023-05-16 07:52:06'),
('nama_rekomendasi_2', 'Toast', '2023-05-16 07:52:06'),
('nama_rekomendasi_3', 'Pasta', '2023-05-16 07:52:06'),
('nama_rekomendasi_4', 'Roti', '2023-05-16 07:52:06'),
('nama_rekomendasi_5', 'Pie', '2023-05-16 07:52:06'),
('nama_rekomendasi_6', 'Cek Lebih Lanjut', '2023-05-16 07:52:06'),
('nama_umkm', 'Kedai Kopi ', '2023-05-16 07:52:06'),
('tagline_umkm', 'Kopi nikmat gak bikin kembung', '2023-05-16 07:52:06'),
('twitter', '@kedaikopi', '2023-05-16 07:52:06'),
('twitter_profile', 'https://twitter.com/mhdnauvalazhar', '2023-05-16 07:52:06'),
('umkm_image', '', '2023-05-16 07:52:06'),
('whatsapp', '08973724372', '2023-05-16 07:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'yuda', 'saputra', 1),
(2, 'settings', 'settings', 2),
(3, 'email', 'email', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permission`
--
ALTER TABLE `role_has_permission`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `send_mail`
--
ALTER TABLE `send_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `send_mail`
--
ALTER TABLE `send_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id`),
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id`);

--
-- Constraints for table `role_has_permission`
--
ALTER TABLE `role_has_permission`
  ADD CONSTRAINT `role_has_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_has_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
