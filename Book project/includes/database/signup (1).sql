-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2021 at 07:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_type` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_rating` float DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_photo` text DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usersignup`
--

CREATE TABLE `usersignup` (
  `sno` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersignup`
--

INSERT INTO `usersignup` (`sno`, `username`, `email`, `addr`, `phone`, `pass`, `cpassword`) VALUES
(1, 'admin', 'admin123@gmail.com', 'hanumangarh-rajshthan', '7927400831', 'admin123', 'admin123'),
(2, 'rakesh', 'rakesh@123gmail.com', 'scadg dgdf dhgf', '3849324232', '$2y$10$PUYgFQBby3xqXOii5eaRbuY0RAjE/0qSXbD1BVJ1a17y6XQNs/F/u', '$2y$10$1UILtmB.QZ0g3OAs6SEGzOl.aY3c1V5Q4ZCElB7W8dfijMkw5V4x2'),
(3, 'vikas', 'vikas124@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$GV55LeRQHoFoDMJCAdhH0.2VlrSvU7kgZSV9nzHGfi51O/GajBgJG', '$2y$10$wsFxn7LE1/ELZcCtGVqr0.KcjPkVQL.susNT7W5WKWbBx.F9/FUsS'),
(5, 'pinki', 'pinki123@gmail.om', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$q9lgGWac/HPoZWkv8nHMTOkaLskP/lPJbmLLBlMMQ7ipoLV8hPbcC', '$2y$10$0/YoqMqrWi5J7isBY3M11uiW4g10lN6kmo.8n2087DmtisFPdgF8e'),
(6, 'vikas', 'vikas123@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$3qTT2k6sIMLxpWwX5mvQBudL0u.65UrgZO/jGkdl3T6mDJsDmnWvq', '$2y$10$7IHqEjXT7Rc6DSwETexso.Gyodx1VEjdxjOHdGQTnZjL054ZzYvY6'),
(7, 'vikas', 'vikas125@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$RBzFxX4w7i2TatVkX1GvpO7WFg7Pc1seTuNzYDPeBcgLPVTQ8YcnK', '$2y$10$o7nVgFmnGe0BhoLhucQldek4cvPPOKTZS1Psqw8oytmSwGC2zMYKa'),
(8, 'kalpita', 'kalpita@gmail.com', 'ss', '9876543210', '$2y$10$8FrxGuBNd87cD7/IUpuoXe5oeVPs8rY9TMMZTaDtbUGVzVjaJc5vq', '$2y$10$8FrxGuBNd87cD7/IUpuoXe5oeVPs8rY9TMMZTaDtbUGVzVjaJc5vq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `usersignup`
--
ALTER TABLE `usersignup`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
