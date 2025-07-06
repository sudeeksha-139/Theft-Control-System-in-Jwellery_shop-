-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `Category_master_id` int(10) UNSIGNED NOT NULL,
  `Category` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`Category_master_id`, `Category`) VALUES
(1, 'Necklaces'),
(2, 'Earrings'),
(4, 'Bracelets'),
(5, 'Finger rings'),
(6, 'Toe rings'),
(10, 'ring');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Feedback` varchar(450) DEFAULT NULL,
  `Date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_id`, `Name`, `Feedback`, `Date`) VALUES
(1, 'Shrusha', 'nice!!', '2024-04-04 12:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `Item_master_id` int(10) UNSIGNED NOT NULL,
  `Category_master_id` varchar(45) DEFAULT NULL,
  `Pname` varchar(600) DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `Image1` varchar(4500) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Quantity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`Item_master_id`, `Category_master_id`, `Pname`, `Description`, `Image1`, `Price`, `Quantity`) VALUES
(1, '4', 'siliver', 'drftcvghj', '1712212413.jpeg', '200', '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `User_ID` varchar(45) NOT NULL,
  `order_numbar` text NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `User_ID`, `order_numbar`, `order_status`, `order_date`) VALUES
(1, '11', '1712212595660E4A733F8CF', 'Order Placed', '2024-04-04 12:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE `order_temp` (
  `temp_id` int(11) NOT NULL,
  `order_numbar` varchar(25) NOT NULL,
  `Item_master_id` varchar(45) NOT NULL,
  `Quantity` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_temp`
--

INSERT INTO `order_temp` (`temp_id`, `order_numbar`, `Item_master_id`, `Quantity`, `price`) VALUES
(1, '1712212595660E4A733F8CF', '1', '1', '200');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `card_number` varchar(50) DEFAULT NULL,
  `card_holder_name` varchar(100) NOT NULL,
  `card_expiry_month` varchar(50) DEFAULT NULL,
  `card_expiry_year` year(4) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_numbar` varchar(25) NOT NULL,
  `payment_type` varchar(10) DEFAULT NULL,
  `payment_status` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_paid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`card_number`, `card_holder_name`, `card_expiry_month`, `card_expiry_year`, `payment_id`, `order_numbar`, `payment_type`, `payment_status`, `amount`, `date_paid`) VALUES
('8745128745120946', 'shrusha', '1', '2024', 1, '1712212595660E4A733F8CF', 'Card', 'Success', 200, '2024-04-04 12:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `User_ID` int(10) UNSIGNED NOT NULL,
  `User_name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Usertype` varchar(45) DEFAULT NULL,
  `Address` varchar(450) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`User_ID`, `User_name`, `Password`, `Email`, `Usertype`, `Address`, `Phone`) VALUES
(1, 'vineeth', '1234', 'vnthpai@gmail.com', 'Admin', 'Koteshwar', ''),
(11, 'shrusha', 'shrusha123', 's@gmail.com', 'Buyer', 'udupi', ''),
(12, 'sharal', '123456', 'sh@gmail.com', 'Seller', 'udupi', '8794561245'),
(21, 'Rachitha', '123', 'rachitha@gmail.com', 'Seller', 'mangalore', '8529637415');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`Category_master_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_id`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`Item_master_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `Category_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `Item_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `User_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
