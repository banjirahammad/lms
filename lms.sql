-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2021 at 10:18 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `book_edition` int(2) NOT NULL,
  `book_image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `book_author_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `book_publication_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `book_purchase_date` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `book_price` int(5) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarian_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_edition`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(1, 'The C++ Programming Language', 4, '210525084949.jpg', 'Bjarne Stroustrup', 'programming book', '2020-11-06', 360, 20, 20, 'banjir123', '2021-05-25 08:49:49'),
(2, 'Java Programming', 3, '210525085051.jpg', 'The WikiBooks', 'programming book', '2020-08-08', 450, 15, 15, 'banjir123', '2021-05-25 08:50:51'),
(3, 'Phython Programming', 7, '210525085230.jpg', 'ADAM BASH', 'programming book', '2020-06-27', 450, 20, 20, 'banjir123', '2021-05-25 08:52:30'),
(4, 'The C Programming Language', 2, '210525085608.jpg', 'Brian W. Kernighan', 'PHI', '2020-07-14', 380, 8, 8, 'banjir123', '2021-05-25 08:56:08'),
(5, 'C Programming', 3, '210525085915.jpg', 'Grag Pery and Dean Maller', 'programming book', '2020-10-10', 400, 25, 23, 'banjir123', '2021-05-25 08:59:15'),
(6, 'Introducing Java8', 7, '210525090618.jpg', 'Raoul Gabriel Urma', 'Java Hub', '2020-11-30', 360, 15, 15, 'banjir123', '2021-05-25 09:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

DROP TABLE IF EXISTS `issue_books`;
CREATE TABLE IF NOT EXISTS `issue_books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `date`) VALUES
(1, 1, 1, '25-05-2021', '25-05-2021', '2021-05-25 09:53:07'),
(2, 1, 2, '25-05-2021', '', '2021-05-25 09:53:21'),
(3, 2, 6, '25-05-2021', '25-05-2021', '2021-05-25 09:55:13'),
(4, 5, 5, '25-05-2021', '', '2021-05-25 09:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

DROP TABLE IF EXISTS `librarian`;
CREATE TABLE IF NOT EXISTS `librarian` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone_number` int(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  UNIQUE KEY `phone_number_2` (`phone_number`),
  UNIQUE KEY `phone_number_3` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `fname`, `lname`, `username`, `email`, `password`, `phone_number`, `photo`, `address`, `datetime`, `status`) VALUES
(1, 'Md. Banjir', 'Ahammad', 'banjir123', 'banjirahammad@gmail.com', 'banjir123', 1797948994, 'banjir123210524081830.jpg', 'Dhaka, Bangladesh\r\n', '2021-05-24 06:15:03', 1),
(3, 'test', 'test', 'test1234', 'test1234@gmail.com', 'test1234', 17, '', 'test address', '2021-05-24 11:30:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `roll` int(10) NOT NULL,
  `reg` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phoneno` varchar(11) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg` (`reg`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `roll` (`roll`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='reg';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phoneno`, `photo`, `status`, `datetime`, `address`) VALUES
(1, 'test', 'test edit', 1910101001, '1910101001', 'test1234@gmail.com', 'test1234', '$2y$10$IwvF.073ZWXui6vbabfzfe/cfuD7GM2T8SQGdwNnOGXAbZ4y/cFpG', '01234567898', 'test1234210524110116.jpg', 1, '2021-05-24 10:59:09', 'Dhaka Bangladesh'),
(2, 'Md. Banjir', 'Ahammad', 1910101004, '1910101004', 'banjirahammad@gmail.com', 'banjir123', '$2y$10$fBbIdM2MEKo8MLgjBHB2VOiKmpMvgFGC.aq.ZUP3OWdWccG.V3pga', '01797948994', 'banjir123210525101725.jpg', 1, '2021-05-24 11:03:57', NULL),
(3, 'Mis. Ratna', 'Aktar', 1910101005, '1910101005', 'ratna123@gmail.com', 'ratna123', '$2y$10$ZyeuTT87Ihseq3FS3jsYoOHGK4lXM.TlS4DXiatZiNJXCpwV01dzC', '01797948991', NULL, 1, '2021-05-24 11:05:40', NULL),
(4, 'Md. Liton', 'Islam', 1910101002, '1910101002', 'liton123@gmail.com', 'liton123', '$2y$10$a/LpTsy4WQmeJhde1j7ETetxN28/y/cAnyRU7UuzWpH4vJYHGIykK', '01797948995', NULL, 1, '2021-05-24 11:07:42', NULL),
(5, 'Mis. Sarmin', ' Aktar', 1910101003, '1910101003', 'sarmin123@gmail.com', 'sarmin123', '$2y$10$PQXAFpnovnNZaj963JSWceRy802lwrGLU/UQQ.5tlLUBgyWi89LuK', '01797948996', NULL, 1, '2021-05-24 11:08:50', NULL),
(6, 'Md. Emam', 'Mollik', 1910101008, '1910101008', 'mollik123@gmail.com', 'mollik123', '$2y$10$U0bwc7a3YpLYPuXuYV.et.WNQp43n6rNZK9eVPXnu.X/NWFYeY/bS', '01797948997', NULL, 1, '2021-05-24 11:10:39', NULL),
(7, 'Md. Kawsar', 'Islam', 1910101009, '1910101009', 'kawsar123@gmail.com', 'kawsar123', '$2y$10$zihrk96YGZZP/Faqtl0L/eYuxSbUFg9WUe6KUKBDnpAJepM6/FjjS', '01797948911', NULL, 1, '2021-05-24 11:13:48', NULL),
(8, 'Md. Raju', 'Islam', 1910101011, '1910101011', 'raju1234@gmail.com', 'raju1234', '$2y$10$wQRmBQ88bwIPk06IghZpmeKAHo/4yYSBihOS6Disk7hvoqJ8GoZv2', '00179794811', NULL, 1, '2021-05-24 11:17:27', NULL),
(9, 'Mis. Bristi', 'Aktar', 1910101012, '1910101012', 'bristi123@gmail.com', 'bristi123', '$2y$10$O1xe3Q4e7g3Cxv1ru2GsG.0bVhFNiIcFF86V6xgRnX9oBnVkY3BxW', '00179794815', NULL, 1, '2021-05-24 11:19:13', NULL),
(10, 'Mis. Monira', 'Aktar', 1910101014, '1910101014', 'monira123@gmail.com', 'monira123', '$2y$10$y1csKk/0OZK4bP4okNm7feyzeR1Z4.03uTs4QsGLpNe1tF.EQdONW', '01797948984', NULL, 1, '2021-05-24 11:20:53', NULL),
(11, 'Mis. Sadia', 'Aktar', 1910101017, '1910101017', 'sadia123@gmail.com', 'sadia123', '$2y$10$jpb5JOEyadrSV3P9.I8.DubGipn9c.EdFo/0zNFvCqzQqO3Cpr7wm', '01797948987', NULL, 1, '2021-05-24 11:22:42', NULL),
(12, 'Md. Robinur', 'Islam', 1910101018, '1910101018', 'robinur123@gmail.com', 'robinur123', '$2y$10$sc5jIFlLLdXlfeZYzkqv/OpNNV190L3fmwZ/Wtnbz/FYJfmTTYtrq', '01797948989', NULL, 1, '2021-05-24 11:23:52', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
