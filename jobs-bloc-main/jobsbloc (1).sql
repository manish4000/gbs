-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 02:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsbloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_awards`
--

CREATE TABLE `candidate_awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aw_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aw_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aw_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_awards`
--

INSERT INTO `candidate_awards` (`id`, `user_id`, `aw_title`, `aw_year`, `aw_description`, `created_at`, `updated_at`) VALUES
(9, 3, 'sds', '1231', 'sds            11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_details`
--

CREATE TABLE `candidate_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `introduction_video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_job_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `friendly_address` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_details`
--

INSERT INTO `candidate_details` (`id`, `user_id`, `featured_image`, `cover_image`, `dob`, `job_title`, `salary`, `salary_type_id`, `introduction_video_url`, `candidate_job_categories`, `description`, `location_id`, `friendly_address`, `candidate_tags`, `created_at`, `updated_at`) VALUES
(2, 4, 'candidate-1655198603.png', 'candidate-1655198633.png', NULL, NULL, NULL, 9, NULL, '2,3', NULL, 2, NULL, NULL, NULL, '2022-06-14 03:53:53'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ed_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_academy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`id`, `user_id`, `ed_title`, `ed_academy`, `ed_year`, `ed_description`, `created_at`, `updated_at`) VALUES
(25, 3, 'asas', 'as', 'asas', 'asasa        12121', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_experience`
--

CREATE TABLE `candidate_experience` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ex_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_start_date` date DEFAULT NULL,
  `ex_end_date` date DEFAULT NULL,
  `ex_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_experience`
--

INSERT INTO `candidate_experience` (`id`, `user_id`, `ex_title`, `ex_start_date`, `ex_end_date`, `ex_company`, `ex_description`, `created_at`, `updated_at`) VALUES
(19, 3, 'asas', '2022-05-22', '2022-05-21', 'asa12', 'wqww                                                                \r\n                  21 1', NULL, NULL),
(20, 3, NULL, '2022-05-18', '2022-05-21', NULL, 'qwqw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_resume`
--

CREATE TABLE `candidate_resume` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_photos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_resume`
--

INSERT INTO `candidate_resume` (`id`, `user_id`, `portfolio_photos`, `cv`, `created_at`, `updated_at`) VALUES
(1, 3, 'candidate-portfolio1655270499.png', 'candidate-cv1655270597.docx', '2022-05-19 05:43:34', '2022-06-14 23:53:17'),
(2, 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_skills`
--

CREATE TABLE `candidate_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sk_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_percentage` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_skills`
--

INSERT INTO `candidate_skills` (`id`, `user_id`, `sk_title`, `sk_percentage`, `created_at`, `updated_at`) VALUES
(5, 3, 'sa', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_details`
--

CREATE TABLE `employer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded_date` date DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction_video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_job_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `friendly_address` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_details`
--

INSERT INTO `employer_details` (`id`, `logo_image`, `cover_image`, `profile_image`, `founded_date`, `company_name`, `website`, `introduction_video_url`, `employer_job_categories`, `description`, `location_id`, `friendly_address`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'employer-1655295424.png', 'candidate-1655296097.jpg', 'employer-profile1655701293.png', '2022-06-21', NULL, 'https://www.youtube.com/watch?v=b_lHyhTRb-8&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbA&index=5', 'https://www.youtube.com/watch?v=cjAWRjz3TLU', '1,4,6', '<p>[\"Description\"]</p>', 1, 'thisiis my addrere', NULL, '2022-06-20 04:20:38'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_teams`
--

CREATE TABLE `employer_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_teams`
--

INSERT INTO `employer_teams` (`id`, `user_id`, `name`, `designation`, `experience`, `profile_image`, `facebook`, `twitter`, `linkedin`, `instagram`, `description`, `created_at`, `updated_at`) VALUES
(28, 5, 'asas', 'asasa', 'asas', NULL, 'https://www.youtube.com/watch?v=Irw8llgSC3s&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=6', 'https://www.youtube.com/watch?v=Irw8llgSC3s&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=6', 'https://www.youtube.com/watch?v=Irw8llgSC3s&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=6', 'https://www.youtube.com/watch?v=Irw8llgSC3s&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=6', 'Description                                                            \r\n                         https://www.youtube.com/watch?v=Irw8llgSC3s&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=6', NULL, NULL),
(29, 5, 'asas', 'rerer', 'asas', NULL, 'erer', 'erer', 'rer', 'erer', 'Descriptione', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_deadline_date` date NOT NULL,
  `min_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_type_id` bigint(20) UNSIGNED NOT NULL,
  `tegs` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `address` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `job_type_id`, `description`, `feature_image`, `application_deadline_date`, `min_salary`, `max_salary`, `salary_type_id`, `tegs`, `location_id`, `address`, `is_active`, `is_feature`, `created_at`, `updated_at`) VALUES
(1, 'Asasas', 8, '<h1>Descrizdsdsption</h1>', '1656072436.png', '2022-06-03', '123312', '121212', 3, NULL, 2, 'wqwq', 1, 0, '2022-06-23 03:07:33', '2022-06-24 06:37:16'),
(2, 'Asdd', 2, '<p>Description</p>', '1655973518.png', '2022-06-24', '2332', '23232', 3, NULL, 1, 'Addres23s', 1, 0, '2022-06-23 03:08:38', '2022-06-24 04:15:27'),
(5, 'Asasasr', 8, '<h1>Descrizdsdsption</h1>', '1656072436.png', '2022-06-03', '123312', '121212', 3, NULL, 2, 'wqwq', 1, 1, '2022-06-23 03:07:33', '2022-06-24 06:37:16'),
(6, 'Asdderer', 2, '<p>Description</p>', '1655973518.png', '2022-06-24', '2332', '23232', 3, NULL, 1, 'Addres23s', 1, 1, '2022-06-28 03:08:38', '2022-06-24 04:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `parent_id`, `title`, `slug`, `order`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Wewe', 'wewe', 2, 1, 1, NULL, '2022-06-23 02:31:09'),
(4, 1, 'This Is New Category', 'this-is-new-category', 1, 1, 1, '2022-06-14 23:35:09', '2022-06-14 23:35:09'),
(6, 1, 'This Is New Category2', 'this-is-new-category2', 1, 1, 1, '2022-06-14 23:35:09', '2022-06-14 23:35:09'),
(7, NULL, 'This Is New Category2lkon', 'this-is-new-category2hnjonjo', 1, 1, 1, '2022-06-14 23:35:09', '2022-06-14 23:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories_relation`
--

CREATE TABLE `job_categories_relation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `job_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories_relation`
--

INSERT INTO `job_categories_relation` (`id`, `job_id`, `job_category_id`, `created_at`, `updated_at`) VALUES
(13, 1, 1, NULL, NULL),
(14, 2, 4, NULL, NULL),
(15, 5, 7, NULL, NULL),
(16, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'full time', 1, '2022-05-10 23:50:21', '2022-06-24 03:45:31'),
(2, 'part time', 1, '2022-05-10 23:50:21', '2022-06-14 00:19:27'),
(8, 'freelancer', 1, '2022-06-14 00:19:50', '2022-06-14 00:19:50'),
(9, 'full time2', 1, '2022-05-10 23:50:21', '2022-06-24 03:45:31'),
(10, 'part time2', 1, '2022-05-10 23:50:21', '2022-06-14 00:19:27'),
(11, 'freelancer2', 1, '2022-06-14 00:19:50', '2022-06-14 00:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'delhi', 1, '2022-05-11 05:20:21', '2022-06-14 04:08:20'),
(2, 'mumbai', 1, '2022-05-11 05:20:21', '2022-06-13 07:07:07'),
(4, 'kolkata', 1, '2022-05-11 05:20:21', '2022-05-19 05:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2022_05_11_101603_create_sessions_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(7, '2022_05_12_1652336726_create_settings_table', 4),
(8, '2022_05_12_1652336726_create_website_social_table', 5),
(9, '2022_05_12_093701_create_website_contact_table', 6),
(11, '2022_04_09_1649492197_create_testimonials_table', 7),
(12, '2022_05_15_051742_create_salary_types_table', 8),
(13, '2022_05_15_051814_create_locations_table', 8),
(15, '2022_05_15_055815_create_candidate_details_table', 9),
(17, '2022_05_15_055125_create_social_networks_table', 10),
(18, '2022_05_15_055130_create_user_social_networks_table', 10),
(22, '2022_05_19_092011_create_candidate_resume_table', 11),
(27, '2022_05_20_041838_create_candidate_education_table', 12),
(28, '2022_05_20_041913_create_candidate_experience_table', 13),
(29, '2022_05_20_042006_create_candidate_awards_table', 14),
(30, '2022_05_20_042024_create_candidate_skills_table', 15),
(31, '2022_05_15_060315_create_job_categories_table', 16),
(32, '2022_06_15_053446_create_employer_details_table', 17),
(33, '2022_06_16_042352_create_employer_teams_table', 18),
(35, '2022_06_22_113928_create_job_table', 19),
(37, '2022_06_22_120840_create_job_categories_relation_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mm@gmail.xcom', '$2y$10$8F6PGB5gd0PIrahdbgZE3eo2l/AosWu2pIKwoNEoEeTgB4Tf6KD2C', '2022-05-15 06:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_types`
--

CREATE TABLE `salary_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_types`
--

INSERT INTO `salary_types` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'weekly', 0, '2022-05-05 08:58:10', '2022-06-14 00:48:54'),
(3, 'daily', 0, '2022-05-05 08:58:10', '2022-06-14 00:48:49'),
(9, 'yearly', 1, '2022-06-14 00:49:29', '2022-06-14 00:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jh1Pi5u6HLBemLJUjJrhoto0EL4pSxsxZceeZhBG', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV2RCOXBqNnRFTDRMRzJsMmZENzA1MnRDMEZIWHVCajZ1UlBibFNYeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qb2JzLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGhxVjFNYVp6bmNNSkJocm5yaXA5TC5wS0tnVlhVYTdsaDdUOEtzT3N6R1R1U21ybUQvUUNlIjt9', 1656335774),
('UwApAUB9VYYALZ69rA622nsgAfb9O0bd77Q1PQAe', 5, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVp6WVVoS2NTUGJTajFoNVNhWm9IcUJjZlFzQlNkWDZBSUpxVXVvYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qb2JzLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGhxVjFNYVp6bmNNSkJocm5yaXA5TC5wS0tnVlhVYTdsaDdUOEtzT3N6R1R1U21ybUQvUUNlIjt9', 1656419675);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_networks`
--

INSERT INTO `social_networks` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'fb', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(2, 'insta', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(3, 'twitter', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(4, 'linkdin', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(5, 'google', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(6, 'dfjkd', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(7, 'dfdfd', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25'),
(8, 'dfdf', 1, '2022-05-19 07:06:25', '2022-05-20 07:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `description`, `image`, `name`, `designation`, `location`, `star`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'asa', '1655121001.png', 'as', 'sdsd', 'sds', 4, 1, '2022-06-13 06:19:53', '2022-06-22 05:04:33'),
(10, 'hello how are uyou', '1655121001.png', 'manish kumar ujjainia ', 'i am a php developer ', 'in jaipur', 5, 1, '2022-06-13 06:19:53', '2022-06-13 06:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `is_active`, `phone`, `company`, `job_category_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'manish kumar', 'aavanaindia@gmail.com', 'mansih', '$2y$10$nr8fbSBp.ZffVZ1x.hDInur9MMD/Gtan.RPFpcE3N5jf2s83NJxmG', NULL, NULL, NULL, 'admin', 1, '12345678890', 'sas', NULL, NULL, 'mZmoGLIFmWoEiHnw9vvKAVizLOga17lyM1ksmQIaDkOcgC7OtjJmwRF5iaFq', '2022-05-11 05:57:17', '2022-06-22 05:32:17'),
(3, 'manish kumar ujjainia', 'mm@gmail.xcomw', 'mammm', '$2y$10$nr8fbSBp.ZffVZ1x.hDInur9MMD/Gtan.RPFpcE3N5jf2s83NJxmG', NULL, NULL, NULL, 'candidate', 1, '9696969696', 'asas', NULL, NULL, NULL, '2022-05-11 22:43:57', '2022-05-18 23:56:06'),
(4, 'asas 4', 'mansih@gmail.com', 'manish', '$2y$10$kbZWneAcXHZ7qWXCUvGRh.zMDJbJQTxo5VCV.uoIwkihE5ytgmuhW', NULL, NULL, NULL, 'candidate', 1, '1234567890', 'asas', NULL, NULL, NULL, '2022-06-14 03:33:32', '2022-06-14 03:33:32'),
(5, 'asas 4445', 'rehotev298@giftcv.com', 'rehotev298@giftcv.com', '$2y$10$hqV1MaZzncMJBhrnrip9L.pKKgVXUa7lh7T8KsOszGTuSmrmD/QCe', NULL, NULL, NULL, 'employer', 1, '1234567890', 'sdfefdf', 1, NULL, NULL, '2022-06-14 23:48:17', '2022-06-14 23:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_job_category`
--

CREATE TABLE `user_job_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_networks`
--

CREATE TABLE `user_social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `social_network_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_social_networks`
--

INSERT INTO `user_social_networks` (`id`, `user_id`, `social_network_id`, `url`, `created_at`, `updated_at`) VALUES
(25, 3, 1, 'https://www.youtube.com/watch?v=O1h8DsKXLkI', NULL, NULL),
(26, 3, 2, 'https://www.youtube.com/watch?v=O1h8DsKXLkI', NULL, NULL),
(27, 4, 1, 'https://www.youtube.com/watch?v=hFxR6D2kH44', NULL, NULL),
(84, 5, 1, 'https://www.youtube.com/watch?v=cjAWRjz3TLU', NULL, NULL),
(85, 5, 2, 'https://www.youtube.com/watch?v=b_lHyhTRb-8&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbA&index=5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_contact`
--

CREATE TABLE `website_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_contact`
--

INSERT INTO `website_contact` (`id`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'emaildfd@gami.com', 'wewe', 'wewew', NULL, '2022-05-12 04:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `website_social`
--

CREATE TABLE `website_social` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_social`
--

INSERT INTO `website_social` (`id`, `facebook`, `instagram`, `twitter`, `linkdin`, `created_at`, `updated_at`) VALUES
(1, 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_details`
--
ALTER TABLE `candidate_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_details_user_id_foreign` (`user_id`),
  ADD KEY `candidate_details_salary_type_id_foreign` (`salary_type_id`),
  ADD KEY `candidate_details_location_id_foreign` (`location_id`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_education_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_experience_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_resume`
--
ALTER TABLE `candidate_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_resume_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `employer_details`
--
ALTER TABLE `employer_details`
  ADD KEY `employer_details_location_id_foreign` (`location_id`),
  ADD KEY `employer_details_id_foreign` (`id`);

--
-- Indexes for table `employer_teams`
--
ALTER TABLE `employer_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_teams_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_job_type_id_foreign` (`job_type_id`),
  ADD KEY `job_salary_type_id_foreign` (`salary_type_id`),
  ADD KEY `job_location_id_foreign` (`location_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories_relation`
--
ALTER TABLE `job_categories_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_categories_relation_job_id_foreign` (`job_id`),
  ADD KEY `job_categories_relation_job_category_id_foreign` (`job_category_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salary_types`
--
ALTER TABLE `salary_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_job_category_id_foreign` (`job_category_id`);

--
-- Indexes for table `user_job_category`
--
ALTER TABLE `user_job_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_job_category_job_category_id_foreign` (`job_category_id`);

--
-- Indexes for table `user_social_networks`
--
ALTER TABLE `user_social_networks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_social_networks_user_id_foreign` (`user_id`),
  ADD KEY `user_social_networks_social_network_id_foreign` (`social_network_id`);

--
-- Indexes for table `website_contact`
--
ALTER TABLE `website_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_social`
--
ALTER TABLE `website_social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `candidate_details`
--
ALTER TABLE `candidate_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `candidate_resume`
--
ALTER TABLE `candidate_resume`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employer_teams`
--
ALTER TABLE `employer_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_categories_relation`
--
ALTER TABLE `job_categories_relation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_types`
--
ALTER TABLE `salary_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_job_category`
--
ALTER TABLE `user_job_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_social_networks`
--
ALTER TABLE `user_social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `website_contact`
--
ALTER TABLE `website_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_social`
--
ALTER TABLE `website_social`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  ADD CONSTRAINT `candidate_awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_details`
--
ALTER TABLE `candidate_details`
  ADD CONSTRAINT `candidate_details_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidate_details_salary_type_id_foreign` FOREIGN KEY (`salary_type_id`) REFERENCES `salary_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidate_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD CONSTRAINT `candidate_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_experience`
--
ALTER TABLE `candidate_experience`
  ADD CONSTRAINT `candidate_experience_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_resume`
--
ALTER TABLE `candidate_resume`
  ADD CONSTRAINT `candidate_resume_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  ADD CONSTRAINT `candidate_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employer_details`
--
ALTER TABLE `employer_details`
  ADD CONSTRAINT `employer_details_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employer_details_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employer_teams`
--
ALTER TABLE `employer_teams`
  ADD CONSTRAINT `employer_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_salary_type_id_foreign` FOREIGN KEY (`salary_type_id`) REFERENCES `salary_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_categories_relation`
--
ALTER TABLE `job_categories_relation`
  ADD CONSTRAINT `job_categories_relation_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_categories_relation_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_job_category`
--
ALTER TABLE `user_job_category`
  ADD CONSTRAINT `user_job_category_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_social_networks`
--
ALTER TABLE `user_social_networks`
  ADD CONSTRAINT `user_social_networks_social_network_id_foreign` FOREIGN KEY (`social_network_id`) REFERENCES `social_networks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_social_networks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
