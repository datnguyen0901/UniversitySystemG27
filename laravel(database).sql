-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 08:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'Technology', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(2, 'Business', 'Business', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(3, 'Design', 'Design', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(4, 'Marketing', 'Marketing', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(5, 'Programming', 'Programming', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(6, 'Finance', 'Finance', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(7, 'Health', 'Health', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(8, 'Education', 'Education', '2022-04-13 20:24:39', '2022-04-13 20:24:39'),
(9, 'Food', 'Food', '2022-04-13 20:24:39', '2022-04-13 20:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `created_at`, `updated_at`, `user_id`, `idea_id`, `parent_id`) VALUES
(1, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 1, NULL),
(2, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 1, NULL),
(3, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 1, NULL),
(4, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 2, NULL),
(5, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 2, NULL),
(6, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 2, NULL),
(7, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 2, NULL),
(8, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 9, NULL),
(9, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 9, NULL),
(10, 'This is a comment', '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Business', NULL, NULL),
(3, 'Design', NULL, NULL),
(4, 'QA', NULL, NULL),
(5, 'HR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `title`, `description`, `content`, `created_at`, `updated_at`, `user_id`, `category_id`, `submission_id`) VALUES
(1, 'Laravel', 'Introduce Laravel to the world', 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is a micro-framework, which means that Laravel is designed to be used as a standalone application or a component library. It is a collection of commonly used components and traits for developing web applications.', '2021-12-31 23:00:00', '2022-04-13 20:24:39', 1, 1, 1),
(2, 'React', 'Introduce React to the world', 'React is a JavaScript library for building user interfaces. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.', '2022-01-10 23:00:00', '2022-04-13 20:24:39', 2, 2, 2),
(3, 'Vue', 'Introduce Vue to the world', 'Vue.js is a progressive framework for building user interfaces. It is a library that combines the best parts of each of these other frameworks. It is a complete rewrite from the same team that built AngularJS.', '2022-01-20 23:00:00', '2022-04-13 20:24:39', 3, 3, 3),
(4, 'Angular', 'Introduce Angular to the world', 'Angular is a TypeScript-based open-source web application framework led by the Angular Team at Google and by a community of individuals and corporations. Angular is a complete rewrite from the same team that built AngularJS.', '2022-01-31 23:00:00', '2022-04-13 20:24:39', 4, 4, 4),
(5, 'Node.js', 'Introduce Node.js to the world', 'Node.js is an open-source, cross-platform JavaScript run-time environment that executes JavaScript code outside of a browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting—running scripts server-side to produce dynamic web page content before the page is sent to the user\'s web browser.', '2022-02-10 23:00:00', '2022-04-13 20:24:39', 3, 1, 2),
(6, 'Express.js', 'Introduce Express.js to the world', 'Express.js is a web application framework for Node.js, released as free and open-source software under the MIT License. It is designed for building web applications and APIs. It has been called the de facto standard server framework for Node.js.', '2022-02-20 23:00:00', '2022-04-13 20:24:39', 4, 2, 3),
(7, 'Vue.js', 'Introduce Vue.js to the world', 'Vue.js is a progressive framework for building user interfaces. It is a library that combines the best parts of each of these other frameworks. It is a complete rewrite from the same team that built AngularJS.', '2022-02-28 23:00:00', '2022-04-13 20:24:39', 1, 3, 4),
(8, 'CSV test', 'Introduce React to the world', 'React is a JavaScript library for building user interfaces. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.', '2021-12-31 23:00:00', '2022-04-13 20:24:39', 1, 1, 5),
(9, 'Laravel for test the submission when create or edit', 'Test Submission', 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern. Laravel is a micro-framework, which means that Laravel is designed to be used as a standalone application or a component library. It is a collection of commonly used components and traits for developing web applications.', '2022-01-14 23:00:00', '2022-04-13 20:24:39', 1, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(97, '2022_03_06_120108_create_user_activations_table', 1),
(98, '2022_03_06_120733_alter_users_table', 1),
(144, '02012_02_17_235414_create_roles_table', 2),
(145, '02012_02_17_235434_create_departments_table', 2),
(146, '02014_10_12_000000_create_users_table', 2),
(147, '02014_10_12_100000_create_password_resets_table', 2),
(148, '02019_08_19_000000_create_failed_jobs_table', 2),
(149, '2022_02_18_024135_create_categories_table', 2),
(150, '2022_02_18_024152_create_submissions_table', 2),
(151, '2022_03_06_133543_create_jobs_table', 2),
(152, '32022_02_17_233259_create_ideas_table', 2),
(153, '32022_02_18_024212_create_files_table', 2),
(154, '42022_02_18_024233_create_views_table', 2),
(155, '42022_02_18_024248_create_comments_table', 2),
(156, '42022_02_18_024305_create_reactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reaction` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `reaction`, `created_at`, `updated_at`, `user_id`, `idea_id`) VALUES
(1, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 1),
(2, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 4),
(3, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 1),
(4, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 3),
(5, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 1),
(6, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 2),
(7, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 6),
(8, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 2),
(9, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 2),
(10, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 8),
(11, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 8),
(12, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 8),
(13, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 8),
(14, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 1, 9),
(15, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 2, 9),
(16, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 3, 9),
(17, 1, '2022-04-13 20:24:39', '2022-04-13 20:24:39', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'QA_Manager', NULL, NULL),
(3, 'Staff', NULL, NULL),
(4, 'QA_Coordinator', NULL, NULL),
(5, 'Head', NULL, NULL),
(6, 'Lecturer', NULL, NULL),
(7, 'HR_Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closure_date` date NOT NULL,
  `final_closure_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `description`, `closure_date`, `final_closure_date`, `created_at`, `updated_at`) VALUES
(1, 'Sprint Ideas', 'Contest for ideas for Sprint', '2022-01-01', '2022-01-30', NULL, NULL),
(2, 'Summer Ideas', 'Contest for ideas for Summer', '2022-04-01', '2022-04-30', NULL, NULL),
(3, 'Autumn Ideas', 'Contest for ideas for Autumn', '2022-07-01', '2022-07-30', NULL, NULL),
(4, 'Winter Ideas', 'Contest for ideas for Winter', '2022-09-01', '2022-09-30', NULL, NULL),
(5, 'Late Sprint Ideas', 'Contest for ideas for Late Sprint', '2022-02-01', '2022-03-01', NULL, NULL),
(6, 'Test Submission ', 'Closure data is over, but still can comment', '2022-04-01', '2022-05-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `department_id`) VALUES
(1, 'Dat Nguyen', 'testmailgreenwich2379@gmail.com', '2022-04-13 20:24:39', '$2y$10$jum4Cpp./QsdDW6y.HlQpORUrsMYkKWffIc0lOwDroq6OtZGDISmO', '1GPwhYpHHc', NULL, NULL, 1, 1),
(2, 'Thuan Khuu', 'khuuquocthuan@gmail.com', '2022-04-13 20:24:39', '$2y$10$q76DMlMZj32D5vTWCsu8ZuZS0rI.1nMTYYeKbTeXlLmoFrxsntham', 'l5BJEdSClQ', NULL, NULL, 1, 2),
(3, 'Quan Nguyen', 'quannagcs190347@fpt.edu.vn', '2022-04-13 20:24:39', '$2y$10$AzDFcCTi1riVTXLp9kSLPeZbCX2N9wUjwnKNo9vjZcUuyZrJYuaDu', 'q5adXZX4cb', NULL, NULL, 3, 3),
(4, 'Duc Huynh', 'ducht@fpt.edu.vn', '2022-04-13 20:24:39', '$2y$10$PLES13YFbHT8ehdocUjjS.GzkKwnvLiqhI6vUwvyuhQO2ifFf8UdG', 'zDN3SvaJ4h', NULL, NULL, 5, 4),
(5, 'QA Coordinator of IT department', 'datn82@gmail.com', '2022-04-13 20:24:39', '$2y$10$T1wkH0vrGJYHEoRXR9wXi.xXhtADGNo37r6/EVHYBNrNqd16YTqwO', 'zUdo3PEtzO', NULL, NULL, 4, 1),
(6, 'QA Coordinator of HR department', 'ntd8989@gmail.com', '2022-04-13 20:24:39', '$2y$10$ighX.hME9K6YgD0/GascTOu7XxHgdPqp2n0Tec/TCK6E7/NyJD8P6', 'fwsAXmdaGd', NULL, NULL, 4, 5),
(7, 'HR Manager', 'datnttcs20032@fpt.edu.vn', '2022-04-13 20:24:39', '$2y$10$Vvn9cMf4CVdQ3h6IR9IH0u6fV9CcC5r0rA8iSaHpgT3yL3TSmNqna', 'zmZROo0zXm', NULL, NULL, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `created_at`, `user_id`, `idea_id`) VALUES
(1, '2022-04-14 03:24:39', 1, 1),
(2, '2022-04-14 03:24:39', 2, 2),
(3, '2022-04-14 03:24:39', 3, 3),
(4, '2022-04-14 03:24:39', 4, 3),
(5, '2022-04-14 03:24:39', 2, 1),
(6, '2022-04-14 03:24:39', 3, 2),
(7, '2022-04-14 03:24:39', 4, 3),
(8, '2022-04-14 03:24:39', 1, 5),
(9, '2022-04-14 03:24:39', 2, 6),
(10, '2022-04-14 03:24:39', 3, 1),
(11, '2022-04-14 03:24:39', 4, 2),
(12, '2022-04-14 03:24:39', 1, 3),
(13, '2022-04-14 03:24:39', 2, 4),
(14, '2022-04-14 03:24:39', 3, 5),
(15, '2022-04-14 03:24:39', 4, 6),
(16, '2022-04-14 03:24:39', 1, 1),
(17, '2022-04-14 03:24:39', 2, 2),
(18, '2022-04-14 03:24:39', 3, 3),
(19, '2022-04-14 03:24:39', 4, 4),
(20, '2022-04-14 03:24:39', 2, 1),
(21, '2022-04-14 03:24:39', 3, 2),
(22, '2022-04-14 03:24:39', 4, 3),
(23, '2022-04-14 03:24:39', 1, 4),
(24, '2022-04-14 03:24:39', 2, 5),
(25, '2022-04-14 03:24:39', 3, 6),
(26, '2022-04-14 03:24:39', 2, 2),
(27, '2022-04-14 03:24:39', 3, 8),
(28, '2022-04-14 03:24:39', 4, 8),
(29, '2022-04-14 03:24:39', 1, 8),
(30, '2022-04-14 03:24:39', 2, 8),
(31, '2022-04-14 03:24:39', 3, 8),
(32, '2022-04-14 03:24:39', 4, 8),
(33, '2022-04-14 03:24:39', 1, 8),
(34, '2022-04-14 03:24:39', 2, 8),
(35, '2022-04-14 03:24:39', 1, 9),
(36, '2022-04-14 03:24:39', 2, 9),
(37, '2022-04-14 03:24:39', 3, 9),
(38, '2022-04-14 03:24:39', 4, 9),
(39, '2022-04-14 03:24:39', 1, 9),
(40, '2022-04-14 03:24:39', 2, 9),
(41, '2022-04-14 03:24:39', 3, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`),
  ADD KEY `ideas_category_id_foreign` (`category_id`),
  ADD KEY `ideas_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactions_user_id_foreign` (`user_id`),
  ADD KEY `reactions_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD KEY `user_activations_activation_code_index` (`activation_code`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_foreign` (`user_id`),
  ADD KEY `views_idea_id_foreign` (`idea_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ideas_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ideas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
