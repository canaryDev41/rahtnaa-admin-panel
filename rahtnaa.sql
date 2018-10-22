-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 08:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` text,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `category`, `image`, `status`) VALUES
(1, 'بيقن', 'حنانة', 'bgn.jpeg', 1),
(2, 'نشادر', 'حنانة', 'nshdr.jpeg', 1),
(3, 'مناسبات', 'طباخة', '	mnsbat.jpeg', 1),
(4, 'بيتك', 'طباخة', '	btk.jpeg', 1),
(5, 'باقة المناسبات', 'عاملة منزلية', 'cln_mnsbat.jpeg', 1),
(6, 'الباقة الاساسية', 'عاملة منزلية', 'cln_basic.jpeg', 1),
(7, 'الباقة الاقتصادية', 'عاملة منزلية', 'cln_eg.jpeg', 1),
(8, 'الباقة الخاصة', 'مكياج منزلي', 'mkg_prv.jpeg', 1),
(9, 'مخبوزات', 'طباخة', 'kak.jpeg', 1),
(10, 'معجنات', 'طباخة', 'mgnt.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `worker_id` bigint(20) DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `total` double NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `job` text NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `tasks` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `worker_id`, `client_id`, `total`, `lat`, `lng`, `job`, `start_date`, `end_date`, `tasks`, `status`, `created_at`, `updated_at`) VALUES
(25, 1, 8, 120, 0, 0, 'بيقن', '2018-08-23 11:09:00', '2018-09-23 23:17:12', '[{\"id\":61,\"name\":\"شكل وسط\",\"measure\":\"شخص\",\"job\":\"بيقن\",\"price\":120,\"quantity\":1}]', 2, '2018-09-23 21:09:28', '2018-09-23 21:17:12'),
(26, 201, 3, 200, 0, 0, 'بيقن', '2018-10-07 07:41:00', '2018-10-10 21:42:23', '[{\"id\":60,\"name\":\"برواز\",\"measure\":\"شخص\",\"job\":\"بيقن\",\"price\":100,\"quantity\":2}]', 2, '2018-10-07 05:41:12', '2018-10-10 19:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `worker_id` bigint(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `bank_name` text,
  `account` text,
  `amount` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating_orders`
--

CREATE TABLE `rating_orders` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `worker_id` bigint(20) DEFAULT NULL,
  `rating` float NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating_orders`
--

INSERT INTO `rating_orders` (`id`, `order_id`, `worker_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 4, 'لا تعليق ', 1, '2018-09-17 06:28:16', '2018-09-17 06:28:16'),
(2, 16, 1, 4, 'No problem ', 1, '2018-09-22 09:37:46', '2018-09-22 09:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `measure` varchar(100) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `price`, `measure`, `job_id`, `status`) VALUES
(3, 'حلة طبخ', 40, 'كيلو', 4, 1),
(4, 'صلطات', 17, 'صنف', 4, 1),
(5, 'فطائر', 50, 'كيلو', 4, 1),
(6, 'المحاشي', 50, 'كيلو', 4, 1),
(7, 'الغرفة', 40, 'غرفة', 5, 1),
(8, 'الصالة', 45, 'صالة', 5, 1),
(9, 'الصالون', 45, 'صالون', 5, 1),
(10, 'الحمام', 40, 'حمام', 5, 1),
(11, 'المطبخ', 95, 'مطبخ', 5, 1),
(12, 'حوش', 75, 'حوش', 5, 1),
(13, 'السلم', 15, 'سلم', 5, 1),
(14, 'ملحقات', 20, 'العدد', 5, 1),
(15, 'سطوح', 40, 'العدد', 5, 1),
(16, 'حديقة', 75, 'العدد', 5, 1),
(17, 'غسيل', 20, 'دستة', 5, 1),
(18, 'مكوة', 20, 'دستة', 5, 1),
(19, 'الغرفة', 30, 'غرفة', 6, 1),
(20, 'الصالة', 35, 'صالة', 6, 1),
(21, 'الصالون', 36, 'صالون', 6, 1),
(22, 'الحمام', 20, 'صالون', 6, 1),
(23, 'المطبخ', 45, 'مطبخ', 6, 1),
(24, 'الحوش', 75, 'حوش', 6, 1),
(25, 'السلم', 10, 'سلم', 6, 1),
(26, 'ملحقات', 20, 'العدد', 6, 1),
(27, 'سطوح', 40, 'العدد', 6, 1),
(28, 'حديقة', 75, 'العدد', 6, 1),
(29, 'غسيل', 20, 'دستة', 6, 1),
(30, 'مكوة', 20, 'دستة', 6, 1),
(31, 'الغرفة', 35, 'غرفة', 7, 1),
(32, 'الصالة', 35, 'صالة', 7, 1),
(33, 'الغرفة', 30, 'غرفة', 7, 1),
(34, 'الصالة', 35, 'صالة', 7, 1),
(35, 'الغرفة', 30, 'غرفة', 7, 1),
(36, 'الصالة', 35, 'صالة', 7, 1),
(37, 'الصالون', 36, 'صالون', 7, 1),
(38, 'الحمام', 25, 'حمام', 7, 1),
(39, 'المطبخ', 80, 'مطبخ', 7, 1),
(40, 'الحوش', 60, 'حوش', 7, 1),
(41, 'السلم', 10, 'سلم', 7, 1),
(42, 'ملحقات', 20, 'العدد', 7, 1),
(43, 'الحديقة', 20, 'حديقة', 7, 1),
(44, 'غسيل', 20, 'دستة', 7, 1),
(45, 'مكوة', 20, 'دستة', 7, 1),
(46, 'ميكب عادي', 250, '', 8, 1),
(47, 'الشبائن', 300, '', 8, 1),
(48, 'مكياج كامل', 300, 'شخص', 8, 1),
(49, 'حلاوة', 150, 'شخص', 8, 1),
(50, 'عروكة', 160, '', 8, 1),
(51, 'عروكة عروس', 220, '', 8, 1),
(52, 'مكياج عروس', 700, '', 8, 1),
(53, 'استشوار', 100, 'شخص', 8, 1),
(54, 'مكياج و استشوار', 170, 'شخص', 8, 1),
(55, 'صبغة', 90, 'شخص', 8, 1),
(56, 'كوكتيل صحن كبير', 80, 'صحن', 3, 1),
(57, 'كوكتيل صح وسط \r\n', 60, 'صحن', 3, 1),
(58, 'كوكتيل صحن صغير', 40, 'صحن', 3, 1),
(59, 'موائد عدد واحد خروف', 1800, '', 3, 1),
(60, 'برواز', 100, 'شخص', 1, 1),
(61, 'شكل وسط', 120, 'شخص', 1, 1),
(62, 'شكل فوق الوسط', 160, 'شخص', 1, 1),
(63, 'شكل اعلى من الوسط', 200, 'شخص', 1, 1),
(64, 'حنة عادي سادة بالصبغة', 60, 'شخص', 1, 1),
(65, 'سادة', 60, 'شخص', 2, 1),
(66, 'شكل وسط', 120, 'شخص', 2, 1),
(67, 'شكل عالي', 190, 'شخص', 2, 1),
(68, 'بيتي فور', 50, 'كيلو', 9, 1),
(69, 'الكعك', 50, 'كيلو', 9, 1),
(70, 'الاشكال', 50, 'كيلو', 9, 1),
(71, 'الغريبة', 50, 'كيلو', 9, 1),
(72, 'البسكويت', 59, 'كيلو', 9, 1),
(73, 'الكعك انواع', 50, 'كيلو', 9, 1),
(74, 'المعمول', 50, 'كيلو', 9, 1),
(75, 'المنين', 50, 'كيلو', 9, 1),
(76, 'اليانسون', 50, 'كيلو', 9, 1),
(77, 'الدراي كيك', 50, 'كيلو', 9, 1),
(78, 'الفطيرة', 50, 'كيلو', 9, 1),
(79, 'عمه ترباس', 50, 'كيلو', 9, 1),
(80, 'المشبك', 50, 'كيلو', 9, 1),
(81, 'القرقوش', 50, 'كيلو', 9, 1),
(82, 'كرواسون', 50, 'كيلو', 9, 1),
(83, 'البيتزا', 50, 'كيلو', 10, 1),
(84, 'السامبوكسة', 50, 'كيلو', 10, 1),
(85, 'فطاير', 50, 'كيلو', 10, 1),
(86, 'زلابية', 50, 'كيلو', 10, 1),
(87, 'الحلويات', 50, 'كيلو', 10, 1),
(88, 'البسبوسة', 50, 'كيلو', 10, 1),
(89, 'بلح الشام', 50, 'كيلو', 10, 1),
(90, 'الكيك وانواعه', 50, 'كيلو', 10, 1),
(91, 'كنافة', 50, 'كيلو', 10, 1),
(92, 'البسيمة', 50, 'كيلو', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `image` text,
  `type` varchar(10) NOT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `city`, `phone`, `email`, `password`, `image`, `type`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test newe', 'الخرطوم', '0912345678', '', '123', 'image-1537215393673.png', 'w', 4, 1, '2018-08-08 05:48:21', '2018-08-08 05:48:21'),
(2, 'test2', 'الخرطوم', '0123456789', '', '123', '', 'w', 0, 1, '2018-08-08 06:01:43', '2018-08-08 06:01:43'),
(3, 'Normal User', 'الخرطوم', '0911223344', NULL, '123', 'image-1537164759295.png', 'u', 0, 1, '2018-08-28 04:05:52', '2018-08-28 04:05:52'),
(8, 'علي أحمد', 'امدرمان', '0900000000', NULL, '123', 'image-1536868447203.png', 'u', 0, 1, '2018-09-05 04:55:43', '2018-09-05 04:55:43'),
(9, 'علي عباس', 'امدرمان', '0900000001', NULL, '123', 'image-1536868447203.png', 'u', 0, 0, '2018-09-05 04:55:43', '2018-10-08 04:41:19'),
(10, 'Test Test', 'الخرطوم', '0911111111', NULL, '123', '', 'u', 0, 1, '2018-09-22 21:55:52', '2018-09-22 21:55:52'),
(11, 'Aaa Waa', 'الخرطوم', '0999999999', NULL, '123', 'image-1537654821399.png', 'w', 1, 1, '2018-09-22 22:20:15', '2018-09-22 22:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_place`
--

CREATE TABLE `user_place` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_place`
--

INSERT INTO `user_place` (`id`, `user_id`, `lat`, `lng`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 15.5390333, 32.5262633, 1, '2018-09-09 15:36:39', '2018-09-15 13:38:27'),
(2, 8, 15.6226449, 32.468838, 1, '2018-09-09 15:36:39', '2018-09-09 16:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `national_id_image` text NOT NULL,
  `work_status` varchar(10) NOT NULL DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `user_id`, `national_id_image`, `work_status`, `created_at`, `updated_at`) VALUES
(3, 2, 'document-1535831508638.png', 'online', '2018-09-01 19:51:48', '2018-09-15 13:19:41'),
(190, 1, 'document-3432353.png', 'online', '2018-10-08 05:33:10', '2018-10-08 05:33:10'),
(191, 11, 'document-3432353.png', 'online', '2018-10-08 05:33:10', '2018-10-08 05:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `worker_gallery`
--

CREATE TABLE `worker_gallery` (
  `id` bigint(20) NOT NULL,
  `worker_id` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `job` text NOT NULL,
  `job_id` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_gallery`
--

INSERT INTO `worker_gallery` (`id`, `worker_id`, `image`, `job`, `job_id`, `status`) VALUES
(1, 1, 'gallery-1536330387047.png', 'بيقن', 1, 0),
(2, 1, 'gallery-1536419472395.png', 'بيقن', 1, 0),
(3, 1, 'gallery-1537016237880.png', 'بيقن', 1, 1),
(4, 1, 'gallery-1537215351260.png', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worker_job`
--

CREATE TABLE `worker_job` (
  `id` bigint(20) NOT NULL,
  `worker_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_job`
--

INSERT INTO `worker_job` (`id`, `worker_id`, `job_id`) VALUES
(1, 1, 1),
(4, 10, 2),
(6, 2, 1),
(7, 11, 1),
(8, 173, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worker_tax`
--

CREATE TABLE `worker_tax` (
  `worker_id` bigint(20) NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_tax`
--

INSERT INTO `worker_tax` (`worker_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 300, '2018-09-23 20:01:55', '2018-09-23 21:17:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_orders`
--
ALTER TABLE `rating_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_place`
--
ALTER TABLE `user_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_gallery`
--
ALTER TABLE `worker_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_job`
--
ALTER TABLE `worker_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_tax`
--
ALTER TABLE `worker_tax`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_orders`
--
ALTER TABLE `rating_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `user_place`
--
ALTER TABLE `user_place`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `worker_gallery`
--
ALTER TABLE `worker_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `worker_job`
--
ALTER TABLE `worker_job`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `worker_tax`
--
ALTER TABLE `worker_tax`
  MODIFY `worker_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
