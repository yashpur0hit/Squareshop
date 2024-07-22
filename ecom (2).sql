-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 01:28 PM
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
  `Quan` int(11) DEFAULT 1
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
(1, 1, 9738322, 45500, 'COD (Cash On Delivery)', '2024-07-20 11:12:40'),
(2, 2, 1764125825, 30500, 'UPI', '2024-07-20 11:13:09'),
(3, 3, 1748303559, 45500, 'UPI', '2024-07-20 11:13:13');

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
  `Uip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UID`, `Username`, `Address`, `Email`, `Password`, `cPassword`, `Uip`) VALUES
(2, 'One', 'Arithmetic, numbers', 'one@gmail.com', '11111111', '11111111', '::1'),
(3, 'Two', 'nbcjsdfk', 'two@gmail.com', '22222222', '22222222', '::1');

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
(1, 2, 45500, 9738322, 3, '2024-07-20 11:12:40', 'Complete'),
(2, 2, 30500, 1764125825, 2, '2024-07-20 11:13:09', 'Complete'),
(3, 2, 45500, 1748303559, 3, '2024-07-20 11:13:13', 'Complete');

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
(1, 2, 9738322, 5, 1, 'pending'),
(2, 2, 9738322, 6, 1, 'pending'),
(3, 2, 9738322, 7, 1, 'pending'),
(4, 2, 1764125825, 6, 1, 'pending'),
(5, 2, 1764125825, 7, 1, 'pending'),
(6, 2, 1748303559, 5, 1, 'pending'),
(7, 2, 1748303559, 6, 1, 'pending'),
(8, 2, 1748303559, 7, 1, 'pending');

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
(11, 'Shoe7', 'Pimge-p1.png', 'Multi-Color', 25000),
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
  MODIFY `Cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `UID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
