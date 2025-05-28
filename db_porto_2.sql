-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 10:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_porto_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `position` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `position`, `photo`, `content`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ananda NL', 'Desainer Grafis', '6833f1ab1c686_download (1).png', '<p>Desainer grafis yang patut dipertanyakan kejelasannya karena beliau tidak memiliki portofolio yang serius</p>', '2025-05-24 08:22:22', '2025-05-26 04:44:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `photo`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, '68355eb94a2fe_download (1).png', 'Pelangi-pelangi', '<font color=\"#f7c6ce\">P</font><font color=\"#ffe7ce\">e</font><font color=\"#ffe79c\">l</font><font color=\"#b5d6a5\">a</font><font color=\"#cee7f7\">n</font><font color=\"#d6d6e7\">g</font><font color=\"#e7d6de\">i</font> itu ada dua jenis. Yang pertama <font color=\"#f7c6ce\">p</font><font color=\"#ffe7ce\">e</font><font color=\"#ffe79c\">l</font><font color=\"#b5d6a5\">a</font><font color=\"#cee7f7\">n</font><font color=\"#d6d6e7\">g</font><font color=\"#e7d6de\">i</font> dilangit, yang kedua bendera <font color=\"#f7c6ce\">p</font><font color=\"#ffe7ce\">e</font><font color=\"#ffe79c\">l</font><font color=\"#b5d6a5\">a</font><font color=\"#cee7f7\">n</font><font color=\"#d6d6e7\">g</font><font color=\"#e7d6de\">i</font>. Aku yang pertama yaaaa... Gak boleh sama lohhh', 1, '2025-05-27 06:42:01', NULL),
(8, '68355ef5ef3c5_download.png', 'Kutu Kupret', 'waktu itu ada seekor kutu kasur yang hinggap di kasurku. Kunamai dia Si Kutu Kupret karna bau banget anjing', 1, '2025-05-27 06:43:01', NULL),
(10, '683569a34025e_download.png', 'gergeragaergaerg', 'gdgahsthsrtghgftdgerdgdbghtda', 0, '2025-05-27 07:28:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ananda NL', 'admin@gmail.com', 'adasdas', '2025-05-26 05:29:33', NULL),
(2, 'Ananda NL', 'user@gmail.com', 'vgagaerfgarsdfgaersgvrde', '2025-05-26 07:08:05', NULL),
(3, 'Ananda NL', 'user@gmail.com', 'vgagaerfgarsdfgaersgvrde', '2025-05-26 07:56:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name_level` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `portos`
--

CREATE TABLE `portos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_name`, `description`, `photo`) VALUES
(57, '', 'drtsghsergersdgesdgt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `photo`, `skill`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 'Desain Grafis', '<p>ukuyjgjmfumkufykmuyfj</p>', 1, '2025-05-27 07:22:16', '2025-05-27 07:22:16'),
(4, '68356846cac4c_download.png', 'Pengacara', '<p>erbeb aertaertfawrfaswf&nbsp; ert&nbsp; wefr</p>', 1, '2025-05-27 07:22:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_levels` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_levels`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nanda', 'admin@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2025-05-21 01:41:20', '2025-05-23 02:14:46'),
(2, 2, 'Lutfi', 'user@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2025-05-23 02:07:34', '2025-05-27 04:34:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portos`
--
ALTER TABLE `portos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_levels` (`id_levels`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portos`
--
ALTER TABLE `portos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_user_id_level` FOREIGN KEY (`id_levels`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
