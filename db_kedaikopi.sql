-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2023 at 06:37 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'yuda', 'saputra');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kategori`) VALUES
(13, 'Makanan'),
(14, 'Minuman'),
(17, 'Cemilan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `id_kategori`, `gambar_produk`) VALUES
(3, 'Kopi', 14, 'card-coffe.jpg'),
(4, 'Toast', 13, 'card-toast.jpg'),
(5, 'Pie', 13, 'card-pie.jpg'),
(6, 'Pasta', 13, 'card-pasta.jpg'),
(7, 'Juice', 14, 'Kiwi-Juice.jpg'),
(8, 'Pastery', 17, 'card-pastry.jpg'),
(9, 'Pie', 17, 'card-pie.jpg');

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
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('', 'Harga terjangkau'),
('about_umkm', 'Kami adalah sebuah UMKM yang menyajikan kopi berkualitas tinggi. Kami hanya menggunakan biji kopi terbaik dari petani lokal yang mengikuti praktik pertanian berkelanjutan dan adil. Kami menawarkan kopi single origin, blend, dan organik. Di samping itu, kami juga menyediakan makanan ringan dan roti buatan sendiri. Kami ingin menjadikan kedai kopi kami sebagai tempat berkumpul yang nyaman bagi semua orang. Terima kasih telah berkunjung ke kedai kopi kami.'),
('envelope', 'kedaikopi@gmail.com'),
('facebook', 'kedai kopi'),
('facebook_profile', 'https://www.facebook.com/dicoding/?locale=id_ID'),
('img_rekomendasi_1', 'card-coffe.jpg'),
('img_rekomendasi_2', 'kopi.jpg'),
('img_rekomendasi_3', 'card-pasta.jpg'),
('img_rekomendasi_4', 'card-bread.jpg'),
('img_rekomendasi_5', 'card-pie.jpg'),
('img_rekomendasi_6', 'card-next.jpg'),
('instagram', '@kedaikopi_braga'),
('instagram_profile', 'https://www.instagram.com/dicoding/?hl=en'),
('jam_buka', 'Buka setiap Weekday (08.00 - 10.00)'),
('jumbotron_image', 'card-pie.jpg'),
('linkedin', ''),
('linkedin_profile', ''),
('lokasi', 'Jl. Braga No. 27 Kota Bandung'),
('lokasi_link', '-6.922567965849744, 107.60713763700969'),
('nama_rekomendasi_1', 'Kopi'),
('nama_rekomendasi_2', 'Toast'),
('nama_rekomendasi_3', 'Pasta'),
('nama_rekomendasi_4', 'Roti'),
('nama_rekomendasi_5', 'Pie'),
('nama_rekomendasi_6', 'Cek Lebih Lanjut'),
('nama_umkm', 'Kedai Kopi '),
('tagline_umkm', 'Kopi nikmat gak bikin kembung'),
('twitter', '@kedaikopi'),
('twitter_profile', 'https://twitter.com/mhdnauvalazhar'),
('umkm_image', ''),
('whatsapp', '08973724372');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `send_mail`
--
ALTER TABLE `send_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
