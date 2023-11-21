-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2023 at 02:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `record`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel_no` varchar(11) NOT NULL,
  `enq_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`firstname`, `lastname`, `tel_no`, `enq_date`) VALUES
('Waliyat', 'Muhammad', '07012241232', '2023-06-10'),
('Waliyat', 'Oladeni', '0908407343', '2023-06-12'),
('Damola', 'Adenike', '08186144782', '2023-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `student_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amount` bigint NOT NULL,
  `payment` bigint NOT NULL,
  `p_tel` varchar(11) NOT NULL,
  `p_date` date NOT NULL,
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`student_id`, `course`, `amount`, `payment`, `p_tel`, `p_date`) VALUES
('23/ge-3456ah/ng', 'Desktop Publishing', 50000, 50000, '08186144782', '2023-06-12'),
('23/ge-6144en/ce', 'Data Science', 150000, 100000, '08183456782', '2023-06-18'),
('23/ge-6144en/ce', 'Data Science', 150000, 30000, '08186144782', '2023-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel_no` varchar(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `amount` int NOT NULL,
  `duration` varchar(10) NOT NULL,
  `date_enrolled` date NOT NULL,
  `due_date` date NOT NULL,
  `statu` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `tel_no`, `course`, `amount`, `duration`, `date_enrolled`, `due_date`, `statu`) VALUES
('23/ge-6144en/ce', 'Alonge', 'Muheebdeen', '08186144782', 'Data Science', 150000, '4month(s)', '2023-05-28', '2023-10-07', 'Ongoing'),
('23/la-6144en/nt', 'Damola', 'Muheebdeen', '08186144782', 'Software Development', 120000, '4month(s)', '2023-04-30', '2023-09-09', 'Ongoing'),
('23/at-3456de/ce', 'Waliyat', 'Agbede', '08183456782', 'Data Science', 150000, '2month(s)', '2023-05-28', '2023-07-29', 'Ongoing'),
('22/at-6144ni/is', 'Taofikat', 'Oladeni', '08186144782', 'Data Analysis', 100000, '7month(s)', '2022-11-27', '2023-06-30', 'Completed'),
('23/ia-3802en/gn', 'Fathia', 'Salaudeen', '09173802836', 'Graphics Design', 40000, '2month(s)', '2023-03-26', '2023-06-03', 'Completed'),
('23/la-407ni/ce', 'Damola', 'Oladeni', '0908407386', 'Data Science', 150000, '6month(s)', '2023-01-01', '2023-07-08', 'Completed'),
('23/at-7382ni/ce', 'Taofikat', 'Oladeni', '09027382723', 'Data Science', 150000, '5month(s)', '2023-01-01', '2023-06-30', 'Completed'),
('23/at-3456ni/ng', 'Waliyat', 'Oladeni', '08183456782', 'Desktop Publishing', 50000, '2month(s)', '2023-03-26', '2023-06-24', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin001');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
