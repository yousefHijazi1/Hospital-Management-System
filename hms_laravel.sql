-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 01:21 PM
-- Server version: 8.0.27
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General Health',
  `phone` int NOT NULL,
  `appointment-time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'List of countries without Coronavirus cases', 'blog_1.jpg', NULL, NULL),
(2, 'Recovery Room: News beyond the pandemic', 'blog_2.jpg', NULL, NULL),
(3, 'What is the impact of eating too mush sugar?', 'blog_4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', 'Login permission', 'I need your permission to login', '2023-12-14 09:19:08', '2023-12-14 09:19:08'),
(2, 'ali', 'Ali@pharmacist.com', 'change password', 'I forgot my password', '2023-12-15 09:29:06', '2023-12-15 09:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(3, 34, '10:00:00', '13:30:00', '2023-12-28 13:47:10', '2023-12-28 13:47:10'),
(4, 35, '11:00:00', '17:00:00', '2023-12-28 13:48:50', '2023-12-28 13:48:50'),
(5, 36, '10:00:00', '14:00:00', '2023-12-28 13:50:16', '2023-12-28 13:50:16'),
(6, 37, '09:00:00', '15:00:00', '2023-12-28 13:51:15', '2023-12-28 13:51:15'),
(7, 38, '08:00:00', '14:00:00', '2023-12-28 13:52:46', '2023-12-28 13:52:46'),
(9, 41, '15:14:00', '20:13:00', '2024-01-02 11:13:59', '2024-01-02 11:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General Health',
  `phone` int NOT NULL,
  `appointment-time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `name`, `email`, `birthDate`, `department`, `phone`, `appointment-time`, `message`, `price`, `created_at`, `updated_at`) VALUES
(1, 'test', 'admin@gmail.com', '2024-01-15', 'General Health', 81086955, '11:00:00', '123', 40, '2024-01-10 11:57:49', '2024-01-10 11:57:49'),
(2, 'mustafa', 'mustafa@gmail.com', '2024-01-11', 'General Health', 81086955, '08:00:00', NULL, 30, '2024-01-10 12:13:26', '2024-01-10 12:13:26'),
(3, 'samir', 'test@test.com', '2024-01-18', 'General Health', 81086955, '08:00:00', NULL, 30, '2024-01-10 12:13:32', '2024-01-10 12:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2023_12_13_115702_create_doctors_table', 3),
(7, '2023_12_13_125515_create_new_table', 4),
(8, '2023_12_13_125928_create_blogs_table', 5),
(9, '2023_12_13_134420_add_permission_to_user', 6),
(10, '2023_12_13_191836_create_appointments_table', 7),
(11, '2023_12_14_110101_create_contact_table', 8),
(12, '2023_12_14_114110_create_appointments_table', 9),
(13, '2023_12_21_130136_add_price_to_appointments', 10),
(14, '2023_12_22_123420_add_image_role_to_user', 11),
(15, '2023_12_22_133001_add_image_role_to_user', 12),
(16, '2023_12_28_120459_create_doctors_table', 13),
(17, '2023_12_28_131425_create_doctors_table', 14),
(18, '2023_12_28_133616_create_doctors_table', 15),
(19, '2024_01_10_132129_create_history_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `userType`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `permission`, `image`, `role`) VALUES
(38, 'ahmad', 'dental@gmail.com', 76692341, 'saida', 'user', NULL, '$2y$12$SfCPJgSpgJn5bUNPumRZKeoZ1dm0a9IGJ8BNFZxe3RwbP/0X8KA8K', NULL, NULL, NULL, NULL, '2023-12-28 13:52:46', '2023-12-28 14:10:31', 1, '20231228155246.jpg', 'dental'),
(6, 'yousef hijazi', 'yousef@admin.com', 81086955, 'saida', 'admin', NULL, '$2y$12$q468J9r2caiITFhGLEEglOHPZ7DMnkvVeOtxXFOYTcMXcxjFAwskS', NULL, NULL, NULL, NULL, '2023-12-12 11:16:38', '2023-12-26 14:16:53', 1, '20231225213652.jpg', 'admin'),
(36, 'ali', 'orthopaedics@gmail.com', 76983342, 'jezzine', 'user', NULL, '$2y$12$vcHYEZlVHWPFTAE7VDnR7.6cj1P9kUx9ojQQPn4rMSgeiP4ft7N0i', NULL, NULL, NULL, NULL, '2023-12-28 13:50:16', '2023-12-28 14:09:00', 1, '20231228155016.jpg', 'orthopaedics'),
(37, 'hasan', 'neurology@gmail.com', 3113566, 'tyre', 'user', NULL, '$2y$12$vjdt5Htwm2axvQCBxafxl.bIU0mjsx3/9mWUfEdBJgUEY3yEGjPdC', NULL, NULL, NULL, NULL, '2023-12-28 13:51:15', '2023-12-28 14:08:57', 1, '20231228155115.jpg', 'neurology'),
(35, 'samir', 'cardiology@gmail.com', 3887453, 'beirut', 'user', NULL, '$2y$12$xkwKUgf/L1tGFLnto4aBgOuFFLgPl7JiBIK3XkCoZjJ3BtI2/9aFS', NULL, NULL, NULL, NULL, '2023-12-28 13:48:50', '2023-12-28 14:08:53', 1, '20231228154850.jpg', 'cardiology'),
(34, 'jaafar', 'general@gmail.com', 70992453, 'tyre', 'user', NULL, '$2y$12$NNmRWEPPJqWZYjOwfp7oSuyTa7ar20xdyoRw7X.Z4hQh0tP.qzLI6', NULL, NULL, NULL, NULL, '2023-12-28 13:47:10', '2023-12-28 14:08:56', 1, '20231228154710.jpg', 'general health');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
