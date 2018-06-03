-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 11:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `bill_type` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_type`, `description`, `amount`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'WAPDA', 'wapda bills are here. everyone have to pay now.', '5000', '2018-05-14 19:51:02', '0000-00-00 00:00:00', 1),
(2, 'GAS', 'sui gas bills are here', '400', '2018-05-14 15:22:14', '2018-05-14 15:22:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inout`
--

CREATE TABLE `inout` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenant_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inout`
--

INSERT INTO `inout` (`id`, `tenant_id`, `is_active`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, '2018-05-01 06:35:47', '2018-05-06 02:27:57'),
(2, 1, 0, 1, '2018-05-06 03:06:32', '2018-05-06 03:22:48'),
(4, 1, 0, 1, '2018-05-06 03:22:48', '2018-05-06 03:58:03'),
(7, 1, 1, 1, '2018-05-06 03:58:03', '2018-05-20 11:53:51'),
(8, 2, 0, 1, '2018-05-20 12:07:43', '2018-05-20 13:06:26'),
(9, 2, 1, 1, '2018-05-20 13:06:26', '2018-05-20 13:06:26');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_04_24_044750_create_room_category_table', 1),
(9, '2018_04_24_044751_create_rooms_table', 1),
(10, '2018_04_24_044753_create_tenants_table', 1),
(11, '2018_04_24_044754_create_inout_table', 1),
(12, '2018_04_24_044758_room_allocation', 1),
(13, '2018_04_24_044965_create_tenant_bills_table', 1),
(14, '2018_04_24_044967_create_payments_table', 1);

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
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(10,0) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `tenant_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `amount`, `discount`, `description`, `tenant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cash', '500', '50', 'test description', 1, 1, '2018-05-22 15:58:18', '2018-05-22 15:58:18'),
(2, 'cash', '500', '50', 'test description', 2, 1, '2018-05-24 15:59:42', '2018-05-22 15:59:42'),
(3, 'cash', '880', '20', 'test description', 2, 1, '2018-05-27 16:06:20', '2018-05-22 16:06:20'),
(4, 'cash', '5300', '200', NULL, 2, 1, '2018-05-31 14:26:26', '2018-05-31 14:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requests_type_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requests_type_id`, `description`, `tenant_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Please give me some lunch', 1, 1, '2018-05-12 04:29:13', '2018-05-12 02:18:18'),
(4, 1, 'asdf asdf asdf asdf asd', 1, 0, '2018-05-21 16:21:11', '2018-05-21 16:21:11'),
(5, 2, 'this is very special request please proceed with it.\r\nthanks', 1, 0, '2018-05-21 16:27:35', '2018-05-21 16:27:35'),
(6, 4, 'Please clean my cloths as soon as possible.\r\nThanks', 1, 0, '2018-05-30 14:47:23', '2018-05-30 14:47:23'),
(7, 3, 'I need to change my current room. Please give me room A2', 1, 0, '2018-05-30 14:54:58', '2018-05-30 14:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `requests_type`
--

CREATE TABLE `requests_type` (
  `id` int(11) NOT NULL,
  `request_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests_type`
--

INSERT INTO `requests_type` (`id`, `request_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Regular Lunch', 'Order regular lunch', '2018-05-07 18:30:56', '0000-00-00 00:00:00'),
(2, 'Special Lunch', 'Order special lunch', '2018-05-07 18:30:56', '0000-00-00 00:00:00'),
(3, 'Room Change', 'Need to change the room.', '2018-05-30 19:25:36', '0000-00-00 00:00:00'),
(4, 'Laundry', 'Please clean my dresses', '2018-05-30 19:26:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strength` int(11) NOT NULL,
  `rent` decimal(10,0) NOT NULL,
  `room_category_id` int(10) UNSIGNED NOT NULL,
  `is_assigned` tinyint(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `number`, `description`, `strength`, `rent`, `room_category_id`, `is_assigned`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A1', '1234', 'some description', 2, '500', 1, 0, 1, 1, '2018-05-01 01:07:37', '2018-05-11 22:34:57'),
(2, 'A2', '2', 'some description', 4, '600', 1, 1, 1, 1, '2018-05-01 01:08:06', '2018-05-20 12:01:17'),
(5, 'B1', '3', 'some description', 3, '700', 2, 0, 1, 1, '2018-05-01 01:13:42', '2018-05-01 01:13:42'),
(6, 'B2', '4', 'Some description', 4, '800', 2, 0, 1, 1, '2018-05-01 01:17:42', '2018-05-01 01:17:42'),
(7, 'room abc 1n', '34', 'some desription asd asf asd asd asd f', 4, '500', 1, 0, 1, 1, '2018-05-09 13:49:27', '2018-05-09 14:28:14'),
(9, 'room abc', '35', 'some desription', 4, '500', 3, 1, 1, 1, '2018-05-09 13:50:15', '2018-05-20 12:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `tenant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`id`, `description`, `room_id`, `tenant_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'test', 2, 1, 1, 1, '2018-05-01 07:52:20', '2018-05-01 07:52:20'),
(3, 'tes', 1, 2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_bills`
--

CREATE TABLE `room_bills` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rent` decimal(10,0) NOT NULL,
  `utilities` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `description` text,
  `is_divide` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_bills`
--

INSERT INTO `room_bills` (`id`, `room_id`, `rent`, `utilities`, `total`, `discount`, `description`, `is_divide`, `created_at`, `updated_at`, `user_id`) VALUES
(49, 1, '500', '400', '880', '20', 'test', 1, '2018-05-22 21:05:55', '2018-05-22 16:05:55', 1),
(50, 1, '600', '800', '1300', '100', 'give them 100 rs discount.', 1, '2018-05-22 21:06:07', '2018-05-22 16:06:07', 1),
(51, 5, '700', '500', '1100', '100', NULL, 0, '2018-05-20 04:58:06', '2018-05-20 04:58:06', 1),
(52, 7, '500', '6000', '6300', '200', NULL, 0, '2018-05-20 04:59:30', '2018-05-20 04:59:30', 1),
(53, 6, '8000', '600', '8400', '200', 'some', 0, '2018-05-20 05:10:23', '2018-05-20 05:10:23', 1),
(54, 2, '600', '400', '1000', '0', 'some description', 1, '2018-05-20 15:38:07', '2018-05-20 10:38:07', 1),
(55, 1, '500', '5000', '5300', '200', 'tewsy dfgbdfg', 1, '2018-05-31 19:25:24', '2018-05-31 14:25:24', 1),
(56, 2, '600', '7000', '7600', '0', 'pay your dues', 1, '2018-06-02 11:00:07', '2018-06-02 06:00:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'this is test description for room category', 1, '2018-05-01 01:04:54', '2018-05-08 13:55:19'),
(2, 'B', 'this is test description for room category', 2, '2018-05-01 01:05:10', '2018-05-01 01:05:10'),
(3, 'test', 'this is test description for room category', 1, '2018-05-08 13:19:59', '2018-05-08 13:19:59'),
(4, 'ABC', 'this is test description for room category', 0, '2018-05-08 13:53:14', '2018-05-08 14:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `room_rent`
--

CREATE TABLE `room_rent` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rent_amount` float NOT NULL,
  `is_paid` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_rent`
--

INSERT INTO `room_rent` (`id`, `tenant_id`, `room_id`, `rent_amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 600, 0, '2018-05-16 18:45:47', '2018-05-16 18:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `hostel_name`, `country`, `state`, `city`, `address`, `meta_title`, `meta_description`, `owner_name`, `created_at`, `updated_at`) VALUES
(1, 'test11', '11111', 'test', 'trest', 'test', 'test', 'test', 'test11', '2018-05-26 08:23:28', '2018-05-26 03:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_allocation_status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `description`, `room_allocation_status`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Husnain11', 'husnain2info@gmail.com', '$2y$10$fHY5xoad/FtY8/x3ECjLAe/gj7f6Fbtbs0Ls2laeavf.9XzFWqd1S', '', '234234', 'some description here11111', 1, 1, 1, '2018-05-01 06:35:47', '2018-06-03 02:29:58'),
(2, 'Test', 'test@gmail.com', '$2y$10$fHY5xoad/FtY8/x3ECjLAe/gj7f6Fbtbs0Ls2laeavf.9XzFWqd1S', '', '234324', 'some description', 1, 1, 0, '2018-05-01 07:53:34', '2018-05-20 12:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_bills`
--

CREATE TABLE `tenant_bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_bills`
--

INSERT INTO `tenant_bills` (`id`, `tenant_id`, `room_id`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '880', 1, '2018-05-22 16:05:55', '2018-05-22 16:06:20'),
(4, 2, 1, '1300', 1, '2018-05-22 16:06:07', '2018-05-31 14:26:27'),
(5, 2, 1, '5300', 0, '2018-05-31 14:25:24', '2018-05-31 14:25:24'),
(6, 1, 2, '7600', 0, '2018-06-02 06:00:07', '2018-06-02 06:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `national_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Husnain1', 'husnain2info@gmail.com', '$2y$10$fHY5xoad/FtY8/x3ECjLAe/gj7f6Fbtbs0Ls2laeavf.9XzFWqd1S', '8787878787', '675675675765675765', 'LROyPBYkSI0tM8FzHr0shN85L4uVUkxK7r1D999qj05K2s5j3drbumstBjTe', '2018-05-01 01:03:52', '2018-06-02 03:00:20'),
(2, 'Arsalan', 'asdf@asdf.com', '$2y$10$vdZGsXNiRRWd5cWd9JeVFeX23c.UDDGZKNVgFmdt3MDj6q5wSryKK', '1234', '1234', NULL, '2018-05-26 15:15:37', '2018-05-26 17:29:50'),
(3, 'Husnain', 'test@gmail.com', '$2y$10$p45YqRbALALxs38n9kePaORdREtDL3FIzoKEMrdnCJWY0BXCNSL96', '2342423', '23423423', NULL, '2018-05-26 15:27:06', '2018-05-26 17:24:00'),
(4, 'test1', 'test1@gmail.com', '$2y$10$bEz7zSwn/4ymjKNc2NjiX.h99CX.GJTN4DyWxVS3bUxkfI9eCHPUq', '2345', '1234', NULL, '2018-05-26 15:33:36', '2018-05-26 15:33:36'),
(5, 'test1', 'test11@gmail.com', '$2y$10$WlPAEvpZxPSnJOLlVlFfpuRYLbKa88wXi7i4NsrPo1/wQNtIO1xh.', '2345', '1234', NULL, '2018-05-26 15:43:06', '2018-05-26 15:43:06'),
(6, 'test13', '33test11@gmail.com', '$2y$10$k/PtAJT.EuNDVI0Igsska.hARMFR5RCRnO7pyv1DTZPwIRafZax3.', '2345', '1234', NULL, '2018-05-26 16:00:17', '2018-05-26 16:00:17'),
(7, 'asdf;lkj', 'asdfasdf@asdf.com', '$2y$10$YrhkuNHyNpOtt7HYJYDnDecqOw7i6CYp7mGcu2EJZJqEmGhZ4lZz6', '123412341234', '213412341234', NULL, '2018-05-26 16:01:21', '2018-05-26 16:01:21'),
(8, 'Hello', 'hello@gmail.com', '$2y$10$yMPxXuA8nN6RN01ftqDBlusk4Z9K.toqDDGxsogaWoz6xc3mCCwr6', '12341234', '12341234', NULL, '2018-05-26 16:04:26', '2018-05-26 16:04:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inout`
--
ALTER TABLE `inout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inout_tenant_id_foreign` (`tenant_id`),
  ADD KEY `inout_user_id_foreign` (`user_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `requests_type`
--
ALTER TABLE `requests_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_number_unique` (`number`),
  ADD KEY `rooms_room_category_id_foreign` (`room_category_id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_allocation_room_id_foreign` (`room_id`),
  ADD KEY `room_allocation_tenant_id_foreign` (`tenant_id`),
  ADD KEY `room_allocation_user_id_foreign` (`user_id`);

--
-- Indexes for table `room_bills`
--
ALTER TABLE `room_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_rent`
--
ALTER TABLE `room_rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_email_unique` (`email`),
  ADD KEY `tenants_user_id_foreign` (`user_id`);

--
-- Indexes for table `tenant_bills`
--
ALTER TABLE `tenant_bills`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inout`
--
ALTER TABLE `inout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests_type`
--
ALTER TABLE `requests_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_allocation`
--
ALTER TABLE `room_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_bills`
--
ALTER TABLE `room_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_rent`
--
ALTER TABLE `room_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant_bills`
--
ALTER TABLE `tenant_bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inout`
--
ALTER TABLE `inout`
  ADD CONSTRAINT `inout_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `inout_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_category_id_foreign` FOREIGN KEY (`room_category_id`) REFERENCES `room_category` (`id`),
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD CONSTRAINT `room_allocation_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_allocation_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `room_allocation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
