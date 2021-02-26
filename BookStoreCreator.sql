-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 06:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE `bookinventory` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_img` varchar(200) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_description` varchar(250) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_rating` int(11) NOT NULL,
  `book_cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`book_id`, `book_name`, `book_img`, `book_price`, `book_quantity`, `book_description`, `book_author`, `book_rating`, `book_cdate`) VALUES
(1, 'The forest', 'book2.jpg', '15.50', 4, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Allan Green', 4, '2021-02-26 09:14:10'),
(2, 'The son', 'book3.jpg', '10.20', 7, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Angelika Glow', 4, '2021-02-26 09:14:10'),
(3, 'Life in the garden', 'book4.jpg', '10.80', 4, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Antony Barton', 3, '2021-02-26 09:14:10'),
(4, 'The long road to the deep Silence', 'book5.jpg', '16.99', 9, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Richard Mann', 4, '2021-02-26 09:14:10'),
(5, 'Its a really strange story', 'book6.jpg', '10.55', 9, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Burt Geller', 4, '2021-02-26 09:14:10'),
(6, 'Storm', 'books7.jpg', '19.55', 18, 'This delightful book is the latest in the series, this is the story of how a tall, shy youth from Weston-super-Mare went on to become a self-confessed legend.', 'Richard Mann', 5, '2021-02-26 09:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
