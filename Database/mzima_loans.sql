-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 04:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mzima_loans`
--

-- --------------------------------------------------------

--
-- Table structure for table `account__details`
--

CREATE TABLE `account__details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `last_withdrawn` date DEFAULT NULL,
  `last_deposited` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account__details`
--

INSERT INTO `account__details` (`id`, `total_amount`, `last_withdrawn`, `last_deposited`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 34000, NULL, NULL, 8, NULL, NULL),
(1, 34000, NULL, NULL, 1, NULL, NULL),
(2, 560000, NULL, NULL, 2, NULL, NULL),
(3, 5000, NULL, NULL, 7, NULL, NULL),
(4, 70000, NULL, NULL, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantors`
--

CREATE TABLE `guarantors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guarantor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `tracking_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guarantors`
--

INSERT INTO `guarantors` (`id`, `guarantor_id`, `user_id`, `approved`, `tracking_number`, `loan_id`, `created_at`, `updated_at`) VALUES
(16, 8, 2, 0, '', 0, '2021-02-02 10:19:26', '2021-02-02 10:19:26'),
(17, 1, 2, 0, '', 0, '2021-02-02 10:26:28', '2021-02-02 10:26:28'),
(18, 7, 2, 0, '', 0, '2021-02-02 10:26:28', '2021-02-02 10:26:28'),
(19, 8, 2, 0, '', 0, '2021-02-02 10:26:28', '2021-02-02 10:26:28'),
(20, 1, 2, 0, '', 0, '2021-02-02 10:43:00', '2021-02-02 10:43:00'),
(21, 7, 2, 0, '', 0, '2021-02-02 10:43:00', '2021-02-02 10:43:00'),
(22, 8, 2, 0, '', 0, '2021-02-02 10:43:00', '2021-02-02 10:43:00'),
(23, 1, 2, 0, '', 0, '2021-02-02 12:27:54', '2021-02-02 12:27:54'),
(24, 7, 2, 0, '', 0, '2021-02-02 12:27:54', '2021-02-02 12:27:54'),
(25, 8, 2, 0, '', 0, '2021-02-02 12:27:54', '2021-02-02 12:27:54'),
(26, 2, 2, 0, '1612828028', 0, '2021-02-08 20:47:08', '2021-02-08 20:47:08'),
(27, 7, 2, 0, '1612828028', 0, '2021-02-08 20:47:08', '2021-02-08 20:47:08'),
(28, 8, 2, 0, '1612828028', 0, '2021-02-08 20:47:08', '2021-02-08 20:47:08'),
(29, 2, 2, 0, '1612828105', 0, '2021-02-08 20:48:25', '2021-02-08 20:48:25'),
(30, 7, 2, 0, '1612828105', 0, '2021-02-08 20:48:25', '2021-02-08 20:48:25'),
(31, 8, 2, 0, '1612828105', 0, '2021-02-08 20:48:25', '2021-02-08 20:48:25'),
(32, 2, 2, 0, '1612828128', 0, '2021-02-08 20:48:48', '2021-02-08 20:48:48'),
(33, 7, 2, 0, '1612828128', 0, '2021-02-08 20:48:48', '2021-02-08 20:48:48'),
(34, 8, 2, 0, '1612828128', 0, '2021-02-08 20:48:48', '2021-02-08 20:48:48'),
(35, 2, 2, 0, '1612828328', 0, '2021-02-08 20:52:08', '2021-02-08 20:52:08'),
(36, 7, 2, 0, '1612828328', 0, '2021-02-08 20:52:08', '2021-02-08 20:52:08'),
(37, 8, 2, 0, '1612828328', 0, '2021-02-08 20:52:08', '2021-02-08 20:52:08'),
(38, 2, 2, 0, '1612834343', 0, '2021-02-08 22:32:23', '2021-02-08 22:32:23'),
(39, 7, 2, 0, '1612834343', 0, '2021-02-08 22:32:23', '2021-02-08 22:32:23'),
(40, 8, 2, 0, '1612834343', 0, '2021-02-08 22:32:23', '2021-02-08 22:32:23'),
(41, 2, 2, 0, '1612834383', 0, '2021-02-08 22:33:03', '2021-02-08 22:33:03'),
(42, 7, 2, 0, '1612834383', 0, '2021-02-08 22:33:03', '2021-02-08 22:33:03'),
(43, 8, 2, 0, '1612834383', 0, '2021-02-08 22:33:03', '2021-02-08 22:33:03'),
(44, 2, 2, 0, '1612834689', 0, '2021-02-08 22:38:09', '2021-02-08 22:38:09'),
(45, 1, 2, 0, '1612880325', 0, '2021-02-09 11:18:45', '2021-02-09 11:18:45'),
(46, 7, 2, 0, '1612880325', 0, '2021-02-09 11:18:45', '2021-02-09 11:18:45'),
(47, 8, 2, 0, '1612880325', 0, '2021-02-09 11:18:45', '2021-02-09 11:18:45'),
(48, 1, 2, 0, '1612880960', 0, '2021-02-09 11:29:20', '2021-02-09 11:29:20'),
(49, 7, 2, 0, '1612880960', 0, '2021-02-09 11:29:20', '2021-02-09 11:29:20'),
(50, 8, 2, 0, '1612880960', 0, '2021-02-09 11:29:20', '2021-02-09 11:29:20'),
(51, 1, 2, 0, '1612881043', 0, '2021-02-09 11:30:43', '2021-02-09 11:30:43'),
(52, 7, 2, 0, '1612881043', 0, '2021-02-09 11:30:43', '2021-02-09 11:30:43'),
(53, 8, 2, 0, '1612881043', 0, '2021-02-09 11:30:43', '2021-02-09 11:30:43'),
(54, 1, 2, 0, '1612881304', 0, '2021-02-09 11:35:04', '2021-02-09 11:35:04'),
(55, 7, 2, 0, '1612881304', 0, '2021-02-09 11:35:04', '2021-02-09 11:35:04'),
(56, 1, 2, 0, '1612881400', 0, '2021-02-09 11:36:40', '2021-02-09 11:36:40'),
(57, 7, 2, 0, '1612881400', 0, '2021-02-09 11:36:40', '2021-02-09 11:36:40'),
(58, 8, 2, 0, '1612881400', 0, '2021-02-09 11:36:40', '2021-02-09 11:36:40'),
(59, 1, 2, 0, '1612881896', 0, '2021-02-09 11:44:56', '2021-02-09 11:44:56'),
(60, 7, 2, 0, '1612881896', 0, '2021-02-09 11:44:56', '2021-02-09 11:44:56'),
(61, 8, 2, 0, '1612881896', 0, '2021-02-09 11:44:56', '2021-02-09 11:44:56'),
(62, 1, 2, 0, '1612882386', 0, '2021-02-09 11:53:06', '2021-02-09 11:53:06'),
(63, 7, 2, 0, '1612882386', 0, '2021-02-09 11:53:06', '2021-02-09 11:53:06'),
(64, 8, 2, 0, '1612882386', 0, '2021-02-09 11:53:06', '2021-02-09 11:53:06'),
(65, 1, 2, 0, '1612882438', 0, '2021-02-09 11:53:58', '2021-02-09 11:53:58'),
(66, 7, 2, 0, '1612882438', 0, '2021-02-09 11:53:58', '2021-02-09 11:53:58'),
(67, 8, 2, 0, '1612882438', 0, '2021-02-09 11:53:58', '2021-02-09 11:53:58'),
(68, 1, 2, 1, '1612883086', 0, '2021-02-09 12:04:46', '2021-02-09 12:07:24'),
(69, 7, 2, 0, '1612883086', 0, '2021-02-09 12:04:46', '2021-02-09 12:04:46'),
(70, 8, 2, 1, '1612883086', 0, '2021-02-09 12:04:46', '2021-02-09 12:35:14'),
(71, 1, 2, 1, '1612883698', 2, '2021-02-09 12:14:58', '2021-02-09 12:27:21'),
(72, 7, 2, 0, '1612883698', 2, '2021-02-09 12:14:58', '2021-02-09 12:14:58'),
(73, 8, 2, 0, '1612883698', 2, '2021-02-09 12:14:58', '2021-02-09 12:14:58'),
(74, 9, 8, 0, '1613003057', 15, '2021-02-10 21:24:17', '2021-02-10 21:24:17'),
(75, 2, 8, 1, '1613003057', 15, '2021-02-10 21:24:17', '2021-02-10 21:29:09'),
(76, 1, 8, 1, '1613003057', 15, '2021-02-10 21:24:17', '2021-02-11 04:59:45'),
(77, 9, 2, 0, '1613026171', 16, '2021-02-11 03:49:31', '2021-02-11 03:49:31'),
(78, 8, 2, 0, '1613026171', 16, '2021-02-11 03:49:31', '2021-02-11 03:49:31'),
(79, 1, 2, 0, '1613026171', 16, '2021-02-11 03:49:31', '2021-02-11 03:49:31'),
(80, 9, 2, 0, '1613026247', 17, '2021-02-11 03:50:47', '2021-02-11 03:50:47'),
(81, 8, 2, 1, '1613026247', 17, '2021-02-11 03:50:47', '2021-02-11 04:30:43'),
(82, 1, 2, 0, '1613026247', 17, '2021-02-11 03:50:47', '2021-02-11 03:50:47'),
(83, 2, 7, 1, '1613030307', 18, '2021-02-11 04:58:27', '2021-02-11 04:59:05'),
(84, 8, 7, 1, '1613030307', 18, '2021-02-11 04:58:27', '2021-02-11 04:59:24'),
(85, 9, 7, 0, '1613030307', 18, '2021-02-11 04:58:27', '2021-02-11 04:58:27'),
(86, 1, 2, 0, '1613040065', 19, '2021-02-11 07:41:05', '2021-02-11 07:41:05'),
(87, 8, 2, 0, '1613040065', 19, '2021-02-11 07:41:05', '2021-02-11 07:41:05'),
(88, 9, 2, 0, '1613040065', 19, '2021-02-11 07:41:05', '2021-02-11 07:41:05'),
(89, 1, 2, 1, '1613041757', 20, '2021-02-11 08:09:17', '2021-02-11 08:09:49'),
(90, 7, 2, 0, '1613041757', 20, '2021-02-11 08:09:17', '2021-02-11 08:09:17'),
(91, 9, 2, 0, '1613041757', 20, '2021-02-11 08:09:17', '2021-02-11 08:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `loan__applications`
--

CREATE TABLE `loan__applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `married` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dependants` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `self_employed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_income` int(11) NOT NULL,
  `coapplicant_id` bigint(20) UNSIGNED NOT NULL,
  `coapplicant_income` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `loan_amount_term` int(11) NOT NULL,
  `credit_history` int(11) NOT NULL,
  `property_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_status` int(11) NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_score` double(8,2) DEFAULT '0.00',
  `is_approved` tinyint(2) NOT NULL DEFAULT '0',
  `verified` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan__applications`
--

INSERT INTO `loan__applications` (`id`, `married`, `dependants`, `education`, `self_employed`, `employer_name`, `applicant_income`, `coapplicant_id`, `coapplicant_income`, `loan_amount`, `loan_amount_term`, `credit_history`, `property_area`, `loan_status`, `user_id`, `created_at`, `updated_at`, `job_title`, `bank_statement`, `default_score`, `is_approved`, `verified`) VALUES
(18, 'Yes', '3+', 'Not Graduate', 'No', 'Java', 5000, 2, 560000, 4000, 1095, 1, 'Urban', 0, 7, '2021-02-11 04:58:27', '2021-02-11 04:58:27', 'Kileta', '7.pdf', 83.84, 0, 0),
(19, 'No', '2', 'Not Graduate', 'No', 'Java', 560000, 1, 34000, 4000, 365, 1, 'Semiurban', 0, 2, '2021-02-11 07:41:05', '2021-02-11 07:41:05', 'Kileta', '2.pdf', 79.50, 0, 0),
(20, 'No', '1', 'Not Graduate', 'No', 'Hilton', 560000, 1, 34000, 3000, 1095, 1, 'Urban', 0, 2, '2021-02-11 08:09:17', '2021-02-11 08:09:17', 'Chef', '2.pdf', 79.50, 0, 0);

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
(4, '2015_04_12_000000_create_orchid_users_table', 1),
(5, '2015_10_19_214424_create_orchid_roles_table', 1),
(40, '2014_10_12_100000_create_password_resets_table', 2),
(41, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(42, '2017_09_17_125801_create_notifications_table', 2),
(43, '2019_08_19_000000_create_failed_jobs_table', 2),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(45, '2020_05_21_100000_create_teams_table', 2),
(46, '2020_05_21_200000_create_team_user_table', 2),
(47, '2020_11_15_164508_create_loan__applications_table', 2),
(48, '2020_12_12_145914_create_sessions_table', 2),
(49, '2020_12_23_073312_add_multiple_user_records_to_users', 2),
(50, '2020_12_23_115253_add_multiple_user_records_to_loan_application', 2),
(51, '2021_01_31_151239_create_guarantors_table', 2),
(52, '2021_01_31_151522_create_account__details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'admin', NULL, NULL, NULL),
(2, 'L_OFF', 'loan officer', NULL, NULL, NULL),
(3, 'MEM', 'member', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('akQATdxnaDlC42YU42k5HbupYfGb7BB5MsGxbSXd', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36 Edg/88.0.705.63', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicTJXQk1rUlZYcDNFRkhaMUpLU1d5cFppTEJZUEhHWlhDYWhUYTF5dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbl9kYXNoYm9hcmQiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW5fZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1613046567);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `role_id` int(10) UNSIGNED DEFAULT '3',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `permissions`, `role_id`, `country`, `city`, `address`, `street`, `gender`) VALUES
(1, 'admin', 'nayomimwa@gmail.com', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, 'Ap5fknwy8bhLHyU6eMWm4qjqSKPfPtntjf76QY8lIWJT0EuPBH3Zht89ERhQ', NULL, NULL, '2020-12-12 13:45:58', '2020-12-12 13:45:58', '{\"platform.systems.roles\":true,\"platform.systems.users\":true,\"platform.systems.attachment\":true,\"platform.index\":true,\"platform.systems.index\":true}', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Wambui Mwangi', 'wambui54mwangi@gmail.com', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, 'LmhqRXS6KiPpgOzwDtH47yPVAR0wlgBtcrV8AVguz8k4G3JBXJMyC14jtho9', NULL, NULL, '2020-12-29 12:58:48', '2021-02-11 08:09:17', NULL, 3, 'Kenya', 'Nairobi', '00100', '47042', 'Male'),
(7, 'Jonas', 'mwangi.naomi@strathmore.edu', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-11 04:58:27', NULL, 3, 'Kenya', 'Nairobi', '00100', '47042', 'Female'),
(8, 'Kiraitu', 'testaddress.254@gmail.com', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-10 21:24:17', NULL, 3, 'Kenya', 'Nairobi', '47042', '47042', 'Female'),
(9, 'admin user', 'admin@gmail.com', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL),
(10, 'Cynthia Moraa', 'cynthai@gmail.com', NULL, '$2y$10$5tF40CEAjFhyfaRDumlUJeNUMPly7IwdnCCKekl0D8ho4xSLQ1ws.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account__details`
--
ALTER TABLE `account__details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account__details_user_id_unique` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guarantors`
--
ALTER TABLE `guarantors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guarantor_id` (`guarantor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `loan__applications`
--
ALTER TABLE `loan__applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan__applications_user_id_foreign` (`user_id`),
  ADD KEY `loan__applications_coapplicant_id_foreign` (`coapplicant_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account__details`
--
ALTER TABLE `account__details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantors`
--
ALTER TABLE `guarantors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `loan__applications`
--
ALTER TABLE `loan__applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guarantors`
--
ALTER TABLE `guarantors`
  ADD CONSTRAINT `guarantors_guarantor_id_foreign` FOREIGN KEY (`guarantor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loan__applications`
--
ALTER TABLE `loan__applications`
  ADD CONSTRAINT `loan__applications_coapplicant_id_foreign` FOREIGN KEY (`coapplicant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `loan__applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
