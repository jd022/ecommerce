-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 04:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, 'smadiccu@gmail.com', '$2y$10$Sfbz.Rk.O01G20ulYaYwzeGDOLY1HEjdajcNy3o9AkEAX6OkO3gi2', '2022-10-28 11:05:18', '2022-10-28 11:05:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `price` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `product_type`, `price`, `image`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, '84562983', 'Melt Tee', 'T-Shirt', '450', 'Melt_tee.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, '82758426', 'Take Risk Dye', 'T-Shirt', '600', 'Take Risk Dye.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, '38175967', 'Kendrick L. Bootleg', 'T-Shirt', '1000', 'Kendrick B.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, '83721543', 'WICO Hoodie', 'Hoodie', '1000', 'WICO.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, '67251438', 'Frank Ocean Bootleg', 'T-shirt', '699', 'Frank.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, '62514837', 'Miata Chrome Tee', 'T-Shirt', '600', 'Miata.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` varchar(150) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `size`, `quantity`, `stock`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, '84562983', 'Medium', 7, 'in', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, '84562983', 'Large', 10, 'in', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, '84562983', 'X-Large', 10, 'in', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, '84562983', 'XX-Large', 10, 'in', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_code` varchar(150) NOT NULL,
  `brgy_no` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `validation` varchar(20) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `first_name`, `last_name`, `address`, `p_code`, `brgy_no`, `email`, `password`, `validation`, `otp`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(13, '670732221028', 'Jade Mark', 'Lapore', '146 WALING WALING ST. PUNTA, STA ANA MANILA', '0199', '900', 'jdmrklapore22@gmail.com', '$2y$10$Sfbz.Rk.O01G20ulYaYwzeGDOLY1HEjdajcNy3o9AkEAX6OkO3gi2', '1', '', '2022-10-28 07:41:19', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(150) NOT NULL,
  `price` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `user_id`, `order_id`, `product_id`, `quantity`, `size`, `price`, `status`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(48, '670732221028', '002210111', '84562983', 2, 'Large', '900', 'Delivered', '2022-10-28 15:25:22', '0000-00-00 00:00:00', ''),
(49, '670732221028', '0022109205', '84562983', 3, 'X-Large', '1350', 'Pending', '2022-10-28 15:25:58', '0000-00-00 00:00:00', ''),
(53, '670732221028', '', '84562983', 3, 'Medium', '1350', 'Cart', '2022-10-28 21:13:43', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD CONSTRAINT `product_stocks_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
