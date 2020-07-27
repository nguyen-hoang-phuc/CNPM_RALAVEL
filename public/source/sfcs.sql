-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2020 at 03:38 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(10, 10, '2020-07-21', 130000, 'Cash', NULL, '2020-07-21 04:03:22', '2020-07-21 04:03:22'),
(11, 11, '2020-07-21', 98000, 'Cash', NULL, '2020-07-21 04:27:14', '2020-07-21 04:27:14'),
(12, 12, '2020-07-21', 20000, 'ATM', NULL, '2020-07-21 06:24:51', '2020-07-21 06:24:51'),
(13, 13, '2020-07-21', 18000, 'Cash', NULL, '2020-07-21 07:49:29', '2020-07-21 07:49:29'),
(14, 14, '2020-07-21', 35000, 'Cash', NULL, '2020-07-21 07:55:45', '2020-07-21 07:55:45'),
(15, 15, '2020-07-23', 120000, 'Cash', NULL, '2020-07-23 12:51:52', '2020-07-23 12:51:52'),
(16, 16, '2020-07-24', 18000, 'ATM', NULL, '2020-07-24 01:39:53', '2020-07-24 01:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`),
  KEY `id_bill` (`id_bill`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(10, 10, 1, 4, 18000, '2020-07-21 04:03:22', '2020-07-21 04:03:22'),
(11, 10, 3, 1, 20000, '2020-07-21 04:03:23', '2020-07-21 04:03:23'),
(12, 10, 4, 1, 18000, '2020-07-21 04:03:23', '2020-07-21 04:03:23'),
(13, 10, 6, 1, 20000, '2020-07-21 04:03:23', '2020-07-21 04:03:23'),
(14, 11, 84, 1, 50000, '2020-07-21 04:27:14', '2020-07-21 04:27:14'),
(15, 11, 85, 1, 28000, '2020-07-21 04:27:14', '2020-07-21 04:27:14'),
(16, 11, 86, 1, 20000, '2020-07-21 04:27:14', '2020-07-21 04:27:14'),
(17, 12, 3, 1, 20000, '2020-07-21 06:24:51', '2020-07-21 06:24:51'),
(18, 13, 4, 1, 18000, '2020-07-21 07:49:29', '2020-07-21 07:49:29'),
(19, 14, 31, 1, 20000, '2020-07-21 07:55:45', '2020-07-21 07:55:45'),
(20, 14, 62, 1, 15000, '2020-07-21 07:55:45', '2020-07-21 07:55:45'),
(21, 15, 3, 6, 20000, '2020-07-23 12:51:52', '2020-07-23 12:51:52'),
(22, 16, 4, 1, 18000, '2020-07-24 01:39:53', '2020-07-24 01:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', '268 Lý Thường Kiệt, Phường 14, quận 10, TP HCM', '0333339112', NULL, '2020-07-21 04:03:22', '2020-07-21 04:03:22'),
(11, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', '268 Lý Thường Kiệt, Phường 14, quận 10, TP HCM', '0333339112', NULL, '2020-07-21 04:27:14', '2020-07-21 04:27:14'),
(12, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', 'KTX khu A ĐHQG TPHCM, phường Linh Trung, quận Thủ Đức', '0333339112', NULL, '2020-07-21 06:24:51', '2020-07-21 06:24:51'),
(13, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', '268 Lý Thường Kiệt, Phường 14, quận 10, TP HCM', '0333339112', NULL, '2020-07-21 07:49:29', '2020-07-21 07:49:29'),
(14, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', '268 Lý Thường Kiệt, Phường 14, quận 10, TP HCM', '0333339112', NULL, '2020-07-21 07:55:45', '2020-07-21 07:55:45'),
(15, 'Nguyễn Hoàng Phúc', 'Nam', 'phuc.nguyenblackjack@hcmut.edu.vn', '268 Lý Thường Kiệt, Phường 14, quận 10, TP HCM', '0333339112', NULL, '2020-07-23 12:51:52', '2020-07-23 12:51:52'),
(16, 'Nguyễn Hoàng Phúc', 'Nam', '1412953@hcmut.edu.vn', '880 Tôn Đức Thắng', '0333339112', NULL, '2020-07-24 01:39:52', '2020-07-24 01:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new` int(11) DEFAULT NULL,
  `top` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`, `new`, `top`) VALUES
(1, 'Cơm sườn trứng', 1, 'Với một đĩa cơm ăn sáng, bạn sẽ có đầy đủ dưỡng chất để bắt đầu một ngày mới.', 20000, 18000, 'https://monviet88.com/wp-content/uploads/2016/02/com-suon-trung.jpg', 'đĩa', NULL, NULL, 1, 0),
(2, 'Cơm chiên hải sản', 1, NULL, 25000, 20000, 'http://phonuidalat.com/wp-content/uploads/2016/05/con-chien-hai-san-520x334.jpg', 'đĩa', NULL, NULL, 1, 0),
(3, 'Cơm sườn chua ngọt', 1, NULL, 20000, 0, 'https://trixie.com.vn/media/images/article/20931684/cach-lam-com-suon-xao-chua-ngot.jpg', 'đĩa', NULL, NULL, 1, 0),
(4, 'Cơm sườn chả', 1, NULL, 20000, 18000, 'https://media.cooky.vn/recipe/g3/22524/s800x500/recipe22524-636431709340509935.jpg', 'đĩa', NULL, NULL, 1, 0),
(5, 'Cơm gà', 1, NULL, 20000, 18000, 'https://ameovat.com/wp-content/uploads/2018/04/cach-lam-com-ga-xoi-mo-4-600x338.jpg', 'đĩa', NULL, NULL, 0, 0),
(6, 'Cơm canh chua', 1, NULL, 25000, 20000, 'https://pandafood.com.vn/wp-content/uploads/2018/07/canh-chua-ca-dieu-hong-c%C6%A1m-ngon-phan-thiet-e1561125473264.jpg', 'tô', NULL, NULL, 0, 0),
(7, 'Cơm chiên cá mặn', 1, NULL, 20000, 0, 'https://amthucbalong.com/upload/sanpham/thiet-ke-khong-ten-(85)-7834.png', 'đĩa', NULL, NULL, 0, 0),
(8, 'Cơm chiên dương châu', 1, NULL, 20000, 0, 'http://www.monngon.tv/uploads/images/2017/06/22/1b0ea80b55b3e726f9b80aaaaddd389c-cach-lam-com-chien-duong-chau-don-gian-s.jpg', 'đĩa', NULL, NULL, 0, 0),
(9, 'Cơm bò lúc lắc', 1, NULL, 25000, 20000, 'https://scontent.fvca1-1.fna.fbcdn.net/v/t1.0-9/s960x960/43522953_1515422595226285_8810904517575966720_o.jpg?_nc_cat=103&_nc_sid=110474&_nc_ohc=w6jXYc2E_SoAX9A3zzb&_nc_ht=scontent.fvca1-1.fna&_nc_tp=7&oh=3af05d3940e77e62d398731bf8f52c8a&oe=5F39073A', 'đĩa', NULL, NULL, 1, 0),
(10, 'Cơm bò xào củ hành', 1, NULL, 25000, 0, 'https://monviet88.com/wp-content/uploads/2016/02/com-thit-bo-xao.jpg', 'đĩa', NULL, NULL, 1, 0),
(11, 'Cơm tấm', 1, NULL, 20000, 0, 'https://images.foody.vn/res/g10/98048/prof/s576x330/foody-upload-api-foody-mobile-com-190311132057.jpg', 'đĩa', NULL, NULL, 0, 0),
(12, 'Cơm bò xào', 1, NULL, 25000, 20000, 'http://www.monngon.tv/uploads/images/2017/03/18/bb64b5d941f611b9e246c120cfa31eca-com-xao-bo-1.jpg', 'đĩa', NULL, NULL, 0, 0),
(13, 'Cơm rang dưa bò', 1, NULL, 25000, 0, 'https://1.bp.blogspot.com/-ELGGsOK6fSQ/WsdMGYXtseI/AAAAAAAAAFc/200Fx172XJkpiqW8bWRk4Bc6x392mecbgCLcBGAs/s640/com-rang-dua-bo-tai-giao-com-ha-noi.jpg', 'đĩa', NULL, NULL, 0, 0),
(14, 'Cơm gà xối mỡ', 1, NULL, 20000, 0, 'https://www.diadiemanuong.net.vn/upload/images2/users/adminweb2019@gmail.com/20191212071416_com-ga.jpg', 'đĩa', NULL, NULL, 1, 0),
(15, 'Cơm mực xào hành cần', 1, NULL, 20000, 0, 'https://cdn.pastaxi-manager.onepas.vn/content/uploads/articles/00001-An-mon%20an%20cong%20thuc/MUC-XAO-HANH-TAY/cach-lam-muc-xao-1.jpg', 'đĩa', NULL, NULL, 1, 0),
(16, 'Cơm sườn', 1, NULL, 20000, 18000, 'https://toplist.vn/images/800px/com-tam-quan-thuy-299021.jpg', 'đĩa', NULL, NULL, 0, 0),
(17, 'Cơm thịt xiên nướng', 1, NULL, 22000, 20000, 'http://static.diadiemanuong.com/review/99672/26273262442_9939eb0ec8_z.jpg', 'đĩa', NULL, NULL, 1, 0),
(18, 'Cơm cá hấp', 1, NULL, 25000, 20000, 'https://images.kienthuc.net.vn/zoom/800/uploaded/trucchinh2/2019_09_03/bi-quyet-lam-ca-hap-bia-khong-tanh-ngon-kho-cuong-hinh-2.jpg', 'đĩa', NULL, NULL, 1, 0),
(19, 'Cơm cá lóc kho tộ', 1, NULL, 20000, 0, 'https://cdn.eva.vn/upload/3-2018/images/2018-08-04/ca-loc-kho-to-dam-da-an-bao-nhieu-com-cung-het-ca-loc-kho-1533366810-308-width772height433.jpg', 'đĩa', NULL, NULL, 1, 0),
(20, 'Cơm chiên thập cẩm', 1, NULL, 25000, 22000, 'https://img-global.cpcdn.com/recipes/15f8b467ebab05c2/751x532cq70/c%C6%A1m-chien-th%E1%BA%ADp-c%E1%BA%A9m-recipe-main-photo.jpg', 'đĩa', NULL, NULL, 0, 0),
(21, 'Phở bò', 2, NULL, 25000, 22000, 'https://cdn.eva.vn/upload/2-2019/images/2019-06-28/cach-nau-pho-bo-thom-ngon-chuan-vi-don-gian-tai-nha-cach-nau-pho-bo-5-1561709484-618-width600height370.jpg', 'tô', NULL, NULL, 0, 0),
(22, 'Hủ tiếu Nam Vang', 2, NULL, 25000, 0, 'https://image.cooky.vn/recipe/g1/1552/s640/recipe1552-635684240661925692.jpg', 'tô', NULL, NULL, 0, 0),
(23, 'Hủ tiếu xào', 2, NULL, 20000, 18000, 'https://beptruong.edu.vn/wp-content/uploads/2020/03/hu-tieu-xao-hai-san.jpg', 'đĩa', NULL, NULL, 0, 0),
(24, 'Hủ tiếu khô', 2, NULL, 20000, 0, 'https://santourgiare.net/wp-content/uploads/2019/08/FB_IMG_1565150874441-1.jpg', 'tô', NULL, NULL, 0, 0),
(25, 'Bún bò Huế', 2, NULL, 25000, 22000, 'https://monngonbamien.org/wp-content/uploads/2019/10/cach-nau-bun-bo-hue-mien-nam-de-ban-don-gia-chuan-vi-ngon-nhat.jpg', 'tô', NULL, NULL, 1, 1),
(26, 'Bún giò heo', 2, NULL, 20000, 0, 'https://s.meta.com.vn/img/thumb.ashx/Data/image/2019/07/19/cach-nau-bun-bo-gio-heo-ngon-don-gian-al.jpg', 'tô', NULL, NULL, 1, 0),
(27, 'Bún riêu cua', 2, NULL, 20000, 0, 'https://beptruong.edu.vn/wp-content/uploads/2018/06/bun-rieu-cua.jpg', 'tô', NULL, NULL, 0, 0),
(28, 'Bún riêu óc', 2, NULL, 20000, 0, 'https://daynauan.info.vn/wp-content/uploads/2019/05/hoc-nau-an-bun-rieu-de-kinh-doanh.jpg', 'tô', NULL, NULL, 1, 0),
(29, 'Bún đậu mắm tôm', 2, NULL, 25000, 22000, 'https://cdn.24h.com.vn/upload/1-2020/images/2020-02-19/Cach-lam-bun-dau-mam-tom-chuan-vi-Ha-thanh-34631427_1675773469166456_1821377853640409088_n-1582102364-290-width960height717.jpg', 'đĩa', NULL, NULL, 0, 0),
(30, 'Mì quảng', 2, NULL, 20000, 18000, 'https://danang.huongnghiepaau.com/images/mon-ngon-mien-trung/mi-quang-ga.jpg', 'tô', NULL, NULL, 0, 0),
(31, 'Hủ tiếu bò kho', 2, NULL, 20000, 0, 'https://pastaxi-manager.onepas.vn/content/uploads/articles/nguyendoan/anh-blog/hu-tieu-bo-kho/cach-nau-hu-tieu-bo-kho-9.jpg', 'tô', NULL, NULL, 0, 0),
(32, 'Mì xào bò', 2, NULL, 25000, 22000, 'https://sieungon.com/wp-content/uploads/2017/08/mi-xao-bo.jpg', 'đĩa', NULL, NULL, 1, 0),
(33, 'Mì xào hải sản', 2, NULL, 30000, 27000, 'https://andemdanang.com/wp-content/uploads/2018/09/m%C3%AC-x%C3%A0o-h%E1%BA%A3i-s%E1%BA%A3n-%C4%91n-534x400.jpg', 'đĩa', NULL, NULL, 0, 0),
(34, 'Mì tương đen ', 2, NULL, 30000, 25000, 'http://www.monngon.tv/uploads/images/2017/03/27/8a11abccf6f6423afb532afc819646fb-cach-lam-mi-tuong-den-han-quoc-don-gian-sl.jpg', 'đĩa', NULL, NULL, 1, 0),
(35, 'Phở cuốn', 2, NULL, 25000, 0, 'https://images.foody.vn/res/g93/923178/prof/s576x330/foody-upload-api-foody-mobile-pho-cuon-190806092726.jpg', 'cuốn', NULL, NULL, 0, 0),
(36, 'Phở gà', 2, NULL, 30000, 0, 'https://dl.airtable.com/cVDipJQcQb6OVY7ZV4QN_phoga-large%402x.jpg.jpg', 'tô', NULL, NULL, 0, 1),
(37, 'Phở Nam Định', 2, NULL, 25000, 0, 'https://phamanhquang.com/wp-content/uploads/2019/04/pho-bo-nam-dinh.jpg', 'tô', NULL, NULL, 0, 1),
(38, 'Phở xào', 2, NULL, 25000, 0, 'https://cdn.cet.edu.vn/wp-content/uploads/2018/10/pho-xao-mem.jpg', 'đĩa', NULL, NULL, 0, 1),
(39, 'Mì ý', 2, NULL, 30000, 27000, 'https://daubepgiadinh.vn/wp-content/uploads/2017/10/hinh-mon-mi-y.jpg', 'đĩa', NULL, NULL, 1, 0),
(40, 'Mì bò hầm', 2, NULL, 30000, 25000, 'https://image.cooky.vn/recipe/g2/15303/s640/recipe15303-635736790143729317.jpg', 'đĩa', NULL, NULL, 0, 1),
(41, 'Bánh crepe sầu riêng', 6, NULL, 20000, 18000, 'https://musangkingf99.com/wp-content/uploads/2020/02/cach-lam-banh-crepe-sau-rieng.jpg', 'cái', NULL, NULL, 0, 1),
(42, 'Bánh cepe mặn', 6, NULL, 25000, 20000, 'https://img-global.cpcdn.com/recipes/5d218a7671704b5a/751x532cq70/crepe-phien-b%E1%BA%A3n-m%E1%BA%B7n-recipe-main-photo.jpg', 'cái', NULL, NULL, 0, 0),
(43, 'Bánh su kem', 6, NULL, 25000, 0, 'https://thoisu.com.vn/wp-content/uploads/2020/03/banh-su-kem-768x532.jpg', 'hộp', NULL, NULL, 0, 1),
(44, 'Bánh bông lan', 6, NULL, 15000, 0, 'https://dl.airtable.com/fbjgSFDzQwapt8an2HMw_bong-lan-pho-mai-large%402x.jpg', 'cái', NULL, NULL, 0, 1),
(45, 'Bánh Macaron', 6, NULL, 30000, 25000, 'http://lambanh365.com/wp-content/uploads/2015/03/cach-lam-banh-macaron-nhan-kem-socola-ganache-sieu-de-thuong.jpg', 'hộp', NULL, NULL, 1, 0),
(46, 'Mousse cake', 6, NULL, 30000, 25000, 'https://img.delicious.com.au/_JvImisL/w759-h506-cfill/del/2018/05/double-chocolate-mousse-cake-79402-2.jpg', 'cái', NULL, NULL, 0, 1),
(47, 'Bánh Tiramisu', 6, NULL, 25000, 0, 'https://cdn.cet.edu.vn/wp-content/uploads/2018/01/tiramisu-duoc-che-bien-khac-nhau.jpg', 'cái', NULL, NULL, 1, 0),
(48, 'Bánh Cupcake', 6, NULL, 25000, 20000, 'http://dammeamthuc.com/wp-content/uploads/2017/03/coconut-cupcakes.jpg', 'hộp', NULL, NULL, 1, 0),
(49, 'Bánh su kem hai lớp Double Fantasy', 6, NULL, 20000, 0, 'https://channel.mediacdn.vn/2019/1/8/photo-1-1546943431257634399526.jpg', 'cái', NULL, NULL, 1, 0),
(50, 'Bánh Dorayaki đậu đỏ', 6, NULL, 25000, 20000, 'https://channel.mediacdn.vn/2019/1/8/photo-2-15469434343152069434879.jpg', 'cái', NULL, NULL, 0, 1),
(51, 'Bánh crepe ngàn lớp White Zebra', 6, NULL, 30000, 28000, 'https://channel.mediacdn.vn/2019/1/8/photo-6-15469434343861156217304.jpg', 'cái', NULL, NULL, 0, 1),
(52, 'Bánh Su Kem Cafe', 6, NULL, 20000, 0, 'http://timmonngon.com:7787/mediaroot/media/userfiles/useruploads/24/image/an-vat/e-bon-paint%20-thien-duong-banh-o-quan-3.JPG', 'hộp', NULL, NULL, 1, 0),
(53, 'Bánh Dừa ', 6, NULL, 15000, 0, 'http://timmonngon.com:7787/mediaroot/media/userfiles/useruploads/24/image/an-vat/banh-dat-tiec-o-e-bon-paint.JPG', 'hộp', NULL, NULL, 0, 0),
(54, 'Bánh phomai', 6, NULL, 25000, 20000, 'http://timmonngon.com:7787/mediaroot/media/userfiles/useruploads/24/image/an-vat/dat-banh-sinh-nhat-ngon-tai-e-bon-paint.JPG', 'cái', NULL, NULL, 0, 1),
(55, 'Bánh Kem Xoài', 6, NULL, 30000, 25000, 'http://timmonngon.com:7787/mediaroot/media/userfiles/useruploads/24/image/an-vat/thien-duong-banh-ngon-quan-3-e-bon-paint(1).JPG', 'cái', NULL, NULL, 0, 1),
(56, 'Bánh Phomai tròn ', 6, NULL, 15000, 0, 'http://timmonngon.com:7787/mediaroot/media/userfiles/useruploads/24/image/an-vat/e-bon-paint%20-thien-duong-banh-ngon-quan-3.JPG', 'hộp', NULL, NULL, 0, 0),
(57, 'Bánh red velet', 6, 'Chiếc bánh của tình yêu', 30000, 28000, 'https://blog.beemart.vn/wp-content/uploads/2016/07/tong-hop-cac-loai-banh-ngot-Phap-noi-tieng-lam-me-man-long-nguoi-5.jpg', 'cái', NULL, NULL, 0, 1),
(58, 'Bánh Opera', 6, NULL, 20000, 0, 'https://blog.beemart.vn/wp-content/uploads/2016/07/tong-hop-cac-loai-banh-ngot-Phap-noi-tieng-lam-me-man-long-nguoi-1.jpg', NULL, NULL, NULL, 0, 1),
(59, 'Bánh Croissant (bánh sừng bò)', 6, NULL, 25000, 20000, 'https://blog.beemart.vn/wp-content/uploads/2016/07/tong-hop-cac-loai-banh-ngot-Phap-noi-tieng-lam-me-man-long-nguoi-3.jpg', 'cái', NULL, NULL, 1, 0),
(60, 'Bánh kem phô mai cháy', 6, NULL, 30000, 25000, 'https://cdn.tgdd.vn/Files/2020/04/27/1252237/cach-lam-banh-kem-pho-mai-chay-basque-burnt-chee.png', 'cái', NULL, NULL, 0, 0),
(61, 'Kem que sữa chua dâu tây', 7, NULL, 10000, 0, 'https://beptruong.edu.vn/wp-content/uploads/2018/07/kem-que-sua-chua-dau-tay.jpg', 'cái', NULL, NULL, 0, 1),
(62, 'KEM BƠ', 7, NULL, 15000, 0, 'https://beptruong.edu.vn/wp-content/uploads/2016/01/kem-bo.jpg', 'ly', NULL, NULL, 0, 1),
(63, 'Kem Gari Gari Kun Rich Choco Min', 7, NULL, 20000, 18000, 'https://laodongnhatban.com.vn/images/2019/01/11/0-kem-hn.jpg', 'ly', NULL, NULL, 0, 1),
(64, 'Dazs Mango Purin Coconut Milk', 7, NULL, 15000, 0, 'https://laodongnhatban.com.vn/images/2019/01/11/dispImage.php-2.jpeg', 'cây', NULL, NULL, 1, 0),
(65, 'Kem Gelato', 7, NULL, 20000, 18000, 'https://toplist.vn/images/800px/kem-gelato-y-62623.jpg', 'ly', NULL, NULL, 1, 0),
(66, 'Kem Mochi', 7, NULL, 20000, 18000, 'https://toplist.vn/images/800px/kem-mochi-nhat-ban-62638.jpg', 'ly', NULL, NULL, 0, 1),
(67, 'Kem Helado', 7, NULL, 30000, 25000, 'https://toplist.vn/images/800px/kem-helado-argentina-62653.jpg', 'ly', NULL, NULL, 0, 1),
(68, 'Kem Ais Kacang', 7, NULL, 25000, 20000, 'https://toplist.vn/images/800px/kem-ais-kacang-malaysia-62668.jpg', 'ly', NULL, NULL, 0, 0),
(69, 'Kem Kulfi', 7, NULL, 20000, 18000, 'https://images.food52.com/dqFuMtkqTcVYLPM1ZYBbga5Ie3A=/660x440/filters:format(webp)/99de9a94-6124-4652-9882-8d754b9b1b1e--kulfi8.jpg', 'cây', NULL, NULL, 0, 0),
(70, 'Kem Spaghetti', 7, NULL, 25000, 22000, 'https://toplist.vn/images/800px/kem-spaghetti-eis-duc-63201.jpg', 'ly', NULL, NULL, 0, 0),
(71, 'Sinh tố xoài', 3, NULL, 15000, 0, 'https://dayphache.edu.vn/wp-content/uploads/2016/02/cach-lam-sinh-to-xoai-sua-dac.jpg', 'ly', NULL, NULL, 0, 1),
(72, 'Sinh tố bơ', 3, NULL, 20000, 18000, 'https://cdn.tgdd.vn/Files/2018/05/29/1091772/3-cach-lam-sinh-to-bo--12.jpg', 'ly', NULL, NULL, 0, 1),
(73, 'Sinh tố dưa hấu', 3, NULL, 20000, 0, 'https://thucthan.com/media/2019/07/sinh-to-dua-hau/sinh-to-dua-hau.jpg', 'ly', NULL, NULL, 0, 0),
(74, 'Sinh tố dừa', 3, NULL, 20000, 0, 'http://www.monngon.tv/uploads/images/2017/05/27/43de1b63bd48240552d097be2954074b-cach-lam-sinh-to-dua-sl.jpg', 'ly', NULL, NULL, 0, 1),
(75, 'Nước ép cà chua', 3, NULL, 25000, 20000, 'https://nongsandungha.com/wp-content/uploads/2019/08/nuoc-ep-ca-chua.jpg', 'ly', NULL, NULL, 0, 0),
(76, 'Nước ép cam', 3, NULL, 15000, 0, 'https://nongsandungha.com/img/nuoc-ep-cam.jpg', 'ly', NULL, NULL, 0, 0),
(77, 'Nước ép cà rốt', 3, NULL, 20000, 18000, 'https://nongsandungha.com/img/nuoc-ep-ca-rot.jpg', 'ly', NULL, NULL, 0, 1),
(78, 'Nước ép bưởi', 3, NULL, 20000, 0, 'https://nongsandungha.com/img/nuoc-ep-buoi.jpg', 'ly', NULL, NULL, 0, 0),
(79, 'Nước ép táo', 3, NULL, 25000, 20000, 'https://nongsandungha.com/img/nuoc-ep-tao.jpg', 'ly', NULL, NULL, 0, 0),
(80, 'Nước ép dứa', 3, NULL, 20000, 0, 'https://nongsandungha.com/img/nuoc-ep-dua.jpg', 'ly', NULL, NULL, 1, 0),
(81, 'Nước ép nho', 3, NULL, 20000, 28000, 'https://nongsandungha.com/img/nuoc-ep-nho.jpg', 'ly', NULL, NULL, 1, 0),
(82, 'Nước ép bí đao', 3, NULL, 25000, 20000, 'https://nongsandungha.com/img/nuoc-ep-bi-dao.jpg', 'ly', NULL, NULL, 1, 0),
(83, 'Nước ép ổi', 3, NULL, 20000, 0, 'https://nongsandungha.com/img/nuoc-ep-oi.jpg', 'ly', NULL, NULL, 0, 0),
(84, 'Kem chua NZ', 7, 'Kem New Zealand hay được mọi người gọi bằng cái tên kem NZ đã trở nên quen thuộc với giới trẻ xứ Hà Thành. Món kem chua độc đáo này có vị tươi mát cùng với vị béo ngậy, ngọt ngào rất dịu, kem NZ để lại ấn tượng sâu sắc trong lòng mỗi du khách với hương vị thanh mát tự nhiên của trái cây nhiệt đới.', 50000, 0, 'https://topchuan.com/wp-content/uploads/2019/08/Kem-chua-NZ.jpg', 'ly', NULL, NULL, 1, 0),
(85, 'Kem cuộn', 7, NULL, 30000, 28000, 'https://topchuan.com/wp-content/uploads/2019/08/Kem-cuon.jpg', 'ly', NULL, NULL, 1, 0),
(86, 'Kem xôi', 7, NULL, 20000, 0, 'https://topchuan.com/wp-content/uploads/2019/08/Kem-xoi-1.jpg', 'ly', NULL, NULL, 1, 0),
(87, 'Cà phê sữa đá', 3, NULL, 20000, 0, 'https://bonjourcoffee.vn/blog/wp-content/uploads/2020/01/Ca-phe-sua-da.jpg', 'ly', NULL, NULL, 0, 1),
(88, 'Cà phê đen đá', 3, NULL, 15000, 0, 'https://comgasg.com/wp-content/uploads/2019/11/cafe-da-3.jpg', 'ly', NULL, NULL, 0, 1),
(89, 'Xôi gấc chiên', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-3.jpg', 'đĩa', NULL, NULL, 1, 0),
(90, ' Xôi vò', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-4.jpg', 'đĩa', NULL, NULL, 1, 0),
(91, 'Xôi đậu xanh nước cốt dừa', 8, NULL, 20000, 0, 'https://cdn.daotaobeptruong.vn/wp-content/uploads/2018/03/xoi-dau-xanh-nuoc-cot-dua.jpg', 'đĩa', NULL, NULL, 1, 0),
(92, 'Xôi bắp', 8, NULL, 20000, 0, 'https://cdn.tgdd.vn/Files/2019/05/12/1166435/recipe-cover-r23407.jpg', 'đĩa', NULL, NULL, 1, 0),
(93, 'Xôi dừa', 8, NULL, 20000, 0, 'https://image.cooky.vn/recipe/g4/34206/s640/cooky-recipe-cover-r34206.jpg', 'đĩa', NULL, NULL, 1, 0),
(94, 'Xôi mặn gói lá', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-8.jpg', 'đĩa', NULL, NULL, 1, 0),
(95, 'Gà bó xôi', 8, NULL, 75000, 60000, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-9.jpg', 'đĩa', NULL, NULL, 1, 0),
(96, 'Xôi mặn', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-10.jpg', 'đĩa', NULL, NULL, 1, 0),
(97, 'Xôi gà chiên giòn', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-11.jpg', 'đĩa', NULL, NULL, 1, 0),
(98, 'Xôi ngũ sắc', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-12.jpg', 'đĩa', NULL, NULL, 1, 0),
(99, 'Xôi đậu phộng', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-13.jpg', 'đĩa', NULL, NULL, 1, 0),
(100, 'Xôi gà bọc lá sen', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-15.jpg', 'đĩa', NULL, NULL, 1, 0),
(101, 'Xôi lá nếp', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cachnauxoingon-16.png', 'đĩa', NULL, NULL, 1, 0),
(102, 'Xôi cốm', 8, NULL, 20000, 0, 'https://massageishealthy.com/wp-content/uploads/2018/08/cac-mon-xoi-ngon-cach-nau-xoi-ngon-17.jpg', 'đĩa', NULL, NULL, 1, 0),
(103, 'Bánh mì kẹp thịt', 9, NULL, 20000, 0, 'https://cdn.huongnghiepaau.com/wp-content/uploads/2019/08/banh-mi-heo-quay-thom-ngon.jpg', 'bánh', NULL, NULL, 0, 1),
(104, 'Bánh mì nướng Kaya', 9, NULL, 20000, 0, 'http://anhquanbakery.com/uploads/images/banh-mi-nuong-Kaya.jpg', 'bánh', NULL, NULL, 0, 1),
(105, 'Bánh mì Mitrailette', 9, NULL, 20000, 0, 'http://anhquanbakery.com/uploads/images/banh-mi-Mitraillette.jpg', 'bánh', NULL, NULL, 0, 0),
(106, 'Bánh mì Medianoche', 9, NULL, 20000, 0, 'http://anhquanbakery.com/uploads/images/Medianoche.jpg', 'bánh', NULL, NULL, 1, 0),
(107, 'Panino', 9, NULL, 20000, 18000, 'http://anhquanbakery.com/uploads/images/Panino.jpg', 'bánh', NULL, NULL, 1, 0),
(108, 'Doner Kebab', 9, NULL, 20000, 0, 'http://anhquanbakery.com/uploads/images/Doner%20Kebab.jpg', 'bánh', NULL, NULL, 0, 0),
(109, 'Bánh mì pate trứng ốp la', 9, NULL, 20000, 0, 'http://coju.vn/uploads/products/2019/03/30/5yplr9ngx0hi41rtupst/large-avatar-20190419161800.jpg', 'bánh', NULL, NULL, 0, 1),
(110, 'Bánh mì chảo', 9, NULL, 30000, 28000, 'https://cdn.huongnghiepaau.com/wp-content/uploads/2019/01/banh-mi-chao-thom-ngon.jpg', 'đĩa', NULL, NULL, 1, 0),
(111, 'BÁNH MÌ SANDWICH KẸP TRỨNG', 9, NULL, 25000, 0, 'https://cdn.huongnghiepaau.com/wp-content/uploads/2019/08/banh-mi-sandwich-trung.jpg', 'bánh', NULL, NULL, 0, 0),
(112, 'Bánh Mì Thổ Nhĩ Kỳ', 9, NULL, 20000, 0, 'https://images.foody.vn/res/g78/773689/prof/s640x400/foody-upload-api-foody-mobile-pierres-kebab-04-jpg-180912151305.jpg', 'bánh', NULL, NULL, 0, 1),
(113, 'BÁNH MÌ QUE ', 9, NULL, 20000, 0, 'https://cdn.daylambanh.edu.vn/wp-content/uploads/2019/09/banh-mi-que-nho-xinh-600x400.jpg', 'que', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`) VALUES
(9, 'https://cdn.cet.edu.vn/wp-content/uploads/2019/05/chon-lua-va-nau-ky-thuc-pham.jpg'),
(11, 'https://images.foody.vn/res/g87/862055/prof/s576x330/foody-upload-api-foody-mobile-hddd-jpg-181210165347.jpg'),
(12, 'https://images.vov.vn/w800/uploaded/0my4wpimuay/2019_02_15/a_1_fsbg.jpg'),
(13, 'https://image.plo.vn/w653/Uploaded/2020/tmuihk/2017_09_08/thuc-an-nhanh-thumb_yxiv.jpg'),
(14, 'https://icdn.dantri.com.vn/thumb_w/640/2019/04/07/di-ung-1554605099535.jpg'),
(15, 'https://khoinghiep.thuvienphapluat.vn/uploads/images/2019/01/21/grh54.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

DROP TABLE IF EXISTS `type_products`;
CREATE TABLE IF NOT EXISTS `type_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cơm', '', 'https://images.foody.vn/res/g10/98048/prof/s576x330/foody-upload-api-foody-mobile-com-190311132057.jpg', NULL, NULL),
(2, 'Bún-Phở', '', 'https://monngonbamien.org/wp-content/uploads/2019/10/cach-nau-bun-bo-hue-mien-nam-de-ban-don-gia-chuan-vi-ngon-nhat.jpg', NULL, NULL),
(3, 'Nước giải khát', '', 'https://baobibinhminh.net/wp-content/uploads/2019/05/smillign-fizzy-drinks.jpg', NULL, NULL),
(6, 'Bánh ngọt', '', 'https://media.cooky.vn/recipe/g3/29939/s480x480/recipe29939-prepare-step6-636595848832093614.jpg', NULL, NULL),
(7, 'Kem', '', 'https://www.kiotviet.vn/wp-content/uploads/2014/07/cach-lam-kem-ky.jpg', NULL, NULL),
(8, 'Xôi', '', '', NULL, NULL),
(9, 'Bánh mì', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Nguyễn Hoàng Phúc', 'phuc.nguyenblackjack@hcmut.edu.vn', '$2y$10$BORnrgsW58Ubr0nbHyv2xerQo2EMwwG31PyFmw/ggIdeakIvVgPAu', NULL, '2020-07-21 08:16:42', '2020-07-21 08:16:42'),
(5, 'Nguyễn Hoàng Phúc', '1412953@hcmut.edu.vn', '$2y$10$gQ3gvvyl35VP4mZK2HyoQemK0rqJakUUyFECI8qvj3.qgnsloT/qq', NULL, '2020-07-24 01:42:07', '2020-07-24 01:42:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
