-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 12:10 PM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cid` int(10) NOT NULL,
  `Pid` int(10) NOT NULL,
  `IP` varchar(45) NOT NULL,
  `Quan` int(5) DEFAULT 1,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_payment`
--

CREATE TABLE `confirm_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_payment`
--

INSERT INTO `confirm_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 3, 960417135, 24000, 'Netbanking', '2024-08-02 10:01:55'),
(2, 4, 2050688525, 9000, 'COD', '2024-08-02 10:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_percentage` decimal(5,2) NOT NULL,
  `expiration_date` date NOT NULL,
  `used` int(5) NOT NULL,
  `used_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_percentage`, `expiration_date`, `used`, `used_by`) VALUES
(1, '101010', 10.00, '2024-08-01', 1, NULL),
(6, '202020', 20.00, '2024-08-03', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usage`
--

CREATE TABLE `coupon_usage` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `coupon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `cPassword` varchar(8) NOT NULL,
  `Uip` varchar(45) NOT NULL,
  `OTP` int(10) NOT NULL,
  `OTP_Expiry` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UID`, `Username`, `Address`, `Email`, `Password`, `cPassword`, `Uip`, `OTP`, `OTP_Expiry`) VALUES
(1, 'One', 'Arithmetic, number', 'one@gmail.com', '11111111', '11111111', '::1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uid`, `amount_due`, `invoice_number`, `total_products`, `date`, `status`) VALUES
(1, 0, 24000, 1559880759, 2, '2024-08-02 09:57:49', 'pending'),
(2, 0, 0, 66932841, 0, '2024-08-02 09:58:44', 'pending'),
(3, 1, 24000, 960417135, 2, '2024-08-02 10:01:55', 'Complete'),
(4, 1, 9000, 2050688525, 1, '2024-08-02 10:08:37', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`oid`, `uid`, `invoice_number`, `pid`, `quantity`, `status`) VALUES
(1, 0, 1559880759, 10, 1, 'pending'),
(2, 0, 1559880759, 8, 1, 'pending'),
(3, 1, 960417135, 10, 1, 'pending'),
(4, 1, 960417135, 8, 1, 'pending'),
(5, 1, 2050688525, 10, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(5) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `Pimg` varchar(500) NOT NULL,
  `Decp` varchar(100) NOT NULL,
  `Price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `Pname`, `Pimg`, `Decp`, `Price`) VALUES
(5, 'shoe', 'Pimgp1.jpg', '        The Gray nike', 15000),
(6, 'Shoe2', 'Pimgp2.jpg', '        Yellow Nike', 15500),
(7, 'Shoe3', 'Pimgp3.jpg', '     xyz  ', 15000),
(8, 'Shoe4', 'Pimgp4.jpg', '        Golden Nike', 20000),
(9, 'Shoe5', 'Pimgp6.jpg', 'Sun Hot ', 17000),
(10, 'Shoe6', 'Pimgp7.jpg', 'Sky Gray', 10000),
(12, 'Shoe2', 'Pimgp5.jpg', '        ghfhd', 54544),
(13, 'Shoe4', 'Pimgp6.jpg', '        urthth', 56660),
(14, 'Shoe5', 'Pimgp4.jpg', '        bghvutyg', 20000),
(15, 'xyz', 'Pimgp8.jpg', '       hfgjher ', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `coupon_usage`
--
ALTER TABLE `coupon_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `ID` (`PID`),
  ADD UNIQUE KEY `Pname` (`Pname`,`Pimg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_usage`
--
ALTER TABLE `coupon_usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `UID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupon_usage`
--
ALTER TABLE `coupon_usage`
  ADD CONSTRAINT `coupon_usage_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
