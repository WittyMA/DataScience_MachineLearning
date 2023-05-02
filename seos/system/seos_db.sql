-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(60) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_image` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `seller_id`, `product_image`) VALUES
('airp12', 'air pod pro', 'I aspire to work in an Organization as a team member and contribute my quota to the growth of an organization by applying the knowledge and skills I have and build a strong career in the field of an organization. Also, I determine to work in an environment and associating with people of different culture and religious background.', 120, 1, 'airpod.jpg'),
('bos142', 'beard booster', 'I aspire to work in an Organization as a team member and contribute my quota to the growth of an organization by applying the knowledge and skills I have and build a strong career in the field of an organization. Also, I determine to work in an environment and associating with people of different culture and religious background.', 90, 1, 'beard-booster.jpg'),
('fw45', 'men sport nike', 'I aspire to work in an Organization as a team member and contribute my quota to the growth of an organization by applying the knowledge and skills I have and build a strong career in the field of an organization. Also, I determine to work in an environment and associating with people of different culture and religious background.', 90, 2, 'boys-shoe.jpg'),
('har475', 'harmony code', '75 hours long lasting perfume from dream cosmetics', 250, 2, 'har475.jpg'),
('prd12', 'iphone 12 pro max', '75 hours long lasting perfume from dream cosmetics', 4500, 2, 'prd12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `residence` varchar(30) DEFAULT NULL,
  `pass_word` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `first_name`, `last_name`, `email`, `phone`, `residence`, `pass_word`) VALUES
(1, 'kobby', 'nana', 'judekoomson07@gmail.com', '+233545457857', 'kwapro', '$2y$10$odyEPhDz.CU.BWGGnVl7h.VmFpePzsJQI4TWrMPFpXrbILhKg6qWy'),
(2, 'yaw', 'nana', 'edumensah@outlook.com', '233545457857', 'kwapro', '$2y$10$0O4HViOWmYiuNSriu3kvGurjyoajDbI9brtLr.C.4ktqECiGcXiAO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_products_sellers` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_sellers` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
