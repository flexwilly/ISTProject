-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 09:02 PM
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
(3, 4, 13, 'Evening', '2022-06-04'),
(4, 6, 13, 'Evening', '2022-06-06');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `user_id`, `service_id`, `start_date`, `end_date`) VALUES
(1, 'PAYID-MKPSXII709093560F734090G', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 30.00, 'USD', 'approved', 13, 8, '2022-06-08 00:00:00', '2022-06-08 00:00:00'),
(2, 'PAYID-MKPSZPQ43S22772WW005405H', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 60.00, 'USD', 'approved', 13, 8, '2022-06-08 00:00:00', '2022-06-08 00:00:00'),
(3, 'PAYID-MKPS3HI5WY57569BK5126614', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 240.00, 'USD', 'approved', 13, 9, '2022-06-07 00:00:00', '2022-06-07 00:00:00'),
(4, 'PAYID-MKPS34I7J6294537M164962T', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 90.00, 'USD', 'approved', 13, 8, '2022-06-08 00:00:00', '2022-06-08 00:00:00'),
(5, 'PAYID-MKPS57Y7CG71794KD3875450', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 160.00, 'USD', 'approved', 13, 9, '2022-06-08 00:00:00', '2022-08-08 00:00:00'),
(6, 'PAYID-MKPVELY2RD50246XR2455347', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 30.00, 'USD', 'approved', 13, 8, '2022-06-08 00:00:00', '2022-06-15 00:00:00'),
(7, 'PAYID-MKPVELY2RD50246XR2455347', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 30.00, 'USD', 'approved', 13, 8, '2022-06-08 00:00:00', '2022-06-15 00:00:00'),
(8, 'PAYID-MKPVG4Q2Y202758WH527571A', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 80.00, 'USD', 'approved', 13, 9, '2022-06-07 00:00:00', '2022-07-07 00:00:00'),
(9, 'PAYID-MKPVG4Q2Y202758WH527571A', 'EEND2AXEUF2VY', 'onjorew-buyer@gmail.com', 80.00, 'USD', 'approved', 13, 9, '2022-06-07 00:00:00', '2022-07-07 00:00:00');

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
(7, 'Daily', 5, 7, '577b8e71dbb3ea5b86d2bc05cce54fddimg-1.jpg', '2022-06-07 09:52:35'),
(8, 'Weekly', 30, 7, '2cc67e05ac4769b705e8f81e4170b7c8img-2.jpg', '2022-06-07 09:52:42'),
(9, 'Monthly', 80, 7, 'a836139c6dbe10b5e2a0013a71beb05bimg-3.jpg', '2022-06-07 09:52:49');

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
(7, 'Tamim', 'Okumu', '0722556278', 'tamim@gmail.com', '$2y$10$OTllMTE1ZGIxNDlmODA1MOUfyym7IU1B19RgsC5dN/.DGqJYExEqW', 'Male', 'Admin', '1315c2e95749ab968809c15624656261hummer.jpg', '2022-06-07 13:50:05'),
(13, 'Judas', 'Iscariot', '90523314551', 'judas@gmail.com', '$2y$10$NjgyYzM1MTQ3ZTM1Y2Q5MO/Z.UQnwuA9v3gs0d7OSuD1wl9DnmC7m', 'Male', 'Customer', '67afbb1174c8ac747834f44aa7be0dd7WIN_20211009_09_28_47_Pro.jpg', '2022-06-05 18:38:10'),
(16, 'Juma', 'Kajjala', '+254713420287', 'kaseja@gmail.com', '$2y$10$ZWJhZmI1NTcwZDI5MWU1YOBn984xkgvF0Q3hZDPOF4NhR1IaR4FXq', 'Male', 'Trainer', '7784b568af5dea7690b88f2d7b825ae9prado.jpg', '2022-06-06 20:48:41');

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USYSID` (`user_id`),
  ADD KEY `FK_SERVID` (`service_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gymclass`
--
ALTER TABLE `gymclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_SERVID` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`),
  ADD CONSTRAINT `FK_USYSID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_PersonService` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
