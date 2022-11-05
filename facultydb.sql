-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 02:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `fs`
--

CREATE TABLE `fs` (
  `id` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `birthday` varchar(200) NOT NULL,
  `birthplace` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `registered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `license_id` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `license_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `seminar_name` varchar(200) NOT NULL,
  `names` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholar_id` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `scholarship_start` varchar(200) NOT NULL,
  `scholarship_end` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `seminar_name` varchar(200) NOT NULL,
  `seminar_date` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `registered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `year`, `course`, `registered_date`, `image`) VALUES
('014A', 'Paz, Jan Paulo Dagli', '2018', 'Bachelor of Science in Information Technology', '2021-08-28 08:20:58', 'tree.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tracer`
--

CREATE TABLE `tracer` (
  `id` int(11) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `college` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `current` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `companyaddress` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `employeddate` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `salaryrange` varchar(200) NOT NULL,
  `tracerdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracer`
--

INSERT INTO `tracer` (`id`, `lastname`, `firstname`, `middlename`, `year`, `course`, `college`, `age`, `gender`, `address`, `tel`, `mobile`, `email`, `current`, `company`, `companyaddress`, `salary`, `status`, `source`, `companyname`, `employeddate`, `position`, `salaryrange`, `tracerdate`, `image`) VALUES
(1, 'Paz', 'Jan Paulo', 'Dagli', '2018', 'Bachelor if Science in Industrial Technology', 'College of Agriculture', '21', 'Male', 'Lucena City', 'NA', '096508436103', 'jpaulopaz08@gmail.com', 'Full-stack Developer', 'NA', 'Taguig City', '50000', 'Yes', 'Social Media', 'Accenture', '2021-09-07', 'Full-stack Developer, Active', '50000 to 60000', '2021-09-07 09:34:07', 'tree.PNG'),
(2, 'Dalisay', 'Cardo', 'Poe', '2018', 'Bachelor f Science in Engineering', 'College of Engineering', '23', 'Female', 'Lucena City', 'NA', '09650843610', 'cardodalisay@gmail.com', 'Engineer', 'DPWH', 'Rizal', '100000', 'Yes', 'Relatives', 'DPWH', '2021-07-16', 'Engineer, Active', '100000', '2021-08-25 05:21:35', 'LogoName.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fs`
--
ALTER TABLE `fs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`scholar_id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`seminar_name`);

--
-- Indexes for table `tracer`
--
ALTER TABLE `tracer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracer`
--
ALTER TABLE `tracer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
