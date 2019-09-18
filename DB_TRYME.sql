-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tryme.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(100) NOT NULL,
  `blog_content` text COMMENT 'Isi konten',
  `blog_slug` text NOT NULL COMMENT 'Sesuai dengan Title tapi di url_encode()',
  `blog_image` text NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(5) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `FK_master_blog_category` (`blog_category_id`),
  CONSTRAINT `FK_master_blog_category` FOREIGN KEY (`blog_category_id`) REFERENCES `master_blog_category` (`master_blogc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table tryme.blog_comment
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `FK_blog_comment_user_id_user_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_user_id` int(11) NOT NULL,
  `cart_guest_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `FK_cart_user_id_user_user_id` (`cart_user_id`),
  KEY `FK_cart_product_id_product_product_id` (`product_id`),
  KEY `FK_cart_guest_id_guest_guest_id` (`cart_guest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.data_product
CREATE TABLE IF NOT EXISTS `data_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `FK_data_product_cate_id_master_category_cate_id` (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.diskon
CREATE TABLE IF NOT EXISTS `diskon` (
  `diskon_id` int(11) NOT NULL AUTO_INCREMENT,
  `diskon_jumlah` int(11) NOT NULL,
  `role` enum('guest','partner','member') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`diskon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.guest
CREATE TABLE IF NOT EXISTS `guest` (
  `guest_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.master_bank
CREATE TABLE IF NOT EXISTS `master_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_nama` varchar(50) NOT NULL,
  `bank_rekening` varchar(50) NOT NULL,
  `bank_atas_nama` varchar(50) NOT NULL,
  `bank_foto` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.master_blog_category
CREATE TABLE IF NOT EXISTS `master_blog_category` (
  `master_blogc_id` int(11) NOT NULL AUTO_INCREMENT,
  `blogc_category` varchar(100) NOT NULL,
  `blogc_description` text COMMENT 'Isi konten',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`master_blogc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table tryme.master_category
CREATE TABLE IF NOT EXISTS `master_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.master_point
CREATE TABLE IF NOT EXISTS `master_point` (
  `master_point_int` int(11) NOT NULL AUTO_INCREMENT,
  `min_trans` int(11) NOT NULL,
  `max_trans` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`master_point_int`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.order
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `order_jumlah` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_price_unique` int(11) NOT NULL,
  `master_point_id` int(11) NOT NULL,
  `voc_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FK_order_user_id_user_user_id` (`user_id`),
  KEY `FK_order_voc_id_voucher_voc_id` (`voc_id`),
  KEY `FK_order_guest_id_guest_guest_id` (`guest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `detail_qty` int(11) NOT NULL,
  `detail_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `FK_order_detail_order_id_order_order_id` (`order_id`),
  KEY `FK_order_detail_product_id_data_product_product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.user_alamat
CREATE TABLE IF NOT EXISTS `user_alamat` (
  `alamat_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`alamat_id`),
  KEY `FK_user_alamat_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.voucher
CREATE TABLE IF NOT EXISTS `voucher` (
  `voc_id` int(11) NOT NULL AUTO_INCREMENT,
  `voc_name` varchar(50) NOT NULL,
  `voc_role` enum('guest','partner','member') NOT NULL,
  `expired` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`voc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table tryme.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`wish_id`),
  KEY `FK_wish_product_id_product_product_id` (`product_id`),
  KEY `FK_wish_user_id_user_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
