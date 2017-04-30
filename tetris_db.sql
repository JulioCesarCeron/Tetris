-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Abr-2017 às 16:00
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 5.6.30-10+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tetris_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `materia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professor_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id`, `materia`, `professor_user_id`, `created_at`, `updated_at`) VALUES
(7, 'Geográfia', 2, '2017-04-21 04:02:43', '2017-04-21 05:47:22'),
(8, 'Matemática', 3, '2017-04-21 05:42:16', '2017-04-21 05:44:53'),
(9, 'História', 4, '2017-04-21 05:42:30', '2017-04-21 05:42:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(584, '2014_10_12_000000_create_users_table', 1),
(585, '2014_10_12_100000_create_password_resets_table', 1),
(586, '2017_03_19_184759_create_products_table', 1),
(587, '2017_03_21_030540_create_turmas_table', 1),
(588, '2017_04_07_175136_create_turma_alunos_table', 1),
(589, '2017_04_16_202013_create_materias_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 'dignissimos', 'Exercitationem qui nam maxime quia et aperiam assumenda sed reiciendis eius.', 2000.34, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(2, 'voluptatum', 'Eligendi voluptas et quo at asperiores fuga impedit id deleniti.', 791.48, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(3, 'expedita', 'Est aut repellat sit accusamus id pariatur.', 2187.90, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(4, 'reprehenderit', 'Consequatur voluptas culpa distinctio excepturi natus ad sed quam.', 1292.33, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(5, 'aut', 'Ab perferendis sed praesentium laudantium consequuntur exercitationem consequatur hic et cumque.', 738.45, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(6, 'sapiente', 'Totam libero nulla temporibus odit odio ratione quia ut corrupti.', 1779.39, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(7, 'qui', 'Soluta omnis et debitis blanditiis et sit sint consequatur ab voluptatem accusantium numquam debitis.', 694.10, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(8, 'sint', 'Qui temporibus assumenda cumque quis molestiae tempora sed odit illum numquam quam sunt.', 532.59, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(9, 'est', 'Consequatur beatae temporibus explicabo consequatur vero accusantium eius quas autem cupiditate aspernatur beatae neque tenetur.', 600.07, '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(10, 'optio', 'Ratione voluptatem provident repudiandae dolor accusantium modi laudantium.', 1080.19, '2017-04-17 00:57:40', '2017-04-17 00:57:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `turma` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `serie`, `turma`, `created_at`, `updated_at`) VALUES
(1, '2', '2B', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(2, '2', '2D', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(3, '2', '2C', '2017-04-17 00:57:41', '2017-04-17 00:57:41'),
(4, '2', '2A', '2017-04-17 00:57:41', '2017-04-17 00:57:41'),
(5, '2', '2B', '2017-04-17 00:57:41', '2017-04-17 00:57:41'),
(6, '1', '1B', '2017-04-17 00:57:41', '2017-04-17 00:57:41'),
(7, '1', '1C', '2017-04-17 00:57:41', '2017-04-17 00:57:41'),
(8, '1', '1E', '2017-04-17 00:57:41', '2017-04-17 00:57:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_alunos`
--

CREATE TABLE `turma_alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turma_alunos`
--

INSERT INTO `turma_alunos` (`id`, `user_id`, `turma_id`, `created_at`, `updated_at`) VALUES
(1, 7, 2, '2017-04-17 02:01:17', '2017-04-17 02:01:17'),
(3, 8, 5, '2017-04-17 02:03:11', '2017-04-17 02:03:11'),
(4, 12, 2, '2017-04-18 02:14:40', '2017-04-18 02:14:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','professor','aluno') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jermaine Sauer V', 'admin@user.com', 'admin', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'eppZbscMXc', '2017-04-17 00:57:39', '2017-04-17 00:57:39'),
(2, 'Blair Kling', 'hessel.pablo@example.org', 'professor', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'C6sjMyXfnJ', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(3, 'Irma Carroll', 'lew.smith@example.com', 'professor', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', '7akdpOknxl', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(4, 'Prof. Andres Crooks V', 'cristian01@example.com', 'professor', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', '6KKh7HrYEg', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(5, 'Alessandra Daugherty', 'brent.batz@example.com', 'professor', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'Pt9lpeQIeS', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(7, 'Dr. Lexie Lind MD', 'darryl.harvey@example.org', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'lAt4wNDmP4', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(9, 'Dr. Ardella Reinger IV', 'bret.haag@example.com', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', '6e3lCcu1ts', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(10, 'Dr. Chaim Hyatt Sr.', 'blaze63@example.net', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'B1YnrA5DAb', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(11, 'Abagail Kiehn', 'green.bryce@example.com', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'WtN6iDxdSR', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(12, 'Edythe Ebert', 'ayana.nader@example.net', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'qmB4g5r5qc', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(13, 'Lurline Ernser MD', 'stanford64@example.net', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'dhNzUhcAKz', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(14, 'Dewitt Cremin', 'monahan.daryl@example.com', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'xg0ZXE20wC', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(15, 'Alejandrin Hermiston', 'danial.pfeffer@example.net', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'Ob7qLYrOQ4', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(16, 'Dr. Carolyne Ledner', 'pconnelly@example.org', 'aluno', '$2y$10$y5PifC2QDNbz11NUTCX1R.PQCTRCDRWDQIjEL5Y1b3344fQKy.p8K', 'eBwvKGQcgL', '2017-04-17 00:57:40', '2017-04-17 00:57:40'),
(17, 'wer', 'werwe@wersdf', 'admin', '$2y$10$MpYJIWshacV5RiHPd04M8ONLfjNv8XAqpCH3Ndm7ASoeXxEZlcGfe', NULL, '2017-04-18 06:21:14', '2017-04-18 06:21:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma_alunos`
--
ALTER TABLE `turma_alunos`
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
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `turma_alunos`
--
ALTER TABLE `turma_alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
