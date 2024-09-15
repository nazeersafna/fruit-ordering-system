-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 06:31 PM
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
-- Database: `fruit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbl_order`
--

CREATE TABLE `tbbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `fruit` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbl_order`
--

INSERT INTO `tbbl_order` (`id`, `fruit`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Ordered', 4.00, 2, 8.00, '2024-07-19 06:55:05', 'Cancelled', 'fff', '0786788484', 'ssafna406@gmail.com', 'k'),
(2, 'Ordered', 4.00, 2, 8.00, '2024-07-19 06:57:24', 'Deliverd', 'fff', '0990909987', 'ssafna406@gmail.com', 'kfff'),
(3, 'cherry', 40.00, 1, 40.00, '2024-07-19 06:58:52', 'On Delivery', 'Fathima Safna ', '078786666', 'amra@gmail.com', 'kk'),
(4, 'avacado', 45.00, 3, 135.00, '2024-07-19 07:03:09', 'Deliverd', 'lillyy', '0786788484', 'ssafna406@gmail.com', 'kkggg'),
(10, 'kiwis', 40.00, 2, 80.00, '2024-07-20 08:03:15', 'Orderd', 'anjila', '09876554', 'anji@gmail.com', 'ada'),
(11, 'avacado', 45.00, 1, 45.00, '2024-07-20 08:09:30', 'Orderd', 'd', '44444444444444444', 'ffffffff@gmail.com', 'eee'),
(12, 'cherryy', 40.00, 10, 400.00, '2024-07-21 05:35:54', 'Orderd', 'sarhan', '0763302008', 'sarhan@gmail.com', 'eravur'),
(13, 'Golden', 60.00, 1, 60.00, '2024-07-22 06:55:53', 'Orderd', 'sahana', '0786788484', 'sarhan@gmail.com', 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(53, 'safna', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `feartured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `title`, `image_name`, `feartured`, `active`) VALUES
(69, 'Apple', 'Fruit_Category_668.jpeg', 'Yes', 'Yes'),
(70, 'Citrus', 'Fruit_Category_517.jpeg', 'Yes', 'Yes'),
(71, 'Berry', 'Fruit_Category_801.jpeg', 'Yes', 'Yes'),
(72, 'Papaya', 'Fruit_Category_874.jpeg', 'Yes', 'Yes'),
(73, 'Banana', 'Fruit_Category_322.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fruit`
--

CREATE TABLE `tbl_fruit` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `feartured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fruit`
--

INSERT INTO `tbl_fruit` (`id`, `title`, `description`, `price`, `image_name`, `catagory_id`, `feartured`, `active`) VALUES
(10, 'Blueberry', 'Strawberry', 50.00, 'Fruit-Name-4277.jpeg', 71, 'Yes', 'Yes'),
(11, 'Strawberry', 'Strawberry', 55.00, 'Fruit-Name-5636.jpeg', 71, 'Yes', 'Yes'),
(12, 'Raspberry', 'Raspberry', 40.00, 'Fruit-Name-1556.jpeg', 71, 'Yes', 'Yes'),
(13, 'Samba', 'Samba', 80.00, 'Fruit-Name-2336.jpeg', 72, 'Yes', 'Yes'),
(14, 'Red Lady', 'Red Lady', 100.00, 'Fruit-Name-9658.jpeg', 72, 'Yes', 'Yes'),
(15, 'Golden', 'Golden', 60.00, 'Fruit-Name-9231.jpeg', 69, 'Yes', 'Yes'),
(16, 'Gala', 'Gala', 50.00, 'Fruit-Name-1621.jpeg', 69, 'Yes', 'Yes'),
(17, 'Red', 'Red', 120.00, 'Fruit-Name-5652.jpeg', 73, 'Yes', 'Yes'),
(18, 'Lakatan', 'Lakatan', 100.00, 'Fruit-Name-5273.jpeg', 73, 'Yes', 'Yes'),
(19, 'Orange', 'Orange', 100.00, 'Fruit-Name-5968.jpeg', 70, 'Yes', 'Yes'),
(20, 'Lemon', 'Lemon', 80.00, 'Fruit-Name-9827.jpeg', 70, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbl_order`
--
ALTER TABLE `tbbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fruit`
--
ALTER TABLE `tbl_fruit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbl_order`
--
ALTER TABLE `tbbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_fruit`
--
ALTER TABLE `tbl_fruit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
