-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 10:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questzania`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(250) NOT NULL,
  `nama_kelas` text NOT NULL,
  `teacher_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `teacher_id`) VALUES
(4, 'GeForce', '21'),
(5, 'Ryzen', '22');

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `id` int(250) NOT NULL,
  `quiz_id` text NOT NULL,
  `markah` text NOT NULL,
  `student_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markah`
--

INSERT INTO `markah` (`id`, `quiz_id`, `markah`, `student_id`) VALUES
(3, '3', '75', '23'),
(4, '3', '40', '25');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int(250) NOT NULL,
  `kelas_id` text NOT NULL,
  `tarikh` text NOT NULL,
  `file` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `noFon` varchar(250) DEFAULT NULL,
  `noKp` varchar(250) DEFAULT NULL,
  `kelas_id` text DEFAULT NULL,
  `student_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `nama`, `noFon`, `noKp`, `kelas_id`, `student_id`) VALUES
(2, 4, 'admin', NULL, NULL, NULL, NULL),
(18, 21, 'Raja', '0139312931', '9801230192', '4', NULL),
(19, 22, 'puteri', '123123', '12312312', '5', NULL),
(20, 23, 'Dziya', '1231231', '9328213123', '5', NULL),
(21, 24, 'adsad', '32131', '231123', '4', NULL),
(22, 25, 'uyyyeq', '12321', 'ds1230103', '5', NULL),
(23, 26, 'terei', '123213', '123123', NULL, '23'),
(24, 27, 'fsdffs', '12312', '123123', NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(250) NOT NULL,
  `kelas_id` text NOT NULL,
  `link` text NOT NULL,
  `title` text NOT NULL,
  `tarikhTamat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `kelas_id`, `link`, `title`, `tarikhTamat`) VALUES
(2, '2', '<iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSex8Gf2LZzzaKT4Ro-eWC0wiWh6ALmmmj9dw_DMAOztj__WuA/viewform?embedded=true\" width=\"640\" height=\"4871\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\">Loading…</iframe>', 'test quiz', '2024-05-23 00:00:00'),
(3, '5', '<iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSeRvFg5KeSd9540imfP6H7jVhl5rTnzwMguozxrkSjzOoqv9w/viewform?embedded=true\" width=\"640\" height=\"4943\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\">Loading…</iframe>', 'tytu', '2024-05-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(4, 'admin@gmail.com', 'admin', 'Admin'),
(21, 'raja@gmail.com', '9801230192', 'Teacher'),
(22, 'puteri@gmail.com', '12312312', 'Teacher'),
(23, 'dziya.zaman@gmail.com', '123', 'Student'),
(24, 'opie@gmail.com', '231123', 'Student'),
(25, 'yuyi@gmail.com', 'ds1230103', 'Student'),
(26, 'terei@gmail.com', '123123', 'Parent'),
(27, 'asd@gmail.com', '123123', 'Parent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markah`
--
ALTER TABLE `markah`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
