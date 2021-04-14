CREATE TABLE `product` (
  `product_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text NOT NULL,
  `product_selleid` int(12) NOT NULL,
  `product_catagary` varchar(255) NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_rating` float NOT NULL,
  `product_quantity` int(12) NOT NULL,
  `product_photo` text NOT NULL
); 

INSERT INTO `product` (`product_id`, `product_name`, `product_discription`, `product_selleid`, `product_catagary`, `product_price`, `product_rating`, `product_quantity`, `product_photo`) VALUES
(1, 'graphic design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 425, 'tech', 700, 4.2, 5, 'book3.jpg'),
(2, 'neurologic\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 321, 'biology', 1500, 4.6, 10, 'book2.jpg'),
(3, 'Your Soul is a River', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 453, 'Thriller', 550, 5, 16, 'book1.jpg'),
(4, 'The passion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 465, 'Storybook', 450, 3.6, 40, 'book4.jpg'),
(5, 'Face it Debbie Harry', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 125, 'Storybook', 300, 4.1, 12, 'book5.jpg'),
(6, ' Women', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 632, 'Storybook', 600, 3.6, 10, 'book6.jpg'),
(7, 'your soul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 154, 'storybook', 1200, 1.2, 16, 'book1.jpg');

CREATE TABLE `usersignup` (
  `sno` int(255) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
);

INSERT INTO `usersignup` (`sno`, `username`, `email`, `addr`, `phone`, `pass`, `cpassword`) VALUES
(1, 'admin', 'admin123@gmail.com', 'hanumangarh-rajshthan', '7927400831', 'admin123', 'admin123'),
(2, 'rakesh', 'rakesh@123gmail.com', 'scadg dgdf dhgf', '3849324232', '$2y$10$PUYgFQBby3xqXOii5eaRbuY0RAjE/0qSXbD1BVJ1a17y6XQNs/F/u', '$2y$10$1UILtmB.QZ0g3OAs6SEGzOl.aY3c1V5Q4ZCElB7W8dfijMkw5V4x2'),
(3, 'vikas', 'vikas124@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$GV55LeRQHoFoDMJCAdhH0.2VlrSvU7kgZSV9nzHGfi51O/GajBgJG', '$2y$10$wsFxn7LE1/ELZcCtGVqr0.KcjPkVQL.susNT7W5WKWbBx.F9/FUsS'),
(5, 'pinki', 'pinki123@gmail.om', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$q9lgGWac/HPoZWkv8nHMTOkaLskP/lPJbmLLBlMMQ7ipoLV8hPbcC', '$2y$10$0/YoqMqrWi5J7isBY3M11uiW4g10lN6kmo.8n2087DmtisFPdgF8e'),
(6, 'vikas', 'vikas123@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$3qTT2k6sIMLxpWwX5mvQBudL0u.65UrgZO/jGkdl3T6mDJsDmnWvq', '$2y$10$7IHqEjXT7Rc6DSwETexso.Gyodx1VEjdxjOHdGQTnZjL054ZzYvY6'),
(7, 'vikas', 'vikas125@gmail.com', 'wordno:7 ,Rajkumar,Dholipal', '3849324232', '$2y$10$RBzFxX4w7i2TatVkX1GvpO7WFg7Pc1seTuNzYDPeBcgLPVTQ8YcnK', '$2y$10$o7nVgFmnGe0BhoLhucQldek4cvPPOKTZS1Psqw8oytmSwGC2zMYKa');

