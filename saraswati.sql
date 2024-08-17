-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2020 at 08:10 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GBICS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `email`, `phoneno`, `address`) VALUES
(1, 'cricketrangasala@gmail.com', '056-525771', 'Bharatpur-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donors`
--

CREATE TABLE `tbl_donors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gid`, `name`, `description`, `date`, `status`) VALUES
(9, '&quot; à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¥¨à¥¦à¥­à¥¬ &quot;', '&quot; à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¥¨à¥¦à¥­à¥¬ &quot; à¤•à¥‹ à¤²à¤¾à¤—à¥€ à¤‰à¤ªà¤ªà¥à¤°à¤®à¥à¤– à¤ªà¤¾à¤°à¥à¤µà¤¤à¥€ à¤¸à¤¹à¤•à¥‹ à¤…à¤§à¥à¤¯à¤•à¥à¤·à¤¤à¤¾à¤®à¤¾ à¤­à¤°à¤¤à¤ªà¥à¤° à¤®à¤¹à¤¾à¤¨à¤—à¤°à¤•à¥‹ à¤µà¤¡à¤¾ à¤…à¤§à¥à¤¯à¤•à¥à¤· à¤œà¥à¤¯à¥‚à¤¹à¤°à¥à¤•à¥‹ à¤¬à¥ˆà¤ à¤•', '2020-01-30', '1'),
(10, 'à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¥¨à¥¦à¥­à¥¬ à¤•à¥‹', 'à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¥¨à¥¦à¥­à¥¬ à¤•à¥‹ à¤²à¤¾à¤—à¥€ à¤šà¤¿à¤¤à¤µà¤¨ à¤œà¤¿à¤²à¥à¤²à¤¾ à¤¬à¤¹à¥à¤¦à¥‡à¤¶à¥à¤¯ à¤¸à¤¹à¤•à¤¾à¤°à¥€ à¤¸à¤‚à¤˜à¤•à¥‹ à¤¬à¥ˆà¤ à¤•', '2020-01-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_images`
--

CREATE TABLE `tbl_gallery_images` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery_images`
--

INSERT INTO `tbl_gallery_images` (`id`, `gid`, `imagename`, `status`) VALUES
(25, 9, 'resource/images/3.jpg', '1'),
(26, 10, 'resource/images/5.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_latest_update`
--

CREATE TABLE `tbl_latest_update` (
  `lid` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_latest_update`
--

INSERT INTO `tbl_latest_update` (`lid`, `title`, `date`, `status`) VALUES
(10, 'à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¤¸à¤®à¤¿à¤¤à¤¿à¤•à¥‹ à¤¬à¥ˆà¤ à¤•', '2020-01-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_latest_update_images`
--

CREATE TABLE `tbl_latest_update_images` (
  `id` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `imagename` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_latest_update_images`
--

INSERT INTO `tbl_latest_update_images` (`id`, `lid`, `imagename`, `status`) VALUES
(24, 10, 'resource/images/7.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`id`, `title`, `description`, `date`, `image`, `status`, `file`) VALUES
(54, 'à¤—à¥Œà¤¤à¤® à¤¬à¥à¤¦à¥à¤§ à¤…à¤¨à¥à¤¤à¤°à¤¾à¤·à¥à¤Ÿà¥à¤°à¤¿à¤¯ à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤¨à¤¿à¤®à¤¾à¤°à¥à¤£à¤•à¤¾ à¤²à¤¾à¤—à¤¿ à¤¬à¥ƒà¤¹à¤¤ à¤§à¤¨- à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤®à¥‹à¤¹à¤¾à¤¤à¥à¤¸à¤µ à¥¨à¥¦à¥­à¥¬', 'à¤®à¤¿à¤¤à¥€ :à¥¨à¥¦à¥­à¥¬/à¥§à¥¦/à¥§à¥¯ à¤—à¤¤à¥‡ à¤¬à¤¿à¤¹à¤¾à¤¨ à¥§à¥§ à¤¬à¤œà¥‡ à¤®à¤‚à¤—à¤²à¤ªà¥à¤° à¤—à¤¾.à¤µà¤¿. à¤¸ à¤­à¤µà¤¨ (à¤¹à¤¾à¤² à¤­.à¤®à¤¾.à¤¨.à¤ªà¤¾ à¤µà¤¡à¤¾ à¤¨à¤‚ à¥§à¥¬ à¤­à¤à¤•à¥‹à¤²à¥‡) à¤¶à¥‹à¤­à¤¾ à¤¯à¤¾à¤¤à¥à¤°à¤¾ à¤¸à¥à¤°à¥ à¤­à¤à¤° à¤°à¤‚à¤—à¤¶à¤¾à¤²à¤¾ à¤§à¤¨ à¤§à¤¾à¤¨à¥à¤¯à¤¾à¤šà¤¾à¤² à¤ªà¤°à¤¿à¤¸à¤°à¤®à¤¾ à¤ªà¥à¤—à¥€ à¤”à¤ªà¤šà¤¾à¤°à¤¿à¤• à¤‰à¤¦à¥à¤¦à¤˜à¤¾à¤Ÿà¤¨ à¤¹à¥à¤¨à¥‡ à¤­à¤à¤•à¥‹à¤²à¥‡ à¤¸à¤®à¥à¤ªà¥‚à¤°à¥à¤£ à¤¸à¤¹à¤­à¤¾à¤—à¥€ à¤¸à¤‚à¤˜ à¤¸à¤‚à¤¸à¥à¤¥à¤¾à¤¹à¤°à¥, à¤°à¤¾à¤œà¤¨à¥ˆà¤¤à¤¿à¤• à¤•à¤°à¥à¤®à¥€à¤¹à¤°à¥, à¤¸à¤¾à¤®à¤¾à¤œà¤¿à¤• à¤•à¤°à¥à¤®à¥€à¤¹à¤°à¥, à¤ªà¤¤à¥à¤°à¤•à¤¾à¤°à¤¹à¤°à¥, à¤‰à¤¦à¥à¤¯à¥‹à¤—à¥€ à¤µà¥à¤¯à¤µà¤¸à¤¾à¤¯à¥€à¤¹à¤°à¥, à¤¸à¤°à¤•à¤¾à¤°à¥€ à¤¤à¤¥à¤¾ à¤—à¥ˆà¤° à¤¸à¤°à¤•à¤¾à¤°à¥€ à¤•à¤°à¥à¤®à¤šà¤¾à¤°à¥€à¤¹à¤°à¥, à¤¶à¤¿à¤•à¥à¤·à¤• à¤¤à¤¥à¤¾ à¤µà¤¿à¤¦à¥à¤¯à¤¾à¤°à¥à¤¥à¥€à¤¹à¤°à¥‚, à¤¸à¤¹à¤•à¤¾à¤°à¥€ à¤•à¤°à¥à¤®à¥€à¤¹à¤°à¥, à¤¸à¤®à¥à¤ªà¥‚à¤°à¥à¤£à¤®à¤¾ à¤‰à¤²à¤²à¥‡à¤–à¤¨à¤¿à¤¯ à¤¸à¤¹à¤­à¤¾à¤—à¤¿à¤¤à¤¾à¤•à¥‹ à¤²à¤¾à¤—à¥€ à¤¹à¤¾à¤°à¥à¤¦à¤¿à¤• à¤…à¤¨à¥à¤°à¥‹à¤§ à¤—à¤°à¥à¤¦à¤›à¥Œà¤‚à¥¤', '2020-01-30', 'resource/images/20_01_30_09_52_45_1.jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_reset`
--

CREATE TABLE `tbl_password_reset` (
  `resetID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_password_reset`
--

INSERT INTO `tbl_password_reset` (`resetID`, `email`, `token`) VALUES
(95, 'rajendra79201@gmail.com', '44da4511ca5a4ccfdc3c51d6d527a6d7b03b1471f539171637f2afef5c3647d2b21d483225fb9f07a6a17e52c1d85bb2a462'),
(96, 'rajendra79201@gmail.com', '542b4372c77c96efdcf01fe297405becef9e6ad05620b166f307b21c26b83366ed5b2985b15417fabdcd6622b054ba9be689'),
(97, 'linkwithdm@gmail.com', '9c7d0b3416349f0a41defa8204f20d53c50c92fd9bc6d5713fba4deac1a177d9c74c9c316115f5ebea8deebb485e1cf263d9'),
(98, 'linkwithdm@gmail.com', '8bf88043c46a95e949dba2b00056dd92485821188b733303b01718fe6de366d673cbc0d1a0489563c2e523127873c0bfb720'),
(99, 'linkwithdm@gmail.com', '29916024a3b2b3d37cc9f889059050a12542687b972d0e166573858d7f5ed55c1d516063feb81d01224dd2e31165b08f3d3b'),
(100, 'linkwithdm@gmail.com', '745c5f405d8894562a84bbb64ebe48e7db7f8a0b4de1d390b4110b16173fd128f3dfb39ce41ded6707b1aa8364d98b3fb283'),
(101, 'linkwithdm@gmail.com', '34ccf3a5ddbe9a78845a0e0750c70e1a31e56f16d85604715c317c99464952f6a4c86c0d4a36da3c78aa154f1305bd73662e'),
(102, 'rajendra79201@gmail.com', '28e19cb61f55342e2d9a2d511dd4ea50f4e12ac0b673ae3183fa3b8374f0deae4ac71b07547538f1c05a01187f74a10a100c'),
(103, 'rajendra79201@gmail.com', 'f8e915882d25e02832fe1a5d036fd869376779dfcb06355f1156226e5b00e5b1937ea98ef16a3757bc710e36361db6a9f3ca');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `image`, `title`, `description`, `date`, `status`) VALUES
(12, 'resource/images/20_02_01_06_43_22_slide3.jpg', 'GBICS', 'International Cricket Stadium Coming Up At Bharatpur City!', '2020-02-01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(150) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'resource/images/adminImg.png',
  `uType` enum('Administration','Normal') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `name`, `username`, `email`, `password`, `mobileno`, `image`, `uType`, `status`) VALUES
(11, 'debid', 'david', 'linkwithdm@gmail.com', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634', '9856565456', 'resource/images/20_01_22_04_54_37__MG_2736.JPG', 'Administration', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `tbl_latest_update`
--
ALTER TABLE `tbl_latest_update`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tbl_latest_update_images`
--
ALTER TABLE `tbl_latest_update_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_latest_update`
--
ALTER TABLE `tbl_latest_update`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_latest_update_images`
--
ALTER TABLE `tbl_latest_update_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  MODIFY `resetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  ADD CONSTRAINT `tbl_gallery_images_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `tbl_gallery` (`gid`);

--
-- Constraints for table `tbl_latest_update_images`
--
ALTER TABLE `tbl_latest_update_images`
  ADD CONSTRAINT `tbl_latest_update_images_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `tbl_latest_update` (`lid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
