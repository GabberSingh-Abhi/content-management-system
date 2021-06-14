-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 05:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(10, 'abhijeet'),
(13, 'book'),
(14, 'dheeraj'),
(15, 'music');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(1, 1012456788, 'abhijeet', 'Boss Abhijeet', 3, 'abhijeet786@gmail.com', 'google.com', 'slideimage1.jpg', 'Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .Bade Heavy driver ho betaye .', 'approve'),
(2, 1457895484, 'Deeksha', 'Hyper Deeksha', 3, 'deeksha@gmail.com', 'facebook.com', 'commentimage.webp', 'Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . Hey Guys , How are u . ', 'unapprove'),
(4, 1234578955, 'dheeraj', 'unknown boy', 3, 'dkdheeraj794@gmail.com', 'youtube.com', 'profile123.jpg', 'this is a demo. this is a demo. this is a demo. this is a demo.', 'approve'),
(14, 1621966991, 'gdfsds dfgsedg', 'ak', 3, 'fgrfsdgg', '', 'fefe', 'dasfsdfsdf', 'unapprove'),
(15, 1621967068, 'gdfsds dfgsedg', 'ak', 3, 'fgrfsdgg', '', 'fefe', 'dsdwdfsdvdfgrfggbdverfdfd', 'approve'),
(18, 2147483647, 'sdfsdfsd', 'user', 6, 'dfdsfsd', 'dfdsf', '12.jpeg', 'dsfsdfsdfsdf', 'approve'),
(19, 2147483647, 'dkdheeraj794', 'user', 6, 'dkdheeraj794@gmail.com', 'google.com', '12.jpeg', 'asaasdasdasdsa', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(13, 'commentimage.webp'),
(14, '8.jpeg'),
(16, 'instagram.jpg'),
(17, 'linkedin.jpg'),
(18, 'Microsoft Edge.svg'),
(19, '9.jpg'),
(20, '9.png'),
(21, '10.jpeg'),
(22, '11.jpeg'),
(23, 'flame-sign-up.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`, `views`, `status`) VALUES
(3, 1457895484, 'How to remove folder windows', 'dheeruu', 'profileimage.jpeg', '', 'video', 'Hindi learn', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 12, 'draft'),
(5, 2147483647, 'How to remove folder windows', 'bk', 'slideimage1.jpg', '', 'video', 'Hindi learn', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 7, 'publish'),
(6, 2147483647, 'How to remove folder windows', 'bk', 'slideimage1.jpg', '', 'video', 'Hindi learn', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 11, 'publish'),
(7, 2147483647, 'asaSAD', 'ckc', '15.jpeg', 'linkedin.jpg', 'book', 'ASDs', '<p>SDSADASD<img src=\"media/flame-sign-up.png\" alt=\"flame-sign-up.png\" width=\"1251\" height=\"912\" /></p>', 1, 'publish'),
(8, 2147483647, 'fsdfsdf', 'ckc', '15.jpeg', 'instagram.jpg', 'music', 'czxcx', '<p>asdsdfsdfsdfds<img src=\"media/11.jpeg\" alt=\"11.jpeg\" width=\"268\" height=\"188\" /></p>', 0, 'publish'),
(9, 2147483647, 'tgefge', 'ckc', '15.jpeg', '16.jpeg', 'music', 'ryrtgyrty', '<p>tertrtret<img src=\"media/10.jpeg\" alt=\"10.jpeg\" width=\"256\" height=\"197\" /></p>', 0, 'publish'),
(10, 2147483647, 'rwerwrw', 'ckc', '15.jpeg', 'Microsoft Edge.svg', 'music', 'ytuytutyuty', '<p><img src=\"media/10.jpeg\" alt=\"10.jpeg\" width=\"256\" height=\"197\" />yytryrtyrtyrtyrtytr</p>\r\n<p>rtyrtyrtyrtyrtyrtyrty</p>', 3, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$quickbrownfoxjumpsover'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`, `details`, `salt`) VALUES
(18, 1622195916, 'fsdf ', ' fsd', 'bk', 'dfgfg', 'slideimage1.jpg', '123', 'admin', '', '$2y$10$quickbrownfoxjumpsover'),
(19, 1234578955, 'dsad', 'asdasd', 'ck', 'sdsadsadsa', 'pic1.jpeg', '$2y$10$quickbrownfoxjumpsovee2VSTnwk0PVLbOzNueOwLxjyiDighUXq', 'admin', '                    dasdaasdda                ', '$2y$10$quickbrownfoxjumpsover'),
(20, 2147483647, 'partik', 'Kumar', 'pk', 'asfsdfsd', 'nm.jpeg', '$2y$10$quickbrownfoxjumpsoveefXkylpKMwkYHIwNPw3s3ZpboG0tqpnO', 'admin', '', '$2y$10$quickbrownfoxjumpsover'),
(21, 2147483647, 'cfsdfasd', 'dsadas', 'pkp', 'sadsadas', 'Microsoft Edge.svg', '$2y$10$quickbrownfoxjumpsovee2VSTnwk0PVLbOzNueOwLxjyiDighUXq', 'author', '                                    ', '$2y$10$quickbrownfoxjumpsover'),
(22, 2147483647, 'dwsdsd', 'dsdasd', 'ckc', 'sdsad', '15.jpeg', '$2y$10$quickbrownfoxjumpsoveefXkylpKMwkYHIwNPw3s3ZpboG0tqpnO', 'admin', '', '$2y$10$quickbrownfoxjumpsover');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
