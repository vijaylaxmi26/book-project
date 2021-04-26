-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 08:09 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcategory` ()  select * from `category` order by `id`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getcontact` ()  select * from `contact_us` order by `id`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getorders` ()  select orders.*,orderstatus.ostatus,products.product_name from `orders`,`orderstatus`,`products` where `order_status`=`os_id` and `product_id`=`p_id` order by `order_id`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getproducts` ()  select products.*,category.cat_type as cat_type from `products` join `category` where `id`=`cat_id` order by `product_id`$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `countcategory` () RETURNS INT(11) BEGIN
  DECLARE c int(11);
  SELECT count(id) into c from `category`;
  RETURN c;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `countmessage` () RETURNS INT(11) BEGIN
  DECLARE c int(11);
  SELECT count(id) into c from `contact_us` where `status`='0';
  RETURN c;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `countproduct` () RETURNS INT(11) BEGIN
  DECLARE c int(11);
  SELECT count(product_id) into c from `products`;
  RETURN c;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `countproductcat` (`id` INT(11) UNSIGNED) RETURNS INT(11) UNSIGNED BEGIN
  DECLARE c int(11);
  select count(`product_id`) into c from `products` where `cat_id`=`id`;
  RETURN c;
END$$

DELIMITER ;

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
(1, 'Fantacie', 1),
(3, 'Story book', 1),
(4, 'Thrillers', 1);

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
(4, 'techno starks', 'technostarks03@gmail.com', 'can we buy your book?', 1),
(5, 'aastha', 'aastha123@gmail.com', 'are these books for sale?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_add` varchar(255) NOT NULL,
  `order_pincode` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 1,
  `order_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_add`, `order_pincode`, `total_price`, `order_status`, `order_on`, `p_id`, `order_qty`, `user_id`, `order_rating`) VALUES
(1, 'Gandhinagar, Gujrat', 112345, 1400, 5, '2021-04-25 13:37:27', 1, 2, 2, 1.3),
(2, 'xxxxxxxxxxxx', 1111231, 1500, 2, '2021-04-26 07:18:13', 5, 5, 2, 2.5),
(4, 'xxxx', 45624, 500, 1, '2021-04-26 10:53:48', 5, 1, 4, 3.1);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `rating` AFTER INSERT ON `orders` FOR EACH ROW UPDATE `products` SET `product_rating` = (SELECT AVG(order_rating) FROM `orders` GROUP BY `p_id` HAVING `p_id` = `new.p_id`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_quatity` AFTER INSERT ON `orders` FOR EACH ROW UPDATE `products` set `product_quantity`= ((SELECT `product_quantity` from `products` where `product_id`=new.p_id)-new.order_qty) where `product_id`=new.p_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `os_id` int(11) NOT NULL,
  `ostatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`os_id`, `ostatus`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text NOT NULL,
  `product_selleid` int(12) DEFAULT NULL,
  `product_price` int(12) NOT NULL,
  `product_rating` float NOT NULL DEFAULT 0,
  `product_quantity` int(12) DEFAULT NULL,
  `product_photo` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_discription`, `product_selleid`, `product_price`, `product_rating`, `product_quantity`, `product_photo`, `status`, `cat_id`) VALUES
(1, 'graphic design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 425, 700, 1.3, 5, 'book3.jpg', 0, 1),
(2, 'neurologic\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 321, 1500, 3.4, 9, 'book2.jpg', 1, 3),
(3, 'Your Soul is a River', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 453, 550, 0, 16, 'book1.jpg', 1, 1),
(4, 'The passion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 465, 450, 1.2, 40, 'book4.jpg', 1, 4),
(6, ' Women', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 632, 600, 0, 10, 'book6.jpg', 1, 1),
(7, 'your soul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 154, 1200, 0, 16, 'book1.jpg', 1, 1),
(11, 'pease', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 218, 0, 27, 'book1.jpg', 1, 3),
(18, 'Face it Debbie Harry', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 125, 700, 1.3, 5, '9023054097_', 1, 3);

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
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersignup`
--

INSERT INTO `usersignup` (`sno`, `username`, `email`, `addr`, `phone`, `pass`) VALUES
(1, 'admin', 'admin123@gmail.com', 'hanumangarh-rajshthan', '7927400831', 'admin123'),
(2, 'rakesh', 'rakesh@123gmail.com', 'scadg dgdf dhgf', '3849324232', '$2y$10$PUYgFQBby3xqXOii5eaRbuY0RAjE/0qSXbD1BVJ1a17y6XQNs/F/u'),
(3, 'vikas', 'vikas124@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$GV55LeRQHoFoDMJCAdhH0.2VlrSvU7kgZSV9nzHGfi51O/GajBgJG'),
(5, 'pinki', 'pinki123@gmail.om', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$q9lgGWac/HPoZWkv8nHMTOkaLskP/lPJbmLLBlMMQ7ipoLV8hPbcC'),
(6, 'vikas', 'vikas123@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$3qTT2k6sIMLxpWwX5mvQBudL0u.65UrgZO/jGkdl3T6mDJsDmnWvq'),
(7, 'vikas', 'vikas125@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$RBzFxX4w7i2TatVkX1GvpO7WFg7Pc1seTuNzYDPeBcgLPVTQ8YcnK'),
(8, 'kalpita', 'kalpita@gmail.com', 'ss', '9876543210', '$2y$10$8FrxGuBNd87cD7/IUpuoXe5oeVPs8rY9TMMZTaDtbUGVzVjaJc5vq');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
