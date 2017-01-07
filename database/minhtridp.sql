-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 09:45 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minhtridp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `title`, `img_url`, `description`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Home banner 1', 'img_home_banner_1_1474958113.jpg', 'Dignissim eos culpa cumque beatae ', 1, 1, '2016-09-27 07:49:08', '2016-09-27 00:49:08'),
(3, 'Home banner 2', 'img_home_banner_2_1474958246.jpg', 'Mollis exercitation, blandit eligendi', 2, 1, '2016-09-26 23:37:26', '2016-09-26 23:37:26'),
(4, 'Home banner 3', 'img_home_banner_3_1474958267.jpg', 'Etiam nonummy dignissimos porta, vitae proin', 3, 1, '2016-09-26 23:37:47', '2016-09-26 23:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbs_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order_number` int(13) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `home_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`, `thumbs_img`, `status`, `order_number`, `description`, `home_description`, `created_at`, `updated_at`) VALUES
(1, 'Flyer & Leaflet', 'img_flyer_&_leaflet_1469345166.png', 'img_flyer_&_leaflet_1469345166-thumbs.jpg', 1, 0, '<p>Flyers are a blank canvas; you can communicate any message that promotes your business or event your way! Starting from &pound;9, flyers and leaflets from instantprint are the perfect way to connect with the world. Printed on high quality silk paper with 3 weight options: 150gsm Economy, 250gsm Premium or 350gsm Exclusive and six sizes from A3 to DL, there is a flyer or leaflet for every occasion. You can upload your own artwork of if you don&rsquo;t have it, choose a flyer design from our hundreds of free templates to personalise.</p>\r\n', 'Our flyers and leaflets are available on 150, 250 and 350gsm silk in a range of sizes from the portable A6 to the large A3.', '2016-07-24 00:26:06', '2016-07-24 01:18:04'),
(2, 'Brochure and Booklet ', 'img_brochure_and_booklet__1469349521.png', 'img_brochure_and_booklet__1469350709-thumbs.jpg', 1, 0, '<p>instantprint’s booklets are a compact and professional way to showcase your information and market your products or services. Perfect for magazines, programmes or catalogues, our brochure printing also has a fast turnaround to get to you when you need it. Choose from a variety of stocks and sizes available in either Stapled or Perfect Bound. </p>', 'Stapled or perfect bound booklets come in a range of sizes, available with thick laminated covers for a premium feel.', '2016-07-24 01:38:42', '2016-07-24 01:58:29'),
(3, 'Business Cards', 'img_business_cards_1469352024.png', 'img_business_cards_1469352024-thumbs.jpg', 1, 0, '<p>Make an impression that counts with our NEW range of business cards. You now have a selection of six business card categories to pick from including three different sizes. All of which have different strengths and qualities which enables you to find the perfect business card.&nbsp;</p>\r\n', 'With a selection of high quality stocks & finishes to choose from, we’re certain you’ll find the perfect business cards for you.', '2016-07-24 02:20:24', '2016-07-24 02:20:24'),
(4, 'Poster', 'img_poster_1469352092.png', 'img_poster_1469352092-thumbs.jpg', 1, 0, '<p>Make a poster that captivates attention with instantprint. Our posters are printed on 250gsm silk paper, 200mic or 400mic weatherproof PVC so you can create posters perfect for the office or to brave the outdoors. Our posters are available in A3, A2, A1, A0, 40x30 and 60x40 sizes to suit any promotional need. Simply upload your own design or personalise one of our free poster templates and we&rsquo;ll proof your work for free.&nbsp;&nbsp;</p>\r\n', 'Create an impact with our range of posters, available on 3 stocks including weather resistant PVC options for outdoor use.', '2016-07-24 02:21:32', '2016-07-24 02:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `groups_roles`
--

CREATE TABLE `groups_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups_roles`
--

INSERT INTO `groups_roles` (`id`, `group_id`, `role_id`, `created_at`, `updated_at`) VALUES
(103, 1, 54, '2016-07-10 23:46:38', '2016-07-10 23:46:38'),
(104, 1, 55, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(105, 1, 56, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(106, 1, 57, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(107, 1, 58, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(108, 1, 59, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(109, 1, 60, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(110, 1, 61, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(111, 1, 1, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(112, 1, 2, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(113, 1, 3, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(114, 1, 4, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(115, 1, 5, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(116, 1, 6, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(117, 1, 7, '2016-07-10 23:46:39', '2016-07-10 23:46:39'),
(118, 1, 8, '2016-07-10 23:46:39', '2016-07-10 23:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `specification` text NOT NULL,
  `description` text NOT NULL,
  `properties` varchar(1000) NOT NULL,
  `price` float DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `promotion` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Property hello', 'description', '2016-12-01 02:11:12', '2016-11-30 19:11:12'),
(3, 'Property hola', 'abcde', '2016-12-01 02:11:03', '2016-11-30 19:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `properties_details`
--

CREATE TABLE `properties_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties_details`
--

INSERT INTO `properties_details` (`id`, `name`, `description`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Detail 1', 'aaa', 3, '2016-11-30 07:02:05', '2016-11-30 00:02:05'),
(2, 'Detail 2', 'fafd', 2, '2016-11-30 09:56:06', '2016-11-30 02:56:06'),
(3, 'Detail 12', 'adsfdasf', 3, '2016-11-30 02:56:16', '2016-11-30 02:56:16'),
(4, 'Detail 22', 'kljfdksf', 2, '2016-11-30 02:56:22', '2016-11-30 02:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_customer` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`, `is_customer`, `status`) VALUES
(1, 'Admins', 'admin@admin.com', '', '$2y$10$Du7eTzeI3bOZnIwkryRQWuhRaASLtRxfQnapLFwTEZsZPgvWnqnG6', 1, 'WX4XvjQtpZaqHmlhNQEDN7X0ZxNJHl12dAOaCDY6PK8KdA4vajlCn2eUwimX', NULL, '2016-09-26 23:13:54', 0, 1),
(4, 'Customer03', 'customer03@customer03.com', NULL, '$2y$10$Du7eTzeI3bOZnIwkryRQWuhRaASLtRxfQnapLFwTEZsZPgvWnqnG6', 2, NULL, NULL, NULL, 1, 1),
(5, 'Phat Le', 'phat.lt@phat.com', '0933224101', '$2y$10$Du7eTzeI3bOZnIwkryRQWuhRaASLtRxfQnapLFwTEZsZPgvWnqnG6', 1, NULL, '2016-06-24 06:59:55', '2016-07-23 22:59:13', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', NULL, '2016-07-23 23:02:05'),
(2, 'Customer', NULL, NULL, NULL),
(3, 'Super Customer', NULL, NULL, NULL),
(4, 'Super Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_parent` int(11) DEFAULT NULL,
  `role_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `code`, `note`, `role_parent`, `role_group`, `created_at`, `updated_at`) VALUES
(1, 'viewUsersList', NULL, NULL, 'user', NULL, NULL),
(2, 'addUser', NULL, NULL, 'user', NULL, NULL),
(3, 'editUser', NULL, NULL, 'user', NULL, NULL),
(4, 'deleteUser', NULL, NULL, 'user', NULL, NULL),
(5, 'viewUserGroupList', NULL, NULL, 'user', NULL, NULL),
(6, 'addUserGroup', NULL, NULL, 'user', NULL, NULL),
(7, 'editUserGroup', NULL, NULL, 'user', NULL, NULL),
(8, 'deleteUserGroup', NULL, NULL, 'user', NULL, NULL),
(54, 'viewCategoryList', NULL, NULL, 'category', NULL, NULL),
(55, 'addCategory', NULL, NULL, 'category', NULL, NULL),
(56, 'editCategory', NULL, NULL, 'category', NULL, NULL),
(57, 'deleteCategory', NULL, NULL, 'category', NULL, NULL),
(58, 'viewImageList', NULL, NULL, 'image', NULL, NULL),
(59, 'addImage', NULL, NULL, 'image', NULL, NULL),
(60, 'editImage', NULL, NULL, 'image', NULL, NULL),
(61, 'deleteImage', NULL, NULL, 'image', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_roles`
--
ALTER TABLE `groups_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_details`
--
ALTER TABLE `properties_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_roles_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups_roles`
--
ALTER TABLE `groups_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `properties_details`
--
ALTER TABLE `properties_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
