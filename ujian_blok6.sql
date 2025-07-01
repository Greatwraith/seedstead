-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2025 pada 10.07
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
-- Database: `ujian_blok6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_address` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `level`) VALUES
(2, 'Admin', 'admin', 'admin', '0800000', 'ardhanthend@gmail.com', 'Lorem Ipsum Dolor Sit Amet.', 'admin\r\n'),
(4, 'User ', 'user', 'user', '0812345678', 'ardhathend@gmail.com', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Delectus.', 'user'),
(5, 'userbaru', 'user12', 'user12', '08101010', 'ardhathend@gmail.con', 'Lorem Ipsum Dolor Sit Amet.', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(4, 'vegetable seed'),
(6, 'fruit seed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chart`
--

CREATE TABLE `tb_chart` (
  `chart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_chart`
--

INSERT INTO `tb_chart` (`chart_id`, `product_id`, `jml`, `admin_id`) VALUES
(13, 2, 1, 2),
(17, 7, 2, 2),
(40, 11, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `ck_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `validasi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_checkout`
--

INSERT INTO `tb_checkout` (`ck_id`, `product_id`, `jml`, `admin_id`, `total`, `bukti`, `validasi`, `status`, `tgl`) VALUES
(15, 11, 2, 2, 44000, 'tf1748194562.jpg', 'Valid', 'Selesai', '2025-05-25'),
(19, 11, 1, 2, 22000, 'tf1748195539.png', 'Tidak Valid', 'Batal', '2025-05-25'),
(20, 11, 1, 4, 32000, 'tf1748199819.jpg', 'Valid', 'Proses', '2025-05-25'),
(21, 11, 1, 4, 32000, 'tf1748306526.png', 'Tidak Valid', 'Batal', '2025-05-27'),
(22, 11, 2, 5, 64000, 'tf1748315230.png', 'Tidak Valid', 'Batal', '2025-05-27'),
(23, 11, 3, 4, 96000, 'tf1748332410.jpeg', 'Valid', 'Proses', '2025-05-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_checkout_temp`
--

CREATE TABLE `tb_checkout_temp` (
  `chart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `data_created`, `stok`) VALUES
(11, 4, '20gr Carrot Seed', 32000, 'Carrot seeds that are easy to grow and suitable for many types of planting media, such as garden soil, rice fields, backyard plots, or even hydroponic systems. Each pack contains 20 grams of seeds, packed in original factory aluminum foil, with at least 85% germination rate and 98% purity. To plant, simply sprinkle 1–3 seeds on loosened, moist soil with 20x20 cm spacing, and water gently every morning and evening. The carrots are ready to harvest in 80–90 days by pulling them from the soil. Minimum order is 1 pack. In the rainy season, use a cover to protect the seeds from heavy rain.', 'produk1748199489.jpg', 1, '2025-05-27 07:53:30', 38);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_chart`
--
ALTER TABLE `tb_chart`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indeks untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`ck_id`);

--
-- Indeks untuk tabel `tb_checkout_temp`
--
ALTER TABLE `tb_checkout_temp`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_chart`
--
ALTER TABLE `tb_chart`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `ck_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_checkout_temp`
--
ALTER TABLE `tb_checkout_temp`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
