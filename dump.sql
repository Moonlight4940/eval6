-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2025 at 11:45 AM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `module6`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cv` text NOT NULL DEFAULT 'CV de l\'étudiant',
  `dt_naissance` date NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `dt_mise_a_jour` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `prenom`, `nom`, `email`, `cv`, `dt_naissance`, `isAdmin`, `dt_mise_a_jour`) VALUES
(2, 'Bruno', 'Mars', 'bruno@hotmail.com', 'CV de l\'étudiant', '1980-09-30', 0, '2025-02-21 21:49:53'),
(3, 'Lara', 'Fabien', 'lara@gmail.com', 'CV de l\'étudiant', '1983-12-25', 0, '2025-02-21 21:52:31'),
(5, 'Celine', 'Dion', 'celine@yahoo.com', 'CV de l\'étudiant', '1980-08-07', 0, '2025-02-21 21:57:11'),
(6, 'Dua', 'Lipa', 'dualipa@hotmail.fr', 'CV de l\'étudiant', '2002-05-09', 0, '2025-02-21 21:58:38'),
(7, 'Billie', 'Eilish', 'billie@gmail.com', 'CV de l\'étudiant', '2004-05-08', 0, '2025-02-21 22:00:13'),
(8, 'James', 'Brown', 'james@gmail.com', 'CV de l\'étudiant', '1968-05-19', 0, '2025-02-21 22:01:37'),
(9, 'Amy', 'Winehouse', 'awinehouse@hotmail.com', 'CV de l\'étudiant', '1992-09-24', 0, '2025-02-21 22:03:34'),
(10, 'Julien', 'Doré', 'julien@gmail.com', 'CV de l\'étudiant', '1989-11-19', 0, '2025-02-21 22:12:31'),
(11, 'Tom', 'Cruz', 'tom@gmail.com', 'monCV', '1979-05-14', 0, '2025-03-01 10:21:14'),
(12, 'Louane', 'Emera', 'louane@gmail.com', 'monCV', '2000-05-19', 0, '2025-03-02 08:20:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
