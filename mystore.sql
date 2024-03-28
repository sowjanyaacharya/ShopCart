-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`admin_id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(2, 'ayush', 'ayush@gmail.com', '$2y$10$suhXqZF3UrFLpjF54WcRoOcB/.ft7XQj.WO2/.fOJZq1rwF6HJPrO');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(11) NOT NULL,
  `brands_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_category`) VALUES
(2, 'Flipkart'),
(4, 'Meesho'),
(9, 'Shopsy'),
(10, 'Amazon'),
(11, 'swiggy');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `products_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(3, 'Juices'),
(4, 'Shoes'),
(5, 'Frocks'),
(6, 'Sandals'),
(8, 'Vegetable'),
(9, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `pendingorders`
--

CREATE TABLE `pendingorders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingorders`
--

INSERT INTO `pendingorders` (`order_id`, `user_id`, `invoice_no`, `products_id`, `quantity`, `order_status`) VALUES
(1, 1, 1918178672, 1, 1, 'pending'),
(2, 1, 1648252142, 3, 1, 'pending'),
(3, 1, 983014597, 7, 1, 'pending'),
(4, 1, 1212474110, 7, 1, 'pending'),
(5, 2, 1547554370, 4, 1, 'pending'),
(6, 2, 1039037291, 9, 2, 'pending'),
(7, 2, 1305195616, 17, 3, 'pending'),
(8, 2, 398781157, 4, 2, 'pending'),
(9, 2, 8458133, 16, 2, 'pending'),
(10, 2, 2029688768, 13, 1, 'pending'),
(11, 2, 641631620, 11, 1, 'pending'),
(12, 2, 1851414970, 15, 1, 'pending'),
(13, 2, 575288201, 15, 1, 'pending'),
(14, 2, 508934026, 14, 1, 'pending'),
(15, 2, 1684221873, 14, 1, 'pending'),
(16, 2, 631235379, 17, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_title` varchar(100) NOT NULL,
  `products_description` varchar(255) NOT NULL,
  `products_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `products_image1` varchar(255) NOT NULL,
  `products_image2` varchar(255) NOT NULL,
  `products_image3` varchar(255) NOT NULL,
  `products_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_title`, `products_description`, `products_keywords`, `category_id`, `brands_id`, `products_image1`, `products_image2`, `products_image3`, `products_price`, `date`, `status`) VALUES
(4, 'Boys shirts', 'I t is for shelter for boys it looks handsome for boys', 'hhjjgjgjgjgjgjgjjgjgjgj', 5, 2, 'niketshirt.jpg', 'dress2.jpg', 'dress3.jpg', '545', '2023-10-31 01:09:23', 'true'),
(10, 'Kids Frocks', 'Frocks are just amazing', 'Frocks', 5, 4, 'dress2.jpg', 'dress1.jpg', 'dress3.jpg', '555', '2024-01-07 14:13:13', 'true'),
(11, 'Cabbage', 'cabbage is good for health', 'cabbage', 8, 8, 'cabbage.jpg', 'cabbage.jpg', 'cabbage.jpg', '25', '2024-01-07 14:14:19', 'true'),
(12, 'Beans', 'beans is the vegetable which has fabric ', 'beans', 8, 3, 'bean.jpg', 'bean.jpg', 'bean.jpg', '30', '2024-01-07 14:15:07', 'true'),
(13, 'Grapes Juice', 'Brown grapes juice provides more vitamins', 'grapes', 3, 2, 'browngrapes.jpg', 'browngrapes.jpg', 'browngrapes.jpg', '60', '2024-01-07 14:16:29', 'true'),
(14, 'Cheese Burger', 'Burger crispy,crunchy', 'cheese burger', 2, 1, 'cheeseburger.jpg', 'cheeseburger.jpg', 'cheeseburger.jpg', '999', '2024-01-07 14:17:25', 'true'),
(15, 'Fresh Apple Juice', 'One Apple is equal to one healthy life', 'apple', 3, 11, 'applejuice.jpg', 'applejuice.jpg', 'applejuice.jpg', '90', '2024-01-07 14:26:22', 'true'),
(16, 'Puma', 'Shoes are good', 'shoeee', 4, 11, 'shoes.jpg', 'shoes.jpg', 'shoes.jpg', '999', '2024-01-07 15:08:57', 'true'),
(17, 'Rambootan', 'It is good', 'Rambootan', 9, 4, 'rambootan.jpg', 'rambootan.jpg', 'rambootan.jpg', '800', '2024-01-07 15:09:56', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `userorders`
--

CREATE TABLE `userorders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorders`
--

INSERT INTO `userorders` (`order_id`, `user_id`, `amount_due`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(12, 2, 2048, 8458133, 2, '2024-01-07 16:22:47', 'Complete'),
(13, 2, 60, 2029688768, 1, '2024-01-08 17:11:48', 'Complete'),
(14, 2, 25, 641631620, 1, '2024-01-08 17:17:22', 'Complete'),
(15, 2, 90, 1851414970, 1, '2024-01-08 17:32:30', 'Complete'),
(16, 2, 90, 575288201, 1, '2024-01-21 13:49:11', 'Complete'),
(17, 2, 1544, 508934026, 2, '2024-01-22 00:25:26', 'Complete'),
(18, 2, 0, 452882342, 0, '2024-01-22 00:27:40', 'Complete'),
(19, 2, 999, 1684221873, 1, '2024-01-22 11:04:03', 'Complete'),
(20, 2, 800, 631235379, 1, '2024-01-22 11:03:51', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `userpayments`
--

CREATE TABLE `userpayments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpayments`
--

INSERT INTO `userpayments` (`payment_id`, `order_id`, `invoice_no`, `amount`, `paymentmode`, `date`) VALUES
(8, 12, 8458133, 2048, 'PayPal', '2024-01-07 16:22:47'),
(9, 13, 2029688768, 60, 'UPI', '2024-01-08 17:11:48'),
(10, 13, 2029688768, 60, 'UPI', '2024-01-08 17:16:50'),
(11, 14, 641631620, 25, 'NetBanking', '2024-01-08 17:17:22'),
(12, 15, 1851414970, 90, 'NetBanking', '2024-01-08 17:32:30'),
(13, 16, 575288201, 90, 'NetBanking', '2024-01-21 13:49:11'),
(14, 17, 508934026, 1544, 'UPI', '2024-01-22 00:25:26'),
(15, 18, 452882342, 0, 'UPI', '2024-01-22 00:27:40'),
(16, 18, 452882342, 0, 'Select Payment Mode', '2024-01-22 00:29:10'),
(17, 19, 1684221873, 999, 'Select Payment Mode', '2024-01-22 11:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Sowjanya', 'sowjanya@gmail.com', '$2y$10$0N.ykCEWdd2Bqzxn59XFyux2HpO91EYrYM1V6Qir53QXlVvFtJypm', 'adminlogin.jpg', '::1', 'shakthinagara', '9874561231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pendingorders`
--
ALTER TABLE `pendingorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `userorders`
--
ALTER TABLE `userorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `userpayments`
--
ALTER TABLE `userpayments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendingorders`
--
ALTER TABLE `pendingorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userorders`
--
ALTER TABLE `userorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userpayments`
--
ALTER TABLE `userpayments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
