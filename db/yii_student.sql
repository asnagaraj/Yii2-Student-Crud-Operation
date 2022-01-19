-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2022 at 03:10 PM
-- Server version: 8.0.26-16
-- PHP Version: 7.3.33-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'India'),
(3, 'UK'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `d_state_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `d_state_id`) VALUES
(1, 'Virudhunagar', 1),
(2, 'Tenkasi', 1),
(3, 'Kottayam', 2),
(4, 'Thiruvananthapuram', 2),
(5, 'Tuticurin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int NOT NULL,
  `tamil` int DEFAULT NULL,
  `english` int DEFAULT NULL,
  `maths` int DEFAULT NULL,
  `science` int DEFAULT NULL,
  `social` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1642524411),
('m130524_201442_init', 1642524506),
('m190124_110200_add_verification_token_column_to_user_table', 1642524512),
('m220118_164201_create_student_table', 1642524514),
('m220118_165057_create_country_table', 1642525350),
('m220118_165137_create_state_table', 1642526707),
('m220118_165149_create_district_table', 1642526709),
('m220118_165159_create_taluk_table', 1642525355),
('m220118_170049_create_schoolclass_table', 1642525356),
('m220118_170923_create_products_table', 1642526143),
('m220118_171516_create_category_table', 1642526145),
('m220118_171726_create_mark_table', 1642526349);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `product_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolclass`
--

CREATE TABLE `schoolclass` (
  `id` int NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schoolclass`
--

INSERT INTO `schoolclass` (`id`, `class_name`) VALUES
(5, 'B.Sc'),
(2, 'B.Tech'),
(4, 'BCA'),
(1, 'BE'),
(3, 'MCA'),
(6, 'XII-A'),
(7, 'XII-B');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state_name`, `country_id`) VALUES
(1, 'Tamilnadu', 1),
(2, 'Kerala', 1),
(3, 'Andra', 1),
(4, 'Washingdon', 2),
(5, 'California', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `schoolclass_id` int DEFAULT NULL,
  `s_roll_number` int DEFAULT NULL,
  `s_address` varchar(255) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `taluk_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `s_name`, `schoolclass_id`, `s_roll_number`, `s_address`, `country_id`, `state_id`, `district_id`, `taluk_id`) VALUES
(1, 'Manikandan', 1, 1234, 'No.43/6,north st,udangudi.', 1, 1, 5, 3),
(2, 'Muniyaraja', 3, 1235, '211,Mela mariamman kovil street,South Devathanam', 1, 1, 1, 1),
(4, 'Kaliraj', 1, 3235, 'Choolaimedu', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taluk`
--

CREATE TABLE `taluk` (
  `id` int NOT NULL,
  `taluk_name` varchar(255) NOT NULL,
  `t_district_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taluk`
--

INSERT INTO `taluk` (`id`, `taluk_name`, `t_district_id`) VALUES
(1, 'Rajapalayam', 1),
(2, 'Srivilliputhur', 1),
(3, 'Thiruchendur', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'manikandan', 'wBhzSBPBHvtLkRQYJ5uIwncactgNG-Fm', '$2y$13$i5KWWeORg2oGyKETL7n6qe5hsfbY9AWLQlyV/zOKpBnJHK6/fh5Me', NULL, 'gmanikandan845@gmail.com', 10, 1642526794, 1642526794, 'HRiJc3laYPYe2BnQxmT8XKcXEZ_Rs53O_1642526794'),
(2, 'Munish', 'E0q_sn0aIhZJHfHJpkniD6VhFKJKLIzn', '$2y$13$MVfsqF0tNjpCqekh0tPfAuZAYqg4USCwReR9fcTiSw1zTVQ4XPoCK', NULL, 'munish@gmail.com', 10, 1642581779, 1642581779, 'b-vtvOBbCESptW3Lfmsco4Vc4M03DWGA_1642581779');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_name` (`district_name`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `schoolclass`
--
ALTER TABLE `schoolclass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_name` (`state_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_name` (`s_name`),
  ADD UNIQUE KEY `s_roll_number` (`s_roll_number`);

--
-- Indexes for table `taluk`
--
ALTER TABLE `taluk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taluk_name` (`taluk_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolclass`
--
ALTER TABLE `schoolclass`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taluk`
--
ALTER TABLE `taluk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
