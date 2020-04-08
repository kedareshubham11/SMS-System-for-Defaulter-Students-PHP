-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 06:36 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`username`(20))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `smshistory`
--

DROP TABLE IF EXISTS `smshistory`;
CREATE TABLE IF NOT EXISTS `smshistory` (
  `name` text NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smshistory`
--

INSERT INTO `smshistory` (`name`, `contact_no`, `date`, `message`) VALUES
('Sandhya N', '7219177767', '2018-10-13 00:00:00', 'defaulter msg'),
('Kedare Shubham', '7775954978', '2018-10-13 00:00:00', 'defaulter msg'),
('Shubham44', '9325818103', '2018-10-13 00:00:00', 'defaulter msg'),
('Shubham44', '9325818103', '2018-10-13 04:16:36', 'your attendance is below 75%'),
('Sandhya N', '7219177767', '2018-10-13 05:39:06', 'Defaulter sms'),
('Shubham44', '9325818103', '2018-10-13 05:39:08', 'Defaulter sms'),
('Sandhya N', '7219177767', '2018-10-13 05:49:13', 'kjsbdksjvjsdb'),
('Sandhya N', '7219177767', '2018-10-13 05:50:38', 'kjsbdksjvjsdb'),
('Shubham44', '9325818103', '2018-10-13 05:50:56', 'hjhkhkjkhkkhijk'),
('Shubham44', '9325818103', '2018-10-13 05:53:53', 'hjhkhkjkhkkhijk'),
('Shubham44', '9325818103', '2018-10-13 05:54:12', 'hjhkhkjkhkkhijk'),
('Sandhya N', '7219177767', '2018-10-13 05:54:41', 'jskadkuahysiudyaudahi'),
('Sandhya N', '7219177767', '2018-10-13 06:08:38', 'in cabin'),
('Sandhya N', '7219177767', '2018-10-13 06:08:39', 'in cabin'),
('Sandhya N', '7219177767', '2018-10-13 06:53:13', 'Yoiu should meet to Hod immidiatly'),
('pratik thole', '9422687156', '2018-10-13 06:53:14', 'Yoiu should meet to Hod immidiatly'),
('Nakul Dhule', '7798441318', '2018-10-14 07:22:22', 'Tommorow,\r\n You should meet HOD ..'),
('Nakul Bakal', '7507170953', '2018-10-14 07:22:53', 'Tommorow,\r\n You should meet HOD ..'),
-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `rollno` int(11) NOT NULL,
  `sname` text NOT NULL,
  `dob` date NOT NULL,
  `dept` text NOT NULL,
  `year` text NOT NULL,
  `gender` text NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `parent_contact_no` varchar(10) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `sname`, `dob`, `dept`, `year`, `gender`, `contact_no`, `parent_contact_no`) VALUES
(2, 'Nakul Dhule', '2000-10-02', 'CSE', 'FE', 'Male', '9854657412', '7798441318'),
(21, 'Kedare Shubham', '1964-01-12', 'CSE', 'FE', 'male', '7798441318', '7775954978'),
(65, 'Shubham44', '1996-04-15', 'CSE', 'FE', 'male', '9325818104', '9325818103'),
(6, 'Nakul Bakal', '1997-04-12', 'CSE', 'FE', 'male', '9850087203', '7507170953'),
(3, 'Sandhya N', '1998-06-20', 'CSE', 'FE', 'female', '7219177766', '7219177767'),
(123, 'pratik thole', '2008-03-05', 'CSE', 'FE', 'male', '8087965103', '9422687156');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `tid` text NOT NULL,
  `tname` text NOT NULL,
  `dept` text NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`tid`(20))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `dept`, `password`, `dob`, `gender`, `email`) VALUES
('shubham', 'Shubham', 'CSE', 'shubham', '1988-02-02', 'male', 'shubham@gmail.com'),
('krinsha', 'krishna', 'cse', 'anmnd,', '1996-01-15', 'male', 'krishna@gmail.com'),
('rahul', 'rahul', 'MECH', 'rahul', '1998-12-12', 'male', 'rahul@gmail.com'),
('1234', 'S B Bangar', 'CSE', '1234', '1998-06-06', 'female', 's@gmail.com'),
('12', 'S. B. Bangar', 'CSE', '1', '0002-04-04', 'female', 'sb@gmail.com'),
('kk123', 'KK', 'CSE', 'kk123', '1989-04-01', 'male', 'kk@gmail.com'),
('sandhya25347', 'Sandhya Nemane', 'CSE', 'sandhya', '1998-09-15', 'female', 'sandy@gmail.com'),
('pratik123', 'Pratik ', 'CSE', 'pratik123', '1997-02-01', 'male', 'pratik@gmail.com'),
('6', 'pratik sir', 'CSE', '6', '1234-05-06', 'male', 'pt@gmail.com'),
('4', 'drd mam', 'CSE', '1234', '2000-06-07', 'female', 'd@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
