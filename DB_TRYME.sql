-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2019 pada 09.28
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tryme`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(5) UNSIGNED NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_content` text COMMENT 'Isi konten',
  `blog_slug` text NOT NULL COMMENT 'Sesuai dengan Title tapi di url_encode()',
  `blog_image` text NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(5) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `blog_slug`, `blog_image`, `blog_category_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'belajar code igniter', 'Non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspi ci hah iakj atis unde omnis iste natus error sit volup tatem accu santium dolore mque lauda ntium, totam rem consequuntur magni dolores eos qui ratione voluptatem sequi ne ue porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.', 'belajar-code-igniter', 'ttt', 1, '2019-09-16 06:47:39', NULL, '2019-09-15 23:47:39', NULL),
(2, 'title2', '1 Non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspi ci hah iakj atis unde omnis iste natus error sit volup tatem accu santium dolore mque lauda ntium, totam rem consequuntur magni dolores eos qui ratione voluptatem sequi ne ue porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.', 'enggar-tae-tenan', 'ttt', 1, '2019-09-16 06:47:43', NULL, '2019-09-15 23:47:43', NULL),
(3, '3', '2 Non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspi ci hah iakj atis unde omnis iste natus error sit volup tatem accu santium dolore mque lauda ntium, totam rem consequuntur magni dolores eos qui ratione voluptatem sequi ne ue porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.', 'title', 'ttt', 1, '2019-09-16 06:47:45', NULL, '2019-09-15 23:47:45', NULL),
(4, 'title4', '3 Non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspi ci hah iakj atis unde omnis iste natus error sit volup tatem accu santium dolore mque lauda ntium, totam rem consequuntur magni dolores eos qui ratione voluptatem sequi ne ue porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.', 'title', 'ttt', 1, '2019-09-16 06:47:51', NULL, '2019-09-15 23:47:51', NULL),
(5, 'title5', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:45', NULL, '2019-09-14 12:08:45', NULL),
(14, 'title6', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:47', NULL, '2019-09-14 12:08:47', NULL),
(15, 'title7', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:50', NULL, '2019-09-14 12:08:50', NULL),
(16, 'title8', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:53', NULL, '2019-09-14 12:08:53', NULL),
(17, 'title9', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:55', NULL, '2019-09-14 12:08:55', NULL),
(18, 'title10', 'content', 'title', 'ttt', 1, '2019-09-14 19:08:57', NULL, '2019-09-14 12:08:57', NULL),
(19, 'title11', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:00', NULL, '2019-09-14 12:09:00', NULL),
(20, 'title12', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:06', NULL, '2019-09-14 12:09:06', NULL),
(21, 'title13', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:08', NULL, '2019-09-14 12:09:08', NULL),
(22, 'title14', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:12', NULL, '2019-09-14 12:09:12', NULL),
(23, 'title15', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:15', NULL, '2019-09-14 12:09:15', NULL),
(24, 'title16', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:18', NULL, '2019-09-14 12:09:18', NULL),
(25, 'title17', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:21', NULL, '2019-09-14 12:09:21', NULL),
(26, 'title18', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:24', NULL, '2019-09-14 12:09:24', NULL),
(27, 'title19', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:27', NULL, '2019-09-14 12:09:27', NULL),
(28, 'title20', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:32', NULL, '2019-09-14 12:09:32', NULL),
(29, 'title21', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:34', NULL, '2019-09-14 12:09:34', NULL),
(30, 'title22', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:36', NULL, '2019-09-14 12:09:36', NULL),
(31, 'title23', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:38', NULL, '2019-09-14 12:09:38', NULL),
(32, 'title24', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:41', NULL, '2019-09-14 12:09:41', NULL),
(33, 'title25', 'content', 'title', 'ttt', 1, '2019-09-14 19:09:43', NULL, '2019-09-14 12:09:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_comment`
--

CREATE TABLE `blog_comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_guest_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_product`
--

CREATE TABLE `data_product` (
  `product_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_price_partner` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_stok` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_manfaat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `diskon_id` int(11) NOT NULL,
  `diskon_jumlah` int(11) NOT NULL,
  `role` enum('guest','partner','member') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_nama` varchar(50) NOT NULL,
  `guest_email` varchar(50) NOT NULL,
  `guest_provinsi` varchar(50) NOT NULL,
  `guest_telp` int(11) NOT NULL,
  `guest_kota` varchar(50) NOT NULL,
  `guest_desa` varchar(50) NOT NULL,
  `guest_kecamatan` varchar(50) NOT NULL,
  `guest_alamat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bank`
--

CREATE TABLE `master_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(50) NOT NULL,
  `bank_rekening` varchar(50) NOT NULL,
  `bank_atas_nama` varchar(50) NOT NULL,
  `bank_foto` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_blog_category`
--

CREATE TABLE `master_blog_category` (
  `master_blogc_id` int(11) NOT NULL,
  `blogc_category` varchar(100) NOT NULL,
  `blogc_description` text COMMENT 'Isi konten',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_blog_category`
--

INSERT INTO `master_blog_category` (`master_blogc_id`, `blogc_category`, `blogc_description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'category1', 'deskripci1', '2019-09-14 18:59:02', NULL, '2019-09-14 11:59:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_category`
--

CREATE TABLE `master_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_point`
--

CREATE TABLE `master_point` (
  `master_point_int` int(11) NOT NULL,
  `min_trans` int(11) NOT NULL,
  `max_trans` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `order_jumlah` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_price_unique` int(11) NOT NULL,
  `master_point_id` int(11) NOT NULL,
  `voc_id` int(11) NOT NULL,
  `order_status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `detail_qty` int(11) NOT NULL,
  `detail_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` char(50) NOT NULL,
  `user_password` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_telp` varchar(50) NOT NULL,
  `user_image` text,
  `role` enum('guest','partner','member') NOT NULL COMMENT 'guest = tamu, partner  = partnersale, member = member',
  `status` enum('Y','N','B') NOT NULL DEFAULT 'Y' COMMENT 'Y = '' Aktif'', N = Tidak, B Block',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_alamat`
--

CREATE TABLE `user_alamat` (
  `alamat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `alamat_provinsi_id` int(11) NOT NULL,
  `alamat_kota_id` int(11) NOT NULL,
  `alamat_kecamtan_id` int(11) NOT NULL,
  `alamat_desa_id` int(11) NOT NULL,
  `alamat_kode_pos_id` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `voc_id` int(11) NOT NULL,
  `voc_name` varchar(50) NOT NULL,
  `voc_role` enum('guest','partner','member') NOT NULL,
  `expired` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `FK_master_blog_category` (`blog_category_id`);

--
-- Indeks untuk tabel `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_blog_comment_user_id_user_user_id` (`user_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_cart_user_id_user_user_id` (`cart_user_id`),
  ADD KEY `FK_cart_product_id_product_product_id` (`product_id`),
  ADD KEY `FK_cart_guest_id_guest_guest_id` (`cart_guest_id`);

--
-- Indeks untuk tabel `data_product`
--
ALTER TABLE `data_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_data_product_cate_id_master_category_cate_id` (`cate_id`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`diskon_id`);

--
-- Indeks untuk tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indeks untuk tabel `master_bank`
--
ALTER TABLE `master_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `master_blog_category`
--
ALTER TABLE `master_blog_category`
  ADD PRIMARY KEY (`master_blogc_id`);

--
-- Indeks untuk tabel `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indeks untuk tabel `master_point`
--
ALTER TABLE `master_point`
  ADD PRIMARY KEY (`master_point_int`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_order_user_id_user_user_id` (`user_id`),
  ADD KEY `FK_order_voc_id_voucher_voc_id` (`voc_id`),
  ADD KEY `FK_order_guest_id_guest_guest_id` (`guest_id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `FK_order_detail_order_id_order_order_id` (`order_id`),
  ADD KEY `FK_order_detail_product_id_data_product_product_id` (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_alamat`
--
ALTER TABLE `user_alamat`
  ADD PRIMARY KEY (`alamat_id`),
  ADD KEY `FK_user_alamat_user_id` (`user_id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voc_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `FK_wish_product_id_product_product_id` (`product_id`),
  ADD KEY `FK_wish_user_id_user_user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_product`
--
ALTER TABLE `data_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `diskon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_bank`
--
ALTER TABLE `master_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_blog_category`
--
ALTER TABLE `master_blog_category`
  MODIFY `master_blogc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_category`
--
ALTER TABLE `master_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_point`
--
ALTER TABLE `master_point`
  MODIFY `master_point_int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_alamat`
--
ALTER TABLE `user_alamat`
  MODIFY `alamat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `FK_master_blog_category` FOREIGN KEY (`blog_category_id`) REFERENCES `master_blog_category` (`master_blogc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
