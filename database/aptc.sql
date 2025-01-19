-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 07:49 PM
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
-- Database: `aptc`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `announcement` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `userId`, `title`, `announcement`, `date`) VALUES
(2, 7, 'Job offer of Software development', 'Wiredin Rwanda is a cutting-edge software development company committed to delivering innovative solutions to our clients. We specialize in creating robust and scalable software applications that drive business growth. As we continue to expand our team, we are seeking a talented and motivated DevOps Engineer to join our dynamic workforce.', '2025-01-15'),
(3, 7, 'New Advert from APTC Rwanda', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolores corporis incidunt! Facilis, iure quos possimus officia expedita cum assumenda, quas quam sapiente fugiat deleniti alias maxime vel adipisci aut.', '2025-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog`, `image`, `date`) VALUES
(1, 'APTC have helped 20 widows', 'these widows were helped by APTC by APTC since 12 January 2025 ', '../../gallery/img_6787bfd1887898.41725473.jpg', '2025-01-15'),
(2, 'Agro processing Trust Corporation', 'A blog that advocates for sustainable agriculture practices, policies, and research. The NSAC is made up of agricultural producers, educators, researchers, and non-profit grassroots organizations.\r\n\r\nA blog by Bev, who writes about her family\'s organic farming in Central Pennsylvania. Bev\'s family raises goats, horses, pigs, and chickens, and grows their own apples and blueberries.', '../../gallery/img_6788b195a7aef0.42181484.jpg', '2025-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `userId`, `image`, `names`, `title`, `email`, `date`) VALUES
(2, 7, '../uploads/1.png', 'Lt Col. Alexandre KARASIRA', 'Deputy Chief executive Officer & Dire', 'dceo@aptc.rw', '2025-01-15'),
(3, 7, '../uploads/2.jpg', 'Lt Col. Canisius KAYITERA', 'Director of Operations', 'dir_operation@aptc.rw', '2025-01-15'),
(5, 8, '../uploads/125.jpg', 'Lt Col Rogers KABUNGO', 'Managing Director of Rugari Meat Processing', 'mdrugari@rugarimeat.rw', '2025-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `phone`, `password`) VALUES
(4, 'Nzakuzima Benard', 'ivan@gmail.com', 787645672, '$2y$10$BkMmqYus405pkFEqdI0OROTkLpSS8SN.cLYWRwnbhppgbv/JMmVQK'),
(5, 'John doe', 'elisa@gmail.com', 789864536, '$2y$10$XIdTp5ZMLnUY7Hze5pgq..PLkJxHcBa5Xx.CRSFEMpsE5KuwQAfTW'),
(6, 'Kwizera Elisa', 'elisa@tyaza.org', 787647168, '$2y$10$oinXu1P7WObVvDRd./.7gO/cFT/Y8ig8r7KZE3Fqg8SX9PtLCoQa.'),
(7, 'Elisa Kwizera', 'kwizeraelisa77@gmail.com', 787647168, '$2y$10$/vx281uE/Za4kPIs8O9tnu5ppuufqVgESk8AMfiUEFLJyrAZvJRx6'),
(8, 'Kwizera Elisa', 'kwizeraelissa369@gmail.com', 787647168, '$2y$10$Mcv88fF6EGG1PV5aQHbJA.c0amrV30g9cWn/aTMl6Lq7WWgkN1OqS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
