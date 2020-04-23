-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2020 at 07:59 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anomozco_noor`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordMgmt_orders`
--

CREATE TABLE `ordMgmt_orders` (
  `id` int(128) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `productLink` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `priceGBP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordMgmt_orders`
--

INSERT INTO `ordMgmt_orders` (`id`, `orderId`, `productLink`, `quantity`, `size`, `color`, `priceGBP`) VALUES
(1, '$orderId', '$link[$i]', '$quantity[$i]', '$size[$i]', '', '$price[$i]'),
(2, '$orderId', '$link[$i]', '$quantity[$i]', '$size[$i]', '', '$price[$i]'),
(3, 'o2DYFMzwxs', 'asldkn', '12', 'lkn', '', '1.22'),
(4, 'o2DYFMzwxs', '80uasd08', '10', 'asdonion', '', '21'),
(5, 'kyf3PP4O0n', 'asdjk', '12', 'AKSDN', '', '12'),
(6, 'kyf3PP4O0n', 'ASDKLN', '12', 'KNASD', '', '10.22'),
(7, '8sdpQDN0KS', 'anomoz', '1', 'green', '', '12'),
(8, '8sdpQDN0KS', 'lnasd', '12', 'blue', '', '18');

-- --------------------------------------------------------

--
-- Table structure for table `ordMgmt_ordersCheckedOut`
--

CREATE TABLE `ordMgmt_ordersCheckedOut` (
  `id` int(128) NOT NULL,
  `trackingId` varchar(255) NOT NULL,
  `buyingCost` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `serviceCharges` varchar(255) NOT NULL,
  `totalGBP` varchar(255) NOT NULL,
  `totalPKR` varchar(255) NOT NULL,
  `conversion` varchar(255) NOT NULL,
  `timeAdded` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordMgmt_ordersCheckedOut`
--

INSERT INTO `ordMgmt_ordersCheckedOut` (`id`, `trackingId`, `buyingCost`, `shipping`, `serviceCharges`, `totalGBP`, `totalPKR`, `conversion`, `timeAdded`, `name`, `company`, `phone`, `email`, `address`, `message`) VALUES
(1, '$orderId', '$totalItemsCost', '$shippingCost', '$serviceCharges', '$total', '$totalPKR', '$conversion_rate', '$timeAdded', '$name', '$company', '$phone', '$email', '$address', ''),
(1, 'o2DYFMzwxs', '224.64', '11.232', '44.928', '280.8', '56898.504', '202.63', '1579245095', 'Ahsan Ahmed', 'Anomoz Softwares', '033123123', 'sa02908@st.habib.edu.pk', '', ''),
(1, 'kyf3PP4O0n', '266.64', '13.332', '53.328', '333.3', '67536.579', '202.63', '1579277519', 'AHSAN', 'ASD', '1230-012931-32091203912390123', 'sa02908@st.habib.edu.pk', '', ''),
(1, '8sdpQDN0KS', '228', '11.4', '45.6', '285', '57749.55', '202.63', '1579424285', 'Ahsan ', 'Anomoz Softwares', '013123123123', 'sa02908@st.habib.edu.pk', '4A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordMgmt_orders`
--
ALTER TABLE `ordMgmt_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordMgmt_ordersCheckedOut`
--
ALTER TABLE `ordMgmt_ordersCheckedOut`
  ADD PRIMARY KEY (`trackingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordMgmt_orders`
--
ALTER TABLE `ordMgmt_orders`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
