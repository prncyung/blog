-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 12:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(122) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `subject`, `description`, `slug`, `created_at`, `status`) VALUES
(8, 'Angel', 'angel@yahoo.com', 'PHP', 'This is a great post, i started out learning php withing 2 months have gotten a dev job in Cairo.', 'Learning-css-in-2019', '2019-07-24', 1),
(9, 'Benson I', 'ben@gmail.com', 'php', 'It is a great post, php is used to power great App. ', 'Learning-css-in-2019', '2019-07-24', 0),
(10, 'Joan', 'joan@gmail.com', 'php', 'Php has powered many web applications and the advent of php 7, there will be more to expect.', 'Learning-css-in-2019', '2019-07-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(79) NOT NULL,
  `created_at` datetime NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `created_at`, `slug`) VALUES
(38, 'Learning css in 2019', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'css-1.png', '2019-07-24 00:00:00', 'Learning-css-in-2019'),
(39, 'Learning Angular in 2019', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'angular.png', '2019-07-24 00:00:00', 'Learning-Angular-in-2019'),
(40, 'Learning React in 2019', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'react.png', '2019-07-24 00:00:00', 'Learning-React-in-2019'),
(41, 'Learning HTML using awesomeness in 2019', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'html.jpg', '2019-07-24 00:00:00', 'Learning-HTML-using-awesomeness-in-2019'),
(42, 'PHP the best language in 2019', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'php.png', '2019-07-24 00:00:00', 'PHP-the-best-language-in-2019'),
(43, 'Javascript power the web ', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'javascript2.jpg', '2019-07-24 00:00:00', 'Javascript-power-the-web-'),
(44, 'Creating a relational database using SQL', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'sql.png', '2019-07-24 00:00:00', 'Creating-a-relational-database-using-SQL'),
(45, 'Nodejs developer(build awesome web applications)', 'There is no need to state how much weight web applications have in our lives.\r\nWe use web applications to know what our friends are doing, to get the latest\r\nnews about politics, to check the results of our favorite football team in a game, or\r\ngraduate from an online university. And as you are holding this book, you already', 'nodejs.jpg', '2019-07-24 00:00:00', 'Nodejs-developer-build-awesome-web-applications-');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(18, 1),
(18, 2),
(18, 3),
(19, 3),
(20, 1),
(20, 4),
(20, 6),
(21, 2),
(21, 5),
(21, 6),
(23, 1),
(23, 2),
(23, 3),
(24, 2),
(24, 3),
(24, 6),
(26, 1),
(26, 4),
(26, 5),
(27, 2),
(27, 3),
(27, 6),
(28, 2),
(28, 3),
(28, 6),
(29, 3),
(29, 6),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(31, 1),
(31, 4),
(32, 1),
(32, 2),
(33, 2),
(33, 5),
(34, 2),
(34, 6),
(35, 2),
(35, 4),
(36, 2),
(36, 5),
(37, 5),
(38, 5),
(39, 2),
(39, 6),
(40, 2),
(41, 4),
(42, 1),
(43, 2),
(43, 3),
(43, 6),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(44, 6),
(45, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'php'),
(2, 'react'),
(3, 'javascript'),
(4, 'html'),
(5, 'css'),
(6, 'node js');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'blog', 'blog', '92f96e5e5529ceec6218be1b9f909f85');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
