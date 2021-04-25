-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 12:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aminid` int(11) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apass` varchar(255) NOT NULL,
  `auser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aminid`, `aemail`, `apass`, `auser`) VALUES
(1, 'admin123@gmail.com', 'admin@123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_type` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_type`, `status`) VALUES
(1, 'cat1', 0),
(3, 'cat3', 1),
(4, 'cat2', 1),
(7, 'cat5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'ravesh', 'ravesh123@gmail.com', 'i like your website', 0),
(3, 'joe', 'joe123@gmail.com', 'nice content', 0),
(4, 'techno starks', 'technostarks03@gmail.com', 'can we buy your book?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text NOT NULL,
  `product_selleid` int(12) DEFAULT NULL,
  `product_price` int(12) NOT NULL,
  `product_rating` float DEFAULT 0,
  `product_quantity` int(12) DEFAULT NULL,
  `product_photo` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_discription`, `product_selleid`, `product_price`, `product_rating`, `product_quantity`, `product_photo`, `status`, `pcategory_id`) VALUES
(1, 'graphic design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 425, 700, 4.2, 5, 'book3.jpg', 1, 1),
(2, 'neurologic\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 321, 1500, 4.6, 10, 'book2.jpg', 1, 3),
(3, 'Your Soul is a River', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 453, 550, 5, 16, 'book1.jpg', 1, 1),
(4, 'The passion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 465, 450, 3.6, 40, 'book4.jpg', 1, 4),
(5, 'Face it Debbie Harry', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 125, 300, 4.1, 12, 'book5.jpg', 1, 7),
(6, ' Women', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 632, 600, 3.6, 10, 'book6.jpg', 1, 1),
(7, 'your soul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 154, 1200, 1.2, 16, 'book1.jpg', 1, 1),
(11, 'pease', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 218, 0, 26, '3051799683_pexels-fotografierende-3563625.jpg', 1, 7);

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aminid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `usersignup`
--
ALTER TABLE `usersignup`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
