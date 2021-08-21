-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2021 at 06:37 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `locacaos`
--

CREATE TABLE `locacaos` (
  `id` bigint UNSIGNED NOT NULL,
  `cliente_id` bigint UNSIGNED NOT NULL,
  `filme_id` bigint UNSIGNED NOT NULL,
  `data_locacao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locacaos`
--

INSERT INTO `locacaos` (`id`, `cliente_id`, `filme_id`, `data_locacao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-08-18', '2021-08-19 00:29:49', '2021-08-19 00:29:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locacaos`
--
ALTER TABLE `locacaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locacaos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `locacaos_filme_id_foreign` (`filme_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locacaos`
--
ALTER TABLE `locacaos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locacaos`
--
ALTER TABLE `locacaos`
  ADD CONSTRAINT `locacaos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locacaos_filme_id_foreign` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
