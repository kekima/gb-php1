-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2020 at 06:04 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `good_id` int NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `good_id`, `session_id`) VALUES
(91, 1, 't63d34dtfkbiavqmg6f8ifm9ulrb7hqc'),
(92, 2, 't63d34dtfkbiavqmg6f8ifm9ulrb7hqc'),
(93, 2, '2u2occ6tr6hge1u0mk0af8hvb2r3gj7m'),
(94, 1, '2u2occ6tr6hge1u0mk0af8hvb2r3gj7m'),
(95, 1, '5hp4gm2amhij6gef9muo9dpjed5ktp0o'),
(96, 2, 'kqp4k8rrltj709lp7j8t8n9egos5gtnf'),
(97, 2, 'pk5u99ld6p368hrhvj1k6lbkftlauo4s'),
(98, 1, 'pk5u99ld6p368hrhvj1k6lbkftlauo4s'),
(99, 1, 'tka5i15i3g413i6pbb78j5dnfj8nqo5j'),
(100, 1, 'tka5i15i3g413i6pbb78j5dnfj8nqo5j'),
(101, 1, 'tka5i15i3g413i6pbb78j5dnfj8nqo5j'),
(102, 2, 'ds23jjppe6vg70elt20iop07t2hh0qd6'),
(105, 1, 'ds23jjppe6vg70elt20iop07t2hh0qd6'),
(106, 1, 'qpqbtmkgtjuoo2hm58hsul9a4381iagh'),
(107, 2, 'qpqbtmkgtjuoo2hm58hsul9a4381iagh'),
(108, 2, 'qpqbtmkgtjuoo2hm58hsul9a4381iagh'),
(117, 2, 'gg87rcn8ug8t3k486f1ev39fgvec7uo5'),
(118, 1, 'gg87rcn8ug8t3k486f1ev39fgvec7uo5'),
(119, 1, 'gg87rcn8ug8t3k486f1ev39fgvec7uo5'),
(130, 2, 'u63utnefj06c8o391jfoc218m52n3bik'),
(131, 1, 'u63utnefj06c8o391jfoc218m52n3bik'),
(132, 1, 'u63utnefj06c8o391jfoc218m52n3bik'),
(133, 2, 'vvfg2j11j7d39em56df9anb9djrkn0ri'),
(134, 1, 'vvfg2j11j7d39em56df9anb9djrkn0ri'),
(135, 1, 'vvfg2j11j7d39em56df9anb9djrkn0ri'),
(136, 1, 'vvfg2j11j7d39em56df9anb9djrkn0ri'),
(137, 1, '2cacsvnnimi2iva512h13fu8k5e953s3'),
(138, 2, '2cacsvnnimi2iva512h13fu8k5e953s3'),
(139, 2, '2cacsvnnimi2iva512h13fu8k5e953s3'),
(140, 2, 'qf0fk3enr4iuc77lvi754hndv82k9rt6'),
(141, 2, 'qf0fk3enr4iuc77lvi754hndv82k9rt6'),
(142, 1, 'e757eg2diftjuhrng0iv7mo6cq11i0as'),
(143, 2, 'e757eg2diftjuhrng0iv7mo6cq11i0as'),
(144, 2, 'e757eg2diftjuhrng0iv7mo6cq11i0as'),
(145, 2, 't48j46nv3h7k82dsck9ts8345mlgo4u2'),
(146, 1, 't48j46nv3h7k82dsck9ts8345mlgo4u2'),
(147, 1, 't48j46nv3h7k82dsck9ts8345mlgo4u2'),
(148, 1, 'jdoklk8pp6j8kpagg884rcds8jvn0aqa'),
(149, 2, 'jdoklk8pp6j8kpagg884rcds8jvn0aqa'),
(150, 2, 'jdoklk8pp6j8kpagg884rcds8jvn0aqa'),
(151, 1, 'on4lic3reudt3lohceum220b8r0f5l6d'),
(152, 2, 'on4lic3reudt3lohceum220b8r0f5l6d'),
(153, 2, 'on4lic3reudt3lohceum220b8r0f5l6d'),
(154, 1, 'on4lic3reudt3lohceum220b8r0f5l6d'),
(156, 2, 'daca76mns19sg1u22kuk37j9a1rqfcb7'),
(157, 1, 'daca76mns19sg1u22kuk37j9a1rqfcb7'),
(158, 1, 'daca76mns19sg1u22kuk37j9a1rqfcb7');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `feedback` text NOT NULL,
  `id_image` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `date`, `feedback`, `id_image`) VALUES
(2, 'Carrot', '', 'First test was deleted successfully', 0),
(3, 'Carrot', '', 'Tried to edit this one. It worked well.', 0),
(6, 'test', '', 'test', 4),
(8, 'test3', '', 'test3', 5),
(14, 'Ninjin', '', 'OkaKoro teetee moment', 4),
(16, 'East-Sleep-JDM', '', 'I prefer the R34', 1),
(17, 'Ninjin', '', 'Nice car', 1),
(18, 'Carrot', '', 'Any rust?', 1),
(19, 'Carrot', '', 'HICAS still working?', 2),
(20, 'Curious cat', '', 'Is this still working properly?', 0),
(30, 'Carot', '', 'still works?', 0),
(33, 'Carrot', '[15 Jul 2020, 01:37]', 'Timestamp test', 0),
(34, 'Carrot', '[01 Aug 2020, 14:45]', 'Just checking if it\'s still working', 0);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `descr` text NOT NULL,
  `price` int NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `image`, `name`, `descr`, `price`, `likes`) VALUES
(1, 'mark2.jpg', 'Toyota MarkII', 'Equipped with original 2JZ. Less than 100k miles on the odometer. Mint condition. Clean record. I was the only owner.', 450000, 9),
(2, 'r34.jpg', 'Nissan Skyline R34', 'RB26. One of the last decently looking ones left in the country. Perfect condition. Weekend car, was never used for actual racing.', 1250000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `filename` text NOT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `views`) VALUES
(1, '01.jpg', 2),
(2, '02.jpg', 1),
(3, '03.jpg', 1),
(4, 'k1Aw7d0Y-xE.jpg', 91),
(5, 'vdsF_HoD76s.jpg', 9),
(10, 'ff14.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `session_id` text NOT NULL,
  `address` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `totalprice` int NOT NULL DEFAULT '0',
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `phone`, `session_id`, `address`, `status`, `totalprice`, `date`) VALUES
(1, 'asd', '8-911-478-43-03', '5hp4gm2amhij6gef9muo9dpjed5ktp0o', 'asd', 1, 0, ''),
(2, 'asd', '8-911-478-43-03', '5hp4gm2amhij6gef9muo9dpjed5ktp0o', 'asd', 0, 0, ''),
(3, 'asd', '8-911-478-43-03', 'kqp4k8rrltj709lp7j8t8n9egos5gtnf', 'asd', 0, 0, ''),
(4, '123', '8-911-478-43-03', 'pk5u99ld6p368hrhvj1k6lbkftlauo4s', '123', 0, 0, ''),
(5, 'aaaa', '8-911-333-33-33', 'tka5i15i3g413i6pbb78j5dnfj8nqo5j', 'bbbb', 0, 0, ''),
(6, 'asdf', '8-123-456-78-90', 'ds23jjppe6vg70elt20iop07t2hh0qd6', 'asdf', 0, 0, ''),
(7, 'qwer', '8-000-000-00-00', 'qpqbtmkgtjuoo2hm58hsul9a4381iagh', 'qwer', 0, 0, ''),
(8, 'qweer', '8-101-789-11-23', 'gg87rcn8ug8t3k486f1ev39fgvec7uo5', 'qwerty', 0, 0, ''),
(9, 'asd', '8-111-111-11-11', 'jdoklk8pp6j8kpagg884rcds8jvn0aqa', 'asd', 0, 0, ''),
(10, 'wasd', '8-111-111-11-11', 'on4lic3reudt3lohceum220b8r0f5l6d', 'wasd', 0, 0, ''),
(11, 'wasd', '8-111-111-11-11', 'on4lic3reudt3lohceum220b8r0f5l6d', 'wasd', 0, 0, ''),
(12, 'wasd', '8-999-777-55-22', 'on4lic3reudt3lohceum220b8r0f5l6d', 'wasd', 0, 0, ''),
(13, 'wasd', '8-123-456-77-88', 'on4lic3reudt3lohceum220b8r0f5l6d', 'wasd', 0, 3400000, ''),
(14, 'qwwq', '8-987-654-32-12', 'on4lic3reudt3lohceum220b8r0f5l6d', 'qwwwq', 1, 3400000, ''),
(15, 'qwerty', '8-911-478-43-03', 'daca76mns19sg1u22kuk37j9a1rqfcb7', 'asdf', 0, 2150000, '01 Aug 2020, 14:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '$2y$10$kE8CdvYFy44RbIKrg9JLwuFOfeHwPHi4tuP/B2VieY7i72s1VnIii'),
(2, 'carrot', '$2y$10$kE8CdvYFy44RbIKrg9JLwuFOfeHwPHi4tuP/B2VieY7i72s1VnIii');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
