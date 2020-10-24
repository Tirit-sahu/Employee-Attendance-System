-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 03:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_attendances`
--

CREATE TABLE `apply_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_attendances`
--

INSERT INTO `apply_attendances` (`id`, `employee_id`, `date`, `attendance`, `created_at`, `updated_at`) VALUES
(1, 3, '2020-10-20', 'H', NULL, NULL),
(2, 5, '2020-10-20', 'H', NULL, NULL),
(3, 6, '2020-10-20', 'H', NULL, NULL),
(4, 7, '2020-10-20', 'H', NULL, NULL),
(5, 8, '2020-10-20', 'H', NULL, NULL),
(6, 9, '2020-10-20', 'H', NULL, NULL),
(7, 10, '2020-10-20', 'H', NULL, NULL),
(8, 11, '2020-10-20', 'H', NULL, NULL),
(9, 12, '2020-10-20', 'H', NULL, NULL),
(10, 13, '2020-10-20', 'H', NULL, NULL),
(11, 14, '2020-10-20', 'H', NULL, NULL),
(12, 15, '2020-10-20', 'H', NULL, NULL),
(13, 16, '2020-10-20', 'H', NULL, NULL),
(14, 17, '2020-10-20', 'H', NULL, NULL),
(15, 18, '2020-10-20', 'H', NULL, NULL),
(16, 19, '2020-10-20', 'H', NULL, NULL),
(17, 20, '2020-10-20', 'H', NULL, NULL),
(18, 21, '2020-10-20', 'H', NULL, NULL),
(19, 22, '2020-10-20', 'H', NULL, NULL),
(20, 23, '2020-10-20', 'H', NULL, NULL),
(21, 24, '2020-10-20', 'H', NULL, NULL),
(22, 24, '2020-10-21', 'P', NULL, NULL),
(23, 23, '2020-10-21', 'P', NULL, NULL),
(24, 22, '2020-10-21', 'P', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fullName`, `father`, `mobile`, `position`, `photo`, `address`, `created_at`, `updated_at`) VALUES
(3, 'Fr OSCAR TOPOO', '', '9893775770', '1', 'employees/employee.jpg', 'MISSION KUTELA', '2019-11-04 09:51:20', '2019-11-04 09:51:20'),
(5, 'VINOD KUMAR CHOUHAN', 'MEHATTAR LAL CHOUHAN', '7999061118', '8', 'employees/20191106050323.jpeg', 'SARAIPALI', '2019-11-06 12:03:23', '2019-11-18 14:06:35'),
(6, 'UMESH KUMAR NAYAK', 'HAREKRISHANA NAYAK', '9669224355', '5', 'employees/employee.jpg', 'KEJUWAN', '2019-11-06 12:57:40', '2019-11-06 12:57:40'),
(7, 'SUNIL KUMAR PATEL', 'MOTILAL PATEL', '9644666003', '9', 'employees/employee.jpg', 'BASTISARAIPALI', '2019-11-06 14:31:41', '2019-11-06 14:31:41'),
(8, 'PARTIMA YADAV', 'GOPILAL YADAV', '7089032726', '5', 'employees/employee.jpg', 'JHILMILA', '2019-11-08 11:30:03', '2019-11-08 11:30:03'),
(9, 'NIRMALA BARIK', 'TULSI PRASAD BARIK', '7587118667', '5', 'employees/employee.jpg', 'PP ROAD JOGNIPALI', '2019-11-08 11:31:20', '2019-11-08 11:31:20'),
(10, 'VIKASH DAS', 'MOTIYASH DAS', '7999348033', '3', 'employees/employee.jpg', 'NAYAGOWN', '2019-11-09 09:32:30', '2019-11-09 09:33:45'),
(11, 'JITENDRA PRADHAN', 'USATLAL PRADHAN', '9340181600', '8', 'employees/employee.jpg', 'SEMLIYA', '2019-11-09 10:12:26', '2019-11-09 10:12:26'),
(12, 'NARESH SAGAR', 'R SAGAR', '9754808027', '7', 'employees/employee.jpg', 'KUTELA MISSION', '2019-11-14 11:05:28', '2019-11-14 11:05:28'),
(13, 'NARENDRA PRADHAN', 'MUKTESHVAR PRADHAN', '9907878759', '9', 'employees/employee.jpg', 'BHUTHIYA', '2019-11-18 11:37:29', '2019-11-18 11:37:29'),
(14, 'JIVAN LAL TANDI', 'PURANDAR TANDI', '9174687995', '5', 'employees/employee.jpg', 'TENGNAPALI', '2019-11-19 12:08:21', '2019-11-19 12:08:21'),
(15, 'SUNIL KUMAR SAHU', 'JATIYA SAHU', '9691057711', '9', 'employees/employee.jpg', 'BHUTIYA', '2019-11-29 13:17:02', '2019-11-29 13:17:02'),
(16, 'UGRESAN LOHA', 'MAGAL DAS LOHA', '6265796192', '5', 'employees/employee.jpg', 'SAMDARHA', '2019-12-09 09:25:01', '2019-12-09 09:25:01'),
(17, 'ANSHU KUMARI XESS', 'ALFONES XESS', '9907307768', '5', 'employees/employee.jpg', 'MISSION KUTELA', '2020-02-08 12:55:46', '2020-02-08 12:55:46'),
(18, 'RAJMANI TOPPO', 'DEVNISH TOPPO', '7067498798', '3', 'employees/employee.jpg', 'MISSION KUTELA', '2020-02-08 12:57:11', '2020-02-08 12:57:11'),
(19, 'RINKI PRADHAN', 'HARSH PRADHAN', '9399070302', '5', 'employees/employee.jpg', 'ARTUNDA', '2020-02-11 14:37:39', '2020-02-11 14:37:39'),
(20, 'GANESH SAHU', 'SANTOSH SAHU', '7974443219', '9', 'employees/employee.jpg', 'BHUTHIYA', '2020-02-11 14:38:50', '2020-02-11 14:38:50'),
(21, 'BIRANCHI SAHU', 'MADHAYM SAHU', '8319004619', '3', 'employees/employee.jpg', 'KHAIRJHITKI', '2020-03-19 11:22:20', '2020-03-19 11:22:20'),
(22, 'KAILASH NAND', 'BHUBNESHWAR NAND', '9926942440', '5', 'employees/employee.jpg', 'JHILMILA SARAIPALI', '2020-03-19 11:23:10', '2020-03-19 11:23:10'),
(23, 'AVINASH NAND', 'ISTIFAN NAND', '9691747077', '14', 'employees/employee.jpg', 'ICHHAPUR', '2020-03-19 11:29:36', '2020-03-19 11:29:36'),
(24, 'KAVI SAHU', 'ABC', '8989809898', '2', 'employees/20201021080826.jpeg', 'RAIPUR', '2020-10-21 02:38:26', '2020-10-21 03:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PRINCIPAL', '2019-10-30 08:43:15', '0000-00-00 00:00:00'),
(2, 'HEAD MASTER', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(3, 'ASSISTENCE  CLERK', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(4, 'ACCOUNTENT', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(5, 'ASSISTENCE  TEACHER', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(6, 'PTI', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(7, 'LAB. ASSISTENCE', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(8, 'COMPUTER OPRETOR', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(9, 'LECTURER', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(10, 'UDT', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(11, 'COMPUTER  TEACHER', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(12, 'LIBERIAN', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(13, 'PEON', '2019-10-30 12:30:56', '0000-00-00 00:00:00'),
(14, 'DRIVER', '2020-03-19 04:27:36', '0000-00-00 00:00:00'),
(15, 'CONDUCTOR', '2020-03-19 04:27:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '1=Admin, 0=User',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Activate, 1=DeActivate',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `photo`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'VINOD KUMAR CHOUHAN', 1, 'users/20191006075043.jpg', '7999061118', 'vchouhan93@gmail.com', NULL, '$2y$10$wJ3K5BrI0f6ppwv7qvim6OCDysUphZTTe48/HHGv6vQGVO0WbxHcq', 0, NULL, NULL, '2019-08-07 09:40:17', '2019-11-22 13:34:08'),
(3, 'Tirit sahu', 1, 'users/20191101065431.jpg', '9303232961', 'tirit@gmail.com', NULL, '$2y$10$yugFh41mLt13o9sqqcPgqO6.bkvq/eOTKf86MpbEwkMZJz9QUHVlW', 0, NULL, NULL, '2019-09-28 13:30:34', '2020-02-15 04:37:54'),
(4, 'JITENDRA PRADHAN', 0, NULL, '9340181600', 'jeetupradhan@gimal.com', NULL, '$2y$10$sBxLwgq7YnLW9.dJlCI1neZgQUyt/iXcBXy5GycBggxLyhao9bvea', 1, NULL, NULL, '2020-01-02 14:15:32', '2020-01-08 10:03:42'),
(5, 'JITENDRA PRADHAN', 0, NULL, '9340181600', 'jeetupradhan@gmail.com', NULL, '$2y$10$FtByzyShgfcpz8k6zpqjguIHL6Er2X4u9IZbTL/GQ5OBVQmZQV79G', 1, NULL, NULL, '2020-01-08 10:04:14', '2020-02-22 10:22:17'),
(6, 'RINKI PRADAHN', 0, NULL, '9399070302', 'rinki12@gmail.com', NULL, '$2y$10$jYsH70JT2RoOVyc0Iay5MumUUKryggxlHy8BbEZ8Y5z8MYcvCdaeu', 1, NULL, NULL, '2020-02-10 13:49:19', '2020-02-22 10:13:06'),
(7, 'UMESH NAYAK', 0, NULL, '9669224355', 'umeshnayak30@gmail.com', NULL, '$2y$10$.sVGiVjgRU.luiM7FZ.Axu/TEo2wS1evmFo4ebo8Bb5tpc2nQP0sy', 0, NULL, NULL, '2020-02-10 13:50:46', '2020-02-22 12:01:14'),
(8, 'jeetu', 1, NULL, '9340181600', 'pradhanjeetu1990@gmail.com', NULL, '$2y$10$QcXysRuuV4OX8M1BCM2RX.ahXYJSpCJ0FGI7WGUnchKjyvU1tS8by', 0, NULL, NULL, '2020-02-22 10:23:13', '2020-08-27 11:58:21'),
(9, 'Fr OSCAR TOPOO', 1, NULL, '9893775770', 'oscar@gmail.com', NULL, '$2y$10$csGsvTlaJHiZxrWfry81kOcZyjM.YjthOZE1HEZ9.dNrTN9ej5.ay', 0, NULL, NULL, '2020-02-25 10:39:32', '2020-02-25 10:43:14'),
(10, 'Fr OSCAR TOPOO', 1, NULL, '9893775770', 'oscar.toppo6@gmail.com', NULL, '$2y$10$flv9OiBa.kJMjOpAUsbwkOXf4k7CRP35RX9zBU1isfMa.4Ih9nsh6', 0, NULL, NULL, '2020-02-25 10:46:24', '2020-02-25 10:46:24'),
(11, 'Weston Metz', 0, NULL, NULL, 'pagac.gaetano@example.net', '2020-08-27 12:32:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '1wzDJXucLy', NULL, '2020-08-27 12:32:08', '2020-08-27 12:32:08'),
(12, 'kavi', 0, NULL, '9879908089', 'kavi@gmail.com', NULL, '$2y$10$DVjIDSUo0MH85Vy2Pg881eOR4gxsUB5fP6bxuo6EMDoBDl/uWHQMO', 0, NULL, NULL, '2020-10-18 05:59:48', '2020-10-18 05:59:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_attendances`
--
ALTER TABLE `apply_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
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
-- AUTO_INCREMENT for table `apply_attendances`
--
ALTER TABLE `apply_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
