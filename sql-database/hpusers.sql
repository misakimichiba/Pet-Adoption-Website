-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2024 at 07:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptionform`
--

CREATE TABLE `adoptionform` (
  `formID` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `animalName` varchar(100) NOT NULL,
  `formStatus` varchar(100) NOT NULL,
  `animalID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adoptionform`
--

INSERT INTO `adoptionform` (`formID`, `username`, `animalName`, `formStatus`, `animalID`, `userID`) VALUES
(2, 'test', 'Harvey', 'Accepted', 4, 2),
(3, 'test', 'Fluffy', 'Pending', 6, 2),
(4, 'test', 'Onion', 'Accepted', 10, 2),
(5, 'test', 'Food Tart', 'Rejected', 12, 2),
(6, 'chicken', 'Food Tart', 'Pending', 12, 12),
(7, 'test', 'Harimau', 'Pending', 11, 2),
(8, 'test2', 'Fluffy', 'Pending', 6, 13),
(9, 'Steven', 'Lobster', 'Accepted', 14, 14),
(10, 'potato', 'Harvey', 'Pending', 4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `animalName` varchar(100) NOT NULL,
  `animalType` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `vaccinated` varchar(10) NOT NULL,
  `dewormed` varchar(10) NOT NULL,
  `neutered` varchar(10) NOT NULL,
  `animalCondition` varchar(100) NOT NULL,
  `imgType` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `animalName`, `animalType`, `gender`, `age`, `colour`, `vaccinated`, `dewormed`, `neutered`, `animalCondition`, `imgType`) VALUES
(4, 'Harvey', 'Cat', 'Female', '2 Years Old', 'Black and White', 'Yes', 'Yes', 'Yes', 'Healthy', 'jpg'),
(5, 'Skittles', 'Dog', 'Male', '1 Year Old', 'Brown and White', 'Yes', 'Yes', 'No', 'Asthma', 'jpg'),
(6, 'Fluffy', 'Dog', 'Female', '10 Months Old', 'White', 'Yes', 'Yes', 'Yes', 'Healthy', 'jpg'),
(9, 'Bonito', 'Dog', 'Female', '19', 'Brown', 'Yes', 'Yes', 'Yes', 'Healthy', 'jpg'),
(15, 'Lobster', 'Other', 'Male', '100', 'Steven', 'No', 'No', 'No', 'Not fresh anymore :(', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_data`
--

CREATE TABLE `chart_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `method` text DEFAULT NULL,
  `total_products` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chart_data`
--

INSERT INTO `chart_data` (`id`, `user_id`, `method`, `total_products`, `payment_status`, `total_price`) VALUES
(231, 1, 'credit card', ', Gold Ring1 (1) ', 'pending', 100),
(232, 1, 'paytm', ', Gold Ring1 (2) ', 'pending', 200),
(233, 3, 'paypal', ', Gold Ring1 (3) ', 'complete', 300),
(234, 1, 'paytm', ', Silver Necklace Diamond (1) , Silver Necklace (1) ', 'complete', 240),
(235, 3, 'credit card', ', Gold Earrings (1) , Gold Necklace (1) , Gold Bracelet (1) ', 'pending', 305),
(236, 1, 'cash on delivery', ', Gold Earrings (1) , Gold Ring (1) , Gold Bracelet (1) ', 'pending', 255),
(237, 1, 'cash on delivery', ', Silver Ring (1) , Gold Earrings (3) , Gold Bracelet (3) ', 'pending', 515),
(238, 4, 'credit card', ', Gold Ring (1) , Gold Earrings (2) , Silver Necklace (2) ', 'pending', 480),
(239, 4, 'paytm', ', Gold Bracelet (1) , Silver Bracelet (1) , Gold Necklace (1) ', 'pending', 290),
(240, 3, 'paytm', ', Silver Necklace Diamond (1) , Silver Earring (1) , Silver Necklace (1) ', 'pending', 320);

-- --------------------------------------------------------

--
-- Table structure for table `data_entry`
--

CREATE TABLE `data_entry` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` double NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_entry`
--

INSERT INTO `data_entry` (`id`, `category`, `description`, `quantity`, `price`, `created_date`) VALUES
(14, 'Gold Ring', 'ABC Ring Supplier, Gold Ring', 100, 7000, '2023-12-24 08:59:36'),
(15, 'Silver Ring', 'AAA Ring Supplier, Silver Ring', 50, 1500, '2023-12-24 09:00:07'),
(16, 'Gold Earrings', 'BBB Earrings Supplier, Gold Earrings', 20, 1000, '2023-12-24 09:00:43'),
(17, 'Silver Earrings', 'CDE Earrings Supplier, Silver Earrings', 50, 2500, '2023-12-24 09:01:22'),
(18, 'Gold Bracelet', 'AB Bracelet Supplier, Bracelet', 10, 500, '2023-12-24 09:02:07'),
(19, 'Silver Bracelet', 'BC Bracelet Supplier, Silver Bracelet', 100, 5000, '2023-12-24 09:03:14'),
(20, 'Gold Necklace', 'ABB Necklace, Gold Necklace ', 20, 2000, '2023-12-24 09:04:35'),
(21, 'Silver Necklace', 'A Necklace Supplier, Silver Necklace', 10, 1000, '2023-12-24 09:05:09'),
(22, 'Silver Necklace (Diamond)', 'A Necklace Supplier, Silver Necklace (Diamond)', 50, 5000, '2023-12-24 09:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(10, 1, 'Refund', 'abc@yahoo.com', '123123', 'Bad');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(12, 1, 'Abc', '123456', 'abc@yahoo.com', 'credit card', 'flat no. abc123, abc456, KL, Malaysia - 47100', ', Gold Ring1 (1) ', 100, '23-Dec-2023', 'pending'),
(13, 1, 'Cde', '123456', 'cde@yahoo.com', 'paytm', 'flat no. cde123, cde345, KL, Malaysia - 47100', ', Gold Ring1 (2) ', 200, '23-Dec-2023', 'pending'),
(14, 3, 'Aaa', '123123', 'aaa@yahoo.com', 'paypal', 'flat no. aaa123, aaa456, KL, Malaysia - 47100', ', Gold Ring1 (3) ', 300, '23-Dec-2023', 'complete'),
(15, 1, 'Bbb', '123123', 'Bbb@yahoo.com', 'paytm', 'flat no. Bbb123, Bbb456, kl, Malaysia - 48100', ', Silver Necklace Diamond (1) , Silver Necklace (1) ', 240, '24-Dec-2023', 'complete'),
(16, 3, 'Jjj', '123456', 'Jjj@yahoo.com', 'credit card', 'flat no. Jjj123, Jjj456, KL, Malaysia - 52000', ', Gold Earrings (1) , Gold Necklace (1) , Gold Bracelet (1) ', 305, '24-Dec-2023', 'pending'),
(17, 1, 'Aaa', '123123', 'Aaa@yahoo.com', 'cash on delivery', 'flat no. Aaa123, Aaa112, KL, Malaysia - 50777', ', Gold Earrings (1) , Gold Ring (1) , Gold Bracelet (1) ', 255, '24-Dec-2023', 'pending'),
(18, 1, 'asd', '1231', 'asda@yahoo.com', 'cash on delivery', 'flat no. asda, asda, asda, asda - 12312', ', Silver Ring (1) , Gold Earrings (3) , Gold Bracelet (3) ', 515, '24-Dec-2023', 'pending'),
(19, 4, 'Bc', '1231231', 'bc@yahoo.com', 'credit card', 'flat no. Bc11, Bc21, bbb, Malaysia - 5100', ', Gold Ring (1) , Gold Earrings (2) , Silver Necklace (2) ', 480, '24-Dec-2023', 'pending'),
(20, 4, 'Bc', '1231112', 'bc@yahoo.com', 'paytm', 'flat no. bc111, bc411, Kl, Malaysia - 11121', ', Gold Bracelet (1) , Silver Bracelet (1) , Gold Necklace (1) ', 290, '24-Dec-2023', 'pending'),
(21, 3, 'aaa', '11213112', 'aaa@yahoo.com', 'paytm', 'flat no. aaa78767, aa1234, Penang, Malaysia - 78060', ', Silver Necklace Diamond (1) , Silver Earring (1) , Silver Necklace (1) ', 320, '24-Dec-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Gold Ring', 100, 'gold ring.jpg'),
(2, 'Silver Ring', 50, 'silver ring.jpg'),
(3, 'Gold Earrings', 80, 'gold earrings.jpg'),
(4, 'Gold Bracelet', 75, 'gold bracelet.jpg'),
(5, 'Silver Necklace', 110, 'silver necklace.jpg'),
(6, 'Silver Bracelet', 65, 'silver bracelet.jpg'),
(7, 'Silver Earring', 80, 'silver earring.jpg'),
(8, 'Gold Necklace', 150, 'gold necklace.jpg'),
(9, 'Silver Necklace Diamond', 130, 'silver necklace 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Jia Zhe', 'abc@yahoo.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'cde', 'cde@yahoo.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'AAA', 'aaa@yahoo.com', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'Bc', 'bc@yahoo.com', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(9, 'cheese', 'cheese@gmail.com', 'user', 'fea0f1f6fede90bd0a925b4194deac11'),
(12, 'chicken', 'chicken@gmail.com', 'user', '742929dcb631403d7c1c1efad2ca2700'),
(14, 'Steven', 'Steven@handsome.com', 'user', '202cb962ac59075b964b07152d234b70'),
(15, 'Help', 'help@gmail.com', 'admin', 'b37bf08f6406331250efc380acf3996d'),
(16, 'testing', 'test@gmail.com', 'user', '098f6bcd4621d373cade4e832627b4f6'),
(18, 'potato', 'a@gmail.com', 'user', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptionform`
--
ALTER TABLE `adoptionform`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_data`
--
ALTER TABLE `chart_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `data_entry`
--
ALTER TABLE `data_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptionform`
--
ALTER TABLE `adoptionform`
  MODIFY `formID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `chart_data`
--
ALTER TABLE `chart_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `data_entry`
--
ALTER TABLE `data_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
