-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 09:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cid` int(100) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cid`, `city`) VALUES
(1, 'Kasaragod'),
(2, 'Kannur'),
(3, 'Wayanad'),
(4, 'Kozhikode'),
(5, 'Malappuram'),
(6, 'Palakkad'),
(7, 'Thrissur'),
(8, 'Ernakulam'),
(9, 'Idukki'),
(10, 'Alappuzha'),
(11, 'Kottayam'),
(12, 'Pathanamthitta'),
(13, 'Kollam'),
(14, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hid` int(11) NOT NULL,
  `hotel` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hid`, `hotel`, `phone`, `email`, `address`, `license`, `image`, `district`) VALUES
(5, 'lexx', '7897897899', 'lexx@mail.com', 'Lexx\nAdrs', 'LLLMMM', './images/Build-Weather-App-in-JavaScript (1).jpg', 'Ernakulam'),
(6, 'Rolexio', '7034827555', 'rolexio@gmail.com', '384C+X2V, North Kalamassery, Kalamassery, Kochi, Kerala\r\nKMS', 'lKDKDSSJSJ', './images/images123.jpg', 'Ernakulam'),
(7, 'Mariot', '9847272883', 'mariot@gmail.com', 'Regional Residency \r\nlocal hub\r\nThrissur', 'OIHHJGBNMJ', './images/pexels-pixabay-258154.jpg', 'Thrissur'),
(12, 'hotel', '9995744116', 'hotel@gmail.com', 'Vazhikulangara Anachal Road, N Paravur\r\n', 'OIHHJG123', './images/pexels-pixabay-258154.jpg', 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `login_logout`
--

CREATE TABLE `login_logout` (
  `id` int(100) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `action` enum('login','logout') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `logintime` datetime NOT NULL,
  `logouttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logout`
--

INSERT INTO `login_logout` (`id`, `user_id`, `action`, `status`, `logintime`, `logouttime`) VALUES
(19, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-28 21:57:28', '2023-06-28 21:57:30'),
(20, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-29 01:19:42', '2023-06-29 01:20:15'),
(21, 'lexx@mail.com', 'logout', 'inactive', '2023-06-29 01:20:24', '2023-06-29 01:20:48'),
(22, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-29 01:22:39', '2023-06-29 12:48:40'),
(23, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-29 12:39:07', '2023-06-29 12:48:40'),
(24, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-29 12:49:41', '2023-06-29 13:01:31'),
(25, 'lexx@mail.com', 'logout', 'inactive', '2023-06-29 13:30:47', '2023-06-29 21:10:27'),
(26, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-29 21:05:05', '2023-06-29 21:06:08'),
(27, 'lexx@mail.com', 'logout', 'inactive', '2023-06-29 21:09:37', '2023-06-29 21:10:27'),
(28, 'lexx@mail.com', 'logout', 'inactive', '2023-06-30 09:39:05', '2023-06-30 10:52:26'),
(29, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-30 09:40:02', '2023-06-30 10:35:37'),
(30, 'lexx@mail.com', 'logout', 'inactive', '2023-06-30 10:49:19', '2023-06-30 10:52:26'),
(31, 'lexx@mail.com', 'logout', 'inactive', '2023-06-30 11:51:49', '2023-06-30 11:52:56'),
(32, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-30 11:53:04', '2023-06-30 11:55:23'),
(33, 'lexx@mail.com', 'logout', 'inactive', '2023-06-30 16:58:00', '2023-06-30 17:04:19'),
(34, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-06-30 17:04:25', '2023-06-30 17:06:08'),
(35, 'lexx@mail.com', 'logout', 'inactive', '2023-06-30 17:06:18', '2023-07-01 01:13:02'),
(36, 'lexx@mail.com', 'logout', 'inactive', '2023-07-01 00:57:57', '2023-07-01 01:13:02'),
(37, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-01 01:13:13', '2023-07-02 13:32:47'),
(38, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 13:14:10', '2023-07-02 13:19:54'),
(39, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-02 13:20:36', '2023-07-02 13:32:47'),
(40, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 13:32:55', '2023-07-02 15:37:33'),
(41, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-02 15:37:42', '2023-07-02 16:59:09'),
(42, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 16:59:37', '2023-07-02 17:50:33'),
(43, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-02 17:40:02', '2023-07-02 17:42:21'),
(44, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 17:42:34', '2023-07-02 17:50:33'),
(45, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-02 17:50:46', '2023-07-02 17:51:13'),
(46, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 17:51:27', '2023-07-02 17:52:18'),
(47, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-02 17:52:25', '2023-07-02 17:53:43'),
(48, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 17:56:11', '2023-07-02 17:58:58'),
(49, 'lexx@mail.com', 'logout', 'inactive', '2023-07-02 18:11:33', '2023-07-02 18:12:05'),
(50, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-09 15:02:49', '2023-07-09 15:07:40'),
(51, 'lexx@mail.com', 'logout', 'inactive', '2023-07-09 15:07:50', '2023-07-09 15:12:47'),
(52, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-09 15:25:07', '2023-07-09 15:35:09'),
(53, 'lexx@mail.com', 'login', 'active', '2023-07-09 15:35:21', '0000-00-00 00:00:00'),
(54, 'rolexio@gmail.com', 'logout', 'inactive', '2023-07-21 09:53:14', '2023-07-21 09:56:58'),
(55, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-21 09:58:09', '2023-07-21 10:04:35'),
(56, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-21 10:05:25', '2023-07-21 10:18:20'),
(57, 'rolexio@gmail.com', 'logout', 'inactive', '2023-07-21 10:18:31', '2023-07-21 10:23:09'),
(58, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-21 10:23:52', '2023-07-21 10:24:57'),
(59, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-21 10:25:03', '2023-07-21 10:29:31'),
(60, 'rolexio@gmail.com', 'logout', 'inactive', '2023-07-21 10:29:40', '2023-07-21 10:30:40'),
(61, 'rolexio@gmail.com', 'logout', 'inactive', '2023-07-21 10:31:08', '2023-07-21 10:31:23'),
(62, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-21 10:31:30', '2023-07-21 10:52:49'),
(63, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 10:38:33', '2023-07-24 10:42:15'),
(64, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 11:01:02', '2023-07-24 11:41:56'),
(65, 'lexx@mail.com', 'login', 'active', '2023-07-24 11:01:38', '0000-00-00 00:00:00'),
(66, 'hotel@gmail.com', 'logout', 'inactive', '2023-07-24 11:05:01', '2023-07-24 11:12:18'),
(67, 'hotel@gmail.com', 'logout', 'inactive', '2023-07-24 11:12:34', '2023-07-24 11:37:23'),
(68, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 11:37:29', '2023-07-24 11:41:56'),
(69, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 11:42:03', '2023-07-24 11:50:48'),
(70, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 12:00:18', '2023-07-24 12:00:27'),
(71, 'hotel@gmail.com', 'logout', 'inactive', '2023-07-24 12:00:38', '2023-07-24 12:03:05'),
(72, 'sanjaysathish.ss@gmail.com', 'logout', 'inactive', '2023-07-24 12:03:27', '2023-07-24 12:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `cId` int(11) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cAddress` varchar(50) NOT NULL,
  `cContact` varchar(50) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `cDistrict` varchar(50) NOT NULL,
  `cAge` int(11) NOT NULL,
  `cGender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`cId`, `cName`, `cAddress`, `cContact`, `cEmail`, `cDistrict`, `cAge`, `cGender`) VALUES
(6, 'Akhil', 'Kudilil Road,\r\nSouth Kalamassery, \r\nKalamassery, \r', '9090909090', 'ak@mail.com', 'Thrissur', 25, 'Male'),
(7, 'Sanjay S', 'Vazhikulangara Anachal Road, N Paravur\r\nVazhikulan', '9995744116', 'sanjaysathish.ss@gmail.com', 'Ernakulam', 24, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `fid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`fid`, `cid`, `feedback`, `date`) VALUES
(1, 6, 'Nice', '2023-03-07'),
(2, 6, 'nhjbajshck\r\ncakm jn', '2023-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `logid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`logid`, `uid`, `username`, `password`, `usertype`, `status`) VALUES
(1, 0, 'admin@gmail.com', 'admin', 'Admin', 'Active'),
(2, 6, 'ak@mail.com', '123456', 'Customer', 'Active'),
(3, 5, 'lexx@mail.com', 'user@12345', 'Hotel', 'Active'),
(4, 7, 'sanjaysathish.ss@gmail.com', '123456', 'Customer', 'Active'),
(6, 6, 'rolexio@gmail.com', 'user@1234', 'Hotel', 'Active'),
(7, 7, 'mariot@gmail.com', 'user@1234', 'Hotel', 'Rejected'),
(8, 12, 'hotel@gmail.com', '123456', 'Hotel', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `reqId` int(11) NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `roomNo` varchar(50) NOT NULL,
  `cId` int(11) NOT NULL,
  `reqDate` datetime NOT NULL,
  `bokDate` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblrequest`
--

INSERT INTO `tblrequest` (`reqId`, `roomId`, `roomNo`, `cId`, `reqDate`, `bokDate`, `status`, `totalAmount`) VALUES
(20, 11, '104', 7, '2023-07-02 13:28:31', '2023-07-06 04:28:00', 'Booked', 8000),
(21, 11, '204', 7, '2023-07-02 16:20:06', '2023-07-22 17:42:00', 'Vacated', 10000),
(22, 11, '210', 7, '2023-07-02 17:40:18', '2023-07-22 17:42:00', 'Booked', 7000),
(24, 12, '201', 7, '2023-07-21 10:06:08', '2023-07-29 13:05:00', 'Booked', 3500),
(25, 12, '', 7, '2023-07-21 10:11:58', '2023-07-28 10:11:00', 'Waiting for response', 6500),
(26, 13, '201', 7, '2023-07-24 11:10:52', '2023-07-24 13:12:00', 'Booked', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `roomId` int(11) NOT NULL,
  `roomDesc` varchar(255) NOT NULL,
  `roomRent` int(11) NOT NULL,
  `roomStatus` varchar(50) NOT NULL DEFAULT 'Pending',
  `img` varchar(200) DEFAULT NULL,
  `hid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`roomId`, `roomDesc`, `roomRent`, `roomStatus`, `img`, `hid`) VALUES
(11, 'Lake side view and resort with great ambience', 5000, 'Available', './images/13.jpg', 5),
(12, 'Surroned by the beach with lots of fun event by the hotel', 2500, 'Pending', './images/photo-1631049307264-da0ec9d70304.jpg', 6),
(13, 'delux', 2000, 'Pending', './images/images123.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `servId` int(11) NOT NULL,
  `servName` varchar(50) NOT NULL,
  `servDesc` varchar(100) NOT NULL,
  `servRate` varchar(50) NOT NULL,
  `hid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`servId`, `servName`, `servDesc`, `servRate`, `hid`) VALUES
(7, 'Ac', 'AC AVA', '1000', 5),
(8, 'BC', 'BC BVB', '2000', 5),
(9, 'CC', 'CC CVC', '1500', 5),
(10, 'jkhi', 'kjnkhjbn', '2000', 5),
(11, 'Party Room', '1Hour of party for min of 10 people  ', '3000', 5),
(12, 'AC rooms', 'Fully Air Conditioned rooms', '1000', 6),
(13, 'Entertainment Room', 'A party space for the youths to enjoy on their way', '3000', 6),
(14, 'AC rooms', 'ac room', '1000', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblservicebook`
--

CREATE TABLE `tblservicebook` (
  `sbid` int(11) NOT NULL,
  `reqId` int(11) DEFAULT NULL,
  `servid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservicebook`
--

INSERT INTO `tblservicebook` (`sbid`, `reqId`, `servid`) VALUES
(4, 8, 7),
(5, 8, 9),
(6, 9, 7),
(7, 9, 9),
(8, 10, 9),
(9, 11, 10),
(10, 13, 11),
(11, 14, 11),
(12, 16, 7),
(13, 16, 8),
(14, 17, 7),
(15, 17, 8),
(16, 18, 7),
(17, 18, 8),
(18, 18, 11),
(19, 19, 7),
(20, 19, 8),
(21, 20, 7),
(22, 20, 8),
(23, 21, 10),
(24, 21, 11),
(25, 22, 10),
(26, 23, 7),
(27, 23, 8),
(28, 23, 9),
(29, 24, 12),
(30, 25, 12),
(31, 25, 13),
(32, 26, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `login_logout`
--
ALTER TABLE `login_logout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`reqId`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`servId`);

--
-- Indexes for table `tblservicebook`
--
ALTER TABLE `tblservicebook`
  ADD PRIMARY KEY (`sbid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_logout`
--
ALTER TABLE `login_logout`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `reqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `servId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblservicebook`
--
ALTER TABLE `tblservicebook`
  MODIFY `sbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
