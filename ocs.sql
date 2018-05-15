-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 03:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `unm` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `unm`, `pwd`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(25) NOT NULL,
  `uid` int(25) NOT NULL,
  `clid` int(25) NOT NULL,
  `qty` int(25) NOT NULL DEFAULT '1',
  `cost` int(25) NOT NULL,
  `total` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `clid`, `qty`, `cost`, `total`) VALUES
(1, 1, 1, 1, 1099, 1099),
(2, 1, 1, 1, 1099, 1099),
(3, 1, 1, 1, 1099, 1099);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(25) NOT NULL,
  `cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat`) VALUES
(4, 'Kanchi Silks'),
(5, 'Banaras Silks'),
(6, 'Gadwal Silk'),
(7, 'Samudrika Pattu'),
(8, 'Broquet Silk');

-- --------------------------------------------------------

--
-- Table structure for table `cloth`
--

CREATE TABLE `cloth` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(25) NOT NULL,
  `cost` int(25) NOT NULL,
  `imgurl` varchar(255) NOT NULL,
  `dsc` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloth`
--

INSERT INTO `cloth` (`id`, `name`, `catid`, `cost`, `imgurl`, `dsc`) VALUES
(1, 'Nirja Creation Silk Saree', 4, 1099, 'images/51zTdPM9MwL.jpg', 'We offer high quality range of sarees that is designs by our team of creative professionals and at the same time perfect mix of modern patterns and contemporary designs'),
(3, 'Banaras Silk Saree', 5, 8000, 'images/Banaras-Silk-saree-4-600x600.jpg', 'Banaras handloom dupion silk saree, With Blouse '),
(4, 'Green Katan Gadwal Silk Saree', 6, 12000, 'images/42085_GRN_Side_1024x1024.jpg', 'The saree features the Kadhuan Brocade weaving technique, considered to be the epitome of handloom brocade weaving, to create the motifs. Each buta is woven individually with a hand shuttle, diligently, one line at a time by a master weaver. Weaving time for each saree is usually in excess of 200 man hours, often significantly longer.'),
(5, 'Samudrika Pattu', 7, 15000, 'images/nithaya.jpg', 'This is the samudrika pattu which very good samudrika means good quality so best samudrikam go blindly'),
(6, 'Tries Broquet Pattu', 8, 30000, 'images/1.jpg', 'this the best broquet in the with pure jerry and also pure silk fast jerry.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unm` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `unm`, `psw`) VALUES
(1, 'Ram Kumar', 'ram', '1234'),
(2, 'bhargavi', 'bhagi', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth`
--
ALTER TABLE `cloth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cloth`
--
ALTER TABLE `cloth`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
