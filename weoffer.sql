-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:11 PM
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
-- Database: `weoffer`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id_app` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_jobseeker` int(11) NOT NULL,
  `motivation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id_app`, `id_job`, `id_jobseeker`, `motivation`) VALUES
(1, 3, 1, 'I am deeply passionate about design and excited about the opportunity to bring my creativity and expertise to your company as a Designer');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `employment_type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `category` varchar(50) NOT NULL,
  `id_recruiter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `position`, `description`, `entreprise`, `location`, `employment_type`, `created_at`, `category`, `id_recruiter`) VALUES
(1, 'Software Engineer', 'We are seeking a highly skilled and motivated Software Engineer to join our dynamic team. The ideal candidate will have strong experience in developing scalable web applications using modern technologies such as JavaScript, Node.js, and React. You will collaborate with cross-functional teams to design and implement innovative solutions that drive business growth. This is an exciting opportunity to work on cutting-edge projects in a fast-paced environment.', 'Tech Innovations Ltd', 'Bogotá, Colombia', 'Full-time', '2024-04-06 15:23:42', 'Engineering', 4),
(2, 'Music Producer', 'Harmony Studios, a leading music production company, is seeking a talented and experienced Music Producer to join our team. The ideal candidate will have a passion for music production, a strong understanding of music theory and composition, and experience in working with artists to create high-quality recordings. You will collaborate closely with artists, engineers, and other creative professionals to bring projects to life and deliver exceptional results. This is an exciting opportunity to work on a variety of projects in a dynamic and creative environment.', 'Harmony Studios', 'Texas , USA', 'Part-time', '2024-04-06 15:41:52', 'Arts and Design', 2),
(3, 'Designer', 'Creative Solutions Inc., a leading design agency, is seeking a talented and innovative Designer to join our team in Houston. The ideal candidate will have a passion for design, strong conceptual skills, and proficiency in graphic design software. You will collaborate with clients and team members to develop creative solutions that meet project objectives and exceed expectations. This is an exciting opportunity to showcase your creativity and contribute to a wide range of design projects in a dynamic and collaborative environment.', ' Creative Solutions', 'Houston, TX, United States', 'Full-time', '2024-04-06 15:47:14', 'Arts and Design', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `info_personnelles` varchar(1000) NOT NULL,
  `image_url` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `last_name`, `email`, `password`, `user_type`, `job`, `city`, `info_personnelles`, `image_url`, `created_at`) VALUES
(1, 'Sarah', 'Martin', 'sarah.martin@gmail.com', '$2y$10$Q5T511f7ltOUcSEJ7S1y4etM/QKt0nUGGpwWF5RF4HYRE4A9KTrdC', 'job_seeker', '', '', '', '', '2024-04-06 14:48:42'),
(2, 'Giselle', 'Carter', 'giselle.carter@gmail.com', '$2y$10$nTi3GVDHGfn1ySmP4REe9O6KrgD6A2xzaiTbid.ntCjupZFvH8T0O', 'recruiter', '', '', '', '', '2024-04-06 14:52:09'),
(3, 'Juan', 'Martinez', 'juan.martinez@gmail.com', '$2y$10$FKBv0YRSgCxTQvj.BssKmeTWvcCzfIezrUE/VuJkbsGx8wtW0Uhem', 'recruiter', '', '', '', '', '2024-04-06 14:53:46'),
(4, 'James', 'Lopez', 'jlopez8@gmail.com', '$2y$10$lmC98ScQFdsIhrtu5qfCR.uW.JhBrT6bwxW9xkuT2AAwhDRTnHRzq', 'job_seeker', '', '', '', 'IMG-6614203827b352.99509141.', '2024-04-06 14:55:12'),
(5, 'Eya', 'Hammar', 'eyahammar23@gmail.com', 'Password123', 'admin', '', '', '', '', '2024-04-06 15:04:55'),
(6, 'Amal', 'Sboui', 'amalsboui33@gmail.com', '$2y$10$lmC98ScQFdsIhrtu5qfCR.uW.JhBrT6bwxW9xkuT2AAwhDRTnHRzq', 'admin', '', '', '', '', '2024-04-06 15:06:09'),
(7, 'Awab', 'Zemzemi', 'zemawab@gmail.com', 'Password123', 'admin', '', '', '', '', '2024-04-06 15:06:55'),
(8, 'Yasmine', 'Elhakem', 'yasmineelhakem8@gmail.com', '$2y$10$lmC98ScQFdsIhrtu5qfCR.uW.JhBrT6bwxW9xkuT2AAwhDRTnHRzq', 'admin', '', '', '', '', '2024-04-06 15:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_jobseeker` (`id_jobseeker`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_recruiter` (`id_recruiter`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `id_job` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`),
  ADD CONSTRAINT `id_jobseeker` FOREIGN KEY (`id_jobseeker`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `id_recruiter` FOREIGN KEY (`id_recruiter`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
