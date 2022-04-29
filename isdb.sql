-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 09:53 PM
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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'Boxing Class', 3000, 16, 'b556c3d72cd3a95b8e55f65b06b15876istockphoto-485457702-170667a.jpg', '2022-04-11 08:40:22');

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
(7, 'Tamim', 'Okumu', '0722556278', 'tamim@gmail.com', '$2y$10$MDRhY2MyMGNkNmIwNjA0MePP74qGogpUuOzR3VYcX39ENI9VZZybu', 'Female', 'Admin', 'WIN_20211009_09_29_36_Pro.jpg', '2022-04-25 13:30:17'),
(13, 'Judas', 'Iscariot', '90523314551', 'judas@gmail.com', '$2y$10$M2JkYWQxMTE1NGQ1ODZiM.MLzFDYgRXPQVRVlZ/fgF3RRb5Mr4MH.', 'Male', 'Customer', '67afbb1174c8ac747834f44aa7be0dd7WIN_20211009_09_28_47_Pro.jpg', '2022-04-25 13:36:57'),
(16, 'Juma', 'Kaseja', '0734526718', 'kaseja@gmail.com', '$2y$10$YmJmNTY2ZDVhYTQ3ZTU5MeO/wIbdEvFlpfnWcurP4IiGrxAVaYrvu', 'Male', 'Trainer', '887d11960f29ce3bf0763e2c31b5f49fSnapshot_20150806_123445.jpg', '2022-04-09 19:22:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `FK_PersonAssignment` (`trainer_id`),
  ADD KEY `FK_ServiceAssignment` (`service_id`);

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
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `FK_PersonAssignment` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_ServiceAssignment` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

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
