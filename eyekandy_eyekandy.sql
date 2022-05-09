-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2022 at 01:30 PM
-- Server version: 5.6.51
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyekandy_eyekandy`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `approve` int(11) DEFAULT '1' COMMENT '1=approved,0=unapproved',
  `link` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT 'admin',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `thumbnail`, `start_date`, `end_date`, `position`, `status`, `approve`, `link`, `user_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum1', 'uploads/advertisement/logo_2_1641970998.jpeg', '1635538860', '1635798060', '', 1, 1, 'http://shyaam_trust.manageprojects.in/advertisement/2/edit', NULL, 'admin', '2021-10-27 14:29:35', '2022-02-17 17:54:15'),
(3, 'Lorem ipsum', 'uploads/advertisement/logo_1_1641970964.png', '1635279660', '1635884460', '', 1, 1, 'http://shyaam_trust.manageprojects.in/advertisement/3/edit', NULL, 'admin', '2021-10-27 22:46:54', '2022-01-12 07:02:44'),
(9, 'ads', 'uploads/advertisement/16419648091_1641964809.jpg', '1641925800', '1644517800', '', 1, 0, NULL, 2, 'user', '2022-01-12 10:50:09', '2022-01-12 10:50:09'),
(10, 'ads', 'uploads/advertisement/16419686321_1641968632.jpg', '1641925800', '1644517800', '', 1, 0, NULL, 2, 'user', '2022-01-12 11:53:52', '2022-01-12 11:53:52'),
(11, 'ads', 'uploads/advertisement/16419691431_1641969143.jpg', '1641925800', '1644517800', '', 1, 0, NULL, 2, 'user', '2022-01-12 12:02:23', '2022-01-12 12:02:23'),
(12, 'ads', 'uploads/advertisement/16419692751_1641969275.jpg', '1641925800', '1644517800', '', 0, 1, NULL, 2, 'user', '2022-01-12 12:04:35', '2022-01-12 07:12:41'),
(15, 'makeup', 'uploads/advertisement/1642576609logo(1)_1642576609.png', '1642530600', '1645122600', '', 0, 1, NULL, 34, 'user', '2022-01-19 12:46:49', '2022-02-18 15:51:44'),
(16, 'ads', 'uploads/advertisement/1644403463Screenshot_20210907_102910_1644403463.jpg', '1641925800', '1644517800', '', 1, 0, NULL, 34, 'user', '2022-02-09 16:14:23', '2022-02-09 16:14:23'),
(26, 'ads', 'uploads/advertisement/16469855311_1646985531.jpg', '1646937000', '1647023400', '', 1, 1, NULL, 50, 'user', '2022-03-11 13:28:51', '2022-03-11 13:31:51'),
(27, 'womens day', 'uploads/advertisement/Google-Celebrate-“Happy-Women’s-Day”-By-Making-Doodle-With-Colourful-Quotes-Images.-4_1646997257.jpg', '', '', '', 1, 1, 'http://shyaam_trust.manageprojects.in/advertisement/create', NULL, 'admin', '2022-03-11 16:44:17', '2022-03-11 16:44:17'),
(28, 'ads', 'uploads/advertisement/16469986361_1646998636.jpg', '1646764200', '1646850600', '', 1, 1, NULL, 50, 'user', '2022-03-11 17:07:16', '2022-03-11 17:07:31'),
(29, 'ads', 'uploads/advertisement/16469986981_1646998698.jpg', '1646850600', '1646937000', '', 1, 1, NULL, 50, 'user', '2022-03-11 17:08:18', '2022-03-11 17:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_expire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `name`, `card_number`, `month_expire`, `cvv`, `type`, `active`, `created_at`, `updated_at`) VALUES
(7, '2', 'aliakbar', '1234567891324510', '02/2022', '123', 'visa', 1, '2022-04-06 11:03:31', NULL),
(8, '27', 'Surabhi Jain', '4242424224242424', '12/55', '111', 'visa', 0, '2022-04-06 12:23:05', '2022-04-07 10:18:26'),
(9, '27', 'surbhi jain', '4242424242424242', '11/33', '111', 'visa', 0, '2022-04-07 10:35:22', '2022-04-07 10:37:03'),
(10, '27', 'surbhi', '4242424242424243', '11/11', '111', 'visa', 0, '2022-04-07 10:44:24', '2022-04-07 10:46:06'),
(11, '27', 'fzggjyfjhu', '4242424242421111', '11/22', '111', 'visa', 0, '2022-04-07 12:24:13', '2022-04-07 12:24:21'),
(12, '27', 'gsfxfhdgxhc', '5586868545898588', '12/52', '575', 'mastercard', 0, '2022-04-07 12:27:30', '2022-04-07 12:32:11'),
(13, '27', 'gdfxhhf', '6558545864587578', '11/33', '111', 'discover', 0, '2022-04-07 12:32:39', '2022-04-07 12:33:05'),
(14, '27', 'tdfhfyx', '9757524653555245', '12/33', '111', 'unknown', 0, '2022-04-07 12:34:12', '2022-04-07 12:34:26'),
(15, '27', 'ftdggydtd', '6528652458247568', '10/22', '575', 'discover', 1, '2022-04-07 12:36:48', NULL),
(16, '27', 'fzdxgxtdg', '6558585857586858', '11/33', '245', 'discover', 0, '2022-04-07 12:37:14', '2022-04-07 12:37:26'),
(17, '27', 'gdtfg', '3742454554001262', '12/22', '111', 'amex', 1, '2022-04-07 12:45:20', NULL),
(18, '36', 'umar', '1234567890444353', '12/23', '122', 'unknown', 1, '2022-04-15 09:56:20', NULL),
(19, '54', 'vsgkashdk. jsk', '6383020363832028', '05/25', '333', 'maestro', 1, '2022-04-17 16:29:00', NULL),
(20, '62', 'chandresh', '4242424242454246', '02/28', '123', 'visa', 0, '2022-04-18 12:13:21', '2022-04-18 12:21:59'),
(21, '62', 'chandresh', '9876543218848488', '10/23', '123', 'unknown', 1, '2022-04-18 12:21:39', NULL),
(22, '65', 'chandresh Jain', '4242424242424245', '07/28', '123', 'visa', 1, '2022-04-18 12:53:49', NULL),
(23, '50', 'umar', '1234567890998888', '12/22', '123', 'unknown', 0, '2022-04-28 04:50:29', '2022-05-01 11:07:05'),
(24, '61', 'chandresh', '4200000000002400', '07/28', '123', 'visa', 1, '2022-04-29 13:36:13', NULL),
(25, '61', 'Chandresh Jain', '4200000000004200', '10/28', '123', 'visa', 1, '2022-04-30 12:31:27', NULL),
(26, '61', 'Chandresh', '4200000000000023', '10/28', '123', 'visa', 1, '2022-04-30 12:32:02', NULL),
(27, '50', 'umar', '1231111111111111', '12/23', '111', 'unknown', 0, '2022-05-01 10:37:53', '2022-05-01 10:54:35'),
(28, '50', '111111', '1111111111111111', '12/24', '111', 'unknown', 0, '2022-05-01 10:39:46', '2022-05-01 10:53:56'),
(29, '50', 'cmd;ckmsdcds', '1221111111111111', '11/25', '111', 'unknown', 0, '2022-05-01 10:50:07', '2022-05-01 10:53:50'),
(30, '50', 'aaaaaa', '1111111111111122', '11/24', '111', 'unknown', 0, '2022-05-01 10:56:37', '2022-05-05 20:10:09'),
(31, '50', 'aawwss', '1231221111111111', '12/24', '133', 'unknown', 0, '2022-05-01 11:06:47', '2022-05-05 20:10:13'),
(32, '50', 'umar', '1234321231111111', '12/25', '123', 'unknown', 1, '2022-05-01 11:11:09', NULL),
(33, '50', '1111', '1111114222211111', '11/26', '111', 'unknown', 1, '2022-05-01 11:29:23', NULL),
(34, '50', 'umar', '1232123111111111', '12/24', '121', 'unknown', 1, '2022-05-01 17:54:41', NULL),
(35, '50', 'sedqdwed', '1212211212121212', '12/24', '111', 'unknown', 1, '2022-05-01 18:12:35', NULL),
(36, '50', 'www', '2332222323232434', '12/24', '123', 'mastercard', 1, '2022-05-01 18:15:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_detailsold`
--

CREATE TABLE `bank_detailsold` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_detailsold`
--

INSERT INTO `bank_detailsold` (`id`, `user_id`, `card_number`, `month`, `expire`, `cvv`, `active`, `created_at`, `updated_at`) VALUES
(1, '14', '1234567891324561', '06', '2022', '123', 1, '2022-03-24 12:04:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(191) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `meta_tag` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_icon` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `cat_icon`, `status`, `top`, `created_at`, `updated_at`) VALUES
(6, 5, 'Sub category', 'female_1635326907.jpeg', 0, 0, '2021-10-27 09:28:27', '2022-01-21 18:26:39'),
(8, 14, 'Certification', 'images_1635328440.png', 0, 1, '2021-10-27 09:54:00', '2022-02-18 17:21:29'),
(9, 15, 'TESt', 'ddd_1636697490.JPG', 0, 1, '2021-11-12 06:11:30', '2022-02-18 17:21:33'),
(15, 0, 'Caterers', '14494793_1274907465860794_8599937291803054809_n_1637832059.jpeg', 0, 0, '2021-11-25 09:20:59', '2022-01-18 09:32:56'),
(16, 15, 'Wedding Caterers', 'Catering_Bartending_1637993067.png', 0, 1, '2021-11-27 06:04:27', '2022-02-18 17:21:38'),
(17, 14, 'SAl', '0bb995a9-9cfa-4154-972b-ec0b24aa13d6_1639378910.jpg', 0, 0, '2021-12-13 07:01:50', '2022-02-18 17:21:42'),
(18, 14, 'SAl123', '0bb995a9-9cfa-4154-972b-ec0b24aa13d6_1639378910.jpg', 0, 0, '2021-12-13 07:01:50', '2022-02-18 17:21:46'),
(28, 0, 'test2', 'images_1645100431.jpg', 0, 0, '2022-02-15 05:12:33', '2022-02-17 17:51:49'),
(29, 0, 'test3', 'streaming_1644901968.png', 0, 0, '2022-02-15 05:12:48', '2022-02-17 17:51:53'),
(30, 0, 'test4', 'icons8-open-box-96_1644901979.png', 0, 0, '2022-02-15 05:12:59', '2022-02-17 17:51:56'),
(31, 0, 'qwerty', 'icons8-topic-200_1644902103.png', 0, 0, '2022-02-15 05:15:03', '2022-02-17 17:52:01'),
(32, 0, 'test123', 'icons8-youtube-144_1644904500.png', 0, 0, '2022-02-15 05:55:00', '2022-02-17 17:52:05'),
(34, 0, 'qwerty11', 'icons8-open-box-96_1644905225.png', 0, 0, '2022-02-15 06:07:05', '2022-02-17 17:52:09'),
(35, 0, 'name111', 'streaming_1644905309.png', 0, 0, '2022-02-15 06:08:29', '2022-02-17 17:52:13'),
(36, 0, 'Automobile', 'icons8-automobile-64_1645077277.png', 1, 0, '2022-02-17 11:24:37', '2022-02-17 11:24:37'),
(38, 0, 'Healthcare Medical', 'icons8-medical-doctor-100_1645077419.png', 1, 0, '2022-02-17 11:26:59', '2022-02-17 11:26:59'),
(39, 0, 'Electrical Equipment & Supplies', 'icons8-electrical-100_1645077556.png', 1, 0, '2022-02-17 11:29:16', '2022-02-17 11:29:16'),
(40, 0, 'Industrial Plants', 'icons8-industrial-100_1645077651.png', 1, 0, '2022-02-17 11:30:51', '2022-02-17 11:30:51'),
(41, 0, 'Apparel', 'icons8-raincoat-100_1645077787.png', 1, 0, '2022-02-17 11:33:07', '2022-02-17 11:33:07'),
(42, 0, 'Automobiles & Two Wheelers', 'icons8-protected-bike-lane-100_1645077937.png', 1, 0, '2022-02-17 11:35:37', '2022-02-17 15:13:30'),
(43, 0, 'Beauty & Personal Care', 'icons8-dressing-table-100_1645078135.png', 1, 0, '2022-02-17 11:38:55', '2022-02-17 11:38:55'),
(44, 0, 'Packaging & Printing', 'icons8-cardboard-box-100_1645078228.png', 1, 0, '2022-02-17 11:40:28', '2022-02-17 15:12:09'),
(46, 36, 'New Car', 'icons8-sedan-100_1645079846.png', 1, 1, '2022-02-17 12:07:26', '2022-02-19 20:14:32'),
(47, 36, 'Sell Car', 'icons8-car-sale-100_1645080116.png', 1, 1, '2022-02-17 12:11:56', '2022-02-19 20:15:10'),
(48, 36, 'Car Insurance', 'icons8-car-rental-100_1645080454.png', 1, 1, '2022-02-17 12:17:34', '2022-02-19 19:51:31'),
(49, 36, 'Car Loan', 'icons8-bank-building-100 (1)_1645080726.png', 1, 1, '2022-02-17 12:22:06', '2022-02-19 19:51:31'),
(51, 0, 'aa', 'cotton_1645083298.png', 0, 0, '2022-02-17 13:04:58', '2022-02-17 13:05:05'),
(52, 38, 'crocine 500', 'cotton_1645086217.png', 0, 0, '2022-02-17 13:14:06', '2022-02-17 14:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_name` varchar(45) NOT NULL,
  `active` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'mumbai central', 1, '2022-03-17 13:18:50', '2022-04-25 12:33:33'),
(2, 3, 'Indore', 1, '2022-04-04 19:19:11', '2022-04-25 12:20:38'),
(3, 3, 'Bhopal', 1, '2022-04-04 19:19:22', '2022-04-25 12:20:34'),
(4, 3, 'Sagar', 1, '2022-04-04 19:19:32', '2022-04-25 12:20:03'),
(5, 3, 'Tikamgarh', 1, '2022-04-04 19:19:54', '2022-04-25 12:19:54'),
(6, 12, 'ABCD', 1, '2022-04-08 13:57:03', '2022-04-08 13:57:03'),
(7, 12, 'ABC', 1, '2022-04-08 13:57:26', '2022-04-08 13:57:26'),
(8, 12, 'ABCDE', 1, '2022-04-08 13:57:44', '2022-04-08 13:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'india', 1, '2022-03-17 05:25:38', '2022-04-18 12:05:46'),
(2, 'america', 1, '2022-03-17 05:30:03', '2022-04-18 12:05:50'),
(3, 'England', 1, '2022-03-25 06:05:24', '2022-04-18 12:05:53'),
(5, 'UK', 0, '2022-04-04 13:07:54', '2022-04-18 12:05:30'),
(6, 'USA', 0, '2022-04-04 13:45:45', '2022-04-18 12:05:34'),
(7, 'Dabai', 0, '2022-04-04 13:46:26', '2022-04-18 12:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_data`
--

CREATE TABLE `dummy_data` (
  `id` int(11) NOT NULL,
  `name` varchar(199) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy_data`
--

INSERT INTO `dummy_data` (`id`, `name`, `status`, `create_at`, `update_at`) VALUES
(1, 'divyanshu', 1, '2022-01-13 00:00:00', '2022-01-13 00:00:00'),
(2, 'sgsfd', 1, '2022-01-13 00:00:00', '2022-01-13 00:00:00'),
(3, 'demo', 1, '2022-01-21 00:00:00', '2022-01-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_product`
--

CREATE TABLE `dummy_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(199) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '0',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy_product`
--

INSERT INTO `dummy_product` (`id`, `product_name`, `product_status`, `create_at`, `update_at`) VALUES
(1, 'Mobile', 1, '2022-01-13 00:00:00', '2022-01-13 00:00:00'),
(2, 'laptop', 1, '2022-01-13 00:00:00', '2022-01-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_wedding`
--

CREATE TABLE `dummy_wedding` (
  `id` int(11) NOT NULL,
  `name` varchar(199) NOT NULL,
  `wedding_type` varchar(199) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy_wedding`
--

INSERT INTO `dummy_wedding` (`id`, `name`, `wedding_type`, `status`, `create_at`, `update_at`) VALUES
(1, 'Divyanshu', 'Love marriage', 1, '2022-01-14 00:00:00', '2022-01-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `show_type` int(11) DEFAULT NULL,
  `extra_hours` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `girl_id` varchar(255) DEFAULT NULL,
  `party_date` varchar(255) DEFAULT NULL,
  `party_time` bigint(20) DEFAULT NULL,
  `party_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `venue_type` varchar(255) DEFAULT NULL,
  `venue_address` longtext,
  `venue_city` int(11) DEFAULT NULL,
  `venue_zipcode` int(11) DEFAULT NULL,
  `event_status` int(11) DEFAULT '0' COMMENT '0=pending,1=complete,2=rejected',
  `active` tinyint(2) DEFAULT '1' COMMENT '0=deleted',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `show_type`, `extra_hours`, `country_id`, `state_id`, `city_id`, `girl_id`, `party_date`, `party_time`, `party_type`, `name`, `phone`, `email`, `venue_type`, `venue_address`, `venue_city`, `venue_zipcode`, `event_status`, `active`, `created_at`, `updated_at`) VALUES
(4, 14, 3, 0, 1, 1, 1, '7,8', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-03-25 07:53:06', '2022-03-26 10:57:40'),
(6, 20, 1, 4, 1, 1, 1, '6', '2022-04-05', 5, 3, 'Chandresh Jain', '7582970904', 'jain01@mailinator.com', '2', 'vijay nagar', 3, 452001, 0, 1, '2022-04-05 08:42:14', '2022-04-13 05:30:58'),
(7, 20, 1, 4, 1, 1, 1, '6', '2022-04-05', 5, 3, 'Chandresh Jain', '7582970904', 'jain01@mailinator.com', '2', 'vijay nagar', 3, 452001, 0, 1, '2022-04-05 08:42:58', '2022-04-13 05:31:02'),
(11, 14, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'ucwdcdwcdc', '7861107861', 'mansuriumar134@gmail.com', '1', 'PARK', 1, 452001, 0, 1, '2022-04-21 18:03:56', '2022-04-21 18:03:56'),
(12, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:56:45', '2022-04-26 09:56:45'),
(13, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:58:08', '2022-04-26 09:58:08'),
(14, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:58:10', '2022-04-26 09:58:10'),
(15, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:58:49', '2022-04-26 09:58:49'),
(16, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:58:51', '2022-04-26 09:58:51'),
(17, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 09:58:55', '2022-04-26 09:58:55'),
(18, 50, 1, 1, 1, 1, 1, '6', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-26 10:09:37', '2022-04-26 10:59:17'),
(19, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 10:10:05', '2022-04-26 10:10:05'),
(20, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 10:10:07', '2022-04-26 10:10:07'),
(21, 50, 1, 1, 1, 1, 1, '6', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-26 10:22:59', '2022-04-26 10:59:22'),
(22, 50, 1, 1, 1, 1, 1, '6', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-26 10:24:10', '2022-04-26 10:59:26'),
(23, 50, 1, 1, 1, 1, 1, '6', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-26 10:27:22', '2022-04-26 10:59:29'),
(24, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 11:43:06', '2022-04-26 11:43:06'),
(25, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-26 11:43:09', '2022-04-26 11:43:09'),
(27, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-27 04:13:50', '2022-04-27 04:13:50'),
(29, 92, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-27 11:52:55', '2022-04-27 11:52:55'),
(30, 92, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-27 11:57:35', '2022-04-27 11:57:35'),
(31, 50, 3, 0, 1, 1, 1, '7', '2022-03-31', 2, 1, 'aliakbar', '7861107861', 'aliakbar@mailinator.com', '1', 'itpark indore', 1, 452001, 0, 1, '2022-04-28 03:51:47', '2022-04-28 03:51:47'),
(37, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-29 13:36:16', '2022-04-29 13:36:16'),
(38, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-30 12:13:03', '2022-04-30 12:13:03'),
(39, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-30 12:13:27', '2022-04-30 12:13:27'),
(40, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-30 12:26:15', '2022-04-30 12:26:15'),
(41, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-04-30 12:28:52', '2022-04-30 12:28:52'),
(49, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-05-04 07:03:02', '2022-05-04 07:03:02'),
(50, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-05-04 08:32:14', '2022-05-04 08:32:14'),
(51, 61, 1, 1, 1, 1, 1, '1', '12/12/1222', 1, 1, 'UMAR', '8770555583', 'MANSURIUMAR89@GMAIL.COM', 'jkbh', 'jbkbbk', 0, 12345678, 0, 1, '2022-05-04 09:51:08', '2022-05-04 09:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text,
  `answer` longtext,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `active`, `created_at`, `updated_at`) VALUES
(1, 'what is going on?', 'nothing office work.', 1, '2022-03-17 12:01:10', '2022-03-23 11:56:34'),
(2, 'ABCD', 'ABCD', 1, '2022-04-04 12:03:52', '2022-04-08 05:41:35'),
(3, 'Testing01', 'Lorem Testing: 1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 0, '2022-04-05 06:42:23', '2022-04-18 13:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_video` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `image_video`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, '1647523475imgpsh_fullsize_anim(1).png', 1, '2022-03-17 13:24:35', '2022-03-17 13:24:35'),
(2, 6, '1647523475imgpsh_fullsize_anim.png', 1, '2022-03-17 13:24:35', '2022-03-17 13:24:35'),
(3, 7, '1648038261imgpsh_fullsize_anim(1).png', 1, '2022-03-23 12:24:21', '2022-03-23 12:24:21'),
(4, 7, '1648038261imgpsh_fullsize_anim.png', 1, '2022-03-23 12:24:21', '2022-03-23 12:24:21'),
(5, 8, '1648278011imgpsh_fullsize_anim.png', 1, '2022-03-26 07:00:11', '2022-03-26 07:00:11'),
(6, 8, '1648296158img1.jpg', 1, '2022-03-26 12:02:38', '2022-03-26 12:02:38'),
(7, 7, '1648296192img3.jpg', 1, '2022-03-26 12:03:12', '2022-03-26 12:03:12'),
(8, 6, '1648296206img6.jpg', 1, '2022-03-26 12:03:26', '2022-03-26 12:03:26'),
(9, 8, '1648301004img1.jpg', 1, '2022-03-26 13:23:24', '2022-03-26 13:23:24'),
(10, 7, '1648301014img2.jpg', 1, '2022-03-26 13:23:34', '2022-03-26 13:23:34'),
(11, 6, '1648301023img3.jpg', 1, '2022-03-26 13:23:43', '2022-03-26 13:23:43'),
(12, 9, '1648301084img4.jpg', 1, '2022-03-26 13:24:44', '2022-03-26 13:24:44'),
(13, 10, '1648301106img5.jpg', 1, '2022-03-26 13:25:06', '2022-03-26 13:25:06'),
(14, 11, '1648301132img6.jpg', 1, '2022-03-26 13:25:32', '2022-03-26 13:25:32'),
(15, 12, '1649064785download.jpg', 1, '2022-04-04 09:33:05', '2022-04-04 09:33:05'),
(16, 13, '1649064893download(1).jpg', 1, '2022-04-04 09:34:53', '2022-04-04 09:34:53'),
(17, 14, '1649064937download(2).jpg', 1, '2022-04-04 09:35:37', '2022-04-04 09:35:37'),
(18, 15, '1649064969download(4).jpg', 1, '2022-04-04 09:36:09', '2022-04-04 09:36:09'),
(19, 16, '1649065044download(5).jpg', 1, '2022-04-04 09:37:24', '2022-04-04 09:37:24'),
(20, 15, '1649066725download(5).jpg', 1, '2022-04-04 10:05:25', '2022-04-04 10:05:25'),
(21, 17, '16491356512022-04-01-1648821053.xlsx', 1, '2022-04-05 05:14:11', '2022-04-05 05:14:11'),
(22, 18, '16491357882022-04-02-1649050689.xlsx', 1, '2022-04-05 05:16:28', '2022-04-05 05:16:28'),
(23, 19, '1649406562download(6).jpg', 1, '2022-04-08 08:29:22', '2022-04-08 08:29:22'),
(24, 20, '1650886054img9.jpg', 1, '2022-04-25 11:27:34', '2022-04-25 11:27:34'),
(25, 20, '1650886054img8.jpg', 1, '2022-04-25 11:27:34', '2022-04-25 11:27:34'),
(26, 20, '1650886055img7.jpg', 1, '2022-04-25 11:27:35', '2022-04-25 11:27:35'),
(27, 21, '1650979665Screenshotfrom2021-10-1811-18-41.png', 1, '2022-04-26 13:27:45', '2022-04-26 13:27:45'),
(28, 9, '1650979834Screenshotfrom2021-10-2709-17-12.png', 1, '2022-04-26 13:30:34', '2022-04-26 13:30:34'),
(29, 22, '1651742190img9.jpg', 1, '2022-05-05 09:16:30', '2022-05-05 09:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `photo_video` text NOT NULL,
  `url` longtext,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `listing_id`, `image_type`, `photo_video`, `url`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(13, 0, 0, 'Video', 'logo_(1)_1642579373.png', 'https://youtu.be/JEgKJZEYsIU', NULL, NULL, 1, '2022-01-19 08:02:53', '2022-01-19 08:02:53'),
(21, 0, 0, 'Video', 'cotton_1645176478.png', 'https://youtu.be/JEgKJZEYsIU', NULL, NULL, 1, '2022-02-18 14:57:58', '2022-02-18 14:57:58'),
(23, 0, 0, 'Video', 'icons8-youtube-144_1645254800.png', 'https://www.youtube.com/watch?v=s5KkGxlXo0s', NULL, NULL, 1, '2022-02-19 12:43:20', '2022-02-19 12:43:20'),
(35, 0, 0, 'Video', 'icons8-youtube-144_1645286655.png', 'https://www.youtube.com/', NULL, NULL, 1, '2022-02-19 21:34:15', '2022-02-19 21:34:15'),
(48, 0, 0, 'Photo', 'india_1647241507.png', NULL, 'Indian flag', 'a horizontal rectangular tricolour of India saffron, white and India green; with the Ashoka Chakra, a 24-spoke wheel, in navy blue at its centre.', 1, '2022-03-14 12:35:07', '2022-03-14 12:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `girls`
--

CREATE TABLE `girls` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `image` longtext,
  `rated` int(11) DEFAULT '0' COMMENT '1= top rated',
  `mon` int(11) NOT NULL DEFAULT '0',
  `tue` int(11) NOT NULL DEFAULT '0',
  `wed` int(11) NOT NULL DEFAULT '0',
  `thu` int(11) NOT NULL DEFAULT '0',
  `fri` int(11) NOT NULL DEFAULT '0',
  `sat` int(11) NOT NULL DEFAULT '0',
  `sun` int(11) NOT NULL DEFAULT '0',
  `active` int(11) DEFAULT '1',
  `trash` int(11) NOT NULL DEFAULT '0' COMMENT '1=trash',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `girls`
--

INSERT INTO `girls` (`id`, `full_name`, `country_id`, `state_id`, `city_id`, `image`, `rated`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `active`, `trash`, `created_at`, `updated_at`) VALUES
(6, 'Isla', 1, 1, 1, '1648301023img3.jpg', 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, '2022-03-17 13:24:35', '2022-04-18 11:49:59'),
(7, 'Olivia', 1, 1, 1, '1648301014img2.jpg', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-23 12:24:21', '2022-04-18 11:50:59'),
(8, 'Amelia', 1, 1, 1, '1648301004img1.jpg', 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, '2022-03-26 07:00:11', '2022-04-18 12:10:46'),
(9, 'Emily', 1, 1, 1, '1650979834Screenshotfrom2021-10-2709-17-12.png', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-03-26 13:24:43', '2022-05-06 05:45:03'),
(10, 'Isabella', 1, 1, 1, '1648301106img5.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-03-26 13:25:06', '2022-03-26 13:25:06'),
(11, 'Jessica', 1, 1, 1, '1648301132img6.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-03-26 13:25:32', '2022-04-04 09:28:01'),
(12, 'Charlotte', 1, 1, 1, '1649064785download.jpg', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-04-04 09:33:04', '2022-04-18 12:51:18'),
(13, 'Isabella Mia', 1, 1, 1, '1649064893download(1).jpg', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-04-04 09:34:53', '2022-04-18 12:51:20'),
(14, 'Evelyn', 1, 1, 1, '1649064937download(2).jpg', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-04-04 09:35:37', '2022-04-18 12:51:08'),
(15, 'Luna', 1, 1, 1, '1649066725download(5).jpg', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-04-04 09:36:09', '2022-04-18 12:51:07'),
(16, 'Mila Scarlett', 1, 1, 1, '1649065044download(5).jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-04-04 09:37:24', '2022-04-04 09:38:17'),
(17, 'Jain Chandresh', 1, 3, 2, '16491356512022-04-01-1648821053.xlsx', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-04-05 05:14:10', '2022-04-05 05:14:21'),
(18, 'ABCD', 1, 3, 2, '16491357882022-04-02-1649050689.xlsx', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-04-05 05:16:28', '2022-04-05 05:25:56'),
(19, 'Miya Johri', 5, 12, 6, '1649406562download(6).jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-04-08 08:29:22', '2022-04-18 11:49:54'),
(20, 'mia', 1, 1, 1, '1650886054img9.jpg,1650886054img8.jpg,1650886055img7.jpg', 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, '2022-04-25 11:27:34', '2022-04-29 13:32:30'),
(21, 'j............', 1, 1, 1, '1650979665Screenshotfrom2021-10-1811-18-41.png', 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, '2022-04-26 13:27:45', '2022-04-30 10:39:13'),
(22, 'lissa', 1, 1, 1, '1651742190img9.jpg', 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, '2022-05-05 09:16:30', '2022-05-05 09:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `time`, `active`, `created_at`, `updated_at`) VALUES
(1, '16:00', 1, '2022-03-17 10:31:31', '2022-04-04 12:38:45'),
(2, '17:00', 1, '2022-03-17 10:31:56', '2022-04-04 12:38:41'),
(5, '18:00', 1, '2022-04-04 12:39:15', '2022-04-30 12:03:21'),
(6, '01:00', 1, '2022-04-05 06:49:12', '2022-04-30 12:03:25'),
(7, '12:00', 0, '2022-04-05 06:52:35', '2022-04-18 12:25:21'),
(8, '00:56', 0, '2022-04-08 12:12:36', '2022-04-18 12:25:15');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_06_010033_create_permission_tables', 1),
(4, '2020_02_06_022212_create_restorants_table', 1),
(5, '2020_02_09_015116_create_status_table', 1),
(6, '2020_02_09_152551_create_categories_table', 1),
(7, '2020_02_09_152656_create_items_table', 1),
(8, '2020_02_11_052117_create_address_table', 1),
(10, '2020_02_20_094727_create_settings_table', 1),
(11, '2020_03_25_134914_create_pages_table', 1),
(12, '2020_04_03_143518_update_settings_table', 1),
(13, '2020_04_10_202027_create_payments_table', 1),
(14, '2020_04_11_165819_update_table_orders', 1),
(15, '2020_04_22_105556_update_items_table', 1),
(16, '2020_04_23_212320_update_restorants_table', 1),
(17, '2020_04_23_212502_update_orders_table', 1),
(18, '2020_04_28_112519_update_address_table', 1),
(19, '2020_05_07_122727_create_hours_table', 1),
(20, '2020_05_09_012646_update_orders_add_delivery_table', 1),
(27, '2020_02_11_054259_create_orders_table', 2),
(28, '2022_03_24_165642_bank_details', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification_status`
--

CREATE TABLE `notification_status` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '1=unread,0=read',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_darshan`
--

CREATE TABLE `online_darshan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` longtext,
  `description` text,
  `status` int(11) DEFAULT '1',
  `trash` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_darshan`
--

INSERT INTO `online_darshan` (`id`, `title`, `image`, `url`, `description`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'darshan', 'assdas', 'http://shyaam_trust.manageprojects.in/users/2', '13213121321321321', 0, 0, '2022-01-11 05:47:12', '2022-03-14 07:03:36'),
(2, 'darshan', 'uploads/darshan/3_1641895107.jpg', 'http://shyaam_trust.manageprojects.in/users/1', '13213121321321321', 1, 0, '2022-01-11 05:47:12', '2022-03-14 07:03:39'),
(3, 'online', 'uploads/darshan/3_1641895096.jpg', 'http://shyaam_trust.manageprojects.in/darshan/create', '13213121321321321', 1, 0, '2022-01-11 07:46:07', '2022-03-14 07:03:41'),
(4, 'classes', 'uploads/darshan/1_1641895116.jpg', 'http://shyaam_trust.manageprojects.in/darshan/create', '13213121321321321', 1, 0, '2022-01-11 07:50:49', '2022-03-14 07:03:43'),
(5, 'maths class', 'uploads/darshan/1_1641887770.jpg', 'http://shyaam_trust.manageprojects.in/darshan/create', '13213121321321321', 1, 0, '2022-01-11 07:56:10', '2022-03-14 07:03:45'),
(6, 'LIVE', 'uploads/darshan/6785ed59293366d5d34ac3c775e735d9_1642150907.jpg', 'http://shyaam_trust.manageprojects.in/darshan/create', '13213121321321321', 1, 0, '2022-01-14 09:01:47', '2022-03-14 07:03:24'),
(7, 'Mahakaal Darshan', 'uploads/darshan/mahakal_temple-sixteen_nine_1645179279.jpg', 'https://www.youtube.com/watch?v=jlmFgwU7RkY', '13213121321321321', 1, 1, '2022-02-18 15:44:39', '2022-03-14 07:03:16'),
(8, 'testing', 'uploads/darshan/1_1646995243.jpg', 'https://youtu.be/RFx4g4GunYw', 'a horizontal rectangular tricolour of India saffron, white and India green; with the Ashoka Chakra, a 24-spoke wheel, in navy blue at its centre.', 1, 1, '2022-03-11 16:10:43', '2022-03-14 12:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `event_id`, `card_id`, `transaction_id`, `transaction_status`, `amount`, `active`, `created_at`, `updated_at`) VALUES
(3, 14, 4, 7, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-03-25 07:53:06', '2022-03-25 07:53:06'),
(4, 20, 6, 5, '111111111111', 'true', '10000', 1, '2022-04-05 08:42:14', '2022-04-05 08:42:14'),
(5, 20, 7, 5, '111111111111', 'true', '10000', 1, '2022-04-05 08:42:58', '2022-04-05 08:42:58'),
(6, 20, 8, 5, '111', 'true', '1', 1, '2022-04-05 08:50:28', '2022-04-05 08:50:28'),
(7, 20, 9, 5, '111111111111111111111111111', 'true', '100000', 1, '2022-04-05 08:51:26', '2022-04-05 08:51:26'),
(8, 20, 10, 5, '1111111111111111', 'true', '10000', 1, '2022-04-05 08:52:00', '2022-04-05 08:52:00'),
(9, 14, 11, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-21 18:03:56', '2022-04-21 18:03:56'),
(10, 50, 12, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:56:45', '2022-04-26 09:56:45'),
(11, 50, 13, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:58:09', '2022-04-26 09:58:09'),
(12, 50, 14, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:58:11', '2022-04-26 09:58:11'),
(13, 50, 15, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:58:49', '2022-04-26 09:58:49'),
(14, 50, 16, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:58:51', '2022-04-26 09:58:51'),
(15, 50, 17, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 09:58:55', '2022-04-26 09:58:55'),
(16, 50, 18, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-26 10:09:37', '2022-04-26 10:09:37'),
(17, 50, 19, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 10:10:05', '2022-04-26 10:10:05'),
(18, 50, 20, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 10:10:07', '2022-04-26 10:10:07'),
(19, 50, 21, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-26 10:22:59', '2022-04-26 10:22:59'),
(20, 50, 22, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-26 10:24:11', '2022-04-26 10:24:11'),
(21, 50, 23, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-26 10:27:22', '2022-04-26 10:27:22'),
(22, 50, 24, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 11:43:06', '2022-04-26 11:43:06'),
(23, 50, 25, 7, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-26 11:43:09', '2022-04-26 11:43:09'),
(24, 50, 26, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-26 16:48:06', '2022-04-26 16:48:06'),
(25, 50, 27, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-27 04:13:50', '2022-04-27 04:13:50'),
(26, 50, 28, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-27 06:04:35', '2022-04-27 06:04:35'),
(27, 92, 29, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-27 11:52:55', '2022-04-27 11:52:55'),
(28, 92, 30, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-27 11:57:35', '2022-04-27 11:57:35'),
(29, 50, 31, 1, 'sdasdasasd1231321asd46556456', 'true', '1000', 1, '2022-04-28 03:51:47', '2022-04-28 03:51:47'),
(30, 50, 32, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-28 04:53:54', '2022-04-28 04:53:54'),
(31, 50, 33, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-28 04:54:04', '2022-04-28 04:54:04'),
(32, 50, 34, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-28 05:08:22', '2022-04-28 05:08:22'),
(33, 50, 35, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-28 07:55:12', '2022-04-28 07:55:12'),
(34, 50, 36, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-28 07:55:22', '2022-04-28 07:55:22'),
(35, 61, 37, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-29 13:36:16', '2022-04-29 13:36:16'),
(36, 61, 38, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-30 12:13:03', '2022-04-30 12:13:03'),
(37, 61, 39, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-30 12:13:27', '2022-04-30 12:13:27'),
(38, 61, 40, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-30 12:26:15', '2022-04-30 12:26:15'),
(39, 61, 41, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-30 12:28:52', '2022-04-30 12:28:52'),
(40, 50, 42, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-04-30 19:38:14', '2022-04-30 19:38:14'),
(41, 50, 43, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 09:42:21', '2022-05-01 09:42:21'),
(42, 50, 44, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 09:55:56', '2022-05-01 09:55:56'),
(43, 50, 45, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 10:40:39', '2022-05-01 10:40:39'),
(44, 50, 46, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 10:57:22', '2022-05-01 10:57:22'),
(45, 50, 47, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 10:57:23', '2022-05-01 10:57:23'),
(46, 50, 48, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-01 18:16:39', '2022-05-01 18:16:39'),
(47, 61, 49, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-04 07:03:02', '2022-05-04 07:03:02'),
(48, 61, 50, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-04 08:32:14', '2022-05-04 08:32:14'),
(49, 61, 51, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-04 09:51:08', '2022-05-04 09:51:08'),
(50, 50, 52, 0, 'hvggcgc', 'dgcgh', '1110', 1, '2022-05-05 19:55:13', '2022-05-05 19:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_has_status`
--

CREATE TABLE `order_has_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=pending,1=accept,2=reject,3=complete',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_has_status`
--

INSERT INTO `order_has_status` (`id`, `user_id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 14, 3, 0, '2022-03-25 07:53:06', '2022-03-25 07:53:06'),
(4, 20, 4, 0, '2022-04-05 08:42:14', '2022-04-05 08:42:14'),
(5, 20, 5, 0, '2022-04-05 08:42:58', '2022-04-05 08:42:58'),
(6, 20, 6, 0, '2022-04-05 08:50:28', '2022-04-05 08:50:28'),
(7, 20, 7, 0, '2022-04-05 08:51:26', '2022-04-05 08:51:26'),
(8, 20, 8, 0, '2022-04-05 08:52:00', '2022-04-05 08:52:00'),
(9, 14, 9, 0, '2022-04-21 18:03:56', '2022-04-21 18:03:56'),
(10, 50, 10, 0, '2022-04-26 09:56:45', '2022-04-26 09:56:45'),
(11, 50, 11, 0, '2022-04-26 09:58:09', '2022-04-26 09:58:09'),
(12, 50, 12, 0, '2022-04-26 09:58:11', '2022-04-26 09:58:11'),
(13, 50, 13, 0, '2022-04-26 09:58:49', '2022-04-26 09:58:49'),
(14, 50, 14, 0, '2022-04-26 09:58:51', '2022-04-26 09:58:51'),
(15, 50, 15, 0, '2022-04-26 09:58:55', '2022-04-26 09:58:55'),
(16, 50, 16, 0, '2022-04-26 10:09:37', '2022-04-26 10:09:37'),
(17, 50, 17, 0, '2022-04-26 10:10:05', '2022-04-26 10:10:05'),
(18, 50, 18, 0, '2022-04-26 10:10:07', '2022-04-26 10:10:07'),
(19, 50, 19, 0, '2022-04-26 10:22:59', '2022-04-26 10:22:59'),
(20, 50, 20, 0, '2022-04-26 10:24:12', '2022-04-26 10:24:12'),
(21, 50, 21, 0, '2022-04-26 10:27:23', '2022-04-26 10:27:23'),
(22, 50, 22, 0, '2022-04-26 11:43:07', '2022-04-26 11:43:07'),
(23, 50, 23, 0, '2022-04-26 11:43:09', '2022-04-26 11:43:09'),
(24, 50, 24, 0, '2022-04-26 16:48:06', '2022-04-26 16:48:06'),
(25, 50, 25, 0, '2022-04-27 04:13:50', '2022-04-27 04:13:50'),
(26, 50, 26, 0, '2022-04-27 06:04:35', '2022-04-27 06:04:35'),
(27, 92, 27, 0, '2022-04-27 11:52:55', '2022-04-27 11:52:55'),
(28, 92, 28, 0, '2022-04-27 11:57:35', '2022-04-27 11:57:35'),
(29, 50, 29, 0, '2022-04-28 03:51:47', '2022-04-28 03:51:47'),
(30, 50, 30, 0, '2022-04-28 04:53:54', '2022-04-28 04:53:54'),
(31, 50, 31, 0, '2022-04-28 04:54:04', '2022-04-28 04:54:04'),
(32, 50, 32, 0, '2022-04-28 05:08:22', '2022-04-28 05:08:22'),
(33, 50, 33, 0, '2022-04-28 07:55:12', '2022-04-28 07:55:12'),
(34, 50, 34, 0, '2022-04-28 07:55:22', '2022-04-28 07:55:22'),
(35, 61, 35, 0, '2022-04-29 13:36:16', '2022-04-29 13:36:16'),
(36, 61, 36, 0, '2022-04-30 12:13:03', '2022-04-30 12:13:03'),
(37, 61, 37, 0, '2022-04-30 12:13:27', '2022-04-30 12:13:27'),
(38, 61, 38, 0, '2022-04-30 12:26:15', '2022-04-30 12:26:15'),
(39, 61, 39, 0, '2022-04-30 12:28:52', '2022-04-30 12:28:52'),
(40, 50, 40, 0, '2022-04-30 19:38:14', '2022-04-30 19:38:14'),
(41, 50, 41, 0, '2022-05-01 09:42:21', '2022-05-01 09:42:21'),
(42, 50, 42, 0, '2022-05-01 09:55:56', '2022-05-01 09:55:56'),
(43, 50, 43, 0, '2022-05-01 10:40:39', '2022-05-01 10:40:39'),
(44, 50, 44, 0, '2022-05-01 10:57:22', '2022-05-01 10:57:22'),
(45, 50, 45, 0, '2022-05-01 10:57:24', '2022-05-01 10:57:24'),
(46, 50, 46, 0, '2022-05-01 18:16:39', '2022-05-01 18:16:39'),
(47, 61, 47, 0, '2022-05-04 07:03:02', '2022-05-04 07:03:02'),
(48, 61, 48, 0, '2022-05-04 08:32:14', '2022-05-04 08:32:14'),
(49, 61, 49, 0, '2022-05-04 09:51:08', '2022-05-04 09:51:08'),
(50, 50, 50, 0, '2022-05-05 19:55:13', '2022-05-05 19:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `userid`, `package_id`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 79, 5, '', 1, '2022-02-24 15:49:41', '2022-02-24 15:49:41'),
(10, 50, 4, '', 1, '2022-02-28 11:38:03', '2022-02-28 11:38:03'),
(11, 34, 4, '', 1, '2022-03-01 14:02:39', '2022-03-01 14:02:39'),
(12, 34, 11, '', 1, '2022-03-14 16:17:00', '2022-03-14 16:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `package_title` varchar(255) DEFAULT NULL,
  `package_description` longtext,
  `package_entertainer` int(11) DEFAULT NULL,
  `package_price` int(255) DEFAULT NULL,
  `package_hours` varchar(255) DEFAULT NULL,
  `extra_hour_price` int(11) DEFAULT NULL,
  `package_color` varchar(255) DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package_title`, `package_description`, `package_entertainer`, `package_price`, `package_hours`, `extra_hour_price`, `package_color`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain', 15, 2000, '4', 100, '#b0b0b0', 1, '2022-03-17 15:22:20', '2022-04-15 19:03:02'),
(2, 'Gold', 'Lorem Ipsum There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain Lorem Ipsum', 6, 3000, '3', 150, '#ce83bd', 1, '2022-03-17 15:41:32', '2022-04-15 19:03:09'),
(3, 'Platinum', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain', 10, 1000, '4', 450, '#dfb626', 1, '2022-03-24 16:10:00', '2022-04-18 17:38:44'),
(6, 'Testing', 'Lorem Ipsum', 1, 180, '2', 250, '#ffffff', 1, '2022-04-18 17:39:21', '2022-04-30 17:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showAsLink` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `title`, `content`, `showAsLink`) VALUES
(1, '2021-09-01 00:58:52', '2022-04-22 16:40:48', 'Terms and conditions', '<p>TERMS OF SERVICE</p>\r\n\r\n<p>----</p>\r\n\r\n<p>OVERVIEW<br />\r\n&nbsp;</p>\r\n\r\n<p>This software is operated by Eye Kandy Inc.,. Throughout the site, the terms &ldquo;we&rdquo;, &ldquo;us&rdquo; and &ldquo;our&rdquo; refer to Eye Kandy Inc.,. Eye Kandy Inc., offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>By visiting our site and/ or purchasing something from us, you engage in our &ldquo;Service&rdquo; and agree to be bound by the following terms and conditions (&ldquo;Terms of Service&rdquo;, &ldquo;Terms&rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply&nbsp; to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>\r\n\r\n<p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>\r\n\r\n<p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SECTION 1 - ONLINE STORE TERMS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You must not transmit any worms or viruses or any code of a destructive nature.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>\r\n\r\n<p>SECTION 2 - GENERAL CONDITIONS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right to refuse service to anyone for any reason at any time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>\r\n\r\n<p>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>\r\n\r\n<p>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Prices for our products are subject to change without notice.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>\r\n\r\n<p>SECTION 5 - PRODUCTS OR SERVICES (if applicable)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor&#39;s display of any color will be accurate.</p>\r\n\r\n<p>We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>\r\n\r\n<p>SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p>\r\n\r\n<p>You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For more detail, please review our Returns Policy.</p>\r\n\r\n<p>SECTION 7 - OPTIONAL TOOLS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You acknowledge and agree that we provide access to such tools &rdquo;as is&rdquo; and &ldquo;as available&rdquo; without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>\r\n\r\n<p>SECTION 8 - THIRD-PARTY LINKS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Certain content, products and services available via our Service may include materials from third-parties.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party&#39;s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>\r\n\r\n<p>SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, &#39;comments&#39;), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.</p>\r\n\r\n<p>We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party&rsquo;s intellectual property or these Terms of Service.</p>\r\n\r\n<p>You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SECTION 10 - PERSONAL INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy.</p>\r\n\r\n<p>SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>\r\n\r\n<p>SECTION 12 - PROHIBITED USES</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content:</p>\r\n\r\n<p>(a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information;</p>\r\n\r\n<p>(g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>\r\n\r\n<p>SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.</p>\r\n\r\n<p>You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided &#39;as is&#39; and &#39;as available&#39; for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.</p>\r\n\r\n<p>In no case shall Eye Kandy Inc.,, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility.</p>\r\n\r\n<p>Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SECTION 14 - INDEMNIFICATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You agree to indemnify, defend and hold harmless Eye Kandy Inc., and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys&rsquo; fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>\r\n\r\n<p>SECTION 15 - SEVERABILITY</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SECTION 16 - TERMINATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.</p>\r\n\r\n<p>If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SECTION 17 - ENTIRE AGREEMENT</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).</p>\r\n\r\n<p>Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>SECTION 18 - GOVERNING LAW</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of Philadelphia, PA, United States.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>SECTION 19 - CHANGES TO TERMS OF SERVICE</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can review the most current version of the Terms of Service at any time at this page.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>SECTION 20 - CONTACT INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Questions about the Terms of Service should be sent to us at support@eyekandy.app.</p>\r\n\r\n<p>&nbsp;</p>', 1),
(2, '2021-09-01 00:58:53', '2021-09-01 00:58:53', 'How it works', '<p>foodtiger is simple and easy way to order food online. Enjoy the variety of choices and cuisines which could be delivered to your home or office.</p>\n\n                        <p>&nbsp;</p>\n\n                        <p><strong>Here is how foodtiger works:</strong><br />\n                        &nbsp;</p>\n\n                        <p>&nbsp;</p>\n\n                        <p><strong>Find a restaurant:</strong></p>\n\n                        <p>Enter you address or choose from the map on the front page to set your location. Take a review on the restaurants which deliver to your address. Choose a restaurant and dive in its tasty menu.</p>\n\n                        <p>&nbsp;</p>\n\n                        <p><strong>Choose a dish:</strong></p>\n\n                        <p>Choose from the displayed dishes. If there is an option to add products or sauce, for pizza for example, you will be asked for your choice right after you click on the dish. Your order will be dispayed on the right side of the page.</p>\n\n                        <p>&nbsp;</p>\n\n                        <p><strong>Finish your order and choose type of payment:</strong></p>\n\n                        <p>When you complete the order with delicious food, click &quot;Buy&quot;. Now you only have to write your address and choose type of payment as you follow the instructions on the page.</p>\n\n                        <p>&nbsp;</p>\n\n                        <p><strong>Delivery:</strong></p>\n\n                        <p>You will receive SMS as confirmation for your order and information about the delivery time and.....</p>\n\n                        <p>That&#39;s all!</p>\n\n                        <p>&nbsp;</p>', 1),
(3, '2021-09-01 00:58:53', '2022-03-17 07:57:01', 'FAQ', '<p>Faq</p>', 1),
(4, '2021-11-08 18:30:00', '2022-04-22 14:25:52', 'About Us', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>', 1),
(13, '2022-01-12 10:34:10', '2022-04-04 13:24:22', 'Contact Support', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 0),
(15, '2022-01-12 10:49:17', '2022-04-22 16:39:53', 'Privacy Policy', '<p>PRIVACY POLICY&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Eye Kandy Inc., Privacy Policy</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from www.eyekandy.app (the &ldquo;APP&rdquo;).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PERSONAL INFORMATION WE COLLECT</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as &ldquo;Device Information.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect Device Information using the following technologies:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;- &ldquo;Cookies&rdquo; are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit http://www.allaboutcookies.org.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;- &ldquo;Log files&rdquo; track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;- &ldquo;Web beacons,&rdquo; &ldquo;tags,&rdquo; and &ldquo;pixels&rdquo; are electronic files used to record information about how you browse the Site.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;[[INSERT DESCRIPTIONS OF OTHER TYPES OF TRACKING TECHNOLOGIES USED]]</p>\r\n\r\n<p>Additionally when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers [[INSERT ANY OTHER PAYMENT TYPES ACCEPTED]]), email address, and phone number.&nbsp; We refer to this information as &ldquo;Order Information.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[INSERT ANY OTHER INFORMATION YOU COLLECT:&nbsp; OFFLINE DATA, PURCHASED MARKETING DATA/LISTS]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>When we talk about &ldquo;Personal Information&rdquo; in this Privacy Policy, we are talking both about Device Information and Order Information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>HOW DO WE USE YOUR PERSONAL INFORMATION?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations).&nbsp; Additionally, we use this Order Information to:</p>\r\n\r\n<p>Communicate with you;</p>\r\n\r\n<p>Screen our orders for potential risk or fraud; and</p>\r\n\r\n<p>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</p>\r\n\r\n<p>[[INSERT OTHER USES OF ORDER INFORMATION]]</p>\r\n\r\n<p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).</p>\r\n\r\n<p>[[INSERT OTHER USES OF DEVICE INFORMATION, INCLUDING:&nbsp; ADVERTISING/RETARGETING]]</p>\r\n\r\n<p>SHARING YOUR PERSONAL INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We share your Personal Information with third parties to help us use your Personal Information, as described above.&nbsp; For example, we use Shopify to power our online store--you can read more about how Shopify uses your Personal Information here:&nbsp; https://www.shopify.com/legal/privacy.&nbsp; We also use Google Analytics to help us understand how our customers use the Site--you can read more about how Google uses your Personal Information here:&nbsp; https://www.google.com/intl/en/policies/privacy/.&nbsp; You can also opt-out of Google Analytics here:&nbsp; https://tools.google.com/dlpage/gaoptout.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise protect our rights.</p>\r\n\r\n<p>[[INCLUDE IF USING REMARKETING OR TARGETED ADVERTISING]]</p>\r\n\r\n<p>BEHAVIOURAL ADVERTISING</p>\r\n\r\n<p>As described above, we use your Personal Information to provide you with targeted advertisements or marketing communications we believe may be of interest to you.&nbsp; For more information about how targeted advertising works, you can visit the Network Advertising Initiative&rsquo;s (&ldquo;NAI&rdquo;) educational page at http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can opt out of targeted advertising by:</p>\r\n\r\n<p>[[</p>\r\n\r\n<p>&nbsp;&nbsp;INCLUDE OPT-OUT LINKS FROM WHICHEVER SERVICES BEING USED.</p>\r\n\r\n<p>&nbsp;&nbsp;COMMON LINKS INCLUDE:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;FACEBOOK - https://www.facebook.com/settings/?tab=ads</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;GOOGLE - https://www.google.com/settings/ads/anonymous</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;BING - https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads</p>\r\n\r\n<p>]]</p>\r\n\r\n<p>Additionally, you can opt out of some of these services by visiting the Digital Advertising Alliance&rsquo;s opt-out portal at:&nbsp; http://optout.aboutads.info/.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DO NOT TRACK</p>\r\n\r\n<p>Please note that we do not alter our Site&rsquo;s data collection and use practices when we see a Do Not Track signal from your browser.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[INCLUDE IF LOCATED IN OR IF STORE HAS CUSTOMERS IN EUROPE]]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>YOUR RIGHTS</p>\r\n\r\n<p>If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through the contact information below.</p>\r\n\r\n<p>Additionally, if you are a European resident we note that we are processing your information in order to fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above.&nbsp; Additionally, please note that your information will be transferred outside of Europe, including to Canada and the United States.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>DATA RETENTION</p>\r\n\r\n<p>When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[[INSERT IF AGE RESTRICTION IS REQUIRED]]</p>\r\n\r\n<p>MINORS</p>\r\n\r\n<p>The Site is not intended for individuals under the age of [[INSERT AGE]].</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CHANGES</p>\r\n\r\n<p>We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.</p>\r\n\r\n<p>CONTACT US</p>\r\n\r\n<p>For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at support@eyekandy.app or by mail using the details provided below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;Philadelphia, PA, United States</p>\r\n\r\n<p>&nbsp;</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `party_type`
--

CREATE TABLE `party_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party_type`
--

INSERT INTO `party_type` (`id`, `type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bachlor\'s party', 1, '2022-03-17 11:17:01', '2022-03-24 11:16:35'),
(2, 'Divoce Party', 1, '2022-03-17 11:22:26', '2022-04-04 12:47:05'),
(3, 'Family Party', 1, '2022-04-04 12:46:21', '2022-04-04 12:46:33'),
(4, 'Office', 0, '2022-04-04 12:46:45', '2022-04-15 13:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage restorants', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(2, 'manage drivers', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(3, 'manage orders', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(4, 'edit settings', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(5, 'view orders', 'web', '2021-09-01 00:58:52', '2021-09-01 00:58:52'),
(6, 'edit restorant', 'web', '2021-09-01 00:58:52', '2021-09-01 00:58:52'),
(7, 'edit orders', 'web', '2021-09-01 00:58:52', '2021-09-01 00:58:52'),
(8, 'access backedn', 'web', '2021-09-01 00:58:52', '2021-09-01 00:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `listing_id` int(191) NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rating` tinyint(2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `review_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `listing_id`, `review`, `rating`, `status`, `review_date`) VALUES
(3, 2, 1, 'great', 5, 1, '2022-01-19 06:47:02'),
(4, 34, 1, 'Review add.gdgdgd', 3, 1, '2022-02-11 18:40:11'),
(5, 34, 6, 'Hfhfydd', 5, 1, '2022-02-11 19:04:50'),
(6, 51, 1, 'good', 5, 1, '2022-02-11 21:58:04'),
(7, 51, 8, 'wdtgu', 5, 1, '2022-02-18 10:59:42'),
(8, 51, 26, 'Good Job', 5, 1, '2022-03-09 00:00:17'),
(9, 51, 9, 'Thanks', 5, 1, '2022-03-09 00:08:34'),
(10, 16, 23, 'Add review', 4, 1, '2022-03-09 17:23:21'),
(11, 34, 23, 'Added', 5, 1, '2022-03-09 17:34:42'),
(12, 34, 33, 'Ali', 1, 1, '2022-03-11 08:04:49'),
(13, 34, 63, 'Rate', 3, 1, '2022-03-15 16:34:39'),
(14, 34, 64, 'Rating by ali', 1, 1, '2022-03-14 17:25:37'),
(15, 51, 10, 'Good', 5, 1, '2022-03-15 15:50:11'),
(16, 51, 64, 'czd', 5, 1, '2022-03-15 16:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `recent_search`
--

CREATE TABLE `recent_search` (
  `id` int(11) NOT NULL,
  `device_id` text,
  `title` text,
  `image` text,
  `listing_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_search`
--

INSERT INTO `recent_search` (`id`, `device_id`, `title`, `image`, `listing_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 's', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646118311IMG-20220301-WA0000.jpg', 18, 0, '2022-03-03 16:34:29', '2022-03-03 17:38:43'),
(2, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 's', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646118311IMG-20220301-WA0000.jpg', 18, 0, '2022-03-03 16:34:33', '2022-03-03 17:38:43'),
(3, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'mm', NULL, NULL, 0, '2022-03-03 16:48:06', '2022-03-03 17:38:43'),
(4, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'su', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646118311IMG-20220301-WA0000.jpg', 18, 0, '2022-03-03 17:39:34', '2022-03-03 17:39:42'),
(5, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 's', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/164611823120200908_091915.jpg', 17, 0, '2022-03-03 17:48:31', '2022-03-03 17:54:12'),
(6, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-03 17:57:11', '2022-03-04 17:45:28'),
(7, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'ss', NULL, NULL, 0, '2022-03-03 17:57:38', '2022-03-03 17:57:41'),
(8, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'ss', NULL, NULL, 1, '2022-03-03 17:57:41', '2022-03-03 17:57:41'),
(9, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-04 17:45:15', '2022-03-04 17:45:28'),
(10, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 1, '2022-03-04 17:45:28', '2022-03-04 17:45:28'),
(11, 'eC_od2WPT_6PEFyh2_Cb86:APA91bHVlYkjd_J7ei-CWWn3BAXSKHfSPKb1iCDITnjz9T4MyoaPBRlBDdera3O5lW5H7xY4Krdmz10VM6vLfQpeVs6Gv7MCbzXLD-Uel04uPGsRHvda1fjSeFOty-xyIrdIkIYw8HEh', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-04 17:45:50', '2022-03-04 17:45:59'),
(12, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 1, '2022-03-04 18:00:14', '2022-03-04 18:00:14'),
(13, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'sss', NULL, NULL, 1, '2022-03-04 18:01:11', '2022-03-04 18:01:11'),
(14, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Dr', NULL, NULL, 0, '2022-03-04 18:01:52', '2022-03-04 18:01:54'),
(15, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Dr', NULL, NULL, 1, '2022-03-04 18:01:54', '2022-03-04 18:01:54'),
(16, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 1, '2022-03-04 20:12:10', '2022-03-04 20:12:10'),
(17, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:19:07', '2022-03-09 16:32:51'),
(18, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:19:54', '2022-03-09 16:32:51'),
(19, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:20:01', '2022-03-09 16:32:51'),
(20, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:21:16', '2022-03-09 16:32:51'),
(21, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:21:54', '2022-03-09 16:32:51'),
(22, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:22:48', '2022-03-09 16:32:51'),
(23, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:24:09', '2022-03-09 16:32:51'),
(24, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:25:27', '2022-03-09 16:32:51'),
(25, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:26:37', '2022-03-09 16:32:51'),
(26, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-04 20:27:02', '2022-03-09 16:32:51'),
(27, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'car insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646118311IMG-20220301-WA0000.jpg', 18, 1, '2022-03-04 20:34:36', '2022-03-04 20:34:36'),
(28, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Car loan', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/164611823120200908_091915.jpg', 17, 1, '2022-03-04 20:38:54', '2022-03-04 20:38:54'),
(29, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-04 20:53:33', '2022-03-04 20:53:34'),
(30, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-04 20:53:34', '2022-03-04 20:53:34'),
(31, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-04 20:53:34', '2022-03-04 21:02:21'),
(32, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 0, '2022-03-04 21:02:40', '2022-03-09 00:09:55'),
(33, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'hunddia', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646408248IMG_20220228_191813.jpg', 28, 0, '2022-03-04 21:10:51', '2022-03-08 20:21:33'),
(34, 'djB5pnArTROq06MzQjD_iK:APA91bEHqLq7YJIZ50mKDpN-cVWkdwop8jxXJS-KW1UhHz2MqZlrHLQZ9nJZwqP-nRcgUGs-VtQiAqNVnh58iqL5fJ3yEACTJgNd1NnO98IJ28OT7QkYVzOStqYbaLaNpz5E3rGoQEqI', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-06 18:18:26', '2022-03-09 16:48:30'),
(35, 'djB5pnArTROq06MzQjD_iK:APA91bEHqLq7YJIZ50mKDpN-cVWkdwop8jxXJS-KW1UhHz2MqZlrHLQZ9nJZwqP-nRcgUGs-VtQiAqNVnh58iqL5fJ3yEACTJgNd1NnO98IJ28OT7QkYVzOStqYbaLaNpz5E3rGoQEqI', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-07 12:06:04', '2022-03-09 16:48:30'),
(36, 'djB5pnArTROq06MzQjD_iK:APA91bEHqLq7YJIZ50mKDpN-cVWkdwop8jxXJS-KW1UhHz2MqZlrHLQZ9nJZwqP-nRcgUGs-VtQiAqNVnh58iqL5fJ3yEACTJgNd1NnO98IJ28OT7QkYVzOStqYbaLaNpz5E3rGoQEqI', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 1, '2022-03-07 12:06:37', '2022-03-07 12:06:37'),
(37, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'hunddia', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646408248IMG_20220228_191813.jpg', 28, 0, '2022-03-08 20:21:33', '2022-03-08 20:21:33'),
(38, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'hunddia', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646408248IMG_20220228_191813.jpg', 28, 1, '2022-03-08 20:21:33', '2022-03-08 20:21:33'),
(39, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-08 20:21:49', '2022-03-09 00:10:18'),
(40, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 0, '2022-03-08 20:21:58', '2022-03-09 00:09:55'),
(41, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-08 20:31:43', '2022-03-09 00:10:18'),
(42, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 0, '2022-03-08 20:31:47', '2022-03-09 00:09:55'),
(43, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 0, '2022-03-08 20:31:52', '2022-03-09 00:09:55'),
(44, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-08 23:59:58', '2022-03-09 00:10:18'),
(45, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450914311641895723960.jpg', 9, 0, '2022-03-09 00:08:16', '2022-03-09 00:12:50'),
(46, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Ydhfhfyf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450915891638772254825.jpg', 10, 1, '2022-03-09 00:08:21', '2022-03-09 00:08:21'),
(47, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450914311641895723960.jpg', 9, 0, '2022-03-09 00:08:26', '2022-03-09 00:12:50'),
(48, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450914311641895723960.jpg', 9, 0, '2022-03-09 00:08:49', '2022-03-09 00:12:50'),
(49, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-09 00:09:50', '2022-03-09 00:10:18'),
(50, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'De', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646407908IMG_20220213_185339.jpg', 27, 1, '2022-03-09 00:09:55', '2022-03-09 00:09:55'),
(51, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-09 00:10:00', '2022-03-09 00:10:18'),
(52, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-09 00:10:18', '2022-03-09 00:10:18'),
(53, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450914311641895723960.jpg', 9, 0, '2022-03-09 00:10:33', '2022-03-09 00:12:50'),
(54, 'f5Yd0PteQx-7a9aylEX_JD:APA91bG7PNIwdgXX73MUrvV0zfO4ZpbAXSClLxGzl-v0uXGKSfRRV-Fd4pPc1QaMDVTCmugyJkfOW28irhncJKQFlNzi1mduN4Thty6cgpPmLk1YfKycyc3oMrkeiAoO9gHy0YOCtV63', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450914311641895723960.jpg', 9, 1, '2022-03-09 00:12:50', '2022-03-09 00:12:50'),
(55, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 1, '2022-03-09 16:32:46', '2022-03-09 16:32:46'),
(56, 'dVdhlHdMQKa0qbzCWUo3Xy:APA91bHaUxy7hs_wDbI7e4D2OWgISGGdbsyKYMu1wXapaFJfNv5ick01CwWyRqpTogL0lp_QnnIuUMHUAveJOIiTQWeGRz_BA1gpW4CX2jLUZDVNJEA5qVdBKwewksxj_LN40U6uCxJJ', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-09 16:32:51', '2022-03-09 16:32:51'),
(57, 'djB5pnArTROq06MzQjD_iK:APA91bEHqLq7YJIZ50mKDpN-cVWkdwop8jxXJS-KW1UhHz2MqZlrHLQZ9nJZwqP-nRcgUGs-VtQiAqNVnh58iqL5fJ3yEACTJgNd1NnO98IJ28OT7QkYVzOStqYbaLaNpz5E3rGoQEqI', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-09 16:46:43', '2022-03-09 16:48:30'),
(58, 'djB5pnArTROq06MzQjD_iK:APA91bEHqLq7YJIZ50mKDpN-cVWkdwop8jxXJS-KW1UhHz2MqZlrHLQZ9nJZwqP-nRcgUGs-VtQiAqNVnh58iqL5fJ3yEACTJgNd1NnO98IJ28OT7QkYVzOStqYbaLaNpz5E3rGoQEqI', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-09 16:48:30', '2022-03-09 16:48:30'),
(59, 'dyAtu3dyQmm7Car-obhQz9:APA91bEPkfcn3oZ0LxICdXrV0s7nt-btHcqBbM5eUBTzeNmfFzi46YBkZ8nAURdqxkLjKqfTFu0bp7s5ydNgSo0EFm2oZb6WRnxYFAAjLlSzvuTxIEHQmgqbI-diD09-1dbmtrKV-GT2', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-09 16:49:15', '2022-03-09 17:25:43'),
(60, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646393911Screenshot_20220221-165723.png', 23, 1, '2022-03-09 17:09:02', '2022-03-09 17:09:02'),
(61, 'cYIqYHVRTNqZIocVZwFwKk:APA91bGec-4Dy1SWZbf1wbGR5lEuZ6CRmfz6pZYC_x6fyroyFzRyARV2-d01Z2LjNmlo0Wif97fFkS-10ob1y2A1YQ8r-SBdeIjq3_hat_7K3DKK7yL7mTAJWAP75sTodvsaAUGlCMMG', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-09 17:25:00', '2022-03-09 17:25:00'),
(62, 'dyAtu3dyQmm7Car-obhQz9:APA91bEPkfcn3oZ0LxICdXrV0s7nt-btHcqBbM5eUBTzeNmfFzi46YBkZ8nAURdqxkLjKqfTFu0bp7s5ydNgSo0EFm2oZb6WRnxYFAAjLlSzvuTxIEHQmgqbI-diD09-1dbmtrKV-GT2', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-09 17:25:43', '2022-03-09 17:25:43'),
(63, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-09 17:35:09', '2022-03-10 16:44:57'),
(64, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-09 17:40:04', '2022-03-10 16:44:57'),
(65, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-09 17:48:48', '2022-03-10 16:44:57'),
(66, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 0, '2022-03-09 18:14:36', '2022-03-10 11:47:30'),
(67, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 0, '2022-03-09 18:14:38', '2022-03-10 11:46:35'),
(68, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:16:27', '2022-03-10 16:46:06'),
(69, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:16:51', '2022-03-10 16:46:06'),
(70, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:22:05', '2022-03-10 16:46:06'),
(71, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:22:21', '2022-03-10 16:46:06'),
(72, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:22:26', '2022-03-10 16:46:06'),
(73, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:30:08', '2022-03-10 16:46:06'),
(74, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-09 18:40:01', '2022-03-10 16:46:06'),
(75, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 11:05:20', '2022-03-10 16:46:06'),
(76, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 11:08:45', '2022-03-10 16:46:06'),
(77, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Hdhshs', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646405334Screenshot_20220221-165723.png', 26, 1, '2022-03-10 11:46:35', '2022-03-10 11:46:35'),
(78, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 0, '2022-03-10 11:47:14', '2022-03-10 11:47:30'),
(79, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 0, '2022-03-10 11:47:20', '2022-03-10 11:47:30'),
(80, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 0, '2022-03-10 11:47:27', '2022-03-10 11:47:30'),
(81, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Car Insurance', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 29, 1, '2022-03-10 11:47:30', '2022-03-10 11:47:30'),
(82, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-10 11:47:37', '2022-03-14 17:20:15'),
(83, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:13:16', '2022-03-10 16:46:06'),
(84, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:13:32', '2022-03-10 16:46:06'),
(85, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-10 16:13:37', '2022-03-14 17:20:15'),
(86, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:14:55', '2022-03-10 16:46:06'),
(87, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:15:35', '2022-03-10 16:46:06'),
(88, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:16:18', '2022-03-10 16:46:06'),
(89, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646907438Screenshot_20220305-160633.png', 32, 0, '2022-03-10 16:20:02', '2022-03-10 16:20:52'),
(90, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646907438Screenshot_20220305-160633.png', 32, 1, '2022-03-10 16:20:52', '2022-03-10 16:20:52'),
(91, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:26:44', '2022-03-10 16:46:06'),
(92, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:28:00', '2022-03-10 16:46:06'),
(93, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:28:39', '2022-03-10 16:46:06'),
(94, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:28:44', '2022-03-10 16:46:06'),
(95, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:29:40', '2022-03-10 16:46:06'),
(96, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-10 16:30:31', '2022-03-10 16:44:57'),
(97, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:30:39', '2022-03-10 16:46:06'),
(98, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 0, '2022-03-10 16:30:55', '2022-03-10 16:46:06'),
(99, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-10 16:40:18', '2022-03-10 16:44:57'),
(100, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 1, '2022-03-10 16:44:57', '2022-03-10 16:44:57'),
(101, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Rgwrefrgegegg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646394415Screenshot_20220221-165723.png', 25, 1, '2022-03-10 16:46:06', '2022-03-10 16:46:06'),
(102, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ufugyfyfu', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646978835Screenshot_20220310-175905.png', 33, 0, '2022-03-11 11:39:41', '2022-03-11 11:42:59'),
(103, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ufugyfyfu', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646978835Screenshot_20220310-175905.png', 33, 1, '2022-03-11 11:42:59', '2022-03-11 11:42:59'),
(104, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646979758Screenshot_20220305-160641.png', 34, 0, '2022-03-11 11:54:32', '2022-03-11 11:58:22'),
(105, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646979758Screenshot_20220305-160641.png', 34, 0, '2022-03-11 11:55:15', '2022-03-11 11:58:22'),
(106, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646979758Screenshot_20220305-160641.png', 34, 0, '2022-03-11 11:57:27', '2022-03-11 11:58:22'),
(107, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646979758Screenshot_20220305-160641.png', 34, 0, '2022-03-11 11:58:06', '2022-03-11 11:58:22'),
(108, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646979758Screenshot_20220305-160641.png', 34, 1, '2022-03-11 11:58:22', '2022-03-11 11:58:22'),
(109, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ufygufycjvhvj', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646907244Screenshot_20220305-152140.png', 31, 0, '2022-03-11 12:00:39', '2022-03-11 12:00:45'),
(110, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ufygufycjvhvj', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646907244Screenshot_20220305-152140.png', 31, 1, '2022-03-11 12:00:45', '2022-03-11 12:00:45'),
(111, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title entered', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646981783bnr_6.png', 35, 1, '2022-03-11 12:26:40', '2022-03-11 12:26:40'),
(112, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Tdgxgcgzgcgxgx', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646982727Untitleddesign(14).png', 37, 1, '2022-03-11 12:42:32', '2022-03-11 12:42:32'),
(113, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Yfgchc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646982864Untitleddesign(13).png', 38, 1, '2022-03-11 12:44:59', '2022-03-11 12:44:59'),
(114, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Hdhjfgdhdhxgdgz', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 54, 1, '2022-03-11 15:47:54', '2022-03-11 15:47:54'),
(115, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Aaaaaaaaaa', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646994514bnr_6.png', 57, 0, '2022-03-11 15:59:06', '2022-03-11 16:02:53'),
(116, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Aaaaaaaaaa', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646994514bnr_6.png', 57, 0, '2022-03-11 16:00:38', '2022-03-11 16:02:53'),
(117, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Aaaaaaaaaa', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646994514bnr_6.png', 57, 0, '2022-03-11 16:01:34', '2022-03-11 16:02:53'),
(118, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Aaaaaaaaaa', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646994514bnr_6.png', 57, 0, '2022-03-11 16:02:18', '2022-03-11 16:02:53'),
(119, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Aaaaaaaaaa', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1646994514bnr_6.png', 57, 1, '2022-03-11 16:02:53', '2022-03-11 16:02:53'),
(120, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gxgcgdgdgx', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1644583703Screenshot_20220120-124016.png', 6, 0, '2022-03-11 19:16:13', '2022-03-11 19:16:59'),
(121, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gxgcgdgdgx', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1644583703Screenshot_20220120-124016.png', 6, 0, '2022-03-11 19:16:14', '2022-03-11 19:16:59'),
(122, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 0, '2022-03-11 19:16:20', '2022-03-11 19:16:20'),
(123, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 1, '2022-03-11 19:16:20', '2022-03-11 19:16:20'),
(124, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-11 19:16:23', '2022-03-11 19:16:29'),
(125, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 1, '2022-03-11 19:16:29', '2022-03-11 19:16:29'),
(126, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gxgcgdgdgx', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1644583703Screenshot_20220120-124016.png', 6, 0, '2022-03-11 19:16:33', '2022-03-11 19:16:59'),
(127, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Gxgcgdgdgx', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1644583703Screenshot_20220120-124016.png', 6, 1, '2022-03-11 19:16:59', '2022-03-11 19:16:59'),
(128, 'fPLlyDEKSAS5ZMPGT0k70N:APA91bEO-xhESa6Re_-WZ6OoOb9q5dYlhIZv08UrC_XLnDoumWI8KBZo5dUjy1RmZyBsav3ZYSuL6xkpm3w_VQ07SwGBGczZZjLVrWbfkEYmIrJks6tKVE3voWw7gDV0SrTU3joOciSp', 'Hchfufgc', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 9, 1, '2022-03-11 19:21:12', '2022-03-11 19:21:12'),
(129, 'dyAtu3dyQmm7Car-obhQz9:APA91bEPkfcn3oZ0LxICdXrV0s7nt-btHcqBbM5eUBTzeNmfFzi46YBkZ8nAURdqxkLjKqfTFu0bp7s5ydNgSo0EFm2oZb6WRnxYFAAjLlSzvuTxIEHQmgqbI-diD09-1dbmtrKV-GT2', 'Ydchcjvhf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647002929image_cropper_1647002921964.jpg', 61, 1, '2022-03-13 00:31:29', '2022-03-13 00:31:29'),
(130, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ydchcjvhf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647002929bnr_6.png', 61, 1, '2022-03-14 10:41:38', '2022-03-14 10:41:38'),
(131, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-14 15:50:02', '2022-03-15 17:06:19'),
(132, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 0, '2022-03-14 17:19:56', '2022-03-14 17:20:15'),
(133, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-14 17:19:59', '2022-03-15 17:06:19'),
(134, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1645091361Screenshot_20220111-120600.png', 7, 1, '2022-03-14 17:20:15', '2022-03-14 17:20:15'),
(135, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-14 17:20:22', '2022-03-15 17:06:19'),
(136, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647251639image_cropper_1647251630193.jpg', 63, 0, '2022-03-14 17:24:43', '2022-03-15 16:34:28'),
(137, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647255321image_cropper_1647255312595.jpg', 64, 0, '2022-03-14 17:25:24', '2022-03-15 16:34:21'),
(138, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647251639image_cropper_1647251630193.jpg', 63, 0, '2022-03-14 19:09:25', '2022-03-15 16:34:28'),
(139, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Gdvjfhchcftdg', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450913971641896364302.jpg', 8, 1, '2022-03-15 15:47:34', '2022-03-15 15:47:34'),
(140, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Ydhfhfyf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450915891638772254825.jpg', 10, 0, '2022-03-15 15:48:27', '2022-03-15 15:49:26'),
(141, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Ydhfhfyf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450915891638772254825.jpg', 10, 0, '2022-03-15 15:48:45', '2022-03-15 15:49:26'),
(142, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Ydhfhfyf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450915891638772254825.jpg', 10, 0, '2022-03-15 15:48:49', '2022-03-15 15:49:26'),
(143, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Ydhfhfyf', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/16450915891638772254825.jpg', 10, 1, '2022-03-15 15:49:26', '2022-03-15 15:49:26'),
(144, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647255321image_cropper_1647255312595.jpg', 64, 1, '2022-03-15 16:34:21', '2022-03-15 16:34:21'),
(145, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Ufugyfyfu', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/', 33, 1, '2022-03-15 16:34:26', '2022-03-15 16:34:26'),
(146, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647251639image_cropper_1647251630193.jpg', 63, 1, '2022-03-15 16:34:28', '2022-03-15 16:34:28'),
(147, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647255321Untitleddesign(14).png', 64, 0, '2022-03-15 16:37:31', '2022-03-15 16:38:12'),
(148, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 1, '2022-03-15 16:38:08', '2022-03-15 16:38:08'),
(149, 'd-jiZVsbT-2apjOll6htW7:APA91bGNuomMifZAumJcpbL-PNwnNRVAvzSOvmBeOwe-zRYH2X8ZSPZmMnPiTPt_ysrsb_PV9nwBDyDkBdEeH6vWcIvuE1i_H_cmfP1kQqE5NyP4JXgm1SR4qgimJsVgWMsTTodOso-K', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647255321Untitleddesign(14).png', 64, 1, '2022-03-15 16:38:12', '2022-03-15 16:38:12'),
(150, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-15 16:57:43', '2022-03-15 17:06:19');
INSERT INTO `recent_search` (`id`, `device_id`, `title`, `image`, `listing_id`, `status`, `created_at`, `updated_at`) VALUES
(151, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-15 16:59:01', '2022-03-15 17:06:19'),
(152, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-15 17:00:49', '2022-03-15 17:06:19'),
(153, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 0, '2022-03-15 17:03:29', '2022-03-15 17:06:19'),
(154, 'cqbz9agdRY-H4PkVyOJkMV:APA91bHLFNClo2m6o0WGaZ4oAb41jq5nQMLEWn1Kabyfj2ocqTA4I48GUL8yon5ZPN3iq_ojH7W4VajJD7aH1Q6MFswjEKs8Yntlmq22-tN0w1wjIXJjlk_9TeoS77IT0WVYcKiD-50X', 'Title', 'http://shyaam_trust.manageprojects.in/uploads/listing_gallery/1647250882Untitleddesign(14).png', 63, 1, '2022-03-15 17:06:19', '2022-03-15 17:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(2, 'girl', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51'),
(3, 'user', 'web', '2021-09-01 00:58:51', '2021-09-01 00:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(8, 1),
(5, 2),
(6, 2),
(8, 2),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restorant_details_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `restorant_details_cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `playstore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `appstore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `maps_api_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `delivery` double(8,2) NOT NULL DEFAULT '0.00',
  `typeform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mobile_info_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mobile_info_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `site_name`, `site_logo`, `search`, `restorant_details_image`, `restorant_details_cover_image`, `description`, `header_title`, `header_subtitle`, `currency`, `facebook`, `instagram`, `playstore`, `appstore`, `maps_api_key`, `delivery`, `typeform`, `mobile_info_title`, `mobile_info_subtitle`) VALUES
(1, '2021-09-01 00:58:51', '2021-09-01 00:58:51', 'Eye Kandy', '/default/logo.png', '/default/cover.jpg', '/default/restaurant_large.jpg', '/default/cover.jpg', 'Food Delivery from best restaurants', 'Food Delivery from<br /><b>New York’s</b> Best Restaurants', 'The meals you love, delivered with care', 'USD', '', '', '', '', 'AIzaSyCZhq0g1x1ttXPa1QB3ylcDQPTAzp_KUgA', 0.00, '', 'Download the food you love', 'It`s all at your fingertips - the restaurants you love. Find the right food to suit your mood, and make the first bite last. Go ahead, download us.');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'mahrashtra', 1, '2022-03-17 06:52:06', '2022-04-25 06:52:37'),
(2, 1, 'delhi', 1, '2022-03-17 06:56:06', '2022-04-25 06:52:41'),
(3, 1, 'MP', 0, '2022-04-04 13:08:32', '2022-04-18 12:06:14'),
(4, 1, 'UP', 0, '2022-04-04 13:47:07', '2022-04-18 12:06:19'),
(5, 1, 'RK', 0, '2022-04-04 13:47:28', '2022-04-18 12:06:22'),
(6, 1, 'abcde', 1, '2022-04-04 13:47:48', '2022-04-04 13:47:48'),
(7, 1, 'Dubai', 1, '2022-04-04 13:48:21', '2022-04-04 13:48:21'),
(8, 3, 'Oxfordshire', 1, '2022-04-08 07:22:05', '2022-04-08 07:22:05'),
(9, 3, 'Suffolk', 1, '2022-04-08 07:22:33', '2022-04-08 07:22:33'),
(10, 3, 'Middlesex', 1, '2022-04-08 07:22:55', '2022-04-08 07:22:55'),
(11, 5, 'Senedd', 1, '2022-04-08 07:23:49', '2022-04-08 07:23:49'),
(12, 5, 'Scottish Parliament', 1, '2022-04-08 07:24:07', '2022-04-08 07:24:07'),
(13, 5, 'Northern Ireland Assembly', 1, '2022-04-08 07:24:22', '2022-04-08 07:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `alias`) VALUES
(1, 'Just created', 'just_created'),
(2, 'Accepted by admin', 'accepted_by_admin'),
(3, 'Accepted by restaurant', 'accepted_by_restaurant'),
(4, 'Assigned to driver', 'assigned_to_driver'),
(5, 'Prepared', 'prepared'),
(6, 'Picked up', 'picked_up'),
(7, 'Delivered', 'delivered'),
(8, 'Rejected by admin', 'rejected_by_admin'),
(9, 'Rejected by restaurant', 'rejected_by_restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `description` longtext,
  `image` text,
  `reply` longtext,
  `status` int(11) DEFAULT '0' COMMENT '0=open,1=close',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `topic`, `description`, `image`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 'asdsda', '123dsfdfkjoi  dsfkldjsklf dskljdklsf ks dj  jjkjdf', 'uploads/support/1648212616imgpsh_fullsize_anim.png', NULL, 0, '2022-03-25 12:50:16', '2022-03-25 12:50:16'),
(2, 14, 'asdsda', '123dsfdfkjoi  dsfkldjsklf dskljdklsf ks dj  jjkjdf', NULL, NULL, 0, '2022-04-05 09:06:01', '2022-04-05 09:06:01'),
(3, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/1649149634download(3).jpg', NULL, 0, '2022-04-05 09:07:14', '2022-04-05 09:07:14'),
(4, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/16491496502022-04-02-1649050689.xlsx', NULL, 0, '2022-04-05 09:07:30', '2022-04-05 09:07:30'),
(5, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/1649149749download(6).jpg', NULL, 0, '2022-04-05 09:09:09', '2022-04-05 09:09:09'),
(6, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/1649149763download(6).jpg', NULL, 0, '2022-04-05 09:09:23', '2022-04-05 09:09:23'),
(7, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/16491497722022-04-02-1649050056.xlsx', NULL, 0, '2022-04-05 09:09:32', '2022-04-05 09:09:32'),
(8, 20, 'Testing', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'uploads/support/16491512762022-04-02-1649050056.xlsx', NULL, 0, '2022-04-05 09:34:36', '2022-04-05 09:34:36'),
(9, 20, 'Testing', '1111111111111111111111111111111111111111111111', 'uploads/support/16491515382022-04-02-1649050056.xlsx', NULL, 0, '2022-04-05 09:38:58', '2022-04-05 09:38:58'),
(10, 3, 'abc', 'hhhh', NULL, NULL, 0, '2022-04-08 19:38:17', '2022-04-08 19:38:17'),
(11, 3, 'abc', 'hhhh', NULL, NULL, 0, '2022-04-08 19:38:27', '2022-04-08 19:38:27'),
(12, 3, 'abc', 'hhhh', NULL, NULL, 0, '2022-04-08 20:18:52', '2022-04-08 20:18:52'),
(13, 36, 'Birthday Party', 'hvhv', 'uploads/support/1649783380image_picker1962897386926895311.jpg', NULL, 0, '2022-04-12 17:09:40', '2022-04-12 17:09:40'),
(14, 36, 'Birthday Party', 'hvjh', 'uploads/support/1649783517image_picker9208384723650573501.jpg', NULL, 0, '2022-04-12 17:11:57', '2022-04-12 17:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `support_topic`
--

CREATE TABLE `support_topic` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_topic`
--

INSERT INTO `support_topic` (`id`, `topic`, `active`, `created_at`, `updated_at`) VALUES
(1, 'amount deducted123', 0, '2022-03-26 08:01:49', '2022-03-26 08:09:00'),
(2, 'What is Lorem Ipsum', 1, '2022-04-04 13:27:28', '2022-04-04 13:27:28'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', 1, '2022-04-04 13:32:50', '2022-04-04 13:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=active',
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `package_limit` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_generation_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_info` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `google_id`, `apple_id`, `email`, `email_verified_at`, `password`, `token`, `phone`, `login_type`, `remember_token`, `role`, `active`, `dob`, `package_id`, `package_limit`, `updated_at`, `created_at`, `otp`, `otp_generation_time`, `otp_verification`, `business_info`, `image`, `device_id`) VALUES
(1, 'Eye-Kandy', NULL, NULL, 'admin@eyekandy.com', '2021-09-01 00:58:51', '$2y$10$gLffwitYRuhdjPo4/m1gfehUVM8L/ADzdPhn8E0VRMEFiP8w1.Vk.', 'SdWY6tENU3J6jgRoHp8MQ954rzI8wKCWksaAYiUvakrnG2vqyfxx04EU1bgtzj6jTZCBArKThWgIZFsi', '+918882970904', NULL, 'o5yKqcRqOiHGtExyQWi0ySlJA4DfJDukXMgdtGgFwh1BnRuQAxTnW3VjIUSW', '', 1, '2021-12-15', 0, 0, '2022-04-04 06:07:09', '2021-09-01 00:58:51', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'user', NULL, NULL, 'user@mailinator.com', NULL, '$2y$10$gLffwitYRuhdjPo4/m1gfehUVM8L/ADzdPhn8E0VRMEFiP8w1.Vk.', NULL, NULL, NULL, NULL, '3\n', 1, NULL, 0, 0, '2022-04-06 05:17:48', '2022-03-16 10:15:17', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'aliakbar', NULL, NULL, 'aliakbar@mailinator.com', NULL, '$2y$10$MBPMlVKgdb3XUJANYREfPOR0l/Efz07D3oo3VPA/5Qdj8bClcMJiW', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-09 19:11:00', '2022-03-23 08:58:48', NULL, NULL, NULL, NULL, 'uploads/profile_pic/1649531460JPEGimage2.jpeg', NULL),
(11, 'om', NULL, NULL, 'pavan@mailinator.com', NULL, '$2y$10$Db7bO3DLmY37UhK13vHxLu8mc55IdHmPCsqT2DML2BAQiCHPc/BI2', NULL, NULL, 'app', NULL, '', 1, NULL, 0, 0, '2022-03-23 09:57:48', '2022-03-23 09:57:48', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'om', NULL, 'asdfsdfsde3222', 'om@mailinator.com', NULL, '$2y$10$sFmzoicrmVDo2VHhb89Kxecq2g6DTgRDccdcJ5JBqLAFOVB17szBO', NULL, NULL, 'apple', NULL, '', 1, NULL, 0, 0, '2022-03-23 10:02:09', '2022-03-23 10:02:09', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'aliakbar', 'asdfsdfsde3222', NULL, 'ali@mailinator.com', NULL, '$2y$10$0NrB5eXGnHvzJ6kmFby95OcVzJ.IdZGCGm0dfCGwNGDQ.TMUuOFdu', NULL, NULL, 'google', NULL, '3', 0, NULL, 0, 0, '2022-05-06 07:22:58', '2022-03-23 10:02:48', NULL, NULL, NULL, NULL, 'uploads/profile_pic/1650880008user1.jpg', NULL),
(15, 'chandresh', NULL, NULL, 'chandresh@mailinator.com', NULL, '$2y$10$b2qohV4.yW5pZqZDHC1Qq.kU/xVzjTWfafCkqYvZtvzaJGWDDVeee', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 09:36:05', '2022-04-04 09:36:05', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'chandresh jain', NULL, NULL, 'jain01@mailinator.com', NULL, '$2y$10$AN0Wzkb488p/pJDqOEGML.TAt9cX1zc217lVk5bwG1s6w6JbEVgY6', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 11:27:33', '2022-04-04 09:52:55', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'jain chandresh', NULL, NULL, 'jain02@mailinator.com', NULL, '$2y$10$xse1xIWwhZ13o38QkU1nIOvHkdnfqOLBiHkvYhmXdaQ/F6bw/BAEe', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 11:25:24', '2022-04-04 09:56:38', NULL, NULL, NULL, NULL, 'uploads/profile_pic/1649070742download.jpg', NULL),
(18, 'jain', NULL, NULL, 'jain03@mailinator.com', NULL, '$2y$10$Y0r.hzObvQwow1dc36Z/YePR8oJmvodvmXaGlYIkWXwOx.IfcoIES', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 09:58:13', '2022-04-04 09:58:13', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'jain', NULL, NULL, 'jain04@mailinator.com', NULL, '$2y$10$4PB/HzEV/oCxpBVl4SaRcOMKeu3AV4Jj5NJCXEDPH8sZ.dvvTge/i', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 09:58:56', '2022-04-04 09:58:56', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'jain', NULL, NULL, 'jain05@mailinator.com', NULL, '$2y$10$W2znXwmhhIZlypGmRbOn0esOtJmFqrmPZ1gzfOzoZzXsQlqybK0M.', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:01:34', '2022-04-04 10:01:34', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'jain', NULL, NULL, 'jain06@mailinator.com', NULL, '$2y$10$ckj37oa1x38d8VaHQUXqYu94OxMoGu798W39QTLnbmQch5xLs7k4q', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:10:45', '2022-04-04 10:10:45', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'jain', NULL, NULL, 'jain07@mailinator.com', NULL, '$2y$10$1hultd.wrycQXZZxFAdrb.dKagaCV9GWfa9hcgtzCni/P8eFpEPEe', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:11:05', '2022-04-04 10:11:05', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'jain', NULL, NULL, 'jain08@mailinator.com', NULL, '$2y$10$1cwCPwlRwEzZeWvvkzkGUOS99vQlGB2u9osKaA.ZXmhaSd6mhVk9O', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:11:26', '2022-04-04 10:11:26', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'jainnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', NULL, NULL, 'jain12@mailinator.com', NULL, '$2y$10$vgKD2QMqHVjK/PoE6jRHCeGa0.FH.v2r0pUzVbFxbGrOf9ZWpJEuG', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:15:42', '2022-04-04 10:15:42', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'jainnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', NULL, NULL, 'jain13@mailinator.com', NULL, '$2y$10$vlp7CbaDM6LfIqr/sEVCuOHmcUW7OrCbB0p5eVlaFqBztJJyoDZo2', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 12:45:11', '2022-04-04 10:17:33', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'jain', NULL, NULL, 'jain14@mailinator.com', NULL, '$2y$10$AG4Tgr9JY/GuCNDYrDeFIOJ6BWzV2sCgGDe2eILMAwD4g3bbdzBeG', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-04 10:24:21', '2022-04-04 10:24:21', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Surabhi jain', NULL, NULL, 'Surabhi@mailinator.com', NULL, '$2y$10$ylDPNPEiH4uhzM8NkRVba.8JAjyVR5CW60TfbOW/NVT/Iyp/ESCaa', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-06 06:55:25', '2022-04-06 06:55:25', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'UMAR mansuri', NULL, NULL, 'mansuriumar89@gmail.com', NULL, '$2y$10$o043FueQASqZc6TwkSllgOiFupP3HooLisheNIgUsvO9nV1O6wXsu', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-14 18:27:35', '2022-04-07 17:39:55', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'UMAR mansuri', NULL, NULL, 'mansuriumar891@gmail.com', NULL, '$2y$10$Qy0uo.i5Izfh/3oWgXUozOGASqbKvMBOmfzsF.klgyyixWyf1xzsO', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-07 17:40:12', '2022-04-07 17:40:12', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'UMAR mansuri', NULL, NULL, 'mansuriumar8@gmail.com', NULL, '$2y$10$d26md1fRZVNpr4awlTTKoOOx9006sdvPeHExsL3Lrzu77fEZxgLIC', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-07 18:10:05', '2022-04-07 18:10:05', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Chandresh Jain', NULL, NULL, 'jain01@mailinatore.com', NULL, '$2y$10$tDoMw20lRjtLeBYqf29m7Onjs5jR84drkqz/vZKHv/sg0Xvlfs1Yu', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 12:44:45', '2022-04-08 05:19:40', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Chandresh Jain', NULL, NULL, 'jain03@mailinatore.com', NULL, '$2y$10$.WTHNgH0K2p/p1RDWrRQSuiHzr9c/vdnu8Wk169nOt.K4yN11R8VS', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 08:43:59', '2022-04-08 08:43:59', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'chandresh jain', NULL, NULL, 'jain0@mailinator.com', NULL, '$2y$10$8WkanRRDGTOCCoiJmedLcugj5dEKGcasnIrHx2BX/osTUjoVPA6Pi', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 08:45:44', '2022-04-08 08:45:44', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Chandresh', NULL, NULL, 'jain16@mailinator.com', NULL, '$2y$10$4EHT8xKYEbDM5yYCO2Q1O.Jzdp1H8yJLnyijldoeq4gM3c1sGdmae', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 13:34:34', '2022-04-08 12:37:38', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Chandresh Jain', NULL, NULL, 'jain20@mailinator.com', NULL, '$2y$10$dNG19lnj136GxO89GaZrbeuqkqxzYUetboWksKMFgy8CZsEuBOKzS', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-08 12:57:44', '2022-04-08 12:57:44', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'umar mansuri', NULL, NULL, 'mansuriumar@gmail.com', NULL, '$2y$10$LcRvI7WeXpQzqX/IdFlXceIABbnCRAN8ydUKVwg/VXfWVq4Vh.DZu', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 08:53:15', '2022-04-08 17:26:08', NULL, NULL, NULL, NULL, 'uploads/profile_pic/1650154812image_picker92078980908751709.jpg', NULL),
(37, 'Umar m', NULL, NULL, 'Mansuriumar1@gmail.com', NULL, '$2y$10$nnz3cCpblLIbGoO69m9ksuoDnYoksoBTDvFlxgZglY/srXArRsqHy', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-14 18:23:18', '2022-04-14 18:23:18', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Umar mansuri', NULL, NULL, 'Mansuriunar89@gmail.com', NULL, '$2y$10$gl3uwIL956gu9sLc9lD7SOQfqMN49J1vuIx67l4YoAxg/DE2R1f16', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-14 18:27:16', '2022-04-14 18:27:16', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Chandresh Jain', NULL, NULL, 'jain18@mailinator.com', NULL, '$2y$10$sH15j0Apjb07RPn9ETAoKuGqGxlkyygopjaEpLg6sj.Yr/QEUPmje', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 10:02:42', '2022-04-15 10:02:42', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Chandresh Jain', NULL, NULL, 'jain19@mailinator.com', NULL, '$2y$10$ViYa3WGufcUIKKrYRbtnkuWDbiYLIuvmNcH//LZYhWkI92X0Cjg16', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 10:04:58', '2022-04-15 10:04:58', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Chandresh Jain', NULL, NULL, 'jain21@mailinator.com', NULL, '$2y$10$d3IfCmkDTE2/2oCQBz474.bpqkAnF2H6xN6oAThhJ1OOQMescqF4O', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 10:08:52', '2022-04-15 10:08:52', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Chandresh Jain', NULL, NULL, 'jain22@mailinator.com', NULL, '$2y$10$eIkwDQ7CmOXSyhedRzbHZO3QEAitsHYZOUbOFGTUXexmbJ5.5v/hW', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 10:09:52', '2022-04-15 10:09:52', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Chandresh Ak Jain', NULL, NULL, 'jain23@mailinator.com', NULL, '$2y$10$65rV7AmzMHQh50zYmhYmuugxFoN/za33V0e/XljWLthZzED5HTtNO', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 11:25:36', '2022-04-15 10:58:56', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Chandresh Ak Jain', NULL, NULL, 'jain24@mailinator.com', NULL, '$2y$10$cOPeUlbjR/UKl.sdUcBJNe./C1h4BlRD5VpVpa5HZZ8htQKUXDjhS', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 11:25:35', '2022-04-15 11:19:34', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Chandresh Ak Jain', NULL, NULL, 'jain25@mailinator.com', NULL, '$2y$10$vi3rf7k/ek97go0llJyLBe6cDRP7Lg0fBKyyH6pfJ/im0tAm2/aNW', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-15 11:33:52', '2022-04-15 11:33:52', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'umar mansuri', NULL, NULL, 'mansuriumar123@gmail.com', NULL, '$2y$10$JuPQwV3jyuKbvvjO2BZ4tevqu8h1RxhjDWh6T63PHeKAbHIHz8gNG', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-16 23:48:58', '2022-04-16 23:48:58', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'asdfgg', NULL, NULL, 'a@gmail.com', NULL, '$2y$10$RgVuRhAIXAQg/bq1Z8.Flu9wOHrPcd2fqYblLSSNa4I/7RHre3Oxe', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-16 23:50:03', '2022-04-16 23:50:03', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Vvvvv', NULL, NULL, 'Varunrajwade123@gmail.com', NULL, '$2y$10$2jRLmVNyhNc3Q.ulTZALbukKOvjFBou5xmO9m7Ps0TVfb9Zd380rO', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 09:02:51', '2022-04-17 09:02:51', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Eyetest', NULL, NULL, 'Eyetest@gmail.com', NULL, '$2y$10$A9PgH6woNlQuj8gsSY2FS.WJ/sLVDgazxctlDtrhNzzvsiMJ3PV9.', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 09:10:53', '2022-04-17 09:10:53', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Umar mansuri', NULL, NULL, 'Umar@gmail.com', NULL, '$2y$10$WX4PnSYTiIwoF/hfXC3Geegvp.a3boa5eY0Dg/LfywUT2ddWLDnGS', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-05-01 17:42:37', '2022-04-17 09:21:29', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'ali', NULL, NULL, 'chandresh1@mailinator.com', NULL, '$2y$10$nClQEW7v9YFQPvXYegeOmeK/UTc6Ta9bH81FSwEUK0qkTZDNyHBGu', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 09:26:05', '2022-04-17 09:26:05', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'UMffwdvwvf', NULL, NULL, 'mansuriumar13444@gmail.com', NULL, '$2y$10$YDUGv3FMKQh5C6y2BF1SEuNngRmU7zo/cXLKMjCHbHO7UJsOvGKX6', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 10:26:16', '2022-04-17 10:26:16', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'ubiugiy', NULL, NULL, 'mansuriumar1344@gmail.com', NULL, '$2y$10$68BAQOigrlpgwzarqAmwEuWh5LVdRt7p1zQwmYHORHlJF8OqHlBoa', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 10:28:17', '2022-04-17 10:28:17', NULL, NULL, NULL, NULL, NULL, NULL),
(54, '111 222', NULL, NULL, 'a@a.com', NULL, '$2y$10$LxivZeRW3IB6l1lTTJHJK.bFQVqeLl/IhfOTS567mviULzuWpAGfK', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-27 11:47:05', '2022-04-17 16:25:43', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'aqweceffe', NULL, NULL, 'w@gmail.com', NULL, '$2y$10$5T7btChJqh7VD4NBxVb8TuJaw.JfHtFX/PEX/Ybpn5CiAko0RDj2u', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 18:44:22', '2022-04-17 18:44:22', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'umar mmhhh', NULL, NULL, 'ab@gmail.com', NULL, '$2y$10$f7QBTAtjxfZR2RhDeJjql.7aFjf7JuVP1jAOfa/oEysifqv1AKLdS', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-17 18:48:57', '2022-04-17 18:48:57', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Qqaazz bdj', NULL, NULL, 'B@b.com', NULL, '$2y$10$jMdKuNOfcTdklUNpw.zOVevVOjvsAATEbx2.1KNUhJnch1MRUc646', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-18 02:49:10', '2022-04-18 02:49:10', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Chandresh Jain', NULL, NULL, 'jain30@mailinator.com', NULL, '$2y$10$tHqAwQvP46rcI3Clcet1SObRV.y8R2JU3M3DKdFH2vxyX5Z4O5zb6', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-18 11:05:22', '2022-04-18 09:39:09', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Cchjc', NULL, NULL, 'jain31@mailinator.co', NULL, '$2y$10$uqPTBmyXDx5GuNHORdI6levPbflBsRwcgPGhaskfhJn1sTaVpnynK', NULL, NULL, NULL, NULL, '', 1, NULL, 0, 0, '2022-04-18 10:34:58', '2022-04-18 10:34:58', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Chandresh', NULL, NULL, 'jain31@mailinator.com', NULL, '$2y$10$N3GCsc0Ma.JP4N7nG99TXO/4Lo5qogy/Nqbvu8jrVYedPMQRnB2Pq', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 11:20:35', '2022-04-18 11:20:35', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Chandresh Jain', NULL, NULL, 'jain32@mailinator.com', NULL, '$2y$10$bSnVjwsed73q7tL0b01omerHsBLo.cPmmvlTxB8T9ZBPbwBHAnXeK', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-05-06 05:37:38', '2022-04-18 11:30:10', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Chandresh', NULL, NULL, 'jain33@mailinator.com', NULL, '$2y$10$sM.d8qlfZVjO1GjvsEYIIeClQa3nyEtAxQCsOueh1kLzDWy1GYhHa', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 11:46:09', '2022-04-18 11:34:36', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Chandresh Jain', NULL, NULL, 'jain34@gmail.com', NULL, '$2y$10$RnJ4YObVN7YMkUMMx1I4IevHh.j9F2bvplipqVTZtoYf2g6cIInu.', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 12:42:16', '2022-04-18 12:42:16', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'chandresh Jain', NULL, NULL, 'jain35@mailinator.com', NULL, '$2y$10$Q9287y.pToOgeymYedGNUulR.nJeFnjoCDtHVQy.U/FcvufPZjx6q', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 12:44:38', '2022-04-18 12:44:38', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Chandresh', NULL, NULL, 'jain@mailinator.com', NULL, '$2y$10$4kcaAsQNEhGRGyMEHWsxo.AJtxTbFkGZj4UsuhMOvE1m3aPFO9fd6', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 12:50:51', '2022-04-18 12:49:42', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Chandresh', NULL, NULL, 'jain36@mailinato.com', NULL, '$2y$10$y5xBv3VC3DsrlmLKxJdLk.hULGWpisPjwbXoJhU2BPKI3qGw5kUcS', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 13:00:45', '2022-04-18 13:00:45', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'chandresh', NULL, NULL, 'jain@gmail.co', NULL, '$2y$10$ee6XOYpB7UHIWYLTG06cuuAGyDcgQ3tl922goHENs07WUEhyvHR8a', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 13:02:01', '2022-04-18 13:02:01', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'chandresh', NULL, NULL, 'jain44@mailinator.com', NULL, '$2y$10$V7eOgeW13Qun1vwq71M12uV3UGHodVfHxXKqBh8KhueO.4fliuRn2', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 13:35:36', '2022-04-18 13:35:36', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Testing Chandresh', NULL, NULL, 'jain50@gmail.com', NULL, '$2y$10$TKFn5/zDMqsKrUVkCy3F4.G5IEjtikK2apDEeSQmSDH6RDEURlmlm', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 13:38:46', '2022-04-18 13:37:23', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Jason Tatum', NULL, NULL, 'danieldumas95@gmail.com', NULL, '$2y$10$F7lsmsjRxiyzxvcXJbdq/O1qQDtWq6O1pyPgFop5tASfHEs/AR0bi', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-18 15:02:40', '2022-04-18 15:02:40', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Testing 01', NULL, NULL, 'jain51@mailinator.com', NULL, '$2y$10$kXH90oCiUsVoDi9JCvF8eujgB3u2rm1iiBsCn2Fy8M3Ie3solZ2Ai', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-19 07:29:28', '2022-04-19 07:29:28', NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Ko Testing', NULL, NULL, 'kp@mailinator.com', NULL, '$2y$10$5TZ7DAI9Zti12Gq6BX5wHeBiT5QUGQ6AX0vurtwqIpQdHItQPr2.2', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-19 09:17:26', '2022-04-19 09:17:26', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Jason Cruise', NULL, NULL, 'detprody@gmail.com', NULL, '$2y$10$gMhjqY1z0EKdFgnnmJD6weUuIQPON1CO9QLc.nVea77IuNMyrSTM6', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-26 11:23:19', '2022-04-19 13:35:26', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Robert Johnson', NULL, NULL, 'Playersclub4210@gmail.com', NULL, '$2y$10$ibg3YxKhdDJnnk/EUV4/QOmZST4sdZukSAv.v0GeHsxFFrheAoZvS', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-19 18:03:54', '2022-04-19 18:03:54', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'umar mansuri', NULL, NULL, 'mansuri@gmail.com', NULL, '$2y$10$XrtmCXrC8BdjL3LBGGp7Hugh0f1ohjVuvLueDRpnRjysl01aJ7CgK', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 16:00:48', '2022-04-21 16:00:48', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'ankir sir', NULL, NULL, 'ankitsir@gmail.com', NULL, '$2y$10$WNY4zDIPpJVo.w8kCsYj2OjWOdSK.F4DRAuAPaH3x1YYjrQi1VSku', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 16:06:49', '2022-04-21 16:06:49', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'ucwdcdwcdc', NULL, NULL, 'mansuriumar134@gmail.com', NULL, '$2y$10$Q/Mbd5iEqpmd0n52PoZ27OgCXmGVipvULIaQeRXoDu7JzcauRcs52', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 16:08:08', '2022-04-21 16:08:08', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'ucwdcdwcdc', NULL, NULL, 'mansuriumar1343@gmail.com', NULL, '$2y$10$Wxxz6FcwW5ViOO.KZvFQOOyzibGncGbRcAXSM.tXIDZFrtUTRBnz6', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 18:09:07', '2022-04-21 18:09:07', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'ucwdcdwcdc', NULL, NULL, 'mansumriumar1343@gmail.com', NULL, '$2y$10$Vi2Mb3Odo/l9xtVc7N8cu.L9hZROE2FIkKpNLLAOYFQpeNW1DP/F6', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 18:20:49', '2022-04-21 18:20:49', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'chandresh', NULL, NULL, 'ali123@mailinator.com', NULL, '$2y$10$a6No5dsd0kp85RDT1HUs9u9X3FAVLEZ42wnKTMVBEvkspNwop0fC6', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:48:04', '2022-04-21 20:48:04', NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'ali12', NULL, NULL, 'ali12@mailinator.com', NULL, '$2y$10$7Q4E7gXVHH5..soXrQvaH.XNJqqjYU/Xm845erOrCRscodAOambCG', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:48:25', '2022-04-21 20:48:25', NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'ali12', NULL, NULL, 'ali1@mailinator.com', NULL, '$2y$10$QBN7vYkdCTh6p.g4.QKIourC3VETG2dGNGQawU4ZHXQfnTiQOrB8m', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:49:30', '2022-04-21 20:49:30', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'ali12', NULL, NULL, 'ali19@mailinator.com', NULL, '$2y$10$1tFo9t1yCcosVfT1NXxm2u/OAW/7NqntY5JAtzpmwHamM2K4Nto/C', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:51:59', '2022-04-21 20:51:59', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'ali12', NULL, NULL, 'ali89@mailinator.com', NULL, '$2y$10$BPPpRzmHqhxhmMXEbQgnN.xaM6R6REyAjkUJigDOFvPIlz3bs4oyO', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:52:15', '2022-04-21 20:52:15', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'ali80', NULL, NULL, 'ali80@mailinator.com', NULL, '$2y$10$KiH2qDEkyRv5h0AyRKBln.GAK6uT8Tg4DhIIYN1ov/Svpo1BEHn1S', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:56:02', '2022-04-21 20:56:02', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'ali81', NULL, NULL, 'ali81@mailinator.com', NULL, '$2y$10$.ukr7vW4lQZ7po01aiOHSegMJ8JRWqkNsCTKxQ3SQPHXpS8OQOQjy', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:56:29', '2022-04-21 20:56:29', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'ali82', NULL, NULL, 'ali82@mailinator.com', NULL, '$2y$10$nU11wT.Cpdjr.ieTqlexKeCAt2/EY.j3ztGoOepLCJXeTbUVJd33i', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-21 20:57:20', '2022-04-21 20:57:20', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'ucwdcdwcdc', NULL, NULL, 'mansumriumarj1343@gmail.com', NULL, '$2y$10$4SLl4kS26o0ZSoc2OUOXz.0cjbWhue3YW6mCl4ny44dtItclia3wu', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-22 06:23:04', '2022-04-22 06:23:04', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'ucwdcdwcdc', NULL, NULL, 'mansumriumar11343@gmail.com', NULL, '$2y$10$a.lRdU8FfGjrvcSVOmQZ/.SNwgpFs5B635Xt74pVRpFqJDQ6DULlK', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-22 06:25:25', '2022-04-22 06:25:25', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Umar mansuri', NULL, NULL, 'Testt@gmail.com', NULL, '$2y$10$MujAAH48eMxCN90ElMAguebkSqu23ePXC7Ia3rTT9l9i59XP1XxQG', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-22 06:28:41', '2022-04-22 06:28:41', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'L@l.io', NULL, NULL, 'L@l.io', NULL, '$2y$10$70HNpcspViIA3QYjSxG9EO2M3Cr76hXTtLgHsadVH9o.FpMVnwVui', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-22 10:09:17', '2022-04-22 10:09:17', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'Test user vvr', NULL, NULL, 'Vvr@vvr.com', NULL, '$2y$10$MOPD2ak3Q35vPZ4.wJpvjuOj1Xqxmiy0mdTKfU5qj8TeoO02bhQYG', NULL, NULL, NULL, NULL, '3', 1, NULL, 0, 0, '2022-04-27 11:48:03', '2022-04-27 11:48:03', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `created_at`, `updated_at`, `active`) VALUES
(1, 'sdsad', '2021-09-01 13:38:11', '2021-09-01 13:33:27', 1),
(2, 'daadas', '2021-09-01 13:38:14', '2021-09-01 13:36:18', 1),
(3, 'dfd', '2021-09-01 08:30:51', '2021-09-01 14:00:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'business park', 1, '2022-03-17 11:41:25', '2022-04-04 12:49:46'),
(2, 'AB Park', 1, '2022-03-17 11:45:24', '2022-04-04 12:52:09'),
(3, 'Atulya IT Park', 1, '2022-03-24 06:42:10', '2022-04-18 12:28:09'),
(4, 'Vijay Nagar Indore', 1, '2022-03-29 12:50:45', '2022-04-18 12:28:14'),
(5, 'MP Nagar Bhopal', 0, '2022-03-29 13:17:23', '2022-04-18 12:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `listing_id`, `user_id`, `created_at`, `updated_at`) VALUES
(28, 8, 51, '2022-02-18 10:59:51', '2022-02-18 10:59:51'),
(29, 10, 51, '2022-02-18 10:59:57', '2022-02-18 10:59:57'),
(32, 27, 51, '2022-03-08 20:22:11', '2022-03-08 20:22:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_detailsold`
--
ALTER TABLE `bank_detailsold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_data`
--
ALTER TABLE `dummy_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_product`
--
ALTER TABLE `dummy_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_wedding`
--
ALTER TABLE `dummy_wedding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `girls`
--
ALTER TABLE `girls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notification_status`
--
ALTER TABLE `notification_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_darshan`
--
ALTER TABLE `online_darshan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_has_status`
--
ALTER TABLE `order_has_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_has_status_user_id_foreign` (`user_id`),
  ADD KEY `order_has_status_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_type`
--
ALTER TABLE `party_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_search`
--
ALTER TABLE `recent_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_name_unique` (`name`),
  ADD UNIQUE KEY `status_alias_unique` (`alias`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_topic`
--
ALTER TABLE `support_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bank_detailsold`
--
ALTER TABLE `bank_detailsold`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dummy_data`
--
ALTER TABLE `dummy_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dummy_product`
--
ALTER TABLE `dummy_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dummy_wedding`
--
ALTER TABLE `dummy_wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `girls`
--
ALTER TABLE `girls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notification_status`
--
ALTER TABLE `notification_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_darshan`
--
ALTER TABLE `online_darshan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_has_status`
--
ALTER TABLE `order_has_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `party_type`
--
ALTER TABLE `party_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `recent_search`
--
ALTER TABLE `recent_search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `support_topic`
--
ALTER TABLE `support_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_has_status`
--
ALTER TABLE `order_has_status`
  ADD CONSTRAINT `order_has_status_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_has_status_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
