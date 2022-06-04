-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 09:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `moment` varchar(50) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `class_id`, `user_id`, `moment`, `day`) VALUES
(1, 5, 13, 'Morning', '2022-06-04'),
(2, 6, 13, 'Evening', '2022-06-04'),
(3, 4, 13, 'Evening', '2022-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `gymclass`
--

CREATE TABLE `gymclass` (
  `id` int(11) NOT NULL,
  `gym_class_name` varchar(50) NOT NULL,
  `gym_class_desc` varchar(50) NOT NULL,
  `pic_name` varchar(80) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymclass`
--

INSERT INTO `gymclass` (`id`, `gym_class_name`, `gym_class_desc`, `pic_name`, `trainer_id`) VALUES
(4, 'Boxing Session', 'This is a simple gym class.', '979db7519d1cad48709601366929ebd2boxing.jpg', 6),
(5, 'Zumba', 'This is  a Zumba Class Session.', '25ee1df6c4b2487bb6c439f70187874bzumba.jpg', 6),
(6, 'Aerobics', 'Welcome to the Aerobics Class.', 'e50f61770ba3807706ff4a17507389b6aerobics.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `service_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic_name` varchar(80) NOT NULL,
  `service_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`, `user_id`, `pic_name`, `service_created_date`) VALUES
(7, 'Daily', 500, 7, '577b8e71dbb3ea5b86d2bc05cce54fddimg-1.jpg', '2022-06-04 09:46:39'),
(8, 'Weekly', 3000, 7, '2cc67e05ac4769b705e8f81e4170b7c8img-2.jpg', '2022-06-04 09:46:52'),
(9, 'Monthly', 8000, 7, 'a836139c6dbe10b5e2a0013a71beb05bimg-3.jpg', '2022-06-04 09:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `pic_name` varchar(80) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `pass`, `gender`, `role`, `pic_name`, `date_created`) VALUES
(6, 'Wilson', 'Onjore', '0713420287', 'onjorew@gmail.com', '$2y$10$YTNhNjM0Yzk3ZjFmMDVmNuZDFDIbS4s8ie51QKf9YG062JBAkzL8i', 'Male', 'Trainer', '73931d76ea13cb6213bdd36bda83c2f9Snapshot_20150706_190803.jpg', '2022-04-22 09:18:16'),
(7, 'Tamim', 'Okumu', '0722556278', 'tamim@gmail.com', '$2y$10$ZmQ1YTYxNzcwMDdkNjI3MOKh66Q2L8LTA3nZAoYqltPOeh7krB3Ty', 'Female', 'Admin', 'WIN_20211009_09_29_36_Pro.jpg', '2022-06-04 08:08:58'),
(13, 'Judas', 'Iscariot', '90523314551', 'judas@gmail.com', '$2y$10$M2JkYWQxMTE1NGQ1ODZiM.MLzFDYgRXPQVRVlZ/fgF3RRb5Mr4MH.', 'Male', 'Customer', '67afbb1174c8ac747834f44aa7be0dd7WIN_20211009_09_28_47_Pro.jpg', '2022-04-25 13:36:57'),
(16, 'Juma', 'Kaseja', '0734526718', 'kaseja@gmail.com', '$2y$10$YmJmNTY2ZDVhYTQ3ZTU5MeO/wIbdEvFlpfnWcurP4IiGrxAVaYrvu', 'Male', 'Trainer', '887d11960f29ce3bf0763e2c31b5f49fSnapshot_20150806_123445.jpg', '2022-04-09 19:22:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Enrollment` (`user_id`),
  ADD KEY `FK_Gym` (`class_id`);

--
-- Indexes for table `gymclass`
--
ALTER TABLE `gymclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GymClass` (`trainer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_PersonPayment` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_PersonService` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gymclass`
--
ALTER TABLE `gymclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `FK_Enrollment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_Gym` FOREIGN KEY (`class_id`) REFERENCES `gymclass` (`id`);

--
-- Constraints for table `gymclass`
--
ALTER TABLE `gymclass`
  ADD CONSTRAINT `FK_GymClass` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_PersonPayment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_PersonService` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
