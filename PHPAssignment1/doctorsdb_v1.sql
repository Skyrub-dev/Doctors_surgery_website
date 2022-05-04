-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 09:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `doctorsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `uid` int(11) NOT NULL,
  `adusername` text NOT NULL,
  `adpassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`uid`, `adusername`, `adpassword`) VALUES
(1, 'Admin', '$2y$10$VGA8LPfupq2zVGq0GCJuI.IuAcL1RG5doeWZf0y0VUA0YDCtou5ci');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslist`
--

CREATE TABLE `doctorslist` (
  `uid` int(11) NOT NULL,
  `title` text NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `docusername` text NOT NULL,
  `docpassword` varchar(128) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorslist`
--

INSERT INTO `doctorslist` (`uid`, `title`, `lastname`, `firstname`, `docusername`, `docpassword`, `department`) VALUES
(1, 'Dr', 'Doe', 'John', 'JDoe', '$2y$10$bBy3IRqz6zDZRUd2WmyjOeXhnn2bvSq6GyjT5Vr9XK4/3mDghbWCy', ''),
(2, 'Dr', 'John', 'James', 'DRJ', '$2y$10$1QpYHNNCEcxybpELo6bS6OVLv0Nrl8hjQMEhuybKIk2oObROlbAEK', 'AAE'),
(4, 'Dr', 'Reynolds', 'Logan', 'LRaynolds', '$2y$10$lYiVwczyw2rAAkP4x6EbReNCZzIhlkQgEtEuvXJfqWFQnaQUfni.u', 'GS'),
(5, 'Dr', 'Kennedy', 'Thomas', 'TK2002', '$2y$10$8Jyd3UW4pJUtE8PEdD/JEeLEvwjIObgJE2ciaiFsApN.SyPDKSKGy', 'GS');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `guestno` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `description` text NOT NULL,
  `assigned_to` varchar(255) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `self` varchar(255) DEFAULT NULL,
  `gfname` varchar(255) DEFAULT NULL,
  `glname` varchar(255) DEFAULT NULL,
  `gdob` varchar(255) DEFAULT NULL,
  `gemail` varchar(255) DEFAULT NULL,
  `gdescrip` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`guestno`, `firstname`, `lastname`, `dob`, `email`, `description`, `assigned_to`, `department`, `self`, `gfname`, `glname`, `gdob`, `gemail`, `gdescrip`, `uid`) VALUES
(1, 'Tomm', 'Kennedy', '2022-02-02', 'tomk@gmail.com', 'this is a description of the problem', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'second', 'name', '2022-03-01', 'emai@gasdf.com', 'sdfgsdg', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'John', 'Doe', '2022-02-28', 'JDoe@gmail.com', 'sdf', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Tim', 'Kennod', '2022-04-06', 'sdkfjhasdflkjh@dkfjh.com', 'Help', NULL, 'AAE', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'John', 'Doe', '2022-02-28', 'JDoe@gmail.com', 'I am in trouble', NULL, 'AAE', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Emma', 'Ryan', '1975-11-08', 'emnryan@googlemail.com', 'headache', NULL, 'AAE', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'soncdar', 'lastn', '2022-04-06', 'secpm@ggg.com', 'another problem', NULL, 'AAE', 'YES', NULL, NULL, NULL, NULL, NULL, 0),
(8, 'first', 'lastn', '2022-03-30', 'sdfkdjf@fdslkj.com', 'they need it', 'NONE', 'AAE', 'NO', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'sdf', 'sdf', '2022-03-30', 'sdf@sdf.com', 'sdfsdf', NULL, 'AAE', 'NO', NULL, NULL, NULL, NULL, NULL, 0),
(10, 'tim', 'kne', '2022-04-06', 'dfg@sdfgsdf.com', 'dfgdfgdfgdfg', 'TK2002', 'AAE', 'NO', NULL, NULL, NULL, NULL, NULL, 0),
(11, 'fdg', 'dfg', '2022-04-05', 'dfg@sdfg.com', 'dfgdfg', NULL, 'AAE', 'YES', NULL, NULL, NULL, NULL, NULL, 0),
(12, 'sdf', 'sdf', '2022-03-30', 'tomkenned9@gmail.com', 'fdsg', NULL, 'AAE', 'YES', 'dfg', 'dfg', '2022-03-29', 'gfdgdfg@fdg.com', 'sdf', 0),
(17, 'JOhn', 'Doe', '2022-05-04', 'jd@gmail.com', 'In an emergency!', NULL, 'AAE', 'YES', 'Tom', 'Kennedy', '2022-04-26', 'tomk@gmsl.com', 'Relative', 0),
(19, 'john', 'doe', '2022-05-04', 'fdg@gfg.com', 'sdf', NULL, 'AAE', 'YES', 'Tom', 'Kenned', '2022-04-26', 'rt@gsdf.com', 'Relative', 0),
(21, 'John', 'Doe', '2022-04-26', 'JDoe@gmail.com', 'Underweight', NULL, 'D', 'YES', 'Tom', 'Kennedy', '2022-04-26', 'tom@gmail.com', 'Relative', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`, `firstname`, `lastname`, `dob`, `email`) VALUES
(9, 'Tom', '$2y$10$BSMHU2Jx6IIrKdyH9t9Keu/30GyH4FE65XifhsNJdoVa/wGsTla0i', 'Tom', 'Kennedy', '2022-03-08', 'tomkenned9@gmail.com'),
(10, 'Admin', '$2y$10$BSMHU2Jx6IIrKdyH9t9Keu/30GyH4FE65XifhsNJdoVa/wGsTla0i', 'N/A', 'N/A', '0000-00-00', 'admin@mail.com'),
(11, 'TKennedy', '$2y$10$AV33pryd2Vt3DGxQ6S17/.5Je/Jg1KtHE7fh2ncblqLFaWP7Cv/bC', 'Tom', 'Kennedy', '2022-03-08', 'tomkennedy428@gmail.com'),
(12, 'JDoe', '$2y$10$VGA8LPfupq2zVGq0GCJuI.IuAcL1RG5doeWZf0y0VUA0YDCtou5ci', 'John', 'Doe', '2022-02-28', 'JDoe@gmail.com'),
(13, 'TDoe', '$2y$10$u0c8V7W0lxju2NDPYgzWtOFA.tO6m1.pbrohXExnCoRvrDOxZTQd2', 'Tom', 'Doe', '2022-03-01', 'TDoe@email.com'),
(14, 'Emma', '$2y$10$mwvtEv5u8oVUKo.83MkENOv6mBfLBkATDoTuRgjWTE7EDCTwxDiBK', 'Emma', 'Ryan', '1975-11-08', 'emnryan@googlemail.com'),
(15, 'NDoe', '$2y$10$evEZxK167QqacWrX7Gid3ukha7DQtPYPbUzeWhptmTgZo2ZcE1k76', 'Nora', 'Doe', '2022-03-29', 'nd@gsfdlkg.com'),
(19, 'Emma2', '$2y$10$C5q93ev11OTch3mZ9VUdDeqUTMVayftX1MAoYAAlDVz4z/JKJsw4m', 'Emma', 'Ryan', '2022-03-30', 'dfg@dsfsdf.com'),
(20, 'TK108', '$2y$10$7X1jU/F3FrOghxRfAKpXYecOzK8E/03LC6c2oD6jQBmsQnRopzhHC', 'Tim', 'Kenned', '2022-05-03', 'TK108@gg.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `doctorslist`
--
ALTER TABLE `doctorslist`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`guestno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctorslist`
--
ALTER TABLE `doctorslist`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `guestno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;
