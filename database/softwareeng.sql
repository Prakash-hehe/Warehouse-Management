-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 08:34 PM
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
-- Database: `softwareeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `date` date NOT NULL,
  `productId` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`date`, `productId`, `quantity`, `price`, `productName`, `total_price`) VALUES
('2022-05-21', 'pro_1', 0, 40, 'BeetRoot', 80),
('2022-05-21', 'pro_10', 0, 30, 'Cauliflower', 0),
('2022-05-21', 'pro_11', 0, 31, 'Chilli', 0),
('2022-05-21', 'pro_12', 0, 10, 'Coriander', 0),
('2022-05-21', 'pro_13', 0, 10, 'Curry Leaves', 0),
('2022-05-21', 'pro_14', 0, 20, 'Drum Stick', 0),
('2022-05-21', 'pro_15', 0, 10, 'Fenugreek Leaves', 0),
('2022-05-21', 'pro_16', 0, 10, 'Mint', 0),
('2022-05-21', 'pro_17', 0, 40, 'Okra', 0),
('2022-05-21', 'pro_18', 0, 30, 'Onions', 0),
('2022-05-21', 'pro_19', 0, 35, 'Potato', 0),
('2022-05-21', 'pro_2', 0, 32, 'Bitter Guard', 96),
('2022-05-21', 'pro_20', 0, 60, 'Pumpkin', 0),
('2022-05-21', 'pro_21', 0, 37, 'Radish', 0),
('2022-05-21', 'pro_22', 0, 29, 'Ridge Guard', 29),
('2022-05-21', 'pro_23', 0, 15, 'Spinach', 75),
('2022-05-21', 'pro_24', 0, 31, 'Tomato', 62),
('2023-05-21', 'pro_25', 0, 80, 'Apple', 160),
('2023-05-21', 'pro_26', 0, 50, 'Banana', 100),
('2023-05-21', 'pro_27', 0, 100, 'Black Grapes', 100),
('2023-05-21', 'pro_28', 0, 90, 'Green Grapes', 90),
('2023-05-21', 'pro_29', 0, 60, 'Guava', 60),
('2022-05-21', 'pro_3', 0, 28, 'Bottle Guard', 28),
('2023-05-21', 'pro_30', 0, 115, 'Kiwi', 115),
('2023-05-21', 'pro_31', 0, 95, 'Lychee', 95),
('2023-05-21', 'pro_32', 0, 90, 'Mango(Raw)', 90),
('2023-05-21', 'pro_33', 0, 85, 'Mango', 85),
('2023-05-21', 'pro_34', 0, 30, 'Muskmelon', 30),
('2023-05-21', 'pro_35', 0, 50, 'Orange', 0),
('2023-05-21', 'pro_36', 0, 60, 'Papaya', 60),
('2023-05-21', 'pro_37', 0, 60, 'Pine Apple', 60),
('2023-05-21', 'pro_38', 0, 70, 'Pomogranate', 70),
('2023-05-21', 'pro_39', 0, 75, 'Sapota', 75),
('2022-05-21', 'pro_4', 0, 22, 'Brinjal', 88),
('2023-05-21', 'pro_40', 0, 90, 'Straw Berry', 90),
('2023-05-21', 'pro_41', 0, 40, 'Watermelon', 40),
('2023-05-21', 'pro_42', 0, 69, 'Bajra', 276),
('2023-05-21', 'pro_43', 0, 50, 'Barley', 50),
('2023-05-21', 'pro_44', 0, 115, 'Black Gram', 0),
('2023-05-21', 'pro_45', 0, 89, 'Chickpeas', 0),
('2023-05-21', 'pro_46', 0, 77, 'Green Gram', 0),
('2023-05-21', 'pro_47', 0, 48, 'Jowar', 0),
('2023-05-21', 'pro_48', 0, 24, 'Maize', 0),
('2023-05-21', 'pro_49', 0, 73, 'Ragi', 0),
('2022-05-21', 'pro_5', 0, 33, 'Cabbage', 198),
('2023-05-21', 'pro_50', 0, 52, 'Rice', 0),
('2023-05-21', 'pro_51', 0, 46, 'Wheat', 0),
('2023-05-21', 'pro_52', 0, 490, 'Acephate', 2450),
('2023-05-21', 'pro_53', 0, 3800, 'Carbaryl', 3800),
('2023-05-21', 'pro_54', 0, 330, 'Chlorpyrifos', 330),
('2023-05-21', 'pro_55', 0, 490, 'Cypermethrin', 490),
('2023-05-21', 'pro_56', 0, 970, 'Endosulfan', 2910),
('2023-05-21', 'pro_57', 0, 250, 'Glyphosate', 1250),
('2023-05-21', 'pro_58', 0, 440, 'Imidacloprid', 440),
('2023-05-21', 'pro_59', 0, 390, 'Malathion', 780),
('2022-05-21', 'pro_6', 0, 44, 'Green Capsicum', 0),
('2023-05-21', 'pro_60', 0, 450, 'Monocrotophos', 2250),
('2023-05-21', 'pro_61', 0, 58, 'Ammonium Sulphate(AS', 58),
('2023-05-21', 'pro_62', 0, 517, 'Calcium Ammonium Nit', 517),
('2023-05-21', 'pro_63', 0, 260, 'Di-ammonium phosphat', 260),
('2023-05-21', 'pro_64', 0, 60, 'Muriate of Potash (M', 0),
('2023-05-21', 'pro_65', 0, 410, 'Potassium Nitrate (K', 0),
('2023-05-21', 'pro_66', 0, 10, 'Single Super Phospha', 10),
('2023-05-21', 'pro_67', 0, 460, 'Urea', 0),
('2022-05-21', 'pro_7', 0, 47, 'Yellow Capsicum', 0),
('2022-05-21', 'pro_8', 0, 45, 'Red Capsicum', 0),
('2022-05-21', 'pro_9', 0, 40, 'Carrot', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `ideal_temp` varchar(15) NOT NULL,
  `shell_life` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`name`, `quantity`, `price`, `ideal_temp`, `shell_life`, `id`) VALUES
('Carrot', 20, 11234, '34', 12, 1),
('Rice', 8, 12000, '68-86', 2, 2),
('Wheat', 20, 8900, '50-77', 12, 3),
('Sugarcane', 20, 9000, '77-95', 10, 4),
('Crop', 20, 4000, '64-86', 3, 5),
('mango', 200, 300, '42', 7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `username` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`username`, `FirstName`, `LastName`, `Email`, `Address`, `Gender`, `Phone`, `DateOfBirth`) VALUES
('abcd', 'prudhvi', 'kaja', 'a@dgnnmail.com', 'neerukonda', 'male', '7585', '2003-04-16'),
('abhiram', 'abhiram', 'gandhi', 'abhiramgandhi@gmail.com', 'guntur', 'male', '7569633599', '2003-08-20'),
('Dhanush', 'dhanush', 'kumar', 'dhanushkumargolla@gmail.com', '11-63-16, BRAHMIN STREET', 'Male', '7989267333', '2004-12-30'),
('lokesh', 'lokesh', 'k', 'lokesh@gmail.com', ' BRAHMIN STREET guntur', 'male', '1239812391', '2004-09-28'),
('prakash', 'prakash', 'ch', 'prakash@gmail.com', '2 twon street', 'Male', '1234567890', '2003-09-28'),
('prudhvi', 'prudhvi', 'kaja', 'prudhvi@gmail.com', 'vijaywada,near apollo hospital', 'Male', '8977377946', '2003-08-04'),
('siddu', 'siddu', 'sirasanambetti', 'siddu@gmail.com', 'governerpet, guntur', 'Male', '9391198374', '2004-03-29'),
('srinivas', 'srinivas', 'k', 'srinivas@gmail.com', 'asjhhaskjdn', 'male', '1234567890', '2004-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `productId` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`productId`, `quantity`) VALUES
('', 0),
('', 0),
('', 0),
('', 0),
('', 0),
('', 0),
('', 0),
('', 0),
('', 0),
('pro_1', 0),
('pro_1', 0),
('pro_2', 1),
('pro_3', 1),
('pro_4', 1),
('pro_7', 2),
('pro_6', 4),
('pro_10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE `fertilizers` (
  `name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `ideal_temp` varchar(10) NOT NULL,
  `exp_date` date NOT NULL,
  `fer_type` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`name`, `quantity`, `price`, `ideal_temp`, `exp_date`, `fer_type`, `id`) VALUES
('Urea', 20, 8000, '30', '2024-10-10', 'Nitrogenous Fertilizer', 1),
('Diammonium Phosphate(DAP)', 20, 8500, '20-30', '2024-12-10', 'Phosphatic Fertilizer', 2),
('Muriate of Potash', 35, 6500, '25-35', '2024-12-10', 'Potassic fertilizer', 3),
('Organic Manure', 13, 5500, '30-35', '2024-12-10', 'Organic Fertilizer', 4),
('Single Super Phosphate(SSP)', 20, 7900, '30', '2024-12-10', 'Phosphatic Fertilizer', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `session` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`session`, `username`, `password`) VALUES
(0, 'abcd', 'abcd'),
(0, 'abhiram', 'abhiram'),
(1, 'Dhanush', 'dhanush'),
(0, 'lokesh', 'lokesh'),
(0, 'prakash', 'prakash'),
(0, 'prudhvi', 'prudhvi'),
(0, 'siddu', 'siddu'),
(1, 'srinivas', 'srinivas');

-- --------------------------------------------------------

--
-- Table structure for table `pesticides`
--

CREATE TABLE `pesticides` (
  `name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `ideal_temp` varchar(10) NOT NULL,
  `exp_date` date NOT NULL,
  `pes_type` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesticides`
--

INSERT INTO `pesticides` (`name`, `quantity`, `price`, `ideal_temp`, `exp_date`, `pes_type`, `id`) VALUES
('Neem Gaurd', 50, 10000, '25-30', '2024-10-15', 'Herbicide', 1),
('GlyphoMax', 30, 12500, '20-35', '2024-10-15', 'Herbicide', 2),
('FungoSheild', 20, 15000, '15-25', '2024-09-30', 'Fungicide', 3),
('InsectSheild', 40, 8000, '25-35', '2024-11-30', 'Insecticide', 4),
('WheedShield Plus', 25, 6500, '20-30', '2024-10-31', 'Herbicide', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `contact`, `address`) VALUES
(1, 'Neerukonda', 'Neerukondasrm@gmail.com', 7989267277, 'Neerukonda,Mangalgiri'),
(5, 'Neerukonda', 'Neerukondasrm@gmail.com', 7989267276, 'Neerukonda,Mangalgiri'),
(6, 'neerukonda', 'neerukonda@gmail.com', 7989267277, 'nerukonda,mangalgiri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `fertilizers`
--
ALTER TABLE `fertilizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pesticides`
--
ALTER TABLE `pesticides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fertilizers`
--
ALTER TABLE `fertilizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesticides`
--
ALTER TABLE `pesticides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
