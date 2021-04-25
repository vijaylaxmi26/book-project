CREATE TABLE `admin` (
  `aminid` int(11) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `apass` varchar(255) NOT NULL,
  `auser` varchar(255) NOT NULL
);

INSERT INTO `admin` (`aminid`, `aemail`, `apass`, `auser`) VALUES
(1, 'admin123@gmail.com', 'admin@123', 'admin123'),
(2, 'kalpita@gmail.com', '111', 'kalpita');

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_type` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 1
);

INSERT INTO `category` (`id`, `cat_type`, `status`) VALUES
(1, 'fantasys', 1),
(2, 'fiction', 0),
(3, 'surprise', 1);

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
);

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `status`) VALUES
(3, 'joe', 'joe123@gmail.com', 'nice content', 0),
(4, 'techno starks', 'technostarks03@gmail.com', 'can we buy your book?', 1);

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_add` varchar(255) NOT NULL,
  `order_pincode` int(10) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'pending'
);

INSERT INTO `orders` (`order_id`, `order_add`, `order_pincode`, `order_qty`, `email`, `time`, `p_id`, `user_id`, `status`) VALUES
(10, 'xx', 567, 4, 'kalpita@gmail.com', '2021-04-25 19:33:15', 9, 1, 'pending'),
(11, 'xx', 111, 3, 'v@gmail.com', '2021-04-25 19:33:48', 9, 2, 'pending');

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text DEFAULT NULL,
  `product_selleid` int(12) DEFAULT NULL,
  `product_price` int(12) NOT NULL,
  `product_rating` float DEFAULT 0,
  `product_quantity` int(12) DEFAULT 1,
  `product_photo` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `cat_id` int(11) NOT NULL
);

INSERT INTO `products` (`product_id`, `product_name`, `product_discription`, `product_selleid`, `product_price`, `product_rating`, `product_quantity`, `product_photo`, `status`, `cat_id`) VALUES
(5, 'Charlie and the chocolate factory ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.', NULL, 200, 3, 7, '1.jpg', 0, 1),
(6, 'Pure Soul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.', NULL, 1000, 3.4, 20, '2.jpg', 1, 2),
(7, 'Rold', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.', NULL, 400, 2, 7, '3.jpg', 1, 1),
(8, 'Giants', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.', NULL, 1200, 4.4, 20, '4.jpg', 1, 2),
(9, 'Fairy Tales', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur officiis iure ab perferendis. Nesciunt impedit nisi error nihil explicabo, quas fugit consequuntur dicta dolorem! Saepe cupiditate consequatur vel! Ducimus, consequatur.', NULL, 700, 3, 7, '5.jpg', 1, 3);

CREATE TABLE `usersignup` (
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pass` varchar(255) NOT NULL
);

INSERT INTO `usersignup` (`sno`, `username`, `email`, `addr`, `phone`, `pass`) VALUES
(1, 'kalpita', 'kalpita@gmail.com', 'xx', '1234567890', '111'),
(2, 'vk', 'v@gmail.com', 'xx', '1234567', '111'),
(3, 'prerna', 'kalpita123@gmail.com', 'ss', '9876543210', '111');

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;
