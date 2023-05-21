-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2022 at 10:54 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `figurindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_11_15_162203_create_tbl_admin', 1),
(4, '2022_11_22_042210_create_tbl_category_product', 2),
(5, '2022_11_24_163231_create_tbl_brand_product', 3),
(6, '2022_11_24_170929_create_tbl_product', 4),
(7, '2022_11_25_072313_create_tbl_user', 5),
(8, '2022_12_16_063651_create_tbl_cart', 6),
(9, '2022_12_16_155247_tbl_shipping', 6),
(10, '2022_12_16_205008_tbl_payment', 7),
(11, '2022_12_16_205120_tbl_order', 8),
(12, '2022_12_16_210307_tbl_order_detail', 8),
(13, '2022_12_18_140805_tbl_payment', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int UNSIGNED NOT NULL,
  `admin_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(3, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BaoTran', '0376195269', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Good Smile Company', 'dddđ', 0, NULL, NULL),
(2, 'Max Factory', 'ddddddddddddddddd', 0, NULL, NULL),
(3, 'FREEing', 'd', 0, NULL, NULL),
(5, 'Bandai Spirits', 'd', 0, NULL, NULL),
(6, 'MegaHouse', 'd', 0, NULL, NULL),
(7, 'Q-six', 'd', 0, NULL, NULL),
(8, 'Intelligent System', 'a', 0, NULL, NULL),
(9, 'Kotobukiya', 'Kotobukiya', 0, NULL, NULL),
(10, 'Furyu', 'Furyu', 0, NULL, NULL),
(11, 'RIBOSE', 'RIBOSE', 0, NULL, NULL),
(12, 'Myethos', 'Myethos', 0, NULL, NULL),
(13, 'Bandai Namco Film Works', 'Bandai Namco Film Works', 0, NULL, NULL),
(14, 'WING', 'WING', 0, NULL, NULL),
(15, 'VKu', '123', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Hàng có sẵn', 'Bảo Trầndddd', 0, NULL, NULL),
(3, 'Hàng order', 'dsadasd', 0, NULL, NULL),
(7, 'R18', 'a', 0, NULL, NULL),
(9, '123', '123', 0, NULL, NULL),
(10, 'Bảo', '123', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `shipping_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `order_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(72, 1, 81, 73, '38,623,200.00', 'Đang chờ xử lý', NULL, NULL),
(73, 1, 82, 74, '83,308,500.00', 'Đang chờ xử lý', NULL, NULL),
(74, 1, 83, 75, '0.00', 'Đang chờ xử lý', NULL, NULL),
(75, 24, 84, 76, '30,419,400.00', 'Đang chờ xử lý', NULL, NULL),
(76, 24, 85, 77, '30,419,400.00', 'Đang chờ xử lý', NULL, NULL),
(77, 24, 86, 78, '28,967,400.00', 'Đang chờ xử lý', NULL, NULL),
(78, 24, 87, 79, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(79, 24, 88, 80, '33,396,000.00', 'Đang chờ xử lý', NULL, NULL),
(80, 24, 89, 81, '2,299,000.00', 'Đang chờ xử lý', NULL, NULL),
(81, 24, 90, 82, '19,311,600.00', 'Đang chờ xử lý', NULL, NULL),
(82, 24, 91, 83, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(83, 24, 92, 84, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(84, 24, 93, 85, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(85, 24, 94, 86, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(86, 24, 95, 87, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(87, 24, 96, 88, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(88, 24, 97, 89, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(89, 24, 98, 90, '18,150,000.00', 'Đang chờ xử lý', NULL, NULL),
(90, 1, 99, 91, '9,655,800.00', 'Đang chờ xử lý', NULL, NULL),
(91, 25, 100, 92, '28,023,600.00', 'Đang chờ xử lý', NULL, NULL),
(92, 25, 101, 93, '19,311,600.00', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(71, 68, 88, 'My Hero Academia Himiko Toga - Villain - 1/7', '9150000', 3, NULL, NULL),
(72, 69, 88, 'My Hero Academia Himiko Toga - Villain - 1/7', '9150000', 3, NULL, NULL),
(73, 70, 87, 'B-style Touhou Project Koishi Komeiji 1/4', '13800000', 2, NULL, NULL),
(74, 71, 88, 'My Hero Academia Himiko Toga - Villain - 1/7', '9150000', 2, NULL, NULL),
(75, 72, 89, 'B&W,W-kn [G] 1/7', '7980000', 4, NULL, NULL),
(76, 73, 87, 'B-style Touhou Project Koishi Komeiji 1/4', '13800000', 3, NULL, NULL),
(77, 73, 88, 'My Hero Academia Himiko Toga - Villain - 1/7', '9150000', 3, NULL, NULL),
(78, 75, 18, 'G.E.M. Series Demon Slayer: Kimetsu no Yaiba Tengen Uzui', '8380000', 3, NULL, NULL),
(79, 76, 18, 'G.E.M. Series Demon Slayer: Kimetsu no Yaiba Tengen Uzui', '8380000', 3, NULL, NULL),
(80, 77, 89, 'B&W,W-kn [G] 1/7', '7980000', 3, NULL, NULL),
(81, 78, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(82, 79, 87, 'B-style Touhou Project Koishi Komeiji 1/4', '13800000', 2, NULL, NULL),
(83, 80, 56, 'Nendoroid Ranka Lee', '950000', 2, NULL, NULL),
(84, 81, 89, 'B&W,W-kn [G] 1/7', '7980000', 2, NULL, NULL),
(85, 82, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(86, 83, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(87, 84, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(88, 85, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(89, 86, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(90, 87, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(91, 88, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(92, 89, 83, 'GIRLS FROM HELL Viola 1/7', '7500000', 2, NULL, NULL),
(93, 90, 89, 'B&W,W-kn [G] 1/7', '7980000', 1, NULL, NULL),
(94, 91, 82, 'POP UP PARADE FAIRY TAIL Lucy Heartfilia Virgo Form Ver.', '1600000', 3, NULL, NULL),
(95, 91, 17, '18+ Erotics Gear-Girl Rouge Illustration by Ulrich 1/6', '9180000', 2, NULL, NULL),
(96, 92, 89, 'B&W,W-kn [G] 1/7', '7980000', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(69, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(70, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(71, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(72, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(73, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(74, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(75, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(76, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(77, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(78, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(79, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(80, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(81, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(82, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(83, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(84, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(85, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(86, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(87, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(88, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(89, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL),
(90, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(91, 'Thanh toán COD', 'Đang chờ xử lý', NULL, NULL),
(92, 'Thanh toán bằng ví điện tử', 'Đang chờ xử lý', NULL, NULL),
(93, 'Thanh toán bằng chuyển khoản', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_series` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_proportion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_price_update` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_series`, `product_size`, `product_proportion`, `product_date`, `product_price`, `product_price_update`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_status`, `created_at`, `updated_at`) VALUES
(12, 2, 1, 'PLAMAX Chainsaw Man Power Plastic Model', 'Power', 'Chainsaw Man', '1/7', '20cm', '5/2023', 2350000, 'Giá cập nhật tháng 11/2022:', 'chainsawman35.jpg', '', '', '', 0, NULL, NULL),
(14, 2, 1, 'ASSASSIN 1/12 Action Figure Snail Shell Studio', 'ASSASSIN', 'Action Figure', '1/12', '16.5cm', '5/2023', 3850000, 'Giá cập nhật tháng 11/2022:', 'assasin-1-12-action76.jpg', '', '', '', 0, NULL, NULL),
(15, 2, 3, 'Miss Kobayashi\'s Dragon Maid Kanna China Dress', 'Kanna(Kanna Kamui)', 'Miss Kobayashi\'s Dragon Maid (Kobayashi-san Chi no Maid Dragon)', '1/6', '17.5cm', '1/2024', 9800000, 'Giá cập nhật tháng 8/2022:', 'dragonmaid90.jpg', '', '', '', 0, NULL, NULL),
(17, 2, 3, '18+ Erotics Gear-Girl Rouge Illustration by Ulrich 1/6', 'Erotics Gear-Girl Rouge', 'Illustration', '1/6', '30cm', '11/2023', 9180000, 'Giá cập nhật tháng 5/2022:', 'Erotics-Gear-Girl30.jpg', '', '', '', 0, NULL, NULL),
(18, 3, 6, 'G.E.M. Series Demon Slayer: Kimetsu no Yaiba Tengen Uzui', 'Tengen Uzui(Sound Pillar)', 'Demon Slayer: Kimetsu no Yaiba', '1/6', '23cm', '2/2023', 8380000, 'Giá cập nhật tháng 8/2022:', 'Kimetsu-no-Yaiba-Tengen-Uzui55.jpg', '', '', '', 0, NULL, NULL),
(19, 3, 1, 'Movie Masterpiece \" Black Panther: Wakanda Forever \" 1/6', 'Black Panther(T\'Challa)', 'Marvel Comics, Black Panther, Black Panther: Wakanda Forever', '1/6', '28cm', '4/2024', 12000000, 'Giá cập nhật tháng 11/2022:', 'Black-Panther52.jpg', '', '', '', 0, NULL, NULL),
(20, 2, 1, 'POP UP PARADE Chainsaw Man', '( Chainsaw Man ) , Denji', 'Chainsaw Man', '1/8', '18.5cm', '4/2023', 1700000, 'Giá cập nhật tháng 11/2022:', 'Chainsaw-Man37.jpg', '', '', '', 0, NULL, NULL),
(21, 7, 7, '18+ Prosecutor Mitsu Umetani Purple Jeans Ver. 1/6', 'Mitsu Umetani', 'R18', '1/6', '19.5cm', '6/2023', 7150000, 'Giá cập nhật tháng 11/2022:', '18__prosecutor_mitsu_umetani_purple_jeans_ver70.jpg', '', '', '', 0, NULL, NULL),
(22, 7, 7, '18+ Alp Switch Alp 1/6', 'Alp', 'Alp Switch', '1/6', '28cm', '5/2023', 7450000, 'Giá cập nhật tháng 10/2022:', '18__alp_switch_alp_1__2__6c1a531c9a3b47289224c0e297612bef_master46.jpg', '', '', '', 0, NULL, NULL),
(24, 7, 6, '18+ Succubus Maid Maria illustration by KEn Limited Distribution 1/6', 'Succubus Maid Maria', 'Original Illustration', '1/6', '28.5cm', '2/2023', 6300000, 'Giá cập nhật tháng 10/2022:', '18__succubus_maid_maria_illustration_by_ken_limited_distribution_master34.jpg', '', '', '', 0, NULL, NULL),
(26, 2, 7, '13 Sentinels: Aegis Rim Ryoko Shinonome 1/7', 'Ryoko Shinonome', '13 Sentinels: Aegis Rim', '1/7', '22cm', '9/2023', 8500000, 'Giá cập nhật tháng 11/2022:', 'Aegis-Rim-Ryoko-Shinonome2.jpg', '', '', '', 0, NULL, NULL),
(28, 3, 8, 'Fire Emblem Heroes Veronica 1/7', 'Veronica', 'Fire Emblem Heroes', '1/7', '25.5cm', '2/2024', 8950000, 'Giá cập nhật tháng 11/2022:', 'Fire-Emblem-Heroes-Veronica15.jpg', '', '', '', 0, NULL, NULL),
(29, 3, 8, 'So I\'m a Spider, So What? Ariel 1/7', 'Ariel(Demon Lord)', 'So I\'m a Spider, So What?', '1/7', '23cm', '11/2023', 7750000, 'Giá cập nhật tháng 5/2022:', 'So-I\'m-a-Spider59.jpg', '', '', '', 0, NULL, NULL),
(30, 3, 8, 'POP UP PARADE KonoSuba Kazuma', 'Kazuma', 'KonoSuba\" Series (Kono Subarashii Sekai ni Shukufuku wo!)', '1/6', '19.5cm', '11/2023', 1300000, 'Giá cập nhật tháng 11/2022:', 'KonoSuba-Kazuma63.jpg', '', '', '', 0, NULL, NULL),
(31, 3, 8, 'Anime \" Bastard!! -Heavy Metal, Dark Fantasy- \" Arshes Nei 1/7', 'Arshes Nei', 'Bastard!! -Heavy Metal, Dark Fantasy', '1/7', '28cm', '11/2023', 7950000, 'Giá cập nhật tháng 11/2022:', 'Arshes-Nei2.jpg', '', '', '', 0, NULL, NULL),
(43, 9, 8, '123', '123', '123', '123', '123', '123', 123, '123', 'Sd69455cf92af454b8f2d6742e8312080j59.png', '', '', '', 0, NULL, NULL),
(54, 3, 8, 'The Idolmaster - Chihaya Kisaragi Yukata Ver 1/8', 'Chihaya Kisaragi', 'THE IDOLM@STER', '1/7', '23cm', '7/2015', 1180000, 'Giá cập nhật tháng 5/2022', 'the_idolmaster_chihaya_kisaragi_yukata_ver__20_1__master36.jpg', '', '', '', 0, NULL, NULL),
(55, 2, 1, 'Nendoroid Akagi', 'Nendoroid Akagi', 'Kantai Collection', 'NON Scale', 'NON Scale', '5/2014', 950000, 'New: 950.000đ. SL: 1 hộp', 'nendoroid_akagi__20_1__master88.jpg', '', '', '', 0, NULL, NULL),
(56, 2, 1, 'Nendoroid Ranka Lee', 'Ranka Lee', 'Macross Frontier', 'NON Scale', 'NON Scale', '12/2013', 950000, 'Số lượng còn lại chỉ 1 hộp, New 100%', 'nendoroid_ranka_lee__20_5__master5.jpg', '', '', '', 0, NULL, NULL),
(75, 3, 9, 'SNK Bishoujo Athena Asamiya -THE KING OF FIGHTERS \'98- 1/7', 'Athena Asamiya', 'The King of Fighters', '1/7', '23cm', '6/2023', 4350000, 'Giá cập nhật tháng 12/2022: ', 'snk_bishoujo_athena_asamiya_-the_king_of_fighters__98-_1__1__4b77c678d6e6460f97da26adfea91012_master4.jpg', '', '', '', 0, NULL, NULL),
(76, 3, 2, 'PLAMAX GP-06 Guilty Princess Maidroid Kuon', 'Maidroid Kuon', 'PLAMAX', '1/7', '23cm', '6/2023', 2400000, 'Giá cập nhật tháng 12/2022: ', 'plamax_gp-06_guilty_princess_maidroid_kuon__2__0493e0c3c8c0412b8635a218af6e7a93_master11.jpg', '', '', '', 0, NULL, NULL),
(77, 3, 3, 'B-style Hunter x Hunter Gon Freecss 1/4', 'Gon Freecss', 'Hunter x Hunter', '1/4', '28.5cm', '12/2023', 18000000, 'Giá cập nhật tháng 12/2022: ', '_b-style_hunter_x_hunter_gon_freecss_1__1__827eaadcb0d04f38ad6e63e05ace9bef_master7.jpg', '', '', '', 0, NULL, NULL),
(79, 3, 11, 'RISE UP THE IDOLM@STER Cinderella Girls Riamu Yumemi', 'Riamu Yumemi', 'THE IDOLM@STER Cinderella Girls', '1/7', '23cm', '12/2022', 2150000, 'Giá cập nhật tháng 12/2022: ', 'rise_up_the_idolm_ster_cinderella_girls_riamu_yumemi__7__aa1096e2366b449080d2e6eab9309c79_master87.jpg', '', '', '', 0, NULL, NULL),
(80, 3, 9, 'Sousai Shoujo Teien Koyomi Takanashi [Swimsuit] 1/10', 'Koyomi Takanashi', 'Sousai Shoujo Teien', '1/10', '15cm', '6/2023', 1980000, 'Giá cập nhật tháng 12/2022: ', 'sousai_shoujo_teien_koyomi_takanashi__swimsuit__1_10__1__98d2fd7c5c5341c5b39f64cff0a9f402_master3.jpg', '', '', '', 0, NULL, NULL),
(81, 3, 1, 'Nendoroid Slime Rancher 2 Beatrix LeBeau', 'Slime Rancher', 'Beatrix LeBeau', 'NON Scale', 'NON Scale', '6/2023', 2380000, 'Giá cập nhật tháng 12/2022: 2.380.000đ', 'nendoroid_slime_rancher_2_beatrix_lebeau__1__828f75d61749431cb02c0fd24b086608_master96.jpg', '', '', '', 0, NULL, NULL),
(82, 3, 1, 'POP UP PARADE FAIRY TAIL Lucy Heartfilia Virgo Form Ver.', 'Lucy Heartfilia', 'FAIRY TAIL', '1/7', '1/7', '5/2023', 1600000, 'Giá cập nhật tháng 12/2022: 1.600.000đ', 'pop_up_parade_fairy_tail_lucy_heartfilia_virgo_form_ver__1__a9a7f630c99e4bdebbd484fd16087c13_master96.jpg', '', '', '', 0, NULL, NULL),
(83, 3, 12, 'GIRLS FROM HELL Viola 1/7', 'Viola', 'GIRLS FROM HELL', '1/7', '1/7', '10/2023', 7500000, 'Giá cập nhật tháng 12/2022: 7.500.000đ', 'girls_from_hell_viola_1__1__6adff7716e8c43698120e3e0150fb5e9_master53.jpg', '', '', '', 0, NULL, NULL),
(84, 3, 13, 'ViVignette \"BURN THE WITCH\" Noel Niihashi', 'Noel Niihashi', 'BURN THE WITCH', '1/8', '1/8', '10/2023', 8250000, 'Giá cập nhật tháng 12/2022:', 'vivignette_burn_the_witch_noel_niihashi__1__6c4007ac9b624239a7dfc4ee2b7009c9_master32.jpg', '', '', '', 0, NULL, NULL),
(85, 3, 13, 'ViVignette \"BURN THE WITCH\" Nini', 'Nini Spangle', 'BURN THE WITCH', '1/7', '1/7', '10/2023', 8250000, 'Giá cập nhật tháng 12/2022: 8.250.000đ', 'vivignette_burn_the_witch_nini__1__50d03210f86c4bdb88799e508043aa7f_master37.jpg', '', '', '', 0, NULL, NULL),
(86, 3, 14, 'Re:ZERO -Starting Life in Another World- Rem 1/7', 'Rem', 'Re:ZERO -Starting Life in Another World- (Re: Zero kara Hajimeru Isekai Seikatsu)', '1/4', '1/4', '7/2023', 6650000, 'Giá cập nhật tháng 12/2022: 6.650.000đ', 'rezero_-starting_life_in_another_world-_rem_1__1__7d5b01ffa67246dbb1c46292789aa435_master19.jpg', '', '', '', 0, NULL, NULL),
(87, 3, 3, 'B-style Touhou Project Koishi Komeiji 1/4', 'Koishi Komeiji', 'Touhou Project', '1/4', '1/4', '11/2023', 13800000, 'Giá cập nhật tháng 12/2022:', 'b-style_touhou_project_koishi_komeiji_1__1__0df54fc67a9140c9b102d74b11ffa45a_master75.jpg', '', '', '', 0, NULL, NULL),
(88, 3, 14, 'My Hero Academia Himiko Toga - Villain - 1/7', 'Himiko Toga', 'My Hero Academia (Boku no Hero Academia)', '1/7', '1/7', '1/2023', 9150000, 'Giá cập nhật tháng 12/2022:', 'my_hero_academia_himiko_toga_-_villain_-_1__1__94c614387c254477ab54224fef3f5962_master58.jpg', '', '', '', 0, NULL, NULL),
(89, 3, 11, 'B&W,W-kn [G] 1/7', 'G', 'B&W', '1/7', '1/7', '9/2023', 7980000, 'Giá cập nhật tháng 12/2022:', 'b_w_w-kn-4_53.jpg', 'b_w_w-kn__g__1__1__af99cdeb22e746dabe384a02560f2fe4_master8.jpg', 'b_w_w-kn-2.jpg', 'b_w_w-kn-3.jpg', 0, NULL, NULL),
(90, 3, 13, 'PLAMAX Chainsaw Man Power Plastic Model', 'Arshes Nei', 'Bastard!! -Heavy Metal, Dark Fantasy', '1/6', '1/6', '11/2023', 10000000, 'Giá cập nhật tháng 8/2022:', 'girls-from-hell51.jpg', 'girls-from-hell51.jpg', 'girls-from-hell51.jpg', 'girls-from-hell51.jpg', 0, '2022-12-19 20:53:08', '2022-12-19 20:53:08'),
(91, 2, 13, '18+ Prosecutor Mitsu Umetani Purple Jeans Ver. 1/6', 'Bảo', 'Đời', '1/1', '1/1', '11/9/2003', 7950000, '7950000', '307752588_870724820578573_4560445133176684015_n74.jpg', '307752588_870724820578573_4560445133176684015_n74.jpg', '307752588_870724820578573_4560445133176684015_n74.jpg', '307752588_870724820578573_4560445133176684015_n74.jpg', 0, '2022-12-19 22:33:48', '2022-12-19 22:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `created_at`, `updated_at`) VALUES
(77, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(78, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(79, 'Dany', '123 Trần Duy Hưng', '33333', NULL, NULL),
(80, 'Tran Bao', '123 Trần Duy Hưng', '0376195269', NULL, NULL),
(81, 'Tran Bao', 'ddddd', '0376195269', NULL, NULL),
(82, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(83, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(84, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(85, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(86, 'Tran Bao', '470 Tranfaglia', 'ddddd', NULL, NULL),
(87, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(88, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(89, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(90, 'Tran Bao', '470 Tranfaglia', '0376195269', NULL, NULL),
(91, '33', '123', '0376195269', NULL, NULL),
(92, '33', '123', '0376195269', NULL, NULL),
(93, '33', '123', '0376195269', NULL, NULL),
(94, '33', '123', '0376195269', NULL, NULL),
(95, '33', '123', '0376195269', NULL, NULL),
(96, '33', '123', '0376195269', NULL, NULL),
(97, '33', '123', '0376195269', NULL, NULL),
(98, 'Trần bảo', '470 Trần Đại Nghĩa', '0376195269', NULL, NULL),
(99, 'Dany', '280/23/2 Lê Hồng Phong', '0376195269', NULL, NULL),
(100, 'Trần Phạm Quốc Bảo', '470 Trần Đại Nghĩa', '0376195269', NULL, NULL),
(101, 'Trần Phạm Quốc Bảo', 'Chưa nhập', '376195269', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int UNSIGNED NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` int NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Chưa nhập',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_password`, `user_name`, `user_phone`, `user_address`, `created_at`, `updated_at`, `verified`) VALUES
(1, 'user@gmail.com', '123', 'Dany', 376195269, '280/23/2 Lê Hồng Phong', NULL, NULL, 1),
(22, 'figurinemailnotify@gmail.com', '123', '1', 1, 'Chưa nhập', NULL, NULL, 1),
(24, 'deohieukieugi45@gmail.com', 'bao', 'Bảo Trần', 376195269, '470 Trần Đại Nghĩa', NULL, NULL, 1),
(25, 'toyowa1192003@gmail.com', '123', 'Trần Phạm Quốc Bảo', 376195269, 'Chưa nhập', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
