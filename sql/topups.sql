-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 02:29 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topups`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `phone`, `password`, `created_at`) VALUES
(7, 'Casweeney Ojukwu', 'toxaswift2000@gmail.com', '08022288165', '08fa5ce5f1ebfbfa3b2de005fd239504c28fc094', '2019-02-14 22:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `all_transactions`
--

CREATE TABLE `all_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_type` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_transactions`
--

INSERT INTO `all_transactions` (`id`, `user_id`, `transaction_type`, `amount`, `created_at`) VALUES
(1, 35, 'Wallet funding', '1000', '2019-02-10 17:47:06'),
(2, 35, 'Wallet funding', '2000', '2019-02-10 18:14:50'),
(3, 35, 'Wallet funding', '1000', '2019-02-10 23:57:04'),
(4, 35, 'Wallet funding', '1000', '2019-02-11 08:46:12'),
(5, 37, 'Wallet funding', '50', '2019-02-13 20:34:03'),
(6, 35, 'Wallet funding', '1000', '2019-02-14 09:31:24'),
(7, 35, 'Wallet funding', '100', '2019-02-14 11:32:59'),
(8, 35, 'Wallet funding', '500', '2019-02-14 11:35:29'),
(9, 35, 'Wallet funding', '100', '2019-02-14 12:08:13'),
(10, 35, 'Wallet funding', '200', '2019-02-14 12:10:34'),
(11, 35, 'Wallet funding', '1000', '2019-02-14 22:17:54'),
(12, 35, 'Wallet funding', '2000', '2019-02-15 09:47:20'),
(13, 35, 'Wallet funding', '2000', '2019-02-15 09:49:38'),
(14, 35, 'Wallet funding', '1000', '2019-02-15 09:58:28'),
(15, 35, 'Wallet funding', '100', '2019-02-16 23:29:50'),
(16, 35, 'Airtime Recharge', '20', '2019-02-19 16:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `data_price`
--

CREATE TABLE `data_price` (
  `id` int(11) NOT NULL,
  `network_id` int(11) DEFAULT NULL,
  `data_price` varchar(100) DEFAULT NULL,
  `data_desc` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_price`
--

INSERT INTO `data_price` (`id`, `network_id`, `data_price`, `data_desc`, `created_at`) VALUES
(11, 13, '100', '100MB', '2019-02-17 07:57:10'),
(16, 13, '250', '250MB', '2019-02-18 16:53:37'),
(17, 14, '100', '100MB', '2019-02-18 21:58:43'),
(18, 14, '250', '250MB', '2019-02-18 21:58:52'),
(19, 15, '1000', '1.5GB', '2019-02-27 15:29:48'),
(20, 16, '500', '1GB', '2019-08-02 12:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `funding_requests`
--

CREATE TABLE `funding_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_transfered` varchar(100) DEFAULT NULL,
  `bank_details` text,
  `request_status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funding_requests`
--

INSERT INTO `funding_requests` (`id`, `user_id`, `amount_transfered`, `bank_details`, `request_status`, `created_at`) VALUES
(4, 35, '2000', 'Zenith Bank\nCasweeney', 'Verified', '2019-02-10 23:34:25'),
(5, 35, '1000', 'GTB Casweeney Ojukwu', 'Verified', '2019-02-15 09:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `instant_airtime_topup`
--

CREATE TABLE `instant_airtime_topup` (
  `id` int(11) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `network` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instant_data_topup`
--

CREATE TABLE `instant_data_topup` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `network` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `data_size` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `network_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`id`, `network_name`, `created_at`) VALUES
(13, 'MTN', '2019-02-16 23:54:09'),
(14, 'AIRTEL', '2019-02-18 16:53:45'),
(15, 'GLO', '2019-02-27 15:29:25'),
(16, 'ETISALAT', '2019-08-02 12:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `account_balance` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `created_at`, `account_balance`) VALUES
(35, 'Casweeney Ojukwu', 'casweeno2000@gmail.com', '07036798652', '08fa5ce5f1ebfbfa3b2de005fd239504c28fc094', '2019-02-08 13:21:30', '30'),
(36, 'Casweeney', 'toxaswift2000@gmail.com', '09036798652', '84a37cbbfd42af93002f5e0619ecff7fdaee69d6', '2019-02-09 06:40:06', '0'),
(37, 'Caws', 'cc@gmail.com', '09044565432', '5a89397dca33791bbfbfcd32945af71fe352179e', '2019-02-13 17:37:39', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_transactions`
--
ALTER TABLE `all_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `data_price`
--
ALTER TABLE `data_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `network_id` (`network_id`);

--
-- Indexes for table `funding_requests`
--
ALTER TABLE `funding_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `instant_airtime_topup`
--
ALTER TABLE `instant_airtime_topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instant_data_topup`
--
ALTER TABLE `instant_data_topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `all_transactions`
--
ALTER TABLE `all_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_price`
--
ALTER TABLE `data_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `funding_requests`
--
ALTER TABLE `funding_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instant_airtime_topup`
--
ALTER TABLE `instant_airtime_topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instant_data_topup`
--
ALTER TABLE `instant_data_topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_price`
--
ALTER TABLE `data_price`
  ADD CONSTRAINT `data_price_ibfk_1` FOREIGN KEY (`network_id`) REFERENCES `network` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
