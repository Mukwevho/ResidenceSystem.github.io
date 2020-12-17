-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2020 at 07:42 AM
-- Server version: 10.2.36-MariaDB
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
-- Database: `tutremfk_tutresidence`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `resName` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `lastName`, `resName`, `contact`, `email`, `password`) VALUES
('admin', 'Takalani', 'Mukwevho', '', '0653572171', 'mnis@gmail.com.ac.az.bb.k', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `cellPhone` int(11) NOT NULL,
  `sessionDetails` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `postedDate` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Mentor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `stdNum`, `time`, `cellPhone`, `sessionDetails`, `name`, `postedDate`, `Status`, `Mentor`) VALUES
(6, 216646797, '2020-10-28 11:11:00', 828811685, 'for loop statements c++', 'Godfrey Mabena', '2020-10-28', 'Approved', 'Jali'),
(11, 216065026, '2020-12-04 10:48:00', 653572172, 'DSO17AT', 'Prudence Lethole', '2020-12-01', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `stdNum`, `name`, `room`, `details`, `status`, `date`) VALUES
(3, 216448154, 'Jali', 'W2-G01', 'Broken Door', 'fixed', '2020-12-01'),
(5, 216448154, 'Jali', 'W2-G01', 'Broken Window', 'Pending', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `labschedule`
--

CREATE TABLE `labschedule` (
  `Day` varchar(255) NOT NULL,
  `slot1` varchar(255) NOT NULL,
  `slot2` varchar(255) NOT NULL,
  `slot3` varchar(255) NOT NULL,
  `slot4` varchar(255) NOT NULL,
  `slot5` varchar(255) NOT NULL,
  `slot6` varchar(255) NOT NULL,
  `slot7` varchar(255) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labschedule`
--

INSERT INTO `labschedule` (`Day`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `no`) VALUES
('Monday', 'OPEN', 'CLOSE', 'OPEN', 'CLOSE', 'OPEN', 'OPEN', 'CLOSE', 1),
('Tuesday', 'CLOSE', 'OPEN', 'OPEN', 'CLOSE', 'OPEN', 'OPEN', 'OPEN', 2),
('Wednesday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'CLOSE', 3),
('Thursday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 4),
('Friday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 5),
('Saturday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 6),
('Sunday', 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE', 'OPEN', 'OPEN', 'OPEN', 7);

-- --------------------------------------------------------

--
-- Table structure for table `noticeBoard`
--

CREATE TABLE `noticeBoard` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `story` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `noticeDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeBoard`
--

INSERT INTO `noticeBoard` (`id`, `topic`, `story`, `img`, `noticeDate`) VALUES
(0, 'FIRST TRY AFTER CHANGING TABLES', 'THIS MIGHT NOT WORK AT ALL', 'assets/img/newsPictures/preview.jpg', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `Residence`
--

CREATE TABLE `Residence` (
  `stdNum` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `roomType` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `resName` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Residence`
--

INSERT INTO `Residence` (`stdNum`, `name`, `surname`, `roomNum`, `roomType`, `status`, `gender`, `resName`, `date`) VALUES
(216065026, 'Prudence', 'Lethole', 'N/A', 'DOUBLE', 'REJECTED', 'female', '', '2020-12-01'),
(216448154, 'Jali', 'Mnisi', 'W2-G01', 'DOUBLE', 'ACCEPTED', 'male', '', '2020-12-01'),
(218206751, 'Takalani', 'Mukwevho', 'W2-G01', 'DOUBLE', 'ACCEPTED', 'male', '', '2020-12-01'),
(217007445, 'Nhlamulo', 'Shikweni', 'N/A', 'SINGLE', 'REJECTED', 'male', '', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `stdID` int(11) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `posting_date` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `motivation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `appointmentDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`stdID`, `stdNum`, `email`, `password`, `contactno`, `posting_date`, `position`, `motivation`, `image`, `appointmentDate`) VALUES
(10, 218206751, 'mukwevhomaxwell0@gmail@yahoo.com', 'b181110dd6696a39f95f3397b24020a4', '0714415650', '2020-12-01', 'N/A', 'N/A', 'N/A', '0000-00-00'),
(9, 217007445, '217007445@tut4life.ac.za', '6b463ec00e41d083bcf4052310e9d330', '0735712985', '2020-12-01', 'N/A', 'N/A', 'N/A', '0000-00-00'),
(4, 216065026, '216065026@tut4life.ac.za', 'b31675875568c4f3047296f9a5e11d65', '0747863099', '2020-12-01', '', '', '', '2020-12-01'),
(6, 216448154, 'mfanafuthimdawe@gmail@yahoo.com', '4192362abe5b833aa06f536de8300273', '0653572172', '2020-12-01', 'mentor', 'Money is the only true motivation', 'assets/img/supportStructure/MID134.jpg', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `StudentMark`
--

CREATE TABLE `StudentMark` (
  `stdNum` int(11) NOT NULL,
  `SubjectName` varchar(255) NOT NULL,
  `subjectMark` int(11) NOT NULL,
  `yearStudy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StudentMark`
--

INSERT INTO `StudentMark` (`stdNum`, `SubjectName`, `subjectMark`, `yearStudy`) VALUES
(216448154, 'TPG201', 58, '2019'),
(218206751, 'TPG201', 72, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `StudentRecord`
--

CREATE TABLE `StudentRecord` (
  `stdNum` int(9) NOT NULL,
  `surname` text NOT NULL,
  `name` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `yearStudy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StudentRecord`
--

INSERT INTO `StudentRecord` (`stdNum`, `surname`, `name`, `gender`, `yearStudy`) VALUES
(216065026, 'Lethole', 'Prudence', 'female', '3'),
(216448154, 'Mnisi', 'Jali', 'male', '2'),
(216646797, 'Mabena', 'Godfrey', 'male', '3'),
(217007445, 'Shikweni', 'Nhlamulo', 'male', '3'),
(217019443, 'Sedibe', 'Kamogelo', 'female', '3'),
(217456134, 'Mokwele', 'Karabo', 'female', '1'),
(218206751, 'Mukwevho', 'Takalani', 'male', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `noticeBoard`
--
ALTER TABLE `noticeBoard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Residence`
--
ALTER TABLE `Residence`
  ADD PRIMARY KEY (`stdNum`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`stdID`);

--
-- Indexes for table `StudentRecord`
--
ALTER TABLE `StudentRecord`
  ADD PRIMARY KEY (`stdNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `stdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
