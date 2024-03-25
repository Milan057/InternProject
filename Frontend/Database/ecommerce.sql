-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 03:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminview`
-- (See below for the actual view)
--
CREATE TABLE `adminview` (
`delivery_id` int(11)
,`purchase_date` datetime
,`success_status` tinyint(1)
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `delivery_address` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `seller_id`, `product_id`, `order_date`, `order_quantity`, `total_price`, `delivery_address`, `status`) VALUES
(1, 3, 7, 38, '2023-01-09', 1, 1000, 'Kathmandu', 1),
(2, 1, 4, 28, '2023-05-19', 5, 100, 'kathmandu', 0),
(3, 1, 5, 33, '2023-05-19', 3, 1260, 'kathmandu', 0),
(4, 1, 4, 32, '2023-05-19', 2, 1400, 'kathmandu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Grocery'),
(2, 'Clothes'),
(3, 'Electronics'),
(4, 'Dairy Products'),
(5, 'Cosmetic'),
(9, 'Automobiles');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`, `contact_number`, `email`, `address`, `status`) VALUES
(1, 'Diksha', 'Abcd1234', '9845115153', 'diksha@gmail.com', 'kathmandu', 1),
(3, 'Drishti Satyal', 'Abcd1234', '9845123547', 'drishti@gmail.com', 'Kathmandu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `success_status` tinyint(1) NOT NULL,
  `payment` int(11) NOT NULL,
  `involved_vendors` int(11) NOT NULL,
  `ready_vendors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `purchase_date`, `success_status`, `payment`, `involved_vendors`, `ready_vendors`) VALUES
(1, '2023-01-09 09:29:27', 1, 1000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `sucess_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `delivery_id`, `order_date`, `sucess_status`) VALUES
(1, 1, 1, '2023-01-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `photo`, `seller_id`, `category_id`, `price`, `tag`, `quantity`, `expiry_date`, `description`, `status`) VALUES
(27, 'Biscuit', '/ecommerce/seller/itemsphoto/biscuit.jpg', 4, 4, 50, 'Biscuit', 5000, '2022-12-07', 'Coconut Biscuit', 1),
(28, 'Cadbury', '/ecommerce/seller/itemsphoto/cadbury.png', 4, 1, 20, 'Cadbury Chocolate', 100, '2022-12-14', 'Chocolate', 1),
(29, 'Wai Wai', '/ecommerce/seller/itemsphoto/WAI-WAI-VEG-greatdeals99-1.jpg', 4, 1, 20, 'noodles', 60, '2022-12-14', 'Tasty Noodles', 1),
(30, 'Iphone 13 Pro', '/ecommerce/seller/itemsphoto/iphone-13-pro-max-gold-select.png', 4, 3, 150000, 'Mobile iphone phone', 5, '0000-00-00', 'Made By Apple', 1),
(31, 'Acer Nitro 5', '/ecommerce/seller/itemsphoto/acer.jpg', 4, 3, 120000, 'Laptop Gaming Acer Nitro', 10, '0000-00-00', 'Gaming Laptop', 1),
(32, 'Mi Earphones', '/ecommerce/seller/itemsphoto/miearphone.jpg', 4, 3, 700, 'Earphones Headphones', 100, '0000-00-00', 'Original Mi Earphones', 1),
(33, 'Dove Shampoo', '/ecommerce/seller/itemsphoto/4800888154347.01-47379523-png.png', 5, 5, 420, 'shampoo cosmetic', 50, '0000-00-00', 'Dove Shampoo', 1),
(34, 'Razor', '/ecommerce/seller/itemsphoto/S1707dbf852f447ec80faafe3fe27b2faz.jpg', 5, 3, 1000, 'Razor trim beard dari katni machine', 15, '2024-01-11', 'asdfasdf', 1),
(35, 'Dell Laptop', '/ecommerce/seller/itemsphoto/photo-1588872657578-7efd1f1555ed.jfif', 6, 3, 70000, 'Laptop electronics dell', 5, '0000-00-00', 'Dell Laptop 8 GB Ram', 1),
(36, 'Hisense TV', '/ecommerce/seller/itemsphoto/32_40_43A4G-Product_Page_Page_1400x830-1.jpg', 6, 3, 30000, 'TV television ', 7, '0000-00-00', 'Hisense LED TV 32 inch', 1),
(37, 'Go Pro Hero 10', '/ecommerce/seller/itemsphoto/gopro.jfif', 6, 3, 50000, 'go pro action camera', 5, '0000-00-00', 'GO Pro ', 1),
(38, 'Heater', '/ecommerce/seller/itemsphoto/heater.png', 7, 3, 1000, 'Heater winter jado ', 100, '0000-00-00', 'High Quality Heater', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `password`, `address`, `contact_number`, `status`, `active`) VALUES
(1, 'Milan Trades', 'milanaryal@gmail.com', 'milan', 'Kathmandu', '9843030742', 1, 1),
(2, 'Dhiraj Bikram Shah', 'dhirajbikram@gmail.com', 'Abcd1234', 'Chhaimale', '9845124567', 1, 1),
(3, 'Sanjeev Dulal', 'sanjeev@gmail.com', 'Abcd1234', 'Kathmandu', '9841245788', 1, 1),
(4, 'Milan', 'milanaryal57@gmail.com', 'Abcd1234', 'Kathmandu', '9843030742', 1, 1),
(5, 'Thanos Store', 'thanos@gmail.com', 'Abcd1234', 'New Road', '9843054125', 1, 1),
(6, 'Abc Trades', 'abc@gmail.com', 'Abcd1234', 'Kathmandu', '9845124578', 1, 1),
(7, 'Shobha Aryal', 'shobha@gmail.com', 'Abcd1234', 'Kathmandu', '9843030742', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller1`
-- (See below for the actual view)
--
CREATE TABLE `seller1` (
`delivery_id` int(11)
,`purchase_date` datetime
,`sucess_status` int(11)
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller4`
-- (See below for the actual view)
--
CREATE TABLE `seller4` (
`delivery_id` int(11)
,`purchase_date` datetime
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`cartstatus` tinyint(1)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
,`success_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller5`
-- (See below for the actual view)
--
CREATE TABLE `seller5` (
`delivery_id` int(11)
,`purchase_date` datetime
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`cartstatus` tinyint(1)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
,`success_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller7`
-- (See below for the actual view)
--
CREATE TABLE `seller7` (
`delivery_id` int(11)
,`purchase_date` datetime
,`cart_id` int(11)
,`sellerid` int(11)
,`price` int(11)
,`product_id` int(11)
,`product_name` varchar(50)
,`customer_name` varchar(100)
,`order_quantity` int(11)
,`delivery_address` varchar(50)
,`cartstatus` tinyint(1)
,`involved_vendors` int(11)
,`ready_vendors` int(11)
,`success_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `vendorapproval`
--

CREATE TABLE `vendorapproval` (
  `id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendorapproval`
--

INSERT INTO `vendorapproval` (`id`, `delivery_id`, `vendor_id`) VALUES
(1, 2, 5),
(2, 1, 5),
(3, 1, 4),
(4, 2, 4),
(5, 3, 5),
(6, 3, 4),
(7, 4, 4),
(8, 4, 5),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5),
(12, 8, 4),
(13, 11, 4),
(14, 12, 5),
(15, 1, 7);

-- --------------------------------------------------------

--
-- Structure for view `adminview`
--
DROP TABLE IF EXISTS `adminview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminview`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `delivery`.`success_status` AS `success_status`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `delivery`.`involved_vendors` = `delivery`.`ready_vendors` ;

-- --------------------------------------------------------

--
-- Structure for view `seller1`
--
DROP TABLE IF EXISTS `seller1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller1`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `orders`.`sucess_status` AS `sucess_status`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `seller4`
--
DROP TABLE IF EXISTS `seller4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller4`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `cart`.`status` AS `cartstatus`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors`, `delivery`.`success_status` AS `success_status` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 4 ;

-- --------------------------------------------------------

--
-- Structure for view `seller5`
--
DROP TABLE IF EXISTS `seller5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller5`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `cart`.`status` AS `cartstatus`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors`, `delivery`.`success_status` AS `success_status` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 5 ;

-- --------------------------------------------------------

--
-- Structure for view `seller7`
--
DROP TABLE IF EXISTS `seller7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller7`  AS SELECT `delivery`.`id` AS `delivery_id`, `delivery`.`purchase_date` AS `purchase_date`, `cart`.`id` AS `cart_id`, `cart`.`seller_id` AS `sellerid`, `cart`.`total_price` AS `price`, `product`.`id` AS `product_id`, `product`.`name` AS `product_name`, `customer`.`name` AS `customer_name`, `cart`.`order_quantity` AS `order_quantity`, `cart`.`delivery_address` AS `delivery_address`, `cart`.`status` AS `cartstatus`, `delivery`.`involved_vendors` AS `involved_vendors`, `delivery`.`ready_vendors` AS `ready_vendors`, `delivery`.`success_status` AS `success_status` FROM (`customer` left join (`product` left join (`cart` left join (`orders` left join `delivery` on(`delivery`.`id` = `orders`.`delivery_id`)) on(`cart`.`id` = `orders`.`cart_id`)) on(`cart`.`product_id` = `product`.`id`)) on(`cart`.`customer_id` = `customer`.`id`)) WHERE `cart`.`seller_id` = 7 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendorapproval`
--
ALTER TABLE `vendorapproval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendorapproval`
--
ALTER TABLE `vendorapproval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `vendorapproval`
--
ALTER TABLE `vendorapproval`
  ADD CONSTRAINT `vendorapproval_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `vendorapproval_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `seller` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
