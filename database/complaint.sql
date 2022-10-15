-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2022 at 02:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebucodes_complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `fullName` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `emailAddress` varchar(256) NOT NULL,
  `phoneNumber` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `fullName`, `userName`, `password`, `emailAddress`, `phoneNumber`, `role`, `category`, `date`) VALUES
(1, 'Main Admin', 'admin001', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.com', '1234567890', 'Admin', 'Admin', '2022-03-31'),
(6, 'Academics Admin', 'academicsAdmin', '3ce41cbd7276a9227c110250e702e75d', 'academicsAdmin@mail.com', '123456789977', 'Sub Admin', 'Academics', '2022-04-01'),
(7, 'Hostel Admin', 'hostelAdmin', 'ddf5e1c4bbda55e4ac46d136cedfb35d', 'hostelAdmin@mail.com', '123456789645', 'Sub Admin', 'Hostel', '2022-04-01'),
(8, 'Transport Admin', 'transportAdmin', '1ef17a72249d08f5921e4a448fdc93ee', 'transportAdmin@mail.com', '12345678995', 'Sub Admin', 'Transport', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `date`) VALUES
(1, 'Hostel', '2022-03-31'),
(2, 'Academics', '2022-03-31'),
(3, 'Transport', '2022-03-31'),
(4, 'Sports', '2022-03-31'),
(5, 'Entertainment', '2022-03-31'),
(6, 'Welfare', '2022-03-31'),
(7, 'Others', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` varchar(256) NOT NULL,
  `complaintType` varchar(256) NOT NULL,
  `complaintTitle` varchar(256) NOT NULL,
  `complaintDetails` text NOT NULL,
  `complaintFiles` varchar(256) NOT NULL,
  `complaintVisibility` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `complaintDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `facultyID` int(11) NOT NULL,
  `departmentName` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `facultyID`, `departmentName`, `date`) VALUES
(1, 1, 'Agricultural Economics', '2022-04-01'),
(2, 1, 'Agricultural Extension', '2022-04-01'),
(3, 2, 'Mechanical Engineering', '2022-04-01'),
(4, 2, 'Petroleum Engineering', '2022-04-01'),
(5, 3, 'Physics', '2022-04-01'),
(6, 3, 'Mathematics', '2022-04-01'),
(7, 4, 'Urban and Regional Planning', '2022-04-01'),
(8, 4, 'Environmental Technology', '2022-04-01'),
(9, 5, 'Public Health', '2022-04-01'),
(10, 5, 'Prosthetics and Orthotics', '2022-04-01'),
(11, 6, 'Computer Science', '2022-04-01'),
(12, 6, 'Information Management Technology', '2022-04-01'),
(13, 7, 'Biochemistry', '2022-04-01'),
(14, 7, 'Microbiology', '2022-04-01'),
(15, 8, 'Mechatronic Engineering', '2022-04-01'),
(16, 8, 'Mechatronic Engineering', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL,
  `facultyName` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `facultyName`, `date`) VALUES
(1, 'School of Agriculture and Agricultural Technology (SAAT)', '2022-04-01'),
(2, 'School of Engineering and Engineering Technology (SEET)', '2022-04-01'),
(3, 'School of Physical Sciences (SOPS)', '2022-04-01'),
(4, 'School of Environmental Sciences (SOES)', '2022-04-01'),
(5, 'School of Health Technology (SOHT)', '2022-04-01'),
(6, 'School of Information and Communication Technology (SICT)', '2022-04-01'),
(7, 'School of Biological Sciences (SOBS)', '2022-04-01'),
(8, 'School of Electrical Systems and Engineering Technology (SESET)', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelID` int(11) NOT NULL,
  `levelName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelID`, `levelName`) VALUES
(1, '100 level'),
(2, '200 level'),
(3, '300 level'),
(4, '400 level'),
(5, '500 level'),
(6, '600 level'),
(7, 'Post Graduate');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subcategoryName` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryID`, `categoryID`, `subcategoryName`, `date`) VALUES
(1, 7, 'Suggestions', '2022-03-31'),
(2, 6, 'FUTO Cafe', '2022-03-31'),
(3, 6, 'Restaurants', '2022-03-31'),
(4, 5, 'Socials', '2022-03-31'),
(5, 5, 'Event Halls', '2022-03-31'),
(6, 4, 'Football', '2022-03-31'),
(7, 4, 'Basketball', '2022-03-31'),
(8, 3, 'Shuttle Fee', '2022-03-31'),
(9, 3, 'Shuttle Routes', '2022-03-31'),
(10, 2, 'Research', '2022-03-31'),
(11, 2, 'Lecture ', '2022-03-31'),
(12, 1, 'Hostel B', '2022-03-31'),
(13, 1, 'Hostel C', '2022-03-31'),
(14, 1, 'Hostel E', '2022-03-31'),
(15, 1, 'Hostel A', '2022-03-31'),
(16, 1, 'Hostel D', '2022-03-31'),
(17, 1, 'NCDC', '2022-03-31'),
(18, 1, 'Post Graduate', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `regNumber` varchar(256) NOT NULL,
  `fullName` varchar(256) NOT NULL,
  `faculty` int(11) NOT NULL,
  `department` varchar(256) NOT NULL,
  `level` varchar(256) NOT NULL,
  `phoneNumber` varchar(256) NOT NULL,
  `emailAddress` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `updateDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `regNumber`, `fullName`, `faculty`, `department`, `level`, `phoneNumber`, `emailAddress`, `password`, `date`, `updateDate`) VALUES
(1, '20191768397', 'Main Admin', 6, 'Information Management Technology', '4', '12345678995', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-04-01', '2022-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
