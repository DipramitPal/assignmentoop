-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 03:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `given_by` varchar(255) NOT NULL,
  `given_to` varchar(255) NOT NULL,
  `textdata` text NOT NULL,
  `alert` int(2) NOT NULL,
  `completed` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `taskid`, `given_by`, `given_to`, `textdata`, `alert`, `completed`) VALUES
(1, 1, 'harshBajaj', 'dipramitPal', 'Abd', 0, 1),
(2, 2, 'harshBajaj', 'parasChaudhary', 'Abcdef', 0, 1),
(3, 3, 'harshBajaj', 'dipramitPal', 'bc', 0, 1),
(4, 4, 'harshBajaj', 'dipramitPal', 'Same Task', 0, 1),
(5, 4, 'harshBajaj', 'parasChaudhary', 'Same Task', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `category`, `pass`) VALUES
(1, 'harshBajaj', '1', 'head_harsh'),
(2, 'dipramitPal', '2', 'sub_dipramit'),
(3, 'parasChaudhary', '2', 'sub_paras'),
(4, 'rohitKumar', '1', 'head_rohit'),
(5, 'ankitSaini', '1', 'head_ankit'),
(6, 'rohitkumarBoga', '1', 'head_rohit'),
(7, 'rishitSinha', '2', 'sub_rishit'),
(8, 'shivanshuPandey', '2', 'sub_shivanshu'),
(9, 'eshaLath', '2', 'sub_esha'),
(10, 'sagarPanchal', '2', 'sub_sagar'),
(11, 'abhinavSaini', '2', 'sub_abhinav'),
(12, 'subhamKumar', '2', 'sub_subham'),
(13, 'sahilRaj', '2', 'sub_sahil'),
(14, 'harshitBansal', '2', 'sub_harshit'),
(15, 'ashutoshSameer', '2', 'sub_sameer'),
(16, 'pradhumnGoyal', '2', 'sub_pradhumn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
