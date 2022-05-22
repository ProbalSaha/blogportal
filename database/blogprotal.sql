-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220423.6d54ac471a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 03:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogprotal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Entertainment'),
(2, 'Sports'),
(4, 'International'),
(5, 'LifeStyles');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 for Active, 1 For InActive',
  `post_description` text NOT NULL,
  `category` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `author`, `status`, `post_description`, `category`, `tags`, `image`, `post_date`) VALUES
(1, 'JavaScript News and Updates of January 2022', 'Dipta', 0, '  Greetings to all JavaScript admirers and welcome to the first news digest of 2022! I am excited to continue sharing with you interesting bits of news, releases, and useful tips from the JavaScript world. Get to delve into interesting facts from the JavaScript Rising Star report, details of the AngularJS discontinuation, and an unusual malicious attack on popular open-source libraries. I’ll also provide you with a review of recent updates for TypeScript, Deno, and DHTMLX Suite. The second part of the digest includes a pack of useful materials to boost your JavaScript knowledge. ', 1, 'JavaScript', '1373_logo1.png', '2022-05-17'),
(3, 'Sri Lanka PM quits after supporters run riot', 'Dipta', 0, '  Sri Lankan prime minister Mahinda Rajapaksa resigned Monday after dozens of people were hospitalised when his supporters armed with sticks and clubs attacked protestors.  ', 4, 'Sri Lanka', '129_istockphoto-471107172-612x612.jpg', '2022-05-17'),
(9, 'Flood spreads to Netrokona, Kurigram', 'probal saha', 0, 'Vast swathes of Sylhet and Sunamganj districts have been flooded for a week, due to heavy rains coupled with the onrush of waters from the upstream. Water recently receded in some regions of the districts and, at the same time, increased in some other parts.', 4, 'Flood', '8983_prothomalo.jpg', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(2) NOT NULL DEFAULT 0 COMMENT '0 for inactive and 1 for active',
  `role` int(2) NOT NULL DEFAULT 1 COMMENT '0 for Admin And 1 For Editor\r\n',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `is_active`, `role`, `email`, `phone`, `address`, `image`, `join_date`) VALUES
(2, 'Dipta Saha', '8cb2237d0679ca88db6464eac60da96345513964', 1, 0, 'dipta@mail.com', '015545555', 'Rajbari', '2501_logo1.png', '2022-05-22'),
(3, 'probal saha', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'probalsaha26@gmail.com', '01912310874', '    ', '', '2022-05-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



